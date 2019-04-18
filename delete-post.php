<?php
 include('db.php');

$postId = $_POST['postId'];
//Insert Query of SQL
$sql = "DELETE FROM posts WHERE id = '$postId';";
$statement = $connection->prepare($sql);
$statement->execute();

header("Location: http://localhost:8080/index.php");
 
?>