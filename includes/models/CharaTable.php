<?php

include_once __DIR__."/../define_database.php" ;

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
		$id = $database->id();
	}

	function set_chara_details ($id, $light_dark, $score, array $min_stats, array $max_stats, array $spells, array $techs, $pros, $cons, $affiliates)
	{
		global $database;
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
		global $database;
		$data = $database->get(Constants::TABLE_SD3_CHARAS, "*", [
			Constants::TABLE_SD3_CHARAS_ID => $id
		] );
		if ($data)
		{
			$data[Constants::TABLE_SD3_CHARAS_MIN_STATS] = implode(", ", json_decode($data[Constants::TABLE_SD3_CHARAS_MIN_STATS], true));
			$data[Constants::TABLE_SD3_CHARAS_MAX_STATS] = implode(", ", json_decode($data[Constants::TABLE_SD3_CHARAS_MAX_STATS], true));
			$data[Constants::TABLE_SD3_CHARAS_SPELLS] = implode(", ", json_decode($data[Constants::TABLE_SD3_CHARAS_SPELLS], true));
			$data[Constants::TABLE_SD3_CHARAS_TECHS] = implode(", ", json_decode($data[Constants::TABLE_SD3_CHARAS_TECHS], true));
		}
		return $data ;
	}

	function get_chara_lines_by_name($name)
	{
		global $database;
		$data = $database->select(Constants::TABLE_SD3_CHARAS, "*", [
			Constants::TABLE_SD3_CHARAS_NAME => $name
		] );
		foreach ($data as $line)
		{
			$line[Constants::TABLE_SD3_CHARAS_MIN_STATS] = implode(", ", json_decode($line[Constants::TABLE_SD3_CHARAS_MIN_STATS], true));
			$line[Constants::TABLE_SD3_CHARAS_MAX_STATS] = implode(", ", json_decode($line[Constants::TABLE_SD3_CHARAS_MAX_STATS], true));
			$line[Constants::TABLE_SD3_CHARAS_SPELLS] = implode(", ", json_decode($line[Constants::TABLE_SD3_CHARAS_SPELLS], true));
			$line[Constants::TABLE_SD3_CHARAS_TECHS] = implode(", ", json_decode($line[Constants::TABLE_SD3_CHARAS_TECHS], true));
		}
		return $data ;
	}

	function get_chara_details_by_id($id)
	{
		global $database;
		$data = $database->get(Constants::TABLE_SD3_CHARAS, [
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
		if ($data)
		{
			$data[Constants::TABLE_SD3_CHARAS_MIN_STATS] = implode(", ", json_decode($data[Constants::TABLE_SD3_CHARAS_MIN_STATS], true));
			$data[Constants::TABLE_SD3_CHARAS_MAX_STATS] = implode(", ", json_decode($data[Constants::TABLE_SD3_CHARAS_MAX_STATS], true));
			$data[Constants::TABLE_SD3_CHARAS_SPELLS] = implode(", ", json_decode($data[Constants::TABLE_SD3_CHARAS_SPELLS], true));
			$data[Constants::TABLE_SD3_CHARAS_TECHS] = implode(", ", json_decode($data[Constants::TABLE_SD3_CHARAS_TECHS], true));
		}
		return $data ;
	}

	function get_names_id_col()
	{
		global $database;
		$res = $database->select(Constants::TABLE_SD3_CHARAS, [
			Constants::TABLE_SD3_CHARAS_ID,
			Constants::TABLE_SD3_CHARAS_NAME
		]);
		return $res;
	}

	function get_chara_count()
	{
		global $database;
		$res = $database->count(Constants::TABLE_SD3_CHARAS, "*") ;
		return $res ;
	}

	function displayMyChara($i)
	{
		return "
		<div class='col-md-4 card'>
			<div class='card-header'>
				<div class='d-flex flex-column align-items-center'>
					<img src='http://www.videogamesprites.net/SeikenDensetsu3/NPCs/Victor.gif' alt='victor' style='height:3.6rem;width:auto;'>
			   		<h4 class='h4 my-2 text-danger' data-toggle='tooltip' data-placement='top' title='Nom de mon héros'>Victor</h4>
			   		<h5 data-toggle='tooltip' data-placement='top' title='Nom de la classe, orientation (L=Light, D=Dark), score de base' class='h5 text-danger'>Rocketeer (LD) ~ 32</h5>
			   	</div>
			</div>
			<ul class='list-group list-group-flush'>
			   	<li class='list-group-item list-group-item-success'>Min Stats : <strong class='text-danger' data-toggle='tooltip' data-placement='top' title='tableau associatif avec les étiquettes STR, DEX, CON, INT, PIE, LCK'>&#36;array</strong></li>
			   	<li class='list-group-item list-group-item-success'>Max stats : <strong class='text-danger' data-toggle='tooltip' data-placement='top' title='tableau associatif avec les étiquettes STR, DEX, CON, INT, PIE, LCK'>&#36;array</strong></li>
			   	<li class='list-group-item list-group-item-success'>Spells : <strong class='text-danger' data-toggle='tooltip' data-placement='top' title='liste des sorts. Idéalement quand on clique sur un sort, un modal s'affichera avec les infos du sort... ça dépasse l'entendement'>&#36;array</strong></li>
			   	<li class='list-group-item list-group-item-success'>Techniques : <strong class='text-danger' data-toggle='tooltip' data-placement='top' title='liste des techniques de combats, doit préciser si est full screen technique (FST) ainsi que niveau (2 ou 3)'>&#36;array</strong></li>
			   	<li class='list-group-item list-group-item-success'>Pros : <strong class='text-danger' data-toggle='tooltip' data-placement='top' title='avantages individuels de la classe, par ex. d'avoir le soin sur tous les alliés'>&#36;text</strong></li>
			   	<li class='list-group-item list-group-item-success'>Cons : <strong class='text-danger' data-toggle='tooltip' data-placement='top' title='défauts individuels de la classe, par ex de manquer de bulk'>&#36;text</strong></li>
			   	<li class='list-group-item list-group-item-success'>Affiliates : <strong class='text-danger' data-toggle='tooltip' data-placement='top' title='partenaires idéaux pour cette classe, ex un soigneur, un booster de stats, etc'>&#36;text</strong></li>
			</ul>
		</div>
		";
	}

	function displayMyRootChara($i, $id)
	{
		global $database;
		$res = $this->get_chara_allinfo_by_id($id);
		$color=StaticMethods::chooseMyColor($i);
		return "
		<div class='row'>
			<div class='col-md-12 card'>
				<div class='card-header'>
					<div class='d-flex flex-column align-items-center'>
						<img src='./img/".$res[Constants::TABLE_SD3_CHARAS_IMG]."' alt='".$res[Constants::TABLE_SD3_CHARAS_CLASS]."' style='height:3.6rem;width:auto;'>
				   		<h4 class='h4 my-2 text-".$color."' data-toggle='tooltip' data-placement='top' title='My hero's name>".$res[Constants::TABLE_SD3_CHARAS_NAME]."</h4>
				   		<h5 data-toggle='tooltip' data-placement='top' title='My class, with its designation (L=Light, D=Dark), Apolaris82's score' class='h5 text-".$color."'>".$res[Constants::TABLE_SD3_CHARAS_CLASS]." (".$res[Constants::TABLE_SD3_CHARAS_LIGHT_DARK].") ~ ".$res[Constants::TABLE_SD3_CHARAS_SCORE]."</h5>
				   	</div>
				</div>
				<ul class='list-group list-group-flush'>
				   	<li class='list-group-item list-group-item-".$color."'>Min Stats : <span data-toggle='tooltip' data-placement='top' title='All min stats'>".$res[Constants::TABLE_SD3_CHARAS_MIN_STATS]."</span></li>
				   	<li class='list-group-item list-group-item-".$color."'>Max stats : <span data-toggle='tooltip' data-placement='top' title='All max stats'>".$res[Constants::TABLE_SD3_CHARAS_MAX_STATS]."</li>
				   	<li class='list-group-item list-group-item-".$color."'>Spells : <span  data-toggle='tooltip' data-placement='top' title='Spells list'>".$res[Constants::TABLE_SD3_CHARAS_SPELLS]."</span></li>
				   	<li class='list-group-item list-group-item-".$color."'>Techniques : <span data-toggle='tooltip' data-placement='top' title='Fighting techniques list'>".$res[Constants::TABLE_SD3_CHARAS_TECHS]."</span></li>
				   	<li class='list-group-item list-group-item-".$color."'>Pros : <span data-toggle='tooltip' data-placement='top' title='Good points about this class'>".$res[Constants::TABLE_SD3_CHARAS_PROS]."</span></li>
				   	<li class='list-group-item list-group-item-".$color."'>Cons : <span data-toggle='tooltip' data-placement='top' title='Poor points about this class'>".$res[Constants::TABLE_SD3_CHARAS_CONS]."</span></li>
				   	<li class='list-group-item list-group-item-".$color."'>Affiliates : <span data-toggle='tooltip' data-placement='top' title='Ideal team partners that can improve this class' skills>".$res[Constants::TABLE_SD3_CHARAS_AFFILIATES]."</strong></li>
				</ul>
			</div>
		</div>
		";
	}
}
