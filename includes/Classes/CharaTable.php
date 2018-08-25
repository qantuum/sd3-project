<?php

include_once "D:/wamp64/www/sd3-project/includes/medoo_init.php" ;

class CharaTable
{

	function add_chara_simple($id, $name, $class, $img)
	{
		global $database;

		$res = $database->insert(Constants::TABLE_SD3_CHARAS, [
			Constants::TABLE_SD3_CHARAS_ID => $id,
			Constants::TABLE_SD3_CHARAS_NAME => $name,
			Constants::TABLE_SD3_CHARAS_CLASS => $class,
			Constants::TABLE_SD3_CHARAS_IMG => $img,
			Constants::TABLE_SD3_CHARAS_LIGHT_DARK => " ",
			Constants::TABLE_SD3_CHARAS_SCORE => 0,
			Constants::TABLE_SD3_CHARAS_MIN_STATS => json_encode(array(" ")),
			Constants::TABLE_SD3_CHARAS_MAX_STATS => json_encode(array(" ")),
			Constants::TABLE_SD3_CHARAS_SPELLS => json_encode(array(" ")),
			Constants::TABLE_SD3_CHARAS_TECHS => json_encode(array(" ")),
			Constants::TABLE_SD3_CHARAS_PROS => " ",
			Constants::TABLE_SD3_CHARAS_CONS => " ",
			Constants::TABLE_SD3_CHARAS_AFFILIATES => " "
		]);
		return ($res->rowCount() > 0) ;
	}
}
