<?php

    // pripremamo upit
    $sql = "SELECT id, title, body, author, created_at
    FROM posts ORDER BY created_at DESC ";
    $statement = $connection->prepare($sql);

    // izvrsavamo upit
    $statement->execute();

    // zelimo da se rezultat vrati kao asocijativni niz.
    // ukoliko izostavimo ovu liniju, vratice nam se obican, numerisan niz
    $statement->setFetchMode(PDO::FETCH_ASSOC);

    // punimo promenjivu sa rezultatom upita
    $posts = $statement->fetchAll();

    // koristite var_dump kada god treba da proverite sadrzaj neke promenjive
        /* echo '<pre>';
        var_dump($posts);
        echo '</pre>';*/

?>




<div class="col-sm-8 blog-main">


        <?php
            foreach ($posts as $post) {
        ?>

            <article class="va-c-article">
                <header>
                    <h1><a href="single-post.php?post_id=<?php echo($post['id']) ?>"><?php echo($post['title']) ?></a></h1>
                    
                    <form action="delete-post.php" method="POST">
                        <input type="submit" value="Delete POST" onclick="myPrompt();">
                        <input type="text" hidden name="postId" value=" <?php echo $post['id'];?> " >
    
                        </form>

                    <!-- zameniti  datum i ime sa pravim imenom i datumom blog post-a iz baze -->
                    <div class="va-c-article__meta"><?php echo($post['created_at']) ?> by <?php echo($post['author']) ?></div>
                </header>

                <div>
                    <!-- zameniti ovaj privremeni (testni) text sa pravim sadrzajem blog post-a iz baze -->
                    <p><?php echo($post['body']) ?></p>
                </div>
            </article>

        <?php
            }
        ?>

    

    <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
    </nav>

</div><!-- /.blog-main -->

<script>
function myPrompt(){

  confirm("Do you really want to delete this post?");
}
</script>


