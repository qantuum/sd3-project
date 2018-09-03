<?php

session_start();
$_SESSION['root'] = 'root';
include_once __DIR__."/includes/models/CharaTable.php";
include_once __DIR__."/includes/models/TeamsTable.php";
include_once __DIR__."/includes/models/Access.php";
include_once __DIR__."/includes/models/StaticMethods.php";
$chara_toolbox = new CharaTable();
$_SESSION["triad"] = StaticMethods::randomizeTeam();

echo "<pre>";
print_r($_SESSION['triad']);
echo '</pre>';

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

if (isset($_SESSION['root']))
{
  include_once __DIR__.'/includes/views/root.php';
}

else
{
  include_once __DIR__.'/includes/views/test.php';
}
