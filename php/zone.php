<?php
$connexion=mysqli_connect("localhost","chibox","chibox","bd_memoire");
if (isset($_POST["valider"])) {
	$id=$_POST['idzs'];
	$designation=$_POST["nom"];
	$requete="insert into zonedesante(id_zone,designation) values ('$id','$designation') ";
	$executer=mysqli_query($connexion,$requete);
	if ($executer) {
		echo "enregistrement reussi";
	}
}
?>