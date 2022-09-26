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
			<a href=""><button class="monBouton">utilisateurs</button></a>
			<a href="zonesante.php"><button class="monBouton">zones de santé</button></a>
			<a href="structure.php"><button class="monBouton">structures sanitaires</button></a>
			<a href="maladie.php"><button class="monBouton">maladie</button></a>
			<a href="liststructure.php"><button class="monBouton">liste des structures</button></a>
			<a href="liste.php"><button class="monBouton">listes des maladies</button></a>
			<a href="graphiqueCas.php"><button class="monBouton">graphique des cas</button></a>
			<a href="casparzone.php"><button class="monBouton">cas par zone</button></a>
			<a href="casStructure.php"><button class="monBouton">cas par structure</button></a>
			<a href="graphiqueMaladie.php"><button class="monBouton">graphique par maladie</button></a>
		</div>
			<div class="col-4 usrclass">
				<center><p>ajouter des cas</p></center>
				<form method="POST" action="php/nouveaucas.php" name="valider">
					<label for="id">entrer un ID</label>
					<input type="text" name="id" class="form-control">
					<label for="cate"> nombre des cas</label>
					<input type="text" name="cate" class="form-control">
						<label for="cate">selectionner une date</label>
					<input type="date" name="date" class="form-control">
					<label for="maladie">selectionner la maladie </label>
						<select class="form-control" name="maladie">
							<?php
							$connexion=mysqli_connect("localhost","chibox","chibox","bd_memoire");
								$req="select * from maladie";
								$exec=mysqli_query(
									$connexion,$req);
								while($row=mysqli_fetch_array($exec)) {
									echo "<option value='".$row["id_maladie"]."'>".$row["designation"]."</option>";
								}

							?>
						</select>
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
              </div>
            <div class="col-5 liste">
            	<center><p>liste des cas</p></center>
            	<button class="btn-primary">imprimmer</button>
            	<table class="table table-bordered table-striped table-condensed">
            		<thead>
            			<th>id_cas</th>
            			<th>maladie</th>
            			<th>nombre</th>
            		</thead>
            		<tbody>
            			<?php
            			$connexion=mysqli_connect("localhost","chibox","chibox","bd_memoire");
            			$sd="select * from casmaladie,maladie,structure where casmaladie.maladie=maladie.id_maladie and casmaladie.structure=structure.id_structure";
            			$cd=mysqli_query($connexion,$sd);
            			while ($rows=mysqli_fetch_array($cd)){
            				echo "<tr>
            					<td>".$rows['id_cas']."</td><td>".$rows['designation']."</td><td>".$rows['nombreDesCas']."</td><td>".$rows['xdate']."</td><td>".$rows['designationStructure']."</td>
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
