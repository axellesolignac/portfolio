<?php
$bdd = new PDO('mysql:host=localhost;dbname=id10067108_portfolio;charset=utf8', 'id10067108_axelle', 'Noisette13');
$reponse = $bdd->query('SELECT * FROM competence;');
?>

<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.6.1/css/mdb.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Lien vers mon css -->
    <link rel="stylesheet" href="Competences.css" />
    <title>Compétences</title>
</head>

<body>

    <div class="header">
        <div class="navbar">
            <div class="navbar__wrapper">
                <nav class="navbar__menu"><a class="navbar__brand" href="index.html"><img src="Logo.PNG" alt="Initiales" /></a>
                    <div id="nav-icon3"><span></span><span></span><span></span><span></span></div>
                    <ul class="navbar__nav">
                        <li class="navbar__link after-transform"><a href="index.html">Accueil</a></li>
                        <li class="navbar__link after-transform"><a class="active" href="A_propos.html">A Propos</a></li>
                        <li class="navbar__link after-transform"><a href="Projets.html">Projets</a></li>
                        <li class="navbar__link after-transform"><a href="Blog.html">Blog</a></li>
                        <li class="navbar__link after-transform"><a href="Contact.html">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="navbar-responsive">
            <ul class="navbar-responsive__nav">
                <li class="navbar-responsive__link after-transform"><a href="index.html">Accueil</a></li>
                <li class="navbar-responsive__link after-transform"><a class="active" href="A_propos.html">A Propos</a></li>
                <li class="navbar-responsive__link after-transform"><a href="Projets.html">Projets</a></li>
                <li class="navbar-responsive__link after-transform"><a href="Blog.html">Blog</a></li>
                <li class="navbar-responsive__link after-transform"><a href="Contact.html">Contact</a></li>
            </ul>
        </div>
    </div>

    <h1>Mes compétences</h1>

    <?php
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=id10067108_portfolio;charset=utf8', 'id10067108_axelle', 'Noisette13');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table jeux_video
$reponse = $bdd->query('SELECT * FROM competence');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
    <p>
        <strong>Libelle</strong> : <?php echo $donnees['libelle']; ?><br />
        <?php echo "<img src='".$donnees['logo']."' />"; ?> niveau : <?php echo $donnees['niveau']; ?> /5<br /></p>
    <?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.6.1/js/mdb.min.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <!-- Lien vers mon js -->
    <script type="text/javascript" src="Navbar_responsive.js"></script>
</body>

</html>
