<?php
session_start();

if(!empty($_SESSION["uname"]))
{
	session_destroy();
	header("Location: Login.php");
}
?>