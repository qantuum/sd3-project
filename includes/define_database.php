<?php

//importing db credentials and medoo framework
require  __DIR__."/Medoo-master/src/Medoo.php" ;
require __DIR__."/../../../htdocs_credentials/sd3-project-credentials.php" ;


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
	const TABLE_SD3_CHARAS_ID = "charas_id";
	const TABLE_SD3_CHARAS_NAME = "charas_name";
	const TABLE_SD3_CHARAS_CLASS = "charas_class";
	const TABLE_SD3_CHARAS_IMG = "charas_img_src";
	const TABLE_SD3_CHARAS_LIGHT_DARK = "charas_light_dark";
	const TABLE_SD3_CHARAS_SCORE = "charas_score";
	const TABLE_SD3_CHARAS_MIN_STATS = "charas_min_stats";
	const TABLE_SD3_CHARAS_MAX_STATS = "charas_max_stats";
	const TABLE_SD3_CHARAS_SPELL_STATS = "charas_spell_stats";
	const TABLE_SD3_CHARAS_SPELLS = "charas_spells";
	const TABLE_SD3_CHARAS_TECHS = "charas_techs";
	const TABLE_SD3_CHARAS_PROS = "charas_pros";
	const TABLE_SD3_CHARAS_CONS = "charas_cons";
	const TABLE_SD3_CHARAS_AFFILIATES = "charas_affiliates";

	const ACCESS = "root$";
	const ROOT_ID = "root_id$";
	const ROOT_PSWD = "root_pswd";

	const TABLE_SD3_TEAMS = "teams";
	const TABLE_SD3_TEAMS_ID = "teams_id";
	const TABLE_SD3_TEAMS_TRIAD = "teams_triad";
	const TABLE_SD3_TEAMS_BASE_SCORE = "teams_base_score";
	const TABLE_SD3_TEAMS_FINAL_SCORE = "teams_final_score";
	const TABLE_SD3_TEAMS_PROS = "teams_pros";
	const TABLE_SD3_TEAMS_CONS = "teams_cons";
	const TABLE_SD3_TEAMS_QUEST = "teams_quest";
	const TABLE_SD3_TEAMS_BETTER = "teams_better";
	const TABLE_SD3_TEAMS_HAS_SPELL = "teams_has_spell";

	const TABLE_TIPS = "tips";
	const TABLE_TIPS_ID = "tips_id";
	const TABLE_TIPS_TITLE = "tips_title";
	const TABLE_TIPS_TEXT = "tips_text";
}

// DO NOT CHANGE ONCE EVERYTHING IS REGISTERED IN "charas" DB !!!
/* class TargetSpells {
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
} */
