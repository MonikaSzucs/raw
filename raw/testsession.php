<?php

session_start();
//this is to make sure people can't access the pages unless they log in

if(!isset($_SESSION["user_id"]))
{
	session_destroy();
	header( 'Location: signout.php' );
};

echo $_SESSION["user_id"];

?>