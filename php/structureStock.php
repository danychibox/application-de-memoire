<?php
$connexion=mysqli_connect("localhost","chibox","chibox","bd_memoire");
if (isset($_POST["valider"])) {
	$id=$_POST["id"];
	$nom=$_POST["user"];
	$zone=$_POST["zone"];
	$req="insert into structure(id_structure,designationStructure,designationZone) values ('$id','$nom','$zone')";
	$execution=mysqli_query($connexion,$req);
	if ($execution) {
		echo "enregistrement reussi";
	}else{
		echo "erreur";
	}
}
?>