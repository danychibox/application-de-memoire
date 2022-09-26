<!DOCTYPE html>
<html>
<head>
	<title>minsante</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
			<a href="liststructure.php"><button class="monBouton">structures sanitaires</button></a>
			<a href=""><button class="monBouton">maladie</button></a>
			<a href="nouveau.php"><button class="monBouton">ajout cas</button></a>
			<a href="liste.php"><button class="monBouton">listes des maladies</button></a>
			<a href="liststructure.php"><button class="monBouton">structures sanitaires</button></a>
			<a href=""><button class="monBouton">graphique des cas</button></a>
			<a href=""><button class="monBouton">cas par zone</button></a>
			<a href=""><button class="monBouton">cas par structure</button></a>
			<a href=""><button class="monBouton">graphique par maladie</button></a>
		</div>
		<div class="col-8 contenu">
		<center><h2>graphique par maladie</h2></center>
			<form method="POST" action="graphicparmaladie.php" name="valider">
			<label>selectionner une zone de santé</label>
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
			<input type="submit" name="valider" class="btn-primary">
		</form>
		<?php
		if (isset($_POST['valider'])) {
			$maladie=$_POST['maladie'];
			$connexion=mysqli_connect("localhost","chibox","chibox","bd_memoire");
		$requete="select * from casmaladie,maladie,structure where casmaladie.structure=structure.id_structure and casmaladie.maladie=maladie.id_maladie and id_maladie='$maladie'";
		$req=mysqli_query($connexion,$requete);
			foreach($req as $data ) {
			$nombreCas[]=$data['nombreDesCas'];
			$structures[]=$data['designationStructure'];
		}
		}
				?>
		<div>
			<div>
			  <canvas id="myChart"></canvas>
			</div>
		<script>
		  const labels = [
		    'January',
		    'February',
		    'March',
		    'April',
		    'May',
		    'June',
		  ];

		  const data = {
		    labels: labels,
		    datasets: [{
		      label: 'fievre jaune',
		      backgroundColor: 'rgb(255, 99, 132)',
		      borderColor: 'rgb(255, 99, 132)',
		      data: [0, 10, 5, 2, 20, 30, 45],
		    }]
		  };

		  const config = {
		    type: 'line',
		    data: data,
		    options: {}
		  };
		</script>
		<script>
		  const myChart = new Chart(
		    document.getElementById('myChart'),
		    config
		  );
		</script>


		</div>
	</div>
	<script type="text/javascript" src="js/view.js"></script>
</body>
</html>