<?php

class Tag extends CActiveRecord
{
	public $id;
	public $nombre;

	// Para definir el nombre de la tabla asociada
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	// Definir el nombre de la tabla
	public function tableName()
	{
		return 'tags';  // Nombre de la tabla en la base de datos
	}

	// Definir las reglas de validación
	public function rules()
	{
		return array(
			// El campo 'nombre' es obligatorio y debe ser único
			array('nombre', 'required', 'message' => 'El nombre del tag es obligatorio'),
			array('nombre', 'unique', 'message' => 'Este tag ya está en uso'),
			array('nombre', 'length', 'min' => 3, 'max' => 50, 'message' => 'El nombre del tag debe tener entre 3 y 50 caracteres'),
		);
	}

	// Definir las relaciones con otros modelos
	public function relations()
	{
		return array(
			// Relación con los usuarios: un tag puede pertenecer a muchos usuarios
			'users' => array(self::MANY_MANY, 'User', 'user_tags(tag_id, user_id)'),  // Relación muchos a muchos con la tabla 'users'
		);
	}

	// Definir etiquetas para los atributos
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre del Tag',
		);
	}
}
