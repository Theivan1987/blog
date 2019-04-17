<?php
 include('db.php');
?>


<?php
if (isset($_GET['post_id'])) {

// pripremamo upit
$postId = intval($_GET['post_id']);
$sql1 = "SELECT comments.author, comments.text, comments.post_id 
FROM comments WHERE post_id = $postId;";
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
    
    <button onclick="showHide()" class="btn btn-default" id = "show">Hide comments</button>
    
<ul>
    <?php foreach($comments as $comment) {?>
    
    <!-- zameniti testne komentare sa pravim komentarima koji pripadaju blog post-u iz baze -->
    <div class="single-comment" >
    <li >

        <div>posted by: <strong><?php echo $comment['author'] ?></strong> </div>
        <div><?php echo $comment['text'] ?>
        </div>
    </li>
    <hr>
    </div>
    <?php } ?>
</ul>    
</div>


<?php } ?>


<script type="text/javascript" language="javascript">


function showHide () {
    var e = document.getElementsByClassName("single-comment");
    if (document.getElementById("show").innerHTML === "Hide comments") {
        
        document.getElementById("show").innerHTML = "Show comments";
        
        for (var i = 0; i < e.length; i++) {
            e[i].style.display = 'none';
        }
    } 
    else {
        document.getElementById("show").innerHTML = "Hide comments";
        for (var i = 0; i < e.length; i++) {
            e[i].style.display = 'block';
        }
    }
}

</script>
                