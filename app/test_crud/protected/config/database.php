<?php

// This is the database connection configuration.
return array(
	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	'connectionString' => 'mysql:host=yii-crud-template-db;dbname=yii_app',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => '12345678',
	'charset' => 'utf8',
);