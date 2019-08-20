<?php
require_once('config/functions.php');

$articles = getArticles();
?>

<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" media="screen" type="text/css" href="blog.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Mon blog</title>
</head>

<body>

    <div class="header">
        <div class="navbar">
            <div class="navbar__wrapper">
                <nav class="navbar__menu"><a class="navbar__brand" href="index.html"><img src="Logo.PNG" alt="Initiales" /></a>
                    <div id="nav-icon3"><span></span><span></span><span></span><span></span></div>
                    <ul class="navbar__nav">
                        <li class="navbar__link after-transform"><a href="index.html">Accueil</a></li>
                        <li class="navbar__link after-transform"><a href="A_propos.html">A Propos</a></li>
                        <li class="navbar__link after-transform"><a href="Projets.html">Projets</a></li>
                        <li class="navbar__link after-transform"><a class="active" href="#">Blog</a></li>
                        <li class="navbar__link after-transform"><a href="Contact.html">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="navbar-responsive">
            <ul class="navbar-responsive__nav">
                <li class="navbar-responsive__link after-transform"><a href="index.html">Accueil</a></li>
                <li class="navbar-responsive__link after-transform"><a href="A_propos.html">A Propos</a></li>
                <li class="navbar-responsive__link after-transform"><a href="Projets.html">Projets</a></li>
                <li class="navbar-responsive__link after-transform"><a class="active" href="#">Blog</a></li>
                <li class="navbar-responsive__link after-transform"><a href="Contact.html">Contact</a></li>
            </ul>
        </div>
    </div>

    <h1>Mon Blog<br /><a href="https://github.com/axellesolignac"><button type="button" class="btn btn-secondary btn-lg">Git</button></a></h1>

    <?php foreach($articles as $article): ?>
    <div class="main-section">
        <div class="card-container">
            <?php print '<img src="'. $article->image.'" alt="photo article" class="cardImage">'; ?>
            <div class="card-text-container">
                <span class="card-span"></span>
                <h2 class="article-title"><?= $article->title ?></h2>
                <time><?= $article->date ?></time>
                <br /><br />
                <p class="article-descrip"><?= $article->glimps ?></p>
                <a href="article.php?id=<?= $article->id ?>" class="button"> Voir plus <div class="button__arrow"></div></a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
