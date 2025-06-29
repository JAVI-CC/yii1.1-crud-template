<?php

class m250627_164737_create_direcciones_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('direcciones', array(
			'id' => 'pk',  // Clave primaria
			'nombre' => 'string NOT NULL',  // Nombre de la dirección
			'user_id' => 'int NOT NULL',  // Clave foránea que se refiere al usuario
		));

		$this->addForeignKey('fk_direcciones_users', 'direcciones', 'user_id', 'users', 'id', 'CASCADE', 'CASCADE');
		$this->createIndex('idx_user_id', 'direcciones', 'user_id', true);
	}

	public function down()
	{
		// Eliminar la clave foránea y la tabla 'direcciones'
		$this->dropForeignKey('fk_direcciones_users', 'direcciones');
		$this->dropIndex('idx_user_id', 'direcciones');
		$this->dropTable('direcciones');
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
