<?php

function check($input)
	{
         	echo filter_var ($input,FILTER_SANITIZE_STRING);
        }
	
function noCheck($input)
	{
		echo $input;
	}
?>
	
<table border=3 >
	<tr><td>This Text Field has a filter:</td></tr>
	<tr><td>
        	<form action="" method="post">
			 <input type="text" name="Filter" />
		</form>
	 	<?php check($_POST['Filter']);?>
	</td></tr>
</table>
<br>
<table border=3>
	<tr><td>This Text Field doesn't:</td></tr>
	<tr><td>	
		<form action="" method="post">
			<input type="text" name="noFilter" />
		</form>
		<?php noCheck($_POST['noFilter']);?>
	</td></tr>
</table>
