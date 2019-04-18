<?php
 include('db.php');
?>



<?php
$title = $_POST['title'];
$author = $_POST['author'];
$post = $_POST['post-text'];
$date = date("Y-m-d");
if(!empty($title) && !empty($author) && !empty($post) ) {

    //Insert Query of SQL
    $sql = "INSERT INTO posts (title, body, author, created_at) values ('$title', '$post','$author','$date');";
    $statement = $connection->prepare($sql);
    $statement->execute();
    
    header("Location: http://localhost:8080/index.php");
} else {
    header("Location: http://localhost:8080/create.php?error=required");
}
?>
