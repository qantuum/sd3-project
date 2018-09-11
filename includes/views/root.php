<!DOCTYPE html>
<!--language of the page set in French-->
<html lang="fr">

	<head>
		<!-- title -->
		<title>Root panel</title>
		<!-- favicon -->
		<link rel="icon" href="http://www.videogamesprites.net/SeikenDensetsu3/Magic/Ancient.gif">
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
    <?php $nb_chara = $chara_toolbox->get_chara_count(); ?>

		<div class="container-fluid">

			<div class="row">
				<div class="col-md-12">
					<div class="jumbotron">
						<h3 class="h3 text-center">Seiken Densetsu 3 random team Generator</h3>
						<h5 class="h5 text-center text-secondary">ROOT PANEL : BUILDING DATABASE</h5>
					</div>
				</div>
			</div>

			<div class="row">
				<!-- left panel with team select controls -->
        		<?php if ($nb_chara >= 24) : ?>
				<div class="col-lg-2">
					<form action="#" method="post" id="formPanel">
						<legend class="text-danger text-center">Controls</legend>
						<fieldset class="form-group">
							<legend class="text-secondary">Randomize all</legend>
							<input class="form-control btn btn-danger" name="submitAllRandom" id="submitAllRandom" type="submit" value="Randomize All!" data-toggle="tooltip" data-placement="top" title="même action qu'au premier chargement de page : tout randomisé">
						</fieldset>
						<fieldset class="form-group">
							<legend class="text-secondary">Sort by Character/Class</legend>
							<select class="form-control mt-1" id="select_first">
								<option value="R">Randomize !</option>
								<option disabled value="X">-------</option>
								<option value="K">Kevin</option>
								<option value="0">God Hand</option>
								<option value="1">Warrior Monk</option>
								<option value="2">Death Hand</option>
								<option value="3">Dervish</option>
								<option disabled value="X">-------</option>
								<option value="A">Angela</option>
								<option value="4">Grand Divina</option>
								<option value="5">Archmage</option>
								<option value="6">Rune Master</option>
								<option value="7">Magus</option>
								<option disabled value="X">-------</option>
								<option value="D">Duran</option>
								<option value="8">Paladin</option>
								<option value="9">Warlord</option>
								<option value="10">Swordsmaster</option>
								<option value="11">Duellist</option>
								<option disabled value="X">-------</option>
								<option value="C">Carlie</option>
								<option value="12">Bishop</option>
								<option value="13">Sage</option>
								<option value="14">Necromancer</option>
								<option value="15">Evil Shaman</option>
								<option disabled value="X">-------</option>
								<option value="H">Hawk</option>
								<option value="16">Wanderer</option>
								<option value="17">Rogue</option>
								<option value="18">Ninja Master</option>
								<option value="19">Night Blade</option>
								<option disabled value="X">-------</option>
								<option value="L">Lise</option>
								<option value="20">Vanadies</option>
								<option value="21">Star Lancer</option>
								<option value="22">Dragon Master</option>
								<option value="23">Fenrir Knight</option>
							</select>
							<select class="form-control mt-1" id="select_second">
								<option value="R">Randomize !</option>
								<option disabled value="X">-------</option>
								<option value="K">Kevin</option>
								<option value="0">God Hand</option>
								<option value="1">Warrior Monk</option>
								<option value="2">Death Hand</option>
								<option value="3">Dervish</option>
								<option disabled value="X">-------</option>
								<option value="A">Angela</option>
								<option value="4">Grand Divina</option>
								<option value="5">Archmage</option>
								<option value="6">Rune Master</option>
								<option value="7">Magus</option>
								<option disabled value="X">-------</option>
								<option value="D">Duran</option>
								<option value="8">Paladin</option>
								<option value="9">Warlord</option>
								<option value="10">Swordsmaster</option>
								<option value="11">Duellist</option>
								<option disabled value="X">-------</option>
								<option value="C">Carlie</option>
								<option value="12">Bishop</option>
								<option value="13">Sage</option>
								<option value="14">Necromancer</option>
								<option value="15">Evil Shaman</option>
								<option disabled value="X">-------</option>
								<option value="H">Hawk</option>
								<option value="16">Wanderer</option>
								<option value="17">Rogue</option>
								<option value="18">Ninja Master</option>
								<option value="19">Night Blade</option>
								<option disabled value="X">-------</option>
								<option value="L">Lise</option>
								<option value="20">Vanadies</option>
								<option value="21">Star Lancer</option>
								<option value="22">Dragon Master</option>
								<option value="23">Fenrir Knight</option>
							</select>
							<select class="form-control mt-1" id="select_third">
								<option value="R">Randomize !</option>
								<option disabled value="X">-------</option>
								<option value="K">Kevin</option>
								<option value="0">God Hand</option>
								<option value="1">Warrior Monk</option>
								<option value="2">Death Hand</option>
								<option value="3">Dervish</option>
								<option disabled value="X">-------</option>
								<option value="A">Angela</option>
								<option value="4">Grand Divina</option>
								<option value="5">Archmage</option>
								<option value="6">Rune Master</option>
								<option value="7">Magus</option>
								<option disabled value="X">-------</option>
								<option value="D">Duran</option>
								<option value="8">Paladin</option>
								<option value="9">Warlord</option>
								<option value="10">Swordsmaster</option>
								<option value="11">Duellist</option>
								<option disabled value="X">-------</option>
								<option value="C">Carlie</option>
								<option value="12">Bishop</option>
								<option value="13">Sage</option>
								<option value="14">Necromancer</option>
								<option value="15">Evil Shaman</option>
								<option disabled value="X">-------</option>
								<option value="H">Hawk</option>
								<option value="16">Wanderer</option>
								<option value="17">Rogue</option>
								<option value="18">Ninja Master</option>
								<option value="19">Night Blade</option>
								<option disabled value="X">-------</option>
								<option value="L">Lise</option>
								<option value="20">Vanadies</option>
								<option value="21">Star Lancer</option>
								<option value="22">Dragon Master</option>
								<option value="23">Fenrir Knight</option>
							</select>
							<input type="submit" id="sortSubmit" name="sortSubmit" class="form-control btn btn-danger mt-1" value="Send !">
						</fieldset>
					</form>
				</div>
				<?php else : ?>
				<div class="offset-lg-2">
				</div>
      			<?php endif ?>

				<!-- center panel with team results -->
				<div class="col-lg-8">
					<h3 class="h3 text-center list-group-item-light pb-2 text-secondary">Team edition panel --- Please hover each form input to get info </h3>

					<?php if ($nb_chara < 24) : ?>
          			<!-- ADD CHARACTER SECTION  -->
			        <div class="row mt-3 list-group-item-warning">
			            <form action="#" method="post" class="col-md-12">
			            	<fieldset class="mt-3 form-group">
			            		<?php
			            			echo "<legend class='h4 text-dark text-center'>Create a character's final class ($nb_chara out of 24)</legend>";
			            		?>
			            		<label class="form-control" for="add_chara_id">Character id : </label>
			            		<input type="number" placeholder="id between 0 and 23" class="form-control mb-3" id="add_chara_id" name="add_chara_id">
			            		<label class="form-control" for="add_chara_name">Character name : </label>
			            		<input type="text" placeholder="character name" class="form-control mb-3" id="add_chara_name" name="add_chara_name">
			            		<label class="form-control" for="add_chara_class">Character Class : </label>
			            		<input type="text" placeholder="character class" class="form-control mb-3" id="add_chara_class" name="add_chara_class">
			            		<label class="form-control" for="add_chara_img">Character image : </label>
			            		<input type="text" placeholder="character image link" class="form-control mb-3" id="add_chara_img" name="add_chara_img">
			            		<input type="submit" name="add_chara_submit" value="Send" class="w-25 float-right form-control btn btn-success btn-sm mb-3" id="add_chara_submit">
			            	</fieldset>
			            </form>
			            <?php
			            	if (isset($_POST["add_chara_submit"]))
			            	{
			            		echo "<div class='col-md-12'><div class='alert alert-dark my-2'>$chara_submit</span></div></div>";
			            	}
			            ?>
			        </div>
			    	<?php endif; ?>


					<!-- first section with the three characters inside -->
					<?php
					if (!isset($_SESSION['triad']) || StaticMethods::goGetNames() < count($_SESSION['triad']))
					{
						echo '<div class="row"><div class="col-lg-12"><div class="alert alert-danger">Error : Cannot reach three different characters or session uninitialized --- click "Randmize!" or "Send!" to start a team. </div></div></div>';
					}
					else
					{
						// display alert regarding team
						if(isset($_POST['add_team_submit']))
						{
							echo "<div class='row'><div class='col-md-12'><div class='alert alert-dark my-2'>$team_submit</span></div></div></div>";
						}

						// display error alert before all characters edit panels
						for ($i=0; $i < count($_SESSION['triad']) ; $i++)
						{
							if (isset($_POST[StaticMethods::buildName_i("chara_update_submit", $i)]) && !empty($chara_update))
							{
								echo "<div class='row'><div class='col-md-12'><div class='alert alert-dark my-2'>$chara_update</span></div></div></div>";
							}
						}

						// display each character edit panel
						for ($i=0; $i < count($_SESSION['triad']) ; $i++)
						{ 
							echo $chara_toolbox->displayMyRootChara($i, $_SESSION['triad'][$i]);
						}
					}
					?>

					<?php
					if (isset($_SESSION['team_sorted']))
					{
						if($team_toolbox->find_team(implode($_SESSION['team_sorted'])) == 0) :
							echo $team_toolbox->rootTeamBirthForm(implode('', $_SESSION['team_sorted']));
						else : ?>
	          			<!-- second section with focus result -->
						<div class="row">
							<div class="col-md-12 list-group-item-light p-2">
								<ul class="list-group">
									<li class="list-group-item">Team score : <strong class="text-danger" data-toggle="tooltip" data-placement="top" title="score de base : addition des trois scores personnages">&#36;score</strong> ~ Final score : <strong class="text-danger" data-toggle="tooltip" data-placement="top" title="score final après calcul">&#36;final_score</strong></li>
									<li class="list-group-item">We have a <strong class="text-danger" data-toggle="tooltip" data-placement="top" title="plus le score final est bas, plus le focus est 'melee', inversement pour 'magic' - je ne sais pas à quel limite ça change...">&#36;type</strong> focus over here.</li>
								</ul>
							</div>
						</div>
						<?php endif; 
					} ?>




					<!-- third section with team details -->
					<div class="row my-3">
						<div class="col-md-12 list-group-item-dark p-2">
							<h4 class="h4">Team details</h4>
							<ul class="list-group">
								<li class="list-group-item p-1">
									Pros : <strong class="text-danger" data-toggle="tooltip" data-placement="top" title="avantages de la team : force de frappe, synergie, etc...">&#36;text</strong>
								</li>
								<li class="list-group-item p-1">
									Cons : <strong class="text-danger" data-toggle="tooltip" data-placement="top" title="petits inconvénients de la team : est dépendant de tel sort ou tel objet pour fonctionner, ...">&#36;text</strong>
								</li>
								<li class="list-group-item p-1">
									Most useful in quest : <strong class="text-danger" data-toggle="tooltip" data-placement="top" title="précise si la team a un intérêt particulier sur une des 3 fins de jeu">&#36;text</strong>
								</li>
								<li class="list-group-item p-1">
									Better team suggestion : <strong class="text-danger" data-toggle="tooltip" data-placement="top" title="si possible mettre direct un bouton avec le lien vers la team suggérée...">&#36;text</strong>
								</li>
							</ul>
						</div>
					</div>
					<div class="my-5"></div>
					<div class="my-5"></div>
				</div>

				<!-- third panel with tips -->
				<div class="col-lg-2">
					<div id="accordion">
						<div class="card">
						    <div class="card-header list-group-item-dark">
						    	<h5 class="mb-0">
						        	<div class="d-flex flex-row flex-wrap justify-content-between">
						          	<span>Tips 1</span>
						          	<span id="headingOne" class="text-danger fas fa-ellipsis-h" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"></span>
						        </div>
						    	</h5>
						    </div>
						</div>
						<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
					    	<div class="card-body list-group-item-danger">
					        	Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
					    	</div>
					    </div>
					    <div class="card">
						    <div class="card-header list-group-item-dark">
						    	<h5 class="mb-0">
						        	<div class="d-flex flex-row flex-wrap justify-content-between">
						          	<span>Tips 2</span>
						          	<span id="headingTwo" class="collapsed fas fa-ellipsis-h" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"></span>
						        </div>
						    	</h5>
						    </div>
						</div>
						<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
					    	<div class="card-body list-group-item-danger">
					        	Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
					    	</div>
					    </div>
					    <div class="card">
						    <div class="card-header list-group-item-dark">
						    	<h5 class="mb-0">
						        	<div class="d-flex flex-row flex-wrap justify-content-between">
						          	<span>Tips 3</span>
						          	<span id="headingThree" class="collapsed fas fa-ellipsis-h" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree"></span>
						        </div>
						    	</h5>
						    </div>
						</div>
						<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
					    	<div class="card-body list-group-item-danger">
					        	Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
					    	</div>
					    </div>
					</div>
				</div>
				<div class="my-5"></div>
				<div class="my-5"></div>
			</div>
			<div class="my-2"></div>
			
			<!-- closing bottom margins -->
			<div class="my-5"></div>
			<div class="my-5"></div>
		</div>

		<!-- Bootstrap JS CDN -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
	</body>
</html>
