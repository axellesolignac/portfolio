<?php
if(!isset($_GET['id'])OR !is_numeric($_GET['id']))
    header('Location: blog.php');
else
{
    extract($_GET);
    $id = strip_tags($id);
    
    require_once('config/functions.php');
    
    if(!empty($_POST))
    {
        extract($_POST);
        $errors = array();
        
        $author = strip_tags($author);
        $comment = strip_tags($comment);
        
        if(empty($author))
            array_push($errors, 'Entrez un pseudo');
        
        if(empty($comment))
            array_push($errors, 'Entrez un commentaire');
        
        if(count($errors) == 0)
        {
            $comment = addComment($id, $author, $comment);
            
            $success = 'Votre commentaire a été publié';
            
            unset($author);
            unset($comment);
        }
    }
    
    $article = getArticle($id);
    $comments = getComments($id);
}
?>

<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="article.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title><?= $article->title ?></title>
</head>

<body>
    <header>
        <h1><?= $article->title ?></h1><span class="mouse-scroll"></span>
    </header>




    <main>
        <article>
            <h2><?= $article->artitle ?></h2><hr />
            <time><?= $article->date ?></time><br /><br />
            <p><?= $article->content ?></p> <br /><br />
            <?php
        if(isset($success))
            echo $success;
            
        if(!empty($errors)):?>

            <?php foreach($errors as $error): ?>

            <div class="row">
                <div class="col-md-6">
                    <div class="alert alert-danger"><?= $error ?></div>
                </div>
            </div>

            <?php endforeach; ?>

            <?php endif ?>

            <h4>Commentaires :</h4>
            <div class="row">
                <div class="col-md-6">
                    <form action="article.php?id=<?= $article->id ?>" method="post">
                        <p><label for="author">Pseudo :</label><br />
                            <input type="text" name="author" id="author" value="<?php if(isset($author)) echo $author ?>" class="form-control"/></p>
                        <p><label for="comment">Commentaire :</label><br />
                            <textarea name="comment" id="comment" cols="30" rows="8" class="form-control" value="<?php if(isset($comment)) echo $comment ?>"></textarea></p>
                        <button type="submit" class="btn btn-outline-info">Envoyer</button>
                    </form>

                </div>
            </div>

            <?php foreach($comments as $com): ?>
            <section class="comments">

                <p class="username"><img class="maskable" src="https://www.eguardtech.com/wp-content/uploads/2018/08/Network-Profile.png" /><?= $com->author ?></p>
                <time><?= $com->date ?></time>
                <p><?= $com->comment ?></p>

            </section>
            <?php endforeach; ?>
        </article>
    </main>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
