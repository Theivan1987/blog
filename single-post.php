<?php
 include('db.php');
?>
<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="My first project">
    <meta name="author" content="Ivan Jovanovic">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">

</head>

<body>
<?php include('header.php') ?>

<main role="main" class="container">

    <div class="row">
    <div class="col-sm-8 blog-main">

        <?php
            if (isset($_GET['post_id'])) {

                // pripremamo upit
                $sql = "SELECT id, title, body, author, created_at FROM posts WHERE id = {$_GET['post_id']}";

                $statement = $connection->prepare($sql);

                // izvrsavamo upit
                $statement->execute();

                // zelimo da se rezultat vrati kao asocijativni niz.
                // ukoliko izostavimo ovu liniju, vratice nam se obican, numerisan niz
                $statement->setFetchMode(PDO::FETCH_ASSOC);

                // punimo promenjivu sa rezultatom upita
                $singlePost = $statement->fetch();

                // koristite var_dump kada god treba da proverite sadrzaj neke promenjive
                    /*echo '<pre>';
                    var_dump($singlePost);
                    echo '</pre>';*/
            }
            ?>
                <article class="va-c-article">
                <header>
                    <h1><?php echo($singlePost['title']) ?></h1>

                    <!-- zameniti  datum i ime sa pravim imenom i datumom blog post-a iz baze -->
                    <div class="va-c-article__meta"><?php echo($singlePost['created_at']) ?> by <?php echo($singlePost['author']) ?></div>
                </header>

                <div>
                    <!-- zameniti ovaj privremeni (testni) text sa pravim sadrzajem blog post-a iz baze -->
                    <p><?php echo($singlePost['body']) ?></p>
                    
                </div>
            <?php
                if (isset($_GET['post_id'])) {

                // pripremamo upit
                $sql1 = "SELECT comments.author, comments.text, comments.post_id 
                FROM comments INNER JOIN posts ON posts.id = comments.post_id";
                $statement1 = $connection->prepare($sql1);

                // izvrsavamo upit
                $statement1->execute();

                // zelimo da se rezultat vrati kao asocijativni niz.
                // ukoliko izostavimo ovu liniju, vratice nam se obican, numerisan niz
                $statement1->setFetchMode(PDO::FETCH_ASSOC);

                // punimo promenjivu sa rezultatom upita
                $comments = $statement1->fetchAll();

                // koristite var_dump kada god treba da proverite sadrzaj neke promenjive
                    /*echo '<pre>';
                    var_dump($comments);
                    echo '</pre>';*/

                ?>
                    <div class="comments">
                        <h3>comments</h3>
                    <ul>
                        <?php foreach($comments as $comment) {?>
                        
                        <!-- zameniti testne komentare sa pravim komentarima koji pripadaju blog post-u iz baze -->
                        <li class="single-comment">
                    
                            <div>posted by: <strong><?php echo $comment['author'] ?></strong> </div>
                            <div><?php echo $comment['text'] ?>
                            </div>
                        </li>
                        <hr>
                        <?php } ?>
                    </ul>    
                    </div>


                <?php } ?>
                
                </article>
                </div>
                <?php include 'sidebar.php' ?>
            
       
    </div><!-- /.row -->

</main><!-- /.container -->

<?php include('footer.php'); ?>
</body>
</html>

