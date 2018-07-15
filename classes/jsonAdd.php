<?php

class CharaInJSON {
	//attributes
	private $_name, $_class, $_img_src;

	//construct
	public function __construct($name, $class, $img_src) {
		$this->_name=$name;
		$this->_class=$class;
		$this->_img_src=$img_src;
	}

	//methods
	public function addToJSON() {
		$data=json_decode('data/dataBase.json', true);
	    if (empty($data)) {
	    	$max_id=0;
		}
		else {
			$idsList = array_column($data, 'id');
			$max_id=max($idsList)+1;
		}
		$chara=array('id'=>$max_id,'name'=>$this->_name,'class'=>$this->_class,'img'=>$this->_img_src);
		//open json file
		$handle=fopen('data/dataBase.json', 'r+');
		//modify the position of the text pointer
		fseek($handle, 0, SEEK_END);
		// are we at the end or is the file empty
	    if (ftell($handle) > 0) {
	    	
	        // move back a byte
	        fseek($handle, -1, SEEK_END);

	        // add the trailing comma
	        fwrite($handle, ',', 1);

	        // add the new json string
	        fwrite($handle, json_encode($chara) . ']');
	    }
	    else {
	    	
	        // write the first event inside an array
	        fwrite($handle, json_encode(array($chara)));
	    }

	    // close the handle on the file
	    fclose($handle);
	}
}