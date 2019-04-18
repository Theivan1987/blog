<?php
 include('db.php');

$postId = $_POST['postId'];
$commentId = $_POST['commentId'];
//Insert Query of SQL
$sql = "DELETE FROM comments WHERE id = '$commentId';";
$statement = $connection->prepare($sql);
$statement->execute();

header("Location: http://localhost:8080/single-post.php?post_id=$postId");
 
?>