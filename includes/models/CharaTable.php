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
			Constants::TABLE_SD3_CHARAS_LIGHT_DARK => "x",
			Constants::TABLE_SD3_CHARAS_SCORE => 0,
			Constants::TABLE_SD3_CHARAS_MIN_STATS => json_encode(array("x")),
			Constants::TABLE_SD3_CHARAS_MAX_STATS => json_encode(array("x")),
			Constants::TABLE_SD3_CHARAS_SPELLS => json_encode(array("x")),
			Constants::TABLE_SD3_CHARAS_TECHS => json_encode(array("x")),
			Constants::TABLE_SD3_CHARAS_PROS => "x",
			Constants::TABLE_SD3_CHARAS_CONS => "x",
			Constants::TABLE_SD3_CHARAS_AFFILIATES => "x"
		]);
		$id = $database->id();
	}

	function set_chara_details ($id, $light_dark, $score, $min_stats, $max_stats, $spells, $techs, $pros, $cons, $affiliates)
	{
		global $database;
		$res = $database->update(Constants::TABLE_SD3_CHARAS, [
			Constants::TABLE_SD3_CHARAS_LIGHT_DARK => $light_dark,
			Constants::TABLE_SD3_CHARAS_SCORE => $score,
			Constants::TABLE_SD3_CHARAS_MIN_STATS => json_encode(explode(", ", $min_stats)),
			Constants::TABLE_SD3_CHARAS_MAX_STATS => json_encode(explode(", ", $max_stats)),
			Constants::TABLE_SD3_CHARAS_SPELLS => json_encode(explode(", ", $spells)),
			Constants::TABLE_SD3_CHARAS_TECHS => json_encode(explode(", ", $techs)),
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

	function get_chara_score_by_id($id)
	{
		global $database;
		$data = $database->get(Constants::TABLE_SD3_CHARAS, [
			Constants::TABLE_SD3_CHARAS_SCORE
		], [
			Constants::TABLE_SD3_CHARAS_ID => $id
		] );
		return implode('', $data);
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
		], ["ORDER" => Constants::TABLE_SD3_CHARAS_ID
		]);
		return $res;
	}

	function get_chara_count()
	{
		global $database;
		$res = $database->count(Constants::TABLE_SD3_CHARAS, "*") ;
		return $res ;
	}

	function displayMyRootChara($i, $id)
	{
		global $database;
		$res = $this->get_chara_allinfo_by_id($id);
		$color=StaticMethods::chooseMyColor($i);
		return "
		<div class='row'>
			<div class='col-md-12 card'>
				<div class='card-header list-group-item-".$color."'>
					<form action='#' method='post' class='form-group'>
						<img src='./img/".$res[Constants::TABLE_SD3_CHARAS_IMG]."' alt='".$res[Constants::TABLE_SD3_CHARAS_CLASS]."' class='form-control' style='height:5rem;width:auto;border:0.10rem double lightgray;'>
						<label for='chara_update_id".$i."'>Id : </label>
						<input class='form-control' type='number' disabled id='chara_update_id".$i."' name = 'chara_update_id".$i."' value = ".$res[Constants::TABLE_SD3_CHARAS_ID]." data-toggle='tooltip' data-placement='top' title='My hero&rsquo;s class line id --- no update allowed'>
				   		<label for='chara_update_name".$i."'>Name : </label>
				   		<input class='form-control' type='text' disabled id='chara_update_name".$i."' name = 'chara_update_name".$i."' value = ".$res[Constants::TABLE_SD3_CHARAS_NAME]." data-toggle='tooltip' data-placement='top' title='My hero&rsquo;s name --- no update allowed'>
				   		<label for='chara_update_class".$i."'>Class : </label>
				   		<input class='form-control' type='text' disabled id='chara_update_class".$i."' name = 'chara_update_class".$i."' value = ".$res[Constants::TABLE_SD3_CHARAS_CLASS]." data-toggle='tooltip' data-placement='top' title='My hero&rsquo;s class --- no update allowed'>
				   		<label for='chara_update_img".$i."'>Img Path : </label>
				   		<input class='form-control' type='text' disabled id='chara_update_img".$i."' name = 'chara_update_img".$i."' value = '".$res[Constants::TABLE_SD3_CHARAS_IMG]."' data-toggle='tooltip' data-placement='top' title='My hero&rsquo;s image src path --- no update allowed'>
				   		<label for='chara_update_light_dark".$i."'>Light/Dark : </label>
				   		<input class='form-control' type='text' id='chara_update_light_dark".$i."' name = 'chara_update_light_dark".$i."' value = '".$res[Constants::TABLE_SD3_CHARAS_LIGHT_DARK]."' data-toggle='tooltip' data-placement='top' title='My hero&rsquo;s alignment, L=light, D=dark, please register 2nd class : LL, LD, DL or DD'>
				   		<label for='chara_update_score".$i."'>Apolaris82's score : </label>
				   		<input class='form-control' type='number' id='chara_update_score".$i."' name = 'chara_update_score".$i."' value = '".$res[Constants::TABLE_SD3_CHARAS_SCORE]."' data-toggle='tooltip' data-placement='top' title='My hero&rsquo;s score, the highest value, the more magical focus'>
				   		<label for='chara_update_min_stats".$i."'>Minimum stats : </label>
				   		<input class='form-control' type='text' id='chara_update_min_stats".$i."' name = 'chara_update_min_stats".$i."' value = '".$res[Constants::TABLE_SD3_CHARAS_MIN_STATS]."' data-toggle='tooltip' data-placement='top' title='My hero&rsquo;s minimum stats : please enter 6 numbers between 10 and 25, simply separated by a comma : ,'>
				   		<label for='chara_update_max_stats".$i."'>Maximum stats : </label>
				   		<input class='form-control' type='text' id='chara_update_max_stats".$i."' name = 'chara_update_max_stats".$i."' value = '".$res[Constants::TABLE_SD3_CHARAS_MAX_STATS]."' data-toggle='tooltip' data-placement='top' title='My hero&rsquo;s maximum stats : please enter 6 numbers between 10 and 25, simply separated by a comma and space :, '>
				   		<label for='chara_update_spells".$i."'>Spells : </label>
				   		<input class='form-control' type='text' id='chara_update_spells".$i."' name = 'chara_update_spells".$i."' value = '".$res[Constants::TABLE_SD3_CHARAS_SPELLS]."' data-toggle='tooltip' data-placement='top' title='My hero&rsquo;s maximum stats : please enter your number of spells (plain text), simply separated by a comma and space:, --- spells must mention if it is single target (ST) or multi target (MT)'>
				   		<label for='chara_update_techs".$i."'>Fighting techniques : </label>
				   		<input class='form-control' type='text' id='chara_update_techs".$i."' name = 'chara_update_techs".$i."' value = '".$res[Constants::TABLE_SD3_CHARAS_TECHS]."' data-toggle='tooltip' data-placement='top' title='My hero&rsquo;s fighting techniques : please enter your number of techs (text and allowed punctuation characters), simply separated by a comma and space:, --- fighting techniques must mention if they are Full Screen (FST) and also the class power (/, + or ++)'>
				   		<label for='chara_update_pros".$i."'>Pros : </label>
				   		<input class='form-control' type='text' id='chara_update_pros".$i."' name = 'chara_update_pros".$i."' value = '".$res[Constants::TABLE_SD3_CHARAS_PROS]."' data-toggle='tooltip' data-placement='top' title='Good points of this class !'>
				   		<label for='chara_update_cons".$i."'>Cons : </label>
				   		<input class='form-control' type='text' id='chara_update_cons".$i."' name = 'chara_update_cons".$i."' value = '".$res[Constants::TABLE_SD3_CHARAS_CONS]."' data-toggle='tooltip' data-placement='top' title='Poor points of this class !'>
				   		<label for='chara_update_affiliates".$i."'>Affiliates : </label>
				   		<input class='form-control' type='text' id='chara_update_afiliates".$i."' name = 'chara_update_affiliates".$i."' value = '".$res[Constants::TABLE_SD3_CHARAS_AFFILIATES]."' data-toggle='tooltip' data-placement='top' title='Good teammates to play !'>
				   		<input class='form-control w-25 float-right my-5 btn btn-sm btn-".$color."' type='submit' id='chara_update_submit".$i."' name = 'chara_update_submit".$i."' value = 'Send' data-toggle='tooltip' data-placement='top' title='Validate update character form'>
				   	</form>
				</div>
			</div>
		</div>
		";
	}

	function displayMyChara($i, $id)
	{
		global $database;
		$res = $this->get_chara_allinfo_by_id($id);
		$color=StaticMethods::chooseMyColor($i);
		return "
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
