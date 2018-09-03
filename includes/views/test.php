<?php

include_once "../models/CharaTable.php";
include_once "../models/TeamsTable.php";
include_once "../models/Access.php";

$spells1=json_encode(array("heal light ST", TargetSpells::AURA_WAVE));
$spells2=json_encode(array("heal light MT", "invocations", TargetSpells::DEMON_BREATH));
$spells3=json_encode(array(TargetSpells::ELEM_SABERS_MT, TargetSpells::SABER_M, TargetSpells::SABER_T));

$chara1=array("name"=>"Kevin","class"=>"God Hand", "spells"=>json_decode($spells1, true), "score"=>5);

$chara2=array("name"=>"Carlie", "class"=>"Evil Shaman", "spells"=>json_decode($spells2, true), "score"=>30);

$chara3=array("name"=>"Duran", "class"=>"Swordsmaster", "spells"=>json_decode($spells3, true), "score"=>20);



echo "<pre>";
print_r($chara2);
echo "</pre><br />";

echo "<pre>";
print_r($chara2['spells']);
echo "</pre><br />";

echo $chara3["spells"][1]."<br />";

echo in_array("demon", $chara2["spells"]) ? 1 : 0;
echo in_array(TargetSpells::DEMON_BREATH, $chara2["spells"]) ? 1 : 0;
echo in_array("Demon breath", $chara2["spells"]) ? 1 : 0;
echo in_array("rienavoir", $chara2["spells"]) ? 1 : 0;

$chara = new CharaTable();
$card = $chara->displayMyChara(1);
echo $card;
