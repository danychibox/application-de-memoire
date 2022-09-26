<?php
session_start();   
    $connexion=new PDO('mysql:host=localhost;dbname=bd_memoire','chibox','chibox');
    if(!$connexion){
        echo "erreur  de connexion";
        }
    else if(isset($_POST['valider'])){ 
         $use=$_POST['username'];
         $mdp=$_POST['password'];  
         $requete=$connexion->prepare("select* from utilisateur where username= ? and motDePasse= ?");
        $requete->execute(array($use,$mdp));
        $userexist=$requete->rowCount();
         if($userexist==1) {
         $userinfo=$requete->fetch();
        $_SESSION['id']=$userinfo['id_user']; 
        header("Location:../admin-dashboard.php?id=".$_SESSION['id']);

         }
         else{
             echo "mot de passe ou utilisateur incorrect";
          }
      }
?>