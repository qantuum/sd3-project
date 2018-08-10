<!DOCTYPE html>
<!--language of the page set in French-->
<html lang="fr">

	<head>
		<!-- title -->
		<title></title>
		<!-- favicon -->
		<link rel="icon" href="#">
		<meta charset="utf-8">
		<!--Bootstrap init; sets the viewport-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<!-- Standard CDN version of Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
		<!-- FontAwesome CDN -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
		<!-- Custom styles -->
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>

	<body>
	<?php

	$file=file_get_contents('data/dataBase.json');
	$data=json_decode($file, true);
	require_once('./classes/CharaDetails.php');

	?>

	<div class="container-fluid">

		<div class="row"><div class="col-md-12">
			<div class="jumbotron">
				<h3 class="h3 text-center">Seiken Densetsu 3 team Generator</h3>
			</div>
		</div></div>

		<div class="row">
			<div class="col-md-2">
				<form action="#" method="post" id="formPanel">
					<legend class="text-primary">Controls</legend>
					<fieldset class="form-group">
						<legend class="text-secondary">Randomize all</legend>
						<input class="form-control btn btn-danger" name="submitAllRandom" id="submitAllRandom" type="submit" value="Randomize All!">
					<fieldset class="form-group">
						<legend class="text-secondary">Sort by Character/Class</legend>
						<select class="form-control">
							<option>Randomize !</option>
							<?php
							for ($i=0;$i<sizeof($data);$i++) {
								echo '<option>'.$data[$i]["class"].'</option>';
							} ?>
						</select>
						<select class="form-control">
							<option>Randomize !</option>
							<?php
							for ($i=0;$i<sizeof($data);$i++) {
								echo '<option>'.$data[$i]["class"].'</option>';
							} ?>
						</select>
						<select class="form-control">
							<option>Randomize !</option>
							<?php
							for ($i=0;$i<sizeof($data);$i++) {
								echo '<option>'.$data[$i]["class"].'</option>';
							} ?>
						</select>
						<input type="submit" id="sortSubmit" name="sortSubmit" class="form-control btn btn-danger" value="Send !">
					</fieldset>
				</form>
			</div>
			<div class="col-md-10">

				<?php
				//standard landing page -- generates an array giving character's class IDs for display
				function genTeam($data) {
					$nbOne=intval(rand(0,23));
					$nbTwo=$nbOne;
					while ($data[$nbTwo]["name"]==$data[$nbOne]["name"]) {
						$nbTwo=intval(rand(0,23));
					}
					$nbThree=$nbTwo;
					while ($data[$nbThree]["name"]==$data[$nbTwo]["name"] || $data[$nbThree]["name"]==$data[$nbOne]["name"]) {
						$nbThree=intval(rand(0,23));
					}
					$trio=array($nbOne,$nbTwo,$nbThree);
					return $trio;
				}				
				$trio = genTeam($data);

				//when clicks on button "Randomize all" -- same than landing page
				if (isset($_POST["submitAllRandom"])) {
					$trio = genTeam($data);
				}

				function addScore($data, $trio) {
					return $data[$trio[0]]["score"]+$data[$trio[1]]["score"]+$data[$trio[2]]["score"];
				}

				?>

				<!-- displaying the generated team -->
				<div class="row"><div class="offset-md-2 col-md-8">
					<div class="row">
						<div class="col-md-12 list-group-item-light pb-2">
							<h3 class="h3 text-center">Your team result</h3>
						</div>
						<div class="col-md-12 list-group-item-light p-2">
							<h4 class="h4">What will be your focus ?</h4>
							<p>In <a href="">Apolaris82's gamefaq</a>, he explains that he made a calculation system to determine if the team is magic-focused or melee-focused. I decided to turn this calculation into an algorithm, to train my PHP skillz, and also for fun. For me this is a nice tool, because it gives a more visual output than this gamefaqs layout, and the random team generation is just neat.</p>
							<ul class="list-group">
								<li class="list-group-item">Team score : <strong><?php echo addScore($data, $trio); ?></strong> ~ Final score : <strong>78</strong></li>
								<li class="list-group-item">We have a <strong>Magical</strong> focus over here.</p>
							</ul>
						</div>
						<?php
							$teamOne=new CharaDetails($data, $trio[0]);
							$teamOne->display($data, $trio[0], 'success');

							$teamTwo=new CharaDetails($data, $trio[1]);
							$teamTwo->display($data, $trio[1], 'info');

							$teamThree=new CharaDetails($data, $trio[2]);
							$teamThree->display($data, $trio[2], 'primary');
						?>
					</div>
				</div></div>

				<div class="row"><div class="offset-md-2 col-md-8 list-group-item-dark p-2">
					<h4 class="h4">Team details</h4>
					<ul class="list-group">
						<li class="list-group-item p-1">
							This team has good interaction since a multi-stats-ups (MTSU) and a multi-stats-down (MTSD) allow to damage foes more easily.
						</li>
						<li class="list-group-item p-1">
							This appears particularily in boss battles.
						</li>
						<li class="list-group-item p-1">
							A better class combination though would be [A,B,C]! Try it sometime! <a href="#" class="badge badge-pill badge-info badge-link">Try it!</a>
						</li>
					</ul>
				</div></div>

				<div class="my-5"></div>
				<div class="my-5"></div>

			</div>
		</div>

	<!-- Bootstrap JS CDN -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</body>


