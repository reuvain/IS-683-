<?php 
	
		$server_host = $_SERVER['HTTP_HOST'];
		$script_name = $_SERVER['SCRIPT_NAME'];
		
		$url = 'http://' . $server_host . rtrim($script_name, 'ReubensCategory.php') . 'ReubensFindone.php?_id=';
		
	$username = 'kwilliams';
	$password = 'mongo1234';
	$connection = new Mongo("mongodb://${username}:${password}@localhost/test",array("persist" => "x"));
	//Selection of Datbase and Collection
	$db = $connection->recipe;
	$collection = $db->stuff;
	
	
	$cursor = $collection->find(array("Shrt_Desc.title" => $_GET['title']));
	
	//find distinct groups
	//$cursor = $db->command(array("distinct" => "stuff", "key" => "Shrt_Desc.title"));
	
	cursor_to_table($cursor, $url);
	
	//this is a nice little function to build a table out of an array
	
	function cursor_to_table($cursor, $url) {
	
	
	echo '<table border="1" id="myTable" class="tablesorter">' ."\r\n";
	echo '<thead> <tr>' . "\r\n";
	
	foreach($cursor as $ingredient) {
	
		if($i == 0) {
			$table_header[] = array_keys($ingredient);
				foreach($table_header as $columns) {
					foreach($columns as $title) {
	        			echo '<th>' . $title . '</th>' . "\r\n";
					}
					echo '</tr>';
				}
		}
		$i = $i + 1;
		foreach($ingredient as $key => $value ) {
			if(!is_array($value)){
				if($key == '_id') {
					$mongo_id = $value;
					$value = '<a href="' . $url . $mongo_id . '">' . $mongo_id . '</a>';
				}
				echo '<th>' . $value . '</th>'. "\r\n";
			}	else {
				echo '<th>' . $value['title'] . "\r\n";
				foreach($value['options'] as $opt => $val) {
					echo $val . '<br>';
				}
				echo '</th>' . "\r\n";
			}
		}
		echo '</tr>';
	}
		echo '</thead> <tbody> '."\r\n";
	
	}
	
	
	
	
	
	
	
	
?>