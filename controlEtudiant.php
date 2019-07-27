<?php
	require_once ("connexion.class.php");
	require_once ("db_connect.php");

	require_once ("etudiant.class.php");
	extract ($_GET);
	extract ($_POST);

	if(isset($enregistrer)){
		Etudiant :: insererEtudiant($nom, $postnom, $prenom, $sexe, $institution, $faculte, $niveau, $dateDebut, $dateFin);
		header("Location: index.php");
	}
	if(isset($modifier))
	{
		Etudiant :: modifierEtudiant($nom, $postnom, $prenom, $sexe, $institution, $faculte, $niveau, $dateDebut, $dateFin);
		header("Location:liste.php");
	}
?>