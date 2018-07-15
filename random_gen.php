<!DOCTYPE html>
<html>


<head>

	<style>
	.container {
		background-image:url('./img/holyLand.png');
		width:400px;
		color:white;
		margin:auto;
		padding:200px 300px;

	}

	</style>

</head>

<body>
	<?php

	$charaGlobalSet = array(
			array("charaClass"=>'GodHand',"charaPic"=>'./img/GodHand.gif',"charaName"=>'Kevin'),
			array("charaClass"=>'WarriorMonk',"charaPic"=>'./img/WarriorMonk.gif',"charaName"=>'Kevin'),
			array("charaClass"=>'Dervish',"charaPic"=>'./img/Dervish.gif',"charaName"=>'Kevin'),
			array("charaClass"=>'DeathHand',"charaPic"=>'./img/DeathHand.gif',"charaName"=>'Kevin'),
			array("charaClass"=>'Archmage',"charaPic"=>'./img/Archmage.gif',"charaName"=>'Angela'),
			array("charaClass"=>'GrandDivina',"charaPic"=>'./img/GrandDivina.gif',"charaName"=>'Angela'),
			array("charaClass"=>'Magus',"charaPic"=>'./img/Magus.gif',"charaName"=>'Angela'),
			array("charaClass"=>'RuneMaster',"charaPic"=>'./img/RuneMaster.gif',"charaName"=>'Angela'),
			array("charaClass"=>'Paladin',"charaPic"=>'./img/Paladin.gif',"charaName"=>'Duran'),
			array("charaClass"=>'Lord',"charaPic"=>'./img/Lord.gif',"charaName"=>'Duran'),
			array("charaClass"=>'SwordsMaster',"charaPic"=>'./img/SwordsMaster.gif',"charaName"=>'Duran'),
			array("charaClass"=>'Duellist',"charaPic"=>'./img/Duellist.gif',"charaName"=>'Duran'),
			array("charaClass"=>'Bishop',"charaPic"=>'./img/Bishop.gif',"charaName"=>'Carlie'),
			array("charaClass"=>'Sage',"charaPic"=>'./img/Sage.gif',"charaName"=>'Carlie'),
			array("charaClass"=>'EvilShaman',"charaPic"=>'./img/EvilShaman.gif',"charaName"=>'Carlie'),
			array("charaClass"=>'Necromancer',"charaPic"=>'./img/Necromancer.gif',"charaName"=>'Carlie'),
			array("charaClass"=>'Wanderer',"charaPic"=>'./img/Wanderer.gif',"charaName"=>'Hawk'),
			array("charaClass"=>'Rogue',"charaPic"=>'./img/Rogue.gif',"charaName"=>'Hawk'),
			array("charaClass"=>'NinjaMaster',"charaPic"=>'./img/NinjaMaster.gif',"charaName"=>'Hawk'),
			array("charaClass"=>'NightBlade',"charaPic"=>'./img/NightBlade.gif',"charaName"=>'Hawk'),
			array("charaClass"=>'Vanadies',"charaPic"=>'./img/Vanadies.gif',"charaName"=>'Riesz'),
			array("charaClass"=>'StarLancer',"charaPic"=>'./img/StarLancer.gif',"charaName"=>'Riesz'),
			array("charaClass"=>'FenrirKnight',"charaPic"=>'./img/FenrirKnight.gif',"charaName"=>'Riesz'),
			array("charaClass"=>'DragonMaster',"charaPic"=>'./img/DragonMaster.gif',"charaName"=>'Riesz'));
	?>

	<div class="container">

		<h1>Seiken Densetsu 3 team Generator</h1>

		<form>
			<fieldset>
				<legend>Randomize all</legend>
				<input type="button" value="Randomize All!">
			</fieldset>
			<fieldset>
				<legend>Sorted by Character Name</legend>
				<select>
					<option>Randomize !</option>
					<option>Kevin</option>
					<option>Angela</option>
					<option>Duran</option>
					<option>Carlie</option>
					<option>Hawk</option>
					<option>Riesz</option>
				</select>
				<select>
					<option>Randomize !</option>
					<option>Kevin</option>
					<option>Angela</option>
					<option>Duran</option>
					<option>Carlie</option>
					<option>Hawk</option>
					<option>Riesz</option>
				</select>
				<select>
					<option>Randomize !</option>
					<option>Kevin</option>
					<option>Angela</option>
					<option>Duran</option>
					<option>Carlie</option>
					<option>Hawk</option>
					<option>Riesz</option>
				</select>
				<input type="button" value="Send !">
			</fieldset>
			<fieldset>
				<legend>Sorted by Character class</legend>
				<select>
					<option>Randomize !</option>
					<?php
					for ($i=0;$i<sizeof($charaGlobalSet);$i++) {
						echo '<option>'.$charaGlobalSet[$i]["charaClass"].'</option>';
					} ?>
				</select>
				<select>
					<option>Randomize !</option>
					<?php
					for ($i=0;$i<sizeof($charaGlobalSet);$i++) {
						echo '<option>'.$charaGlobalSet[$i]["charaClass"].'</option>';
					} ?>
				</select>
				<select>
					<option>Randomize !</option>
					<?php
					for ($i=0;$i<sizeof($charaGlobalSet);$i++) {
						echo '<option>'.$charaGlobalSet[$i]["charaClass"].'</option>';
					} ?>
				</select>
				<input type="button" value="Send !">
			</fieldset>
		</form>

		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		<script src="./js/events.js"></script>

		<?php


			//first character
			$randGenOne=intval(rand(0,23));
			$memberOne=$charaGlobalSet[$randGenOne]["charaClass"];
			echo $randGenOne;
			echo $memberOne;
			echo '<img src="'.$charaGlobalSet[$randGenOne]["charaPic"].'">';
			echo '<br />';

			//second character -- Must be a character different from first
			$randGenTwo=$randGenOne;
			while ($charaGlobalSet[$randGenTwo]["charaName"]==$charaGlobalSet[$randGenOne]["charaName"]) {
				$randGenTwo=intval(rand(0,23));
				$memberTwo=$charaGlobalSet[$randGenTwo]["charaClass"];
			}
			echo $randGenTwo;
			echo $memberTwo;
			echo '<img src="'.$charaGlobalSet[$randGenTwo]["charaPic"].'">';
			echo '<br />';

			//third character -- Must be different from first and second
			$randGenThree=$randGenTwo;
			while ($charaGlobalSet[$randGenThree]["charaName"]==$charaGlobalSet[$randGenTwo]["charaName"] || $charaGlobalSet[$randGenThree]["charaName"]==$charaGlobalSet[$randGenOne]["charaName"]) {
				$randGenThree=intval(rand(0,23));
				$memberThree=$charaGlobalSet[$randGenThree]["charaClass"];
			}
			echo $randGenThree;
			echo $memberThree;
			echo '<img src="'.$charaGlobalSet[$randGenThree]["charaPic"].'">';

			echo '<br />';
			$uniqueId=$randGenOne.$randGenTwo.$randGenThree;
			echo $uniqueId;

		?>

	</div>
</body>


