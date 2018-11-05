<?php

include_once __DIR__."/../define_database.php" ;

class TeamsTable
{

  function init_empty_team($team_mix, $score1, $score2, $score3)
  {
    global $database;
    $res = $database->insert(Constants::TABLE_SD3_TEAMS, [
      Constants::TABLE_SD3_TEAMS_ID => 0,
			Constants::TABLE_SD3_TEAMS_TRIAD => $team_mix,
			Constants::TABLE_SD3_TEAMS_BASE_SCORE => $score1 + $score2 + $score3,
      Constants::TABLE_SD3_TEAMS_FINAL_SCORE => 0,
			Constants::TABLE_SD3_TEAMS_PROS => "x",
			Constants::TABLE_SD3_TEAMS_CONS => "x",
			Constants::TABLE_SD3_TEAMS_QUEST => "x",
      Constants::TABLE_SD3_TEAMS_BETTER => "x",
      Constants::TABLE_SD3_TEAMS_HAS_SPELL => 0
		]);
    $this->orderMyTable();
		$id = $this->get_team_id($team_mix);
    return $id;
  }

  function find_team($team_mix)
  {
    global $database;
    $res = $database->count(Constants::TABLE_SD3_TEAMS, "*", [
      Constants::TABLE_SD3_TEAMS_TRIAD => $team_mix
    ]) ;
    return $res ;
  }

  function update_final_score($triad)
  {
    // here to run tests on the bigint corresponding to the different $spells
    // a different method of input spells is done depending on the BASE SCORE
  }

  function comments_spells($triad)
  {
    // here to take the spells in the team from the HAS SPELL big int
  }

  function rootTeamBirthForm($team_mix)
  {
    return '
          <div class="row my-3">
            <div class="col-md-12">
              <form action="#" method="post" class="form-group">
                <label for="add_team_submit" class="h3 text-center list-group-item-light pb-2 text-secondary">Save team to db</label>
                <input id="add_team_submit" name="add_team_submit" class="form-control btn btn-lg btn-primary" type="submit" value="Save team : '.$team_mix.'">
              </form>
            </div>
          </div>
    ';
  }

  function get_team_id($triad)
  {
    global $database;
    $res = $database->get(Constants::TABLE_SD3_TEAMS, [
      Constants::TABLE_SD3_TEAMS_ID
    ], [
      Constants::TABLE_SD3_TEAMS_TRIAD => $triad
    ]);
    return $res[Constants::TABLE_SD3_TEAMS_ID];
  }

  function orderMyTable()
  {
    global $database;
    // new sql variable
    $database->query("SET @x = 0;");
    // set id to position of triad key
    $database->query("UPDATE ".Constants::TABLE_SD3_TEAMS." SET ".Constants::TABLE_SD3_TEAMS_ID." = (@x:=@x+1) ORDER BY ".Constants::TABLE_SD3_TEAMS_TRIAD.";");
    return -2;
  }

  /*Add up your totals for the 3 classes in your party first.

  Next, modify this base score as follows:

  If the class's score is over 25, make the following modifications
  if your team has any of the following:

  *Stat Ups: Multiply your score by 1.25
    Stats up on at least one character, in_array("up", $chara['spells'])
  *Stat Downs or Jutsus or Demon Breath: Multiply your score by 1.2
    This spell on at least one character, in_array("down", $chara['spells']) || in_array("jutsu", $chara['spells']) || in_array("breath", $chara['spells'])
  *Tree Saber: add 10 (add 20 if this is going to Rogue or Rune
  Master)
    1st bit : This spell on at least one character in_array("tree"), $chara(['spells'])
    2nd bit : ()$chara['id'] == X || $chara['id'] == Y)
  *Any saber other than moon or tree: Take 3/4 of your score
    Spell on at least one character in_array("elemental saber"), $chara(['spells']) || in_array("light saber"), $chara(['spells']) || in_array("dark saber"), $chara(['spells'])
  *Finally: if you have Evil Shaman in the same party with Ninja
  Master, Nightblade, or Angela, add another 10.
    chara1['class'] == X && (chara2['class']==Y || chara2['class']==Z || chara2['class']==A)...

  FORMAT : B B B B B B


  If your total is below 25:

  *Stat Ups: Take 3/4 of your score
    Stats up on at least one character, in_array("up", $chara['spells'])
  *Stat Downs or Jutsus: Take 3/4 of your score
    This spell on at least one character, in_array("down", $chara['spells']) || in_array("jutsu", $chara['spells']) || in_array("breath", $chara['spells'])
  *ST elemental sabers and/or ST saint saber: Take 2/3 of your
  score
    in_array("elemental saber ST", $chara['spells']) || in_array("saint saber", $chara['spells'])
  OR MT elemental sabers: Take 1/2 of your score
    in_array("elemental saber MT", $chara['spells'])
  *Aura Wave: Subtract 10 (5 for Hawk or Kevin). -> illogical, only Wanderer and Death Hand have Aura Wave == substract 10 all cases
    in_array("elemental saber ST", $chara['spells'])

  Format : B B B B B*/
}
