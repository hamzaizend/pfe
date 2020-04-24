<?php

try{
	$bdd=new PDO('mysql:host=localhost;dbname=pfe','root','root');
}catch(PDOException $e){
	die('Erreur:'.$e->getMessage());
}



?>