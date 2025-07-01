<?php

class m250701_103522_create_products_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('products', array(
			'id' => 'pk',
			'name' => 'string NOT NULL UNIQUE',
			'price' => 'int NOT NULL',
			'stock' => 'int NOT NULL',
			'category_id' => 'int NOT NULL'
		));

		$this->addForeignKey('fk_category', 'products', 'category_id', 'categories', 'id', 'CASCADE', 'CASCADE');
	}

	public function down()
	{
		$this->dropForeignKey('fk_category', 'products');
		$this->dropTable('products');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}
