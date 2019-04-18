<?php
 include('db.php');
?>



<?php
$postId = $_POST['postId'];
if(!empty($_POST['name']) && !empty($_POST['comment'])) {

    $name = $_POST['name'];
    $comment = $_POST['comment'];
    //Insert Query of SQL
    $sql = "INSERT INTO comments (author,text,post_id) values ('$name', '$comment', $postId);";
    $statement = $connection->prepare($sql);
    $statement->execute();
    
    header("Location: http://localhost:8080/single-post.php?post_id=$postId");
} else {
    header("Location: http://localhost:8080/single-post.php?post_id=$postId&error=required");
}
?>