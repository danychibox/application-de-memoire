<?php
$connexion=mysqli_connect("localhost","chibox","chibox","bd_memoire");
if (isset($_POST["valider"])) {
	$id=$_POST["id"];
	$user=$_POST["user"];
	$mdp1=$_POST["mdp1"];
	$mdp2=$_POST["mdp2"];
	if ($mdp1!=$mdp2) {
	echo "veuiller repeter le bon code";

	}else{
		$requete="insert into utilisateur (id_user,username,motDePasse) values ('$id','$user','$mdp1')";
		$sql=mysqli_query($connexion,$requete);
		if ($sql) {
			echo "enregistrement reussi";
		}
	}
}
?>