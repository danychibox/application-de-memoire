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
		<a href="index.html"><button class="monBouton">accueil</button></a>
			<a href="controle-utilisateur.php"><button class="monBouton">utilisateurs</button></a>
			<a href="zonesante.php"><button class="monBouton">zones de santé</button></a>
			<a href="structure.php"><button class="monBouton">structures sanitaires</button></a>
			<a href=""><button class="monBouton">maladie</button></a>
			<a href="nouveau.php"><button class="monBouton">ajout cas</button></a>
			<a href="liste.php"><button class="monBouton">listes des maladies</button></a>
			<a href="liststructure.php"><button class="monBouton">liste des structures</button></a>
			<a href=""><button class="monBouton">graphique des cas</button></a>
			<a href=""><button class="monBouton">cas par zone</button></a>
			<a href=""><button class="monBouton">cas par structure</button></a>
			<a href=""><button class="monBouton">graphique par maladie</button></a>
		</div>

		<div class="col-8 contenu">
		<center><h2>cas par structure sanitaire</h2></center>
		<form method="POST" action="casparstructure.php" name="valider">
			<label for="structure">selectionner une structure sanitaire</label>
			<select class="form-control" name="structure">
						<?php
						$connexion=mysqli_connect("localhost","chibox","chibox","bd_memoire");
						$req="select * from structure";
						$exec=mysqli_query(
							$connexion,$req);
						while($row=mysqli_fetch_array($exec)) {
							echo "<option value='".$row["id_structure"]."'>".$row["designationStructure"]."</option>";
						}
						?>
					</select>
			<input type="submit" name="valider" class="btn-primary">
		</form>
		<table class="table table-bordered table-striped table-condensed">
			<thead>
			<th>code</th>
			<th>désignation </th>
			<th>maladie</th>
			<th>cas</th>
			<th>date</th>
			</thead>
		<?php
		if(isset($_POST['valider'])){
			$structure=$_POST['structure'];
			$connexion=mysqli_connect("localhost","chibox","chibox","bd_memoire");
			$requete="select * from structure,maladie,casmaladie where casmaladie.maladie=maladie.id_maladie and casmaladie.structure=structure.id_structure and id_structure='$structure'";
			$executer=mysqli_query($connexion,$requete);
			while($row=mysqli_fetch_array($executer)){
				echo "<tr><td>".$row['id_structure']."</td><td>".$row['designationStructure']."</td><td>".$row['designation']."</td><td>".$row['nombreDesCas']."</td><td>".$row['xdate']."</td></tr>";
			}
		}
		?>
		</table>
		</div>
	</div>
	<script type="text/javascript" src="js/view.js"></script>
</body>
</html>