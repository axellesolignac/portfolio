<?php
// fonction qui récupère tous les articles
function getArticles()
{
    require('config/connect.php');
    $req = $bdd->prepare('SELECT id, title, date, image, glimps, artitle FROM articles ORDER BY id DESC');
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}

// fonction qui récupère un article
function getArticle($id)
{
    require('config/connect.php');
    $req = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
    $req->execute(array($id));
    if($req->rowCount() == 1)
    {
        $data = $req->fetch(PDO::FETCH_OBJ);
        return $data;
    }
    
    else
        header('Location: blog.php');
    $req->closeCursor();
}

// fonction qui ajoute des commentaire sur la page de l'article correspondante
function addComment($articleId, $author, $comment)
{
    require('config/connect.php');
    $req = $bdd->prepare('INSERT INTO comments (articleId, author, comment, date) VALUES (?, ?, ?, NOW())');
    $req->execute(array($articleId, $author, $comment));
    $req->closeCursor();
}

// fonction qui récupère les commentaires
function getComments($id)
{
    require('config/connect.php');
    $req = $bdd->prepare('SELECT * FROM comments WHERE articleId = ? ORDER BY date DESC');
    $req->execute(array($id));
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}