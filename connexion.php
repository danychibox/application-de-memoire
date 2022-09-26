<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <title>loggin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
         <link rel="stylesheet" type="text/css" href="css/index.css">
         <link rel="stylesheet" type="text/css" href="css/connexion.css">
    </head>

<body>
<header>
        <div id="hamburger">
            <div id="hamburger-content">
                <nav>
                    <ul>
                        <li><a href="index.php">accueil</a></li>
                        <li><a href="#">information</a></li>
                        <li><a href="connexion.php">connexion</a></li>
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
    <br><br>
        <center>
        <div class="container">
            <div class="tete">
                <h2>connexion</h2>
            </div>
            <form class="form" name="valider" action="php/cnnecter.php" method="POST">
                <div class="form-control">
                    <label for="username" name="username">utilisateur</label>
                    <input id="txtusername" type="text" name="username"/>
                    <small>veuillez remplir ce champs</small>
                </div>
                <div class="form-control">
                    <label for="password" name="password">mot de passe</label>
                    <input id="txtpassword" type="password" name="password"/>
                    <small>veuillez remplir ce champs</small>
                </div>
                <div class="form-control">
                    <input type="submit" name="valider" class="valider">
                </div>
            </form>
        </div>
        </center>
    <script type="text/javascript" src="js/view.js"></script>
    <script type="text/javascript" src="js/connexion.js"></script>
</body>
</html>