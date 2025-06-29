<?php

class m250627_163712_create_tags_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('tags', array(
			'id' => 'pk',  // Clave primaria
			'nombre' => 'string NOT NULL',  // Nombre del tag
		));
	}

	public function down()
	{
		$this->dropTable('tags');
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
