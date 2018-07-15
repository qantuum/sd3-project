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

	?>

	<div class="container-fluid">

		<div class="row"><div class="col-md-12">
			<div class="jumbotron">
				<h3 class="h3 text-center">Seiken Densetsu 3 team Generator</h3>
			</div>
		</div></div>

		<div class="row">
			<div class="col-md-2">
				<form id="formPanel">
					<legend class="text-primary">Controls</legend>
					<fieldset class="form-group">
						<legend class="text-secondary">Randomize all</legend>
						<input class="form-control btn btn-success" type="button" value="Randomize All!">
					</fieldset>
					<fieldset class="form-group">
						<legend class="text-secondary">Sort by Character Name</legend>
						<select class="form-control">
							<option>Randomize !</option>
							<option>Kevin</option>
							<option>Angela</option>
							<option>Duran</option>
							<option>Carlie</option>
							<option>Hawk</option>
							<option>Riesz</option>
						</select>
						<select class="form-control">
							<option>Randomize !</option>
							<option>Kevin</option>
							<option>Angela</option>
							<option>Duran</option>
							<option>Carlie</option>
							<option>Hawk</option>
							<option>Riesz</option>
						</select>
						<select class="form-control">
							<option>Randomize !</option>
							<option>Kevin</option>
							<option>Angela</option>
							<option>Duran</option>
							<option>Carlie</option>
							<option>Hawk</option>
							<option>Riesz</option>
						</select>
						<input type="button" class="form-control btn btn-success" value="Send !">
					</fieldset>
					<fieldset class="form-group">
						<legend class="text-secondary">Sort by Character class</legend>
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
						<input type="button" class="form-control btn btn-success" value="Send !">
					</fieldset>
				</form>
			</div>
			<div class="col-md-10">

				<?php
				function genTeam() {
					$file=file_get_contents('data/dataBase.json');
					$data=json_decode($file, true);
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
				$trio = genTeam();
				?>

				<div class="row"><div class="offset-md-3 col-md-6">
					<div class="row">
						<div class="col p-3 img-thumbnail list-group-item-success">
							<div class="d-flex flex-column justify-content-end align-items-center">
								<h4 class="text-center h4"><?php echo $data[$trio[0]]["name"]; ?></h4>
								<h5 class="text-center h5"><?php echo $data[$trio[0]]["class"]; ?></h5>
								<img class="text-center" src="<?php echo $data[$trio[0]]["img"]; ?>" alt="img">
							</div>
						</div>
						<div class="col p-3 img-thumbnail list-group-item-warning">
							<div class="d-flex flex-column justify-content-end align-items-center">
								<h4 class="text-center h4"><?php echo $data[$trio[1]]["name"]; ?></h4>
								<h5 class="text-center h5"><?php echo $data[$trio[1]]["class"]; ?></h5>
								<img class="text-center" src="<?php echo $data[$trio[1]]["img"]; ?>" alt="img">
							</div>
						</div>
						<div class="col p-3 img-thumbnail list-group-item-danger">
							<div class="d-flex flex-column justify-content-end align-items-center">
								<h4 class="text-center h4"><?php echo $data[$trio[2]]["name"]; ?></h4>
								<h5 class="text-center h5"><?php echo $data[$trio[2]]["class"]; ?></h5>
								<img class="text-center" src="<?php echo $data[$trio[2]]["img"]; ?>" alt="img">
							</div>
						</div>
				</div></div>

			</div>
		</div>

	<!-- Bootstrap JS CDN -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</body>


