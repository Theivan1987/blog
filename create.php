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

        <?php
            $error = '';
            if (!empty($_GET['error'])) {
                $error = 'All fields are required';
            }
        ?>

        <form action="create-post.php" method="post">
        
        Title: <input type="text" name="title"><br><br>
        Author: <input type="text" name="author"><br><br>
        Post Text: <textarea name="post-text" id="" cols="30" rows="10"></textarea><br><br>
        <?php if (!empty($error)) { ?>
                <span class="alert alert-danger"><?php echo $error; ?></span>
                <?php } ?>
        <input type="submit" value="Send your post">
        
        </form>
    
        <?php include 'sidebar.php' ?>

    </div><!-- /.row -->

</main><!-- /.container -->

<?php include('footer.php'); ?>
</body>
</html>