<?php 
class CharaDetails{
	//attributes
	private $_data, $_number;

	//constructor
	function __construct($data, $number) {
		$data=$this->setData($data);
		$number=$this->setNumber($number);
	}

	//setters
	function setData($data) {
		$data=$this->_data;
	}

	function setNumber($number) {
		$number=$this->_number;
	}

	//methods
	public function display($data, $number, $color) {
	?>
		<div class="col p-3 img-thumbnail list-group-item-<?php echo $color; ?>">
			<div class="d-flex flex-column justify-content-end align-items-center">
				<h4 class="h4"><?php echo $data[$number]["name"]; ?></h4>
				<h5 class="h5"><?php echo $data[$number]["class"].' ('.$data[$number]["cc"].') ~ '.$data[$number]["score"]; ?></h5>
				<img class="mt-5" src="<?php echo $data[$number]["img"]; ?>" alt="img">
				<p class="mt-5" style="font-size:0.625rem;">Stats  : STR, DEX, CON, INT, PIE, LCK</p>
				<p>Min stats : <?php echo implode(", ",  $data[$number]["min_stats"]); ?></p>
				<p>Max stats : <?php echo implode(", ",  $data[$number]["max_stats"]); ?></p>
				<ul class="list-group">
					<li class="list-group-item">Spells : <?php echo $data[$number]["spells"]; ?></li>
					<li class="list-group-item">Techniques : <?php echo $data[$number]["techniques"]; ?></li>
					<li class="list-group-item">Pros : <?php echo $data[$number]["pros"]; ?></li>
					<li class="list-group-item">Cons : <?php echo $data[$number]["cons"]; ?></li>
					<li class="list-group-item">Affiliates : <?php echo $data[$number]["affiliates"]; ?></li>
				</ul>
			</div>
		</div>
	<?php
	}
}