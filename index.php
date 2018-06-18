<?php

session_start();

include "blog/config/config.php";

$erreur = false;
$pseudo = $_SESSION["pseudo"];
$id = $_SESSION["id"];


$vue1 = 'index.phtml';

try{


	$dbh = new PDO(DSN, USER, PASSWORD);
	
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql2 = 'SELECT * FROM articles a INNER JOIN utilisateurs u ON a.utilisateurs_idutilisateurs = u.idutilisateurs ORDER BY date DESC';
	$sth2 = $dbh->prepare($sql2);
	$sth2->execute(array()); // ETAPE 2, IL FAUT METTRE LA VARIABLE DANS LE TABLEAU
	$resultarticles = $sth2->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
	echo 'Connexion échouée : ' . $e->getMessage();
}



include('layoutblog.phtml');

?>






