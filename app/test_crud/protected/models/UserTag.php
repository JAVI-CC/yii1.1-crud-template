<?php

class UserTag extends CActiveRecord
{
	public $user_id;
	public $tag_id;

	// Para definir el nombre de la tabla asociada
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	// Definir el nombre de la tabla
	public function tableName()
	{
		return 'user_tags';  // Nombre de la tabla en la base de datos
	}

	// Definir las reglas de validación
	public function rules()
	{
		return array(
			// Ambas claves foráneas deben ser numéricas
			array('user_id, tag_id', 'numerical', 'integerOnly' => true),
		);
	}
}
