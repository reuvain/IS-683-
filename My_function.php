<html>
	<body>
		<center>
<?php
interface headers {

	public function writeName();
	public function create_header($level,$text);
}
class create implements headers
{
	public function writeName() {
	return "My name is Reuben  Moddel";
	}
	
	function create_header($level,$text) {
		if($level == 1){
		echo'<h1>'.$text.'</h1>';
		}
		elseif($level == 2){
		echo'<h2>'.$text.'</h2>';
		}
		elseif($level == 3){
		echo'<h3>'.$text.'</h3>';
		}
		elseif($level == 4){
		echo'<h4>'.$text.'</h4>';
		}
	}
	function create_paragraph($text){
		echo'<p>'.$text.'</p>';
	}
}
$a = new create();
$test = 'this is a test';
$a->create_Header(4,$a->writeName());
$a->create_header(1,$test);
$a->create_paragraph("hello Eli");
?>
		</center>
	</body>
</html>
