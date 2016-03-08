<?php
error_reporting(0);
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'pos'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';
	if(!isset($_SESSION["username"])|| strtolower($_SESSION["privilege"]) !=="admin"){
		header("Location: index.php");
	}

