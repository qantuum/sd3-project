<?php

include_once __DIR__."/../define_database.php" ;

class Access
{
  function check_connexion_pswd($id, $pswd)
  {
    global $database;
    $data = $database->get(Constants::ACCESS, "*", [
			Constants::ROOT_ID => $id
    ]);
    if (count($data)==1 || password_verify($pswd, $data[Constants::ROOT_PSWD])) {
      return true ;
    }
    else
    {
      return false ;
    }
  }

  function create_my_root($id, $pswd)
  {
    global $database;
    $res = $database->insert(Constants::ACCESS, [
			Constants::ROOT_ID => $id,
			Constants::ROOT_PSWD => password_hash($pswd, PASSWORD_BCRYPT)
		]);
		return ($res->rowCount() > 0) ;
  }
}
