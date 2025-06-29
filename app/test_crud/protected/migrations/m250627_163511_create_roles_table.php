<?php

class m250627_163511_create_roles_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('roles', array(
			'id' => 'pk',  // Clave primaria
			'nombre' => 'string NOT NULL', // Nombre del rol
		));
	}

	public function down()
	{
		$this->dropTable('roles');
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
