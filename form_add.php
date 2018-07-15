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
		<!-- <link href="style.css" rel="stylesheet" type="text/css"> -->
	</head>

	<body>


		<div class="container-fluid">
			<div class="row"><div class="col-md-12">
				<div class="jumbotron">
					<h3 class="h3 text-primary text-center">Form to JSON - SD3 DBB</h3>
				</div>
			</div></div>

			<div class="row"><div class="offset-lg-2 col-md-8">
				<ul class="list-group">
					<li class="list-group-item list-group-item-primary">
						<form action="#" method="post">
							<fieldset class="form-group">
								<legend>General</legend>
								<label for="selectNames">Select Name : </label>
								<select class="form-control" name="selectNames" id="selectNames">
									<option value="disabled" disabled selected>Please choose</option>
									<option value="Kevin">Kevin</option>
									<option value="Duran">Duran</option>
									<option value="Hawk">Hawk</option>
									<option value="Angela">Angela</option>
									<option value="Carlie">Carlie</option>
									<option value="Lise">Lise</option>
								</select>
								<label for="selectClass">Select Class : </label>
								<select class="form-control" name="selectClass" id="selectClass">
									<option value="disabled" disabled selected>Choose name</option>
								</select>
								<label for="selectImg">Select Img source : </label>
								<select class="form-control" name="selectImg" id="selectImg">
									<option value="disabled" disabled selected>Choose name</option>
								</select>
							</fieldset>
							<input id="globalSubmit" type="submit" name="globalSubmit" class="btn btn-primary float-right my-5" value="Submit">
						</form>
					</li>
				</ul>
			</div></div>
		</div>

		<?php
		//include my Class for JSON saving
		include 'classes/jsonAdd.php';
		//if I clicks submit button, it activates the addToJSON method ?
		if (isset($_POST['globalSubmit'])) {
			$charaAdd=new CharaInJSON($_POST['selectNames'], $_POST['selectClass'], $_POST['selectImg']);
			$charaAdd->addToJSON();
		}

		?>


		<!-- Bootstrap JS CDN -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
		<!-- custom script -->
		<script src="js/events.js"></script>
	</body>




</html>