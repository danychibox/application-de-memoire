<?php
$connexion=mysqli_connect("localhost","chibox","chibox","bd_memoire");
if (isset($_POST['valider'])) {
   $id=$_POST['id'];
   $maladie=$_POST['maladie'];
   $cas=$_POST['cate'];
   $date=$_POST['date'];
   $structure=$_POST['structure'];
   $req="insert into casmaladie (id_cas,maladie,nombreDesCas,xdate,structure) values ('$id','$maladie','$cas','$date','$structure')";
   $execute=mysqli_query($connexion,$req);
   if ($execute) {
   		echo "enregistrement reussi";
   	}	else{
   		echo "erreur d'enregistrement";
   	}
}else{
   echo "aucun element envoyer";
}
?>