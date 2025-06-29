<?php

class m250627_163554_create_users_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('users', array(
			'id' => 'pk',  // Clave primaria
			'nombre' => 'string NOT NULL',  // Nombre
			'apellidos' => 'string NOT NULL',  // Apellidos
			'email' => 'string NOT NULL UNIQUE',  // Email (único)
			'password' => 'string NOT NULL',  // Contraseña
			'fecha_nacimiento' => 'date',  // Fecha de nacimiento
			'role_id' => 'int NOT NULL',  // Relación con roles (clave foránea)
			'is_active' => 'boolean NOT NULL DEFAULT 1', // Campo booleano, por defecto es 1 (activo)
			'points' => 'int NOT NULL DEFAULT 10', // Campo integer, por defecto 0
		));

		$this->addForeignKey('fk_users_roles', 'users', 'role_id', 'roles', 'id', 'CASCADE', 'CASCADE');
	}

	public function down()
	{
		$this->dropForeignKey('fk_users_roles', 'users');
		$this->dropTable('users');
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
