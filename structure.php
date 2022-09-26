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
						<li><a href="index.html">accueil</a></li>
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
			<a href="liste.php"><button class="monBouton">listes des maladies</button></a>
			<a href="graphiqueCas.php"><button class="monBouton">graphique des cas</button></a>
			<a href=""><button class="monBouton">cas par zone</button></a>
			<a href="casStructure.php"><button class="monBouton">cas par structure</button></a>
			<a href="graphiqueMaladie.php"><button class="monBouton">graphique par maladie</button></a>
			<a href=""><button class="monBouton">graphique par maladie</button></a>
		</div>
			<div class="usrclass col-4">
				<center><p>créer une structure</p></center>
				
				<form name="valider" action="php/structureStock.php" method="POST"><label for="id">entrer un ID</label>
					<input type="text" name="id" class="form-control">
					<label for="user">entrer une designation </label>
					<input type="text" name="user" class="form-control">
					<label for="zone">selectionner une zone de santé</label>
					<select class="form-control" name="zone">
						<?php
						$connexion=mysqli_connect("localhost","chibox","chibox","bd_memoire");
						$req="select * from zonedesante";
						$exec=mysqli_query(
							$connexion,$req);
						while($row=mysqli_fetch_array($exec)) {
							echo "<option value='".$row["id_zone"]."'>".$row["designation"]."</option>";
						}
						?>
					</select>									
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
            		</thead>
            		<tbody>
            			<?php
            		$connexion=mysqli_connect("localhost","chibox","chibox","bd_memoire");
            		$requete="select * from strcucture";
            		$execution=mysqli_query($connexion,$requete);
            		while($rows=mysqli_fetch_array($execution)) {
            			echo "<tr>
            					<td>".
            					$rows['id_structure'].
            					"</td><td>".$rows['designationStructure']."</td>
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