<?php
	session_start();
	if(isset($_SESSION['html_data']))
	{session_unset($_SESSION['html_data']);}
	$_SESSION['html_data'] = $_POST['data'];
?>