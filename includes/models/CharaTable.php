<?php

include_once __DIR__."/../define_database.php" ;

class CharaTable
{
	global $database;

	function add_chara_simple($id, $name, $class, $img)
	{
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
		$id = get_database()->id();
	}

	function set_chara_details ($id, $light_dark, $score, array $min_stats, array $max_stats, array $spells, array $techs, $pros, $cons, $affiliates)
	{
		$res = $database->update(Constants::TABLE_SD3_CHARAS, [
			Constants::TABLE_SD3_CHARAS_LIGHT_DARK => $light_dark,
			Constants::TABLE_SD3_CHARAS_SCORE => $score,
			Constants::TABLE_SD3_CHARAS_MIN_STATS => json_encode($min_stats),
			Constants::TABLE_SD3_CHARAS_MAX_STATS => json_encode($max_stats),
			Constants::TABLE_SD3_CHARAS_SPELLS => json_encode($spells),
			Constants::TABLE_SD3_CHARAS_TECHS => json_encode($techs),
			Constants::TABLE_SD3_CHARAS_PROS => $pros,
			Constants::TABLE_SD3_CHARAS_CONS => $cons,
			Constants::TABLE_SD3_CHARAS_AFFILIATES => $affiliates
		], [
			Constants::TABLE_SD3_CHARAS_ID => $id
		]);
		return $res ;
	}

	function get_chara_allinfo_by_id($id)
	{
		$data = get_database()->get(Constants::TABLE_SD3_CHARAS, "*", [
			Constants::TABLE_SD3_CHARAS_ID => $id
		] );
		foreach ($data as $piece)
		{
			// json decode the informations
		}
		return $data ;
	}

	function get_chara_lines_by_name($name)
	{
		$data = get_database()->get(Constants::TABLE_SD3_CHARAS, "*", [
			Constants::TABLE_SD3_CHARAS_NAME => $name
		] );
		return $data ;
		foreach ($data as $piece)
		{
			// json decode the informations
		}
	}

	function get_chara_details_by_id($id)
	{
		$data = get_database()->get(Constants::TABLE_SD3_CHARAS, [
			Constants::TABLE_SD3_CHARAS_LIGHT_DARK,
			Constants::TABLE_SD3_CHARAS_SCORE,
			Constants::TABLE_SD3_CHARAS_MIN_STATS,
			Constants::TABLE_SD3_CHARAS_MAX_STATS,
			Constants::TABLE_SD3_CHARAS_SPELLS,
			Constants::TABLE_SD3_CHARAS_TECHS,
			Constants::TABLE_SD3_CHARAS_PROS,
			Constants::TABLE_SD3_CHARAS_CONS,
			Constants::TABLE_SD3_CHARAS_AFFILIATES
		], [
			Constants::TABLE_SD3_CHARAS_ID => $id
		] );
		foreach ($data as $piece)
		{
			// json decode the informations
		}
		return $data ;
	}
}
