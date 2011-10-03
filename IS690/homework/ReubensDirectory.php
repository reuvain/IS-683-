<?php 

	$server_host = $_SERVER['HTTP_HOST'];
	$script_name = $_SERVER['SCRIPT_NAME'];

	$url = 'http://' . $server_host . rtrim($script_name,'directory.php') . 'category.php?title=';
	$url = 'http://' . $server_host . rtrim($script_name, 'ReubensDirectory.php') . 'ReubensCategory.php?title=';
	 

	$username = 'kwilliams';
	$password = 'mongo1234';
	$connection = new Mongo("mongodb://${username}:${password}@localhost/test",array("persist" => "x"));
	//Selection of Datbase and Collection
	$db = $connection->recipe;
	$collection = $db->stuff;
	
	
	//$cursor = $collection->find();
	$cursor = $db->command(array("distinct" => "stuff", "key" => "Shrt_Desc.title"));
	//$cursor = $collection->find(array("shrt_desc_title => "CHEESE""));
	//print_r($cursor);
	foreach ($cursor as $record){
		
			foreach($record as $key=>$value){
				echo '<a href="'.$url . $value . '">' . $value . '</a></br>' ."\r\n";
			}
		}
	

	
	
	echo("Done!");
	
?>