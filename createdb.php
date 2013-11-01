<?php
define('DB_HOST', 'localhost');
define('DB_LOGIN', 'root');
define('DB_PASSWORD', 'qwert');

mysql_connect(DB_HOST, DB_LOGIN, DB_PASSWORD) or die(mysql_error());

$sql = 'CREATE DATABASE gbook';
mysql_query($sql) or die(mysql_error());
mysql_select_db('gbook') or die(mysql_error());
$sql = "
	CREATE TABLE get (
		id INT(11) NOT NULL AUTO_INCREMENT,
		datetime timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
		name VARCHAR(50) NOT NULL DEFAULT '',
		email VARCHAR(50) NOT NULL DEFAULT '',
		url VARCHAR(50) NULL DEFAULT 'url',
		msg TEXT,
		ip VARCHAR(15) NOT NULL DEFAULT '',
		browser VARCHAR(50) NOT NULL DEFAULT '',
		PRIMARY KEY (id)
		)";
mysql_query($sql) or die(mysql_error());
mysql_close();

print '<p>Структура базы данных успешно создана!</p>';
