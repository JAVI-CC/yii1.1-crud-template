<?php

class m250701_104255_create_categories_table extends CDbMigration
{
	public function up()
	{
			$this->createTable('categories', array(
			'id' => 'pk',
			'name' => 'string NOT NULL UNIQUE',
		));
	}

	public function down()
	{
		$this->dropTable('categories');
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