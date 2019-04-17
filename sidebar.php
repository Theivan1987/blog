<?php
 include('db.php');
?>
<?php

// pripremamo upit
$sql = "SELECT id, title, created_at
FROM posts ORDER BY created_at DESC LIMIT 5";
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

<aside class="col-sm-3 ml-sm-auto blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h4>Latest posts</h4>
        <?php
            foreach ($posts as $post) {
        ?>

            <ul class="last-five-posts">
                
                    <li><a href="single-post.php?post_id=<?php echo($post['id']) ?>"><?php echo($post['title']) ?></a>
                    
                    <div class="va-c-article__meta"><?php echo($post['created_at']) ?> 
                    </li>
            </ul>

        <?php
            }
        ?>
    
    </div>
    <!-- <div class="sidebar-module">
        <h4>Archives</h4>
        <ol class="list-unstyled">
            <li><a href="#">March 2014</a></li>
            <li><a href="#">February 2014</a></li>
            <li><a href="#">January 2014</a></li>
            <li><a href="#">December 2013</a></li>
            <li><a href="#">November 2013</a></li>
            <li><a href="#">October 2013</a></li>
            <li><a href="#">September 2013</a></li>
            <li><a href="#">August 2013</a></li>
            <li><a href="#">July 2013</a></li>
            <li><a href="#">June 2013</a></li>
            <li><a href="#">May 2013</a></li>
            <li><a href="#">April 2013</a></li>
        </ol>
    </div> -->
    <!-- <div class="sidebar-module">
        <h4>Elsewhere</h4>
        <ol class="list-unstyled">
            <li><a href="#">GitHub</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Facebook</a></li>
        </ol> -->
    <!-- </div> -->
</aside><!-- /.blog-sidebar -->