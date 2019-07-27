<?php
	require_once "connexion.class.php";
	require_once "db_connect.php";


	class Etudiant
	{
		public $id;
		public $nom;
		public $postnom;
		public $prenom;
		public $sexe;
		public $institution;
		public $faculte;
		public $niveau;
		public $debut;
		public $fin;
		function __construct($id, $nomEt, $postnomEt, $prenomEt, $sexeEt, $institutionEt, $faculteEt, $niveauEt, $debutEt, $finEt)
		{
			$nom = $nomEt ;
			$postnom = $postnomEt;
			$prenom = $prenomEt;
			$sexe = $sexeEt;
			$institution = $institutionEt;
			$faculte = $faculteEt;
			$niveau = $niveauEt;
			$debut = $debutEt;
			$fin = $finEt;
		}

		public function insererEtudiant($nomEt, $postnomEt, $prenomEt, $sexeEt, $institutionEt, $faculteEt, $niveauEt, $debutEt, $finEt)
		{
			$con = connexion::Getconnexion();
			$requete = "INSERT INTO etudiant(nom_et, postnom_et, prenom_et, sexe, institution, faculte, niveau, datedebut, datefin) VALUES (:n, :ps, :pr, :s, :i, :f, :ni, :deb, :fin)";
			$preparer = $con->prepare($requete);
			$preparer->execute(array("n"=>$nomEt, "ps"=>$postnomEt, "pr"=>$prenomEt, "s"=>$sexeEt, "i"=>$institutionEt, "f"=>$faculteEt, "ni"=>$niveauEt, "deb"=>$debutEt, "fin"=>$finEt));
			$preparer->execute();
		}
		public function modifierEtudiant($id, $nomEt, $postnomEt, $prenomEt, $sexeEt, $institutionEt, $faculteEt, $niveauEt, $debutEt, $finEt)
		{
			$con = connexion::Getconnexion();
			$requete = "UPDATE etudiant SET nom_et=:n, postnom_et=:ps, prenom_et=:pr, sexe=:s, institution=:i, faculte=:f, niveau=:ni, dateDebut=:deb, dateFin=:fin WHERE id=:id";
			$preparer ->execute(array("id"=>$id, "n"=>$nomEt, "ps"=>$postnomEt, "pr"=>$prenomEt, "s"=>$sexeEt, "i"=>$institutionEt, "f"=>$faculteEt, "ni"=>$niveauEt, "deb"=>$debutEt, "fin"=>$finEt));
			$preparer->execute();
		}
		public function afficherEtudiant()
		{
			$con = connexion::Getconnexion();
			$req = "SELECT id, nom_et, postnom_et, prenom_et, sexe, institution, faculte, niveau, datedebut, datefin FROM etudiant";
			$preparer = $con->prepare($req);
			$preparer->execute();
			$liste=array();
			if($preparer != NULL){
				while($objet = $preparer->fetch(PDO::FETCH_OBJ))
				{
					$etudiant = new Etudiant($objet->id, $objet->nom_et, $objet->postnom_et, $objet->prenom_et, $objet->sexe, $objet->institution, $objet->faculte, $objet->niveau, $objet->datedebut, $objet->datefin);
					$liste[]=$etudiant;
				}
			}
				return $liste;
		}
	}
?>