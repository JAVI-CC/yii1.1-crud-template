<?php

class Category extends CActiveRecord
{
	public $id;
	public $name;

	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'categories';
	}

	public function rules()
	{
		return array(
			array('name', 'required'),
			array('name', 'length', 'max' => 255),
			array('name', 'unique', 'className' => 'Product', 'attributeName' => 'name', 'message' => 'This name is already in use'),
		);
	}

	public function relations()
	{
		return array(
			'products' => array(self::HAS_MANY, 'Product', 'category_id'),
		);
	}

	// Definir las etiquetas de los campos
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Category name',
		);
	}
}
