<?php 

$file=file_get_contents('data/dataBase.json');
$source=json_decode($file, true);

$file_two=file_get_contents('data/triads.json');
$data=json_decode($file_two, true);

function pred($array) {
	echo '<pre>';
	var_dump($array);
	echo '</pre>';
}

function gen_triads($source) {

	$triads = array();
	$i_start=0;
	$j_start=4;
	$k_start=8;
	$triad=array($i_start,$j_start,$k_start);
	while ($i<count($source)) {
		$triads[] = array("id"=>$i, "triad"=>$triad);
		$triad=array();
		$i=$i_start;	
		$triad[0]=$i;
		while ($j=$j_start<count($source)) {
			if ($source[$i]["name"]==$source[$j]["name"] || $source[$k]["name"]==$source[$j]["name"]) {
				$j++;
			}
			$triad[1]=$j;
			
		{
			while ($k=$k_start<count($source)) {
				if ($source[$i]["name"]==$source[$k]["name"] || $source[$k]["name"]==$source[$j]["name"]) {
				$k++;
				}
				$triad[2]=$k;
				
			}
		}
		$i_start++;
		
	}

		
	}	
	
	return json_encode($triads);

}

echo gen_triads($source);