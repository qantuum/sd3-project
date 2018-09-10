<?php
session_start();
// will be changed when website is published; of course
$_SESSION['root'] = 'root';

include_once __DIR__."/includes/models/CharaTable.php";
include_once __DIR__."/includes/models/TeamsTable.php";
include_once __DIR__."/includes/models/Access.php";
include_once __DIR__."/includes/models/StaticMethods.php";

$chara_toolbox = new CharaTable();
$team_toolbox = new TeamsTable();

// first team randomization upon arrival on page
if (!isset($_POST))
{
	$_SESSION["triad"] = StaticMethods::randomizeTeam();
	$_SESSION['team_sorted'] = $_SESSION['triad'];
	sort($_SESSION['team_sorted']);
}

// randomizations upon "randomize" button clicked
if (isset($_POST["submitAllRandom"]))
{
	$_SESSION["triad"] = StaticMethods::randomizeTeam();
	$_SESSION['team_sorted'] = $_SESSION['triad'];
	sort($_SESSION['team_sorted']);
}

// treatments performed when click "submit characted" in root panel
if (isset($_POST["add_chara_submit"]))
{
	$_SESSION["triad"] = StaticMethods::randomizeTeam();
	$chara_submit = array();
	if (StaticMethods::checksEmpty($_POST) != 0)
	{
		$chara_submit[] = "<span class='text-danger'>Error : ".StaticMethods::checksEmpty($_POST)." empty fields";
	}
	if (StaticMethods::checksAz($_POST["add_chara_name"], '4,6') == 0)
	{
		$chara_submit[] = "<span class='text-danger'>Error : input name [".$_POST["add_chara_name"]."] wrong";
	}
	if (StaticMethods::checksAz($_POST["add_chara_class"], '4,20') == 0)
	{
		$chara_submit[] = "<span class='text-danger'>Error : input class [".$_POST["add_chara_class"]."] wrong";
	}
	if (StaticMethods::checksAz($_POST["add_chara_img"], '4,30') == 0)
	{
		$chara_submit[] = "<span class='text-danger'>Error : input image [".$_POST["add_chara_img"]."] wrong";
	}
	if (StaticMethods::checksNumber($_POST["add_chara_id"], 0, 24) == 0)
	{
		$chara_submit[] = "<span class='text-danger'>Error : input id [".$_POST["add_chara_id"]."] must be a valid number";
	}
	if (empty($chara_submit))
	{
		$chara_submit[] = "<span class='text-success'>Success : Adding character [".$_POST['add_chara_name']."][".$_POST['add_chara_class']."] to db... Done<br />";
		$chara_toolbox->add_chara_simple(
						htmlspecialchars($_POST['add_chara_id']),
						htmlspecialchars($_POST['add_chara_name']),
						htmlspecialchars($_POST['add_chara_class']),
						htmlspecialchars($_POST['add_chara_img']));
	}
	$chara_submit = implode ("<br />", $chara_submit);
}

// treatments performed when click "update character" in root panel
for ($i=0; $i < 3 ; $i++)
{
	if (isset($_POST[StaticMethods::buildName_i("chara_update_submit", $i)]))
	{
		$id_to_update = $_SESSION['triad'][$i];
		$chara_update=array();
		if (isset($_POST[StaticMethods::buildName_i("chara_update_id", $i)]) || isset($_POST[StaticMethods::buildName_i("chara_update_name", $i)]) || isset($_POST[StaticMethods::buildName_i("chara_update_class", $i)]) || isset($_POST[StaticMethods::buildName_i("chara_update_img", $i)]))
		{
			$chara_update[] = "<span class='text-danger'>Error : Forbidden update fields : id, name, class, img --- Please delete entry inside database administration system, then re-enter it";
		}

		if (StaticMethods::checksLightDark($_POST[StaticMethods::buildName_i("chara_update_light_dark", $i)]) == 0)
		{
			$chara_update[] = "<span class='text-danger'>Error : input light/dark [".$_POST[StaticMethods::buildName_i("chara_update_light_dark", $i)]."] wrong, please use  as in example : LL, LD, DL or DD";
		}

		if (StaticMethods::checksNumber($_POST[StaticMethods::buildName_i("chara_update_score", $i)], 0, 51) == 0)
		{
			$chara_update[] = "<span class='text-danger'>Error : input score [".$_POST[StaticMethods::buildName_i("chara_update_score", $i)]."] wrong, please use number between 0 and 50 (included)";
		}

		if (StaticMethods::checksStats($_POST[StaticMethods::buildName_i("chara_update_min_stats", $i)]) == 0)
		{
			$chara_update[] = "<span class='text-danger'>Error : input min stats [".$_POST[StaticMethods::buildName_i("chara_update_min_stats", $i)]."] wrong, please use as in example : [11, 12, 14, 13, 15, 16]";
		}

		if (StaticMethods::checksStats($_POST[StaticMethods::buildName_i("chara_update_max_stats", $i)]) == 0)
		{
			$chara_update[] = "<span class='text-danger'>Error : input max stats [".$_POST[StaticMethods::buildName_i("chara_update_max_stats", $i)]."] wrong, please use as in example : [17, 18, 20, 22, 25, 26]";
		}

		if (StaticMethods::checksSpells($_POST[StaticMethods::buildName_i("chara_update_spells", $i)]) == 0)
		{
			$chara_update[] = "<span class='text-danger'>Error : input spells [".$_POST[StaticMethods::buildName_i("chara_update_spells", $i)]."] wrong, please use as in example : [ST Blaze Inferno, MT Thousand Arrows], etc";
		}

		if (StaticMethods::checksTechs($_POST[StaticMethods::buildName_i("chara_update_techs", $i)]) == 0)
		{
			$chara_update[] = "<span class='text-danger'>Error : input techs [".$_POST[StaticMethods::buildName_i("chara_update_techs", $i)]."] wrong, please use as in example : [Clay Doll, Umber Hand+, FST Giga Impact++], etc";
		}

		if (StaticMethods::checksText($_POST[StaticMethods::buildName_i("chara_update_pros", $i)]) == 0)
		{
			$chara_update[] = "<span class='text-danger'>Error : input pros [".$_POST[StaticMethods::buildName_i("chara_update_pros", $i)]."] wrong, please use a valid text string (excluded accentuated letters and special characters)";
		}

		if (StaticMethods::checksText($_POST[StaticMethods::buildName_i("chara_update_cons", $i)]) == 0)
		{
			$chara_update[] = "<span class='text-danger'>Error : input cons [".$_POST[StaticMethods::buildName_i("chara_update_cons", $i)]."] wrong, please use a valid text string (excluded accentuated letters and special characters)";
		}

		if (StaticMethods::checksText($_POST[StaticMethods::buildName_i("chara_update_affiliates", $i)]) == 0)
		{
			$chara_update[] = "<span class='text-danger'>Error : input affiliates [".$_POST[StaticMethods::buildName_i("chara_update_affiliates", $i)]."] wrong, please use a valid text string (excluded accentuated letters and special characters)";
		}

		if (empty($chara_update))
		{
			$chara_update[] = "<span class='text-success'>Success : Updating class id [$id_to_update] in db... Done<br />";
			$chara_toolbox->set_chara_details (
								$id_to_update,
								$_POST[StaticMethods::buildName_i("chara_update_light_dark", $i)],
								$_POST[StaticMethods::buildName_i("chara_update_score", $i)],
								$_POST[StaticMethods::buildName_i("chara_update_min_stats", $i)],
								$_POST[StaticMethods::buildName_i("chara_update_max_stats", $i)],
								$_POST[StaticMethods::buildName_i("chara_update_spells", $i)],
								$_POST[StaticMethods::buildName_i("chara_update_techs", $i)],
								$_POST[StaticMethods::buildName_i("chara_update_pros", $i)],
								$_POST[StaticMethods::buildName_i("chara_update_cons", $i)],
								$_POST[StaticMethods::buildName_i("chara_update_affiliates", $i)]);
		}

		else
		{
			$chara_update[] = "<span class='text-info'>List of inputs in previous form :<br />
							id : ".$id_to_update."<br />
							light/dark : ".$_POST[StaticMethods::buildName_i("chara_update_light_dark", $i)]."<br />
							score : ".$_POST[StaticMethods::buildName_i("chara_update_score", $i)]."<br />
							min_stats : ".$_POST[StaticMethods::buildName_i("chara_update_min_stats", $i)]."<br />
							max stats : ".$_POST[StaticMethods::buildName_i("chara_update_max_stats", $i)]."<br />
							spells : ".$_POST[StaticMethods::buildName_i("chara_update_spells", $i)]."<br />
							techs : ".$_POST[StaticMethods::buildName_i("chara_update_techs", $i)]."<br />
							pros : ".$_POST[StaticMethods::buildName_i("chara_update_pros", $i)]."<br />
							cons : ".$_POST[StaticMethods::buildName_i("chara_update_cons", $i)]."<br />
							affiliates : ".$_POST[StaticMethods::buildName_i("chara_update_affiliates", $i)]."<br />
							";
		}

		$chara_update = implode ("<br />", $chara_update);

	}
}

// treatments performed when click "save team XXXX" in root panel (creating a team entry)
if (isset($_POST["add_team_submit"]))
{
	$team_id = $team_toolbox->init_empty_team(implode('', $_SESSION['team_sorted']), $chara_toolbox->get_chara_score_by_id($_SESSION['team_sorted'][0]), $chara_toolbox->get_chara_score_by_id($_SESSION['team_sorted'][1]), $chara_toolbox->get_chara_score_by_id($_SESSION['team_sorted'][2]));
	$team_submit="<span class='text-success'>Success : Team trio [".implode('', $_SESSION['team_sorted'])."] added at id [$team_id] in db... Done<br />";
}

// treatments performed for each user. Normal user do not authentificate, while root authentificates through a connection panel
if (isset($_SESSION['root']))
{
	include_once __DIR__.'/includes/views/root.php';
}

else
{
	include_once __DIR__.'/includes/views/test.php';
}