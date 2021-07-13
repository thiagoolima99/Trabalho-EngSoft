<?php 

$bd = new SQLite3("agenda.db");

//$sql = "DROP TABLE IF EXISTS agenda";

//if ($bd->exec($sql))
//	echo "\nTabela agenda deletada com sucesso\n";

$sql = "CREATE TABLE users (
  us_id INTEGER PRIMARY KEY AUTOINCREMENT,
  us_username VARCHAR(45) NOT NULL,
  us_password VARCHAR(32) NOT NULL,
  us_photo VARCHAR(45) NULL)";

if ($bd->exec($sql))
	echo "\nTabela criada com sucesso\n";
else
	echo "\nErro ao criar tabela\n"; 

$sql = "CREATE TABLE contacts (
  co_id INTEGER PRIMARY KEY AUTOINCREMENT,
  co_name VARCHAR(45) NULL,
  co_cellphone VARCHAR(20) NULL,
  co_city VARCHAR(45) NULL,
  co_email VARCHAR(100) NULL,
  co_cep VARCHAR(10) NULL,
co_photo VARCHAR(20) NULL,
  user_id INT NOT NULL,
   co_grupo INT NOT NULL)";

if ($bd->exec($sql))
	echo "\nTabela criada com sucesso\n";
else
	echo "\nErro ao criar tabela\n"; 
