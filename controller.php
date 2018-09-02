<?php

session_start();
$_SESSION['root'] = 'root';
include_once __DIR__."/includes/models/CharaTable.php";
include_once __DIR__."/includes/models/TeamsTable.php";
include_once __DIR__."/includes/models/Access.php";
$chara_toolbox = new CharaTable();

if (isset($_SESSION['root']))
{
  include_once __DIR__.'/includes/views/root.php';
}

else
{
  include_once __DIR__.'/includes/views/test.php';
}
