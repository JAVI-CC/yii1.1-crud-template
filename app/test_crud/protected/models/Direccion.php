<?php

class Direccion extends CActiveRecord
{
	public $id;
	public $user_id;
	public $nombre;

	// Para definir el nombre de la tabla asociada
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	// Definir el nombre de la tabla
	public function tableName()
	{
		return 'direcciones';  // Nombre de la tabla en la base de datos
	}

	// Definir las reglas de validación
	public function rules()
	{
		return array(
			// El campo 'nombre' es obligatorio
			array('nombre', 'required', 'message' => 'El nombre de la dirección es obligatorio'),

			// Validar la longitud del nombre
			array('nombre', 'length', 'min' => 3, 'max' => 100, 'message' => 'El nombre de la dirección debe tener entre 3 y 100 caracteres'),

			// Validar que 'user_id' sea numérico (relación con el usuario)
			array('user_id', 'numerical', 'integerOnly' => true),

			// Validar que 'user_id' sea único, ya que una dirección está asociada a un solo usuario
			array('user_id', 'unique', 'message' => 'Este usuario ya tiene una dirección asociada'),
		);
	}

	// Definir las relaciones con otros modelos
	public function relations()
	{
		return array(
			// Relación con 'user': una dirección pertenece a un usuario (uno a uno)
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),  // Relación uno a uno con la tabla 'users'
		);
	}

	// Definir etiquetas para los atributos (esto es para mostrar en formularios o vistas)
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'ID del Usuario',
			'nombre' => 'Nombre de la Dirección',
		);
	}
}
