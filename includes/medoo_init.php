<?php

//importing db credentials and medoo framework
require  __DIR__."/Medoo-master/src/Medoo.php" ;
require __DIR__."/credentials.php" ;


// Using Medoo namespace
use Medoo\Medoo ;

// init var database --- similar to PHP PDO statement
$database = new Medoo([
	'database_type' => 'mysql',
	'database_name' => 'sd3-project',
	'server' => 'localhost',
	'username' => $id_pmyadmin,
	'password' => $pass,
	'charset' => 'utf8'
]) ;

// constant names
class Constants {

	const TABLE_SD3_CHARAS = "characters";
	const TABLE_SD3_CHARAS_ID = "id";
	const TABLE_SD3_CHARAS_NAME = "name";
	const TABLE_SD3_CHARAS_CLASS = "class";
	const TABLE_SD3_CHARAS_IMG = "img_src";
	const TABLE_SD3_CHARAS_LIGHT_DARK = "light_dark";
	const TABLE_SD3_CHARAS_SCORE = "score";
	const TABLE_SD3_CHARAS_MIN_STATS = "min_stats";
	const TABLE_SD3_CHARAS_MAX_STATS = "max_stats";
	const TABLE_SD3_CHARAS_SPELLS = "spells";
	const TABLE_SD3_CHARAS_TECHS = "techs";
	const TABLE_SD3_CHARAS_PROS = "pros";
	const TABLE_SD3_CHARAS_CONS = "cons";
	const TABLE_SD3_CHARAS_AFFILIATES = "affiliates";
}
