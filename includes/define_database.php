<?php

//importing db credentials and medoo framework
require  __DIR__."/Medoo-master/src/Medoo.php" ;
require __DIR__."/../../credentials.php" ;


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

	const ACCESS = "root$";
	const ROOT_ID = "root_id$";
	const ROOT_PSWD = "root_pswd";

	const TABLE_SD3_TEAMS = "teams";
	const TABLE_SD3_TEAMS_ID = "team_id";
	const TABLE_SD3_TEAMS_TRIAD = "team_triad";
	const TABLE_SD3_TEAMS_BASE_SCORE = "team_base_score";
	const TABLE_SD3_TEAMS_FINAL_SCORE = "team_final_score";
	const TABLE_SD3_TEAMS_PROS = "team_pros";
	const TABLE_SD3_TEAMS_CONS = "team_cons";
	const TABLE_SD3_TEAMS_QUEST = "team_quest";
	const TABLE_SD3_TEAMS_BETTER = "team_better";
	const TABLE_SD3_TEAMS_HAS_SPELL = "team_has_spell";

	const TABLE_TIPS = "tips";
	const TABLE_TIPS_ID = "tips_id";
	const TABLE_TIPS_TITLE = "tips_title";
	const TABLE_TIPS_TEXT = "tips_text";
}

// DO NOT CHANGE ONCE EVERYTHING IS REGISTERED IN "charas" DB !!!
class TargetSpells {
	// sabers
	const ELEM_SABERS_ST = "ST elemental sabers";
	const ELEM_SABERS_MT = "MT elemental sabers";
	const SABER_S = "saint saber";
	const SABER_D = "dark saber";
	const SABER_T = "tree saber";
	const SABER_M = "moon saber";
	// stat magic
	const STATS_UP_ST = "ST stats up";
	const STATS_UP_MT = "MT stats up";
	const STATS_DWN_ST = "ST stats down";
	const STATS_DWN_MT = "MT stats down";
	// various
	const BLACK_CURSE = "black curse";
	const DEMON_BREATH = "demon breath";
	const AURA_WAVE = "aura wave";
	// Jutsus
	const JUTSUS = "jutsus";


}
