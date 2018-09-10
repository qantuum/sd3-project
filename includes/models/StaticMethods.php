<?php

class StaticMethods
{

	// form related

	// returns true (1) if I have a text string including letters, punctuation and spaces of the specified length
	static public function checksAz($string, $length)
	{
		if (preg_match('#^([[:alpha:][:space:]\.\/]){'.$length.'}$#', $string) && isset($string))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}

	static public function checksText($string)
	{
		if (preg_match('#^([[:alpha:][:space:]\'\"\(\)\[\]\-\,\;\:\!\?])+$#', $string) && isset($string))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}

	// returns the number of empty fields located in an array (will be used with $_POST in various situations)
	static public function checksEmpty($array)
	{
		$count = 0;
		foreach ($array as $key => $value)
		{
			if ($value=="")
			{
				$count++;
			}
		}
		return $count;
	}

	static public function checksStats($string)
	{
		if (preg_match('#^([0-2][0-9],\ ){5}([0-2][0-9])$#', $string) && isset($string))
		{
			return 1;
		}

		else
		{
			return 0;
		}
	}

	static public function checksSpells($string)
	{
		if (preg_match('#^(([[:alnum:][:space:]\-\(\)])+,\ )+[[:alnum:][:space:]\-\(\)]+$#', $string) && isset($string))
		{
			return 1;
		}

		else
		{
			return 0;
		}
	}

	static public function checksTechs($string)
	{
		if (preg_match('#^(([[:alpha:][:space:]\+\-])+,\ )+[[:alnum:][:space:]\+\-]+$#', $string) && isset($string))
		{
			return 1;
		}

		else
		{
			return 0;
		}
	}

	static public function checksLightDark($string)
	{
		if (preg_match('#^(L|D){2}$#', $string) && isset($string))
		{
			return 1;
		}

		else
		{
			return 0;
		}
	}

	// returns true (1) if the specified number fits in the range
	static public function checksNumber($field, $min, $max)
	{
		if (($field>=$min && $field<$max) && isset($field) && preg_match('#^[0-9]{1,2}$#', $field))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}

	// associates a name and a variable
	public static function buildName_i($string, $i)
	{
		return $string.$i;
	}

	// retruns true (1) if the specified strings matches array writing : "...", "...", "..."
	/*static public function checksArray($string)
	{
		if ()
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}	*/

	// chara gen related

	// small function to return the right display color
	static public function chooseMyColor($i)
	{
		$colortrio = array("success", "info", "primary");
		return $colortrio[$i];
	}

	// I count the number of different names in my list
	static public function goGetNames()
	{
		global $chara_toolbox;
		$list = $chara_toolbox->get_names_id_col();
		$min_name = array();
		foreach ($list as $key => $value)
		{
			if (!in_array($value[Constants::TABLE_SD3_CHARAS_NAME], $min_name))
			{
				$min_name[] = $value[Constants::TABLE_SD3_CHARAS_NAME];
			}
		}
		return count($min_name);
	}

	// if I have more than 3 names, I can return a triad. Else, return 0
	static public function randomizeTeam()
	{
		global $chara_toolbox;
		$list = $chara_toolbox->get_names_id_col();

		if (self::goGetNames()<3)
		{
			return 0;
		}

		else
		{
			$good_count = count($list)-1;

			$chara_one=intval(rand(0, $good_count));
			$chara_two=$chara_one;
			// while a match is found between the two numbers'names, change number
			while ($list[$chara_one][Constants::TABLE_SD3_CHARAS_NAME]==$list[$chara_two][Constants::TABLE_SD3_CHARAS_NAME])
			{
				$chara_two=intval(rand(0, $good_count));
			}
			
			$chara_three=$chara_two;
			// while a match is found between the three numbers'names, change number
			while ($list[$chara_two][Constants::TABLE_SD3_CHARAS_NAME]==$list[$chara_three][Constants::TABLE_SD3_CHARAS_NAME] ||
				$list[$chara_three][Constants::TABLE_SD3_CHARAS_NAME]==$list[$chara_one][Constants::TABLE_SD3_CHARAS_NAME])
			{
				$chara_three=intval(rand(0, $good_count));
			}
			// I successfully return a triad with no double character
			$triad = array($chara_one, $chara_two, $chara_three);
			return $triad;
		}
	}		

}