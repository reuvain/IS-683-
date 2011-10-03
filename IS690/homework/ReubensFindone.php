<?php 
	
	$username = 'kwilliams';
	$password = 'mongo1234';
	$connection = new Mongo("mongodb://{$username}:${password}@localhost/test",array("persist"=>"x"));
	
	$db = $connection->recipe;
	$collection = $db->stuff;
	
	$cursor = $collection->findOne(array('_id' => new MongoId($_GET['_id'])));
		

	foreach($cursor as $key => $value){
		
		if(!is_array($value)){
			if(empty($value)){
				$value = 0;
			}
			echo '<strong>'.$key . '</strong>'.': '.$value.'<br>';
		}else{
			echo $key.': ';
			echo $value['title']. ' - ';
			foreach ($value['options']as $option){
				echo $option .' ';
			}
			echo'<br>';
		}
	}


?>