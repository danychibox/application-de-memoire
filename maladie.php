<!DOCTYPE html>
<html>
<head>
	<title>minsante</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
</head>
<body>
	<header>
		<div id="hamburger">
			<div id="hamburger-content">
				<nav>
					<ul>
						<li><a href="index.php">accueil</a></li>
						<li><a href="#">information</a></li>
						<li class="monTitre">administration du système</li>
					</ul>
				</nav>
			</div>
			<button id="hamburger-button">&#9776;</button>
			<div id="hamburger-sidebar">
				<div id="hamburger-sidebar-head"></div>
				<div id="hamburger-sidebar-body"></div>
			</div>
			<div id="hamburger-overlay"></div>
		</div>
	</header>
	<div class="row">
		<div class="col-2 menu">
			<a href="index.php"><button class="monBouton">accueil</button></a>
			<a href="controle-utilisateur.php"><button class="monBouton">utilisateurs</button></a>
			<a href="zonesante.php"><button class="monBouton">zones de santé</button></a>
			<a href="structure.php"><button class="monBouton">structures sanitaires</button></a>
			<a href="maladie.php"><button class="monBouton">maladie</button></a>
			<a href="listestructure.php"><button class="monBouton">liste des structures</button></a>
			<a href="listemaladie.php"><button class="monBouton">listes des maladies</button></a>
			<a href="graphiqueCas.php"><button class="monBouton">graphique des cas</button></a>
			<a href="casparzone.php"><button class="monBouton">cas par zone</button></a>
			<a href="casStructure.php"><button class="monBouton">cas par structure</button></a>
			<a href="graphiqueMaladie.php"><button class="monBouton">graphique par maladie</button></a>
		</div>
			<div class="usrclass col-4">
				<center><p>ajouter une maladie</p></center>
				<form name="valider" action="php/saveMaladie.php" method="POST">
				<label for="id">entrer un ID</label>
					<input type="text" name="id" class="form-control">
				<label for="desi">entrer une designation </label>
					<input type="text" name="desi" class="form-control">
					<label for="cate"> categorie</label>
					<input type="text" name="cate" class="form-control">
					<input type="submit" name="valider" class="btn-primary">
				</form>
              </div>
            <div class="col-5 liste">
            	<center><p>liste des structure</p></center>
            	<button class="btn-primary">imprimmer</button>
            	<table class="table table-bordered table-striped table-condensed">
            		<thead>
            			<th>code</th>
            			<th>designation</th>
            			<th>categorie</th>
            		</thead>
            		<tbody>
            		<?php
            		$connexion=mysqli_connect("localhost","chibox","chibox","bd_memoire");
            		$requete="select * from maladie";
            		$execution=mysqli_query($connexion,$requete);
            		while ($row=mysqli_fetch_array($execution)) {
            			echo "<tr>
            					<td>".
            					$row['id_maladie'].
            					"</td><td>".$row['designation']."</td><td>".$row['categorie']."</td>
            			</tr>";
            		}
            		?>
            		</tbody>
            	</table>
            </div>
	</div>
	<script type="text/javascript" src="js/view.js"></script>
</body>
</html>