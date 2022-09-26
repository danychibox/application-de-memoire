<?php
$connexion=mysqli_connect("localhost","chibox","chibox","bd_memoire");
if (isset($_POST['valider'])) {
		$id=$_POST['id'];
		$designation=$_POST['desi'];
		$categorie=$_POST['cate'];
		$requete="insert into maladie(id_maladie,designation,categorie) values ('$id','$designation','$categorie')";
		$execution=mysqli_query($connexion,$requete);
		if ($execution) {
			echo "bien enregistrer";
		}else{
			echo "echec d'enregistrement";
		}
	}
?>