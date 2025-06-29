<?php

class Role extends CActiveRecord
{
	const ROLE_ADMIN = 1;
	const ROLE_USUARIO = 2;
	const ROLE_MODERADOR = 3;

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
		return 'roles';  // Nombre de la tabla en la base de datos
	}

	// Definir las reglas de validación
	public function rules()
	{
		return array(
			// El campo 'nombre' es obligatorio y debe ser único
			array('nombre', 'required', 'message' => 'El nombre del rol es obligatorio'),
			array('nombre', 'unique', 'message' => 'Este nombre de rol ya está en uso'),
			array('nombre', 'length', 'min' => 3, 'max' => 50, 'message' => 'El nombre del rol debe tener entre 3 y 50 caracteres'),
		);
	}

	// Definir las relaciones con otros modelos
	public function relations()
	{
		return array(
			// Relación con los usuarios: un rol tiene muchos usuarios
			'users' => array(self::HAS_MANY, 'User', 'role_id'),  // Relación uno a muchos
		);
	}

	// Definir etiquetas para los atributos (esto es para mostrar en formularios o vistas)
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre del Rol',
		);
	}
}
