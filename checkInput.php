<?php

function check($input)
	{
         	echo filter_var ($input,FILTER_SANITIZE_STRING);
        }

        check($_POST['Text']);

?>

        <form action="" method="post">
                <input type="text" name="Text" />
        </form>

