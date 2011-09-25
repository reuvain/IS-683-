<?php 

	$mongo_collection = connectToDB();
	$cursor = $mongo_collection->find();
			//echo $cursor;
		foreach ($cursor as $record) {
			
			echo json_encode($record);
			
		}
	function connectToDB() {
		$username = 'Reunjit';
		$password = 'shh123';
		$connection = new Mongo("mongodb://${username}:$password}@localhost/test",array("persist" =>"x"));
		$db = $connection->ingredients;
		$collection = $db->load3;
		return  $collection;
		;
	}
?>