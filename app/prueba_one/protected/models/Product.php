<?php

class Product extends CActiveRecord
{
	public $id;
	public $name;
	public $price;
	public $stock;
	public $category_id;

	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'products';
	}

	public function rules()
	{
		return array(
			array('name, price, stock, category_id', 'required'),
			array('name', 'length', 'max' => 255),
			array('name', 'unique', 'className' => 'Product', 'attributeName' => 'name', 'message' => 'This name is already in use'),
			array('price', 'numerical', 'min' => 5, 'max' => 500),
			array('stock', 'numerical', 'integerOnly' => true),
			array('category_id', 'numerical', 'integerOnly' => true),
		);
	}

	public function relations()
	{
		return array(
			'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
		);
	}

	// Definir las etiquetas de los campos
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name of product',
			'price' => 'Price',
			'stock' => 'Stock',
			'category_id' => 'Category'
		);
	}
}
