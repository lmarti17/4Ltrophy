<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require 'logs.php';


try {
	$db = new PDO('mysql:host='.$dbHost.';dbname='.$dbName , $user,$pswd);
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
	echo('connected to database');
}
catch(Exception $e){
	var_dump($e);
	die('Could not connect');
}

if (isset($_POST['amount'])) {
	$amount = $_POST['amount'];
	echo $amount;

	date_default_timezone_set('Europe/Paris');
	$date = date('Y/m/d', time());

	$prepare = $db->prepare('INSERT INTO donation (amount, date) VALUES (:amount, :date)');

	$prepare->bindValue(':amount', $amount);
	$prepare->bindValue(':date', $date);

	$exec = $prepare->execute();
}








