<?php

include_once __DIR__.'\config.php';

try{
	$db = new PDO($dsn, $username,$password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	

}catch(PDOException $ex){
	echo "connection_failed".$ex->getMessage();
	header('location:'.__DIR__.'../install.php');
}
