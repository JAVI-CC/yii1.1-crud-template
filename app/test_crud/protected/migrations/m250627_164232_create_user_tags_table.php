<?php

class m250627_164232_create_user_tags_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('user_tags', array(
			'user_id' => 'int NOT NULL',  // Relación con 'users'
			'tag_id' => 'int NOT NULL',   // Relación con 'tags'
		));

		// Crear las claves foráneas
		$this->addForeignKey('fk_user_tags_users', 'user_tags', 'user_id', 'users', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_user_tags_tags', 'user_tags', 'tag_id', 'tags', 'id', 'CASCADE', 'CASCADE');

		// Crear una clave única para evitar duplicados
		$this->createIndex('idx_user_tags', 'user_tags', array('user_id', 'tag_id'), true);
	}

	public function down()
	{
		// Eliminar las claves foráneas y la tabla intermedia
		$this->dropForeignKey('fk_user_tags_users', 'user_tags');
		$this->dropForeignKey('fk_user_tags_tags', 'user_tags');
		$this->dropIndex('idx_user_tags', 'user_tags');
		$this->dropTable('user_tags');
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
