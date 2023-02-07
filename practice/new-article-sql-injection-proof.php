<?php
 // This line is use to show the errors on browser.
 ini_set('display_errors', 1);
 
 require 'includes/database.php';
 require 'includes/article.php';
 require 'classes/AuthHelper.php';
 require 'classes/Router.php';

 session_start();

 if(! AuthHelper::isLoggedIn()) {
    die ('unauthorised');
 }
 
 $title =  '';
 $content = '';
 $published_at = '';
 
 if($_SERVER["REQUEST_METHOD"] == "POST") {
    $title =  $_POST['title'];
    $content = $_POST['content'];
    $published_at = $_POST['published_at'];

    $errors = validateArticle($title, $content, $published_at);

    if(empty($errors)) {
        $connection = connect_database();
        $sql = "INSERT INTO article (title, content, published_at) VALUES(?, ?, ?)";
        $statment = mysqli_prepare($connection, $sql);
        if($statment === false) {
            echo mysqli_error($connection);
        } else {
            if($published_at == '') {
                $published_at = null;
            }
            mysqli_stmt_bind_param($statment, "sss", $title, $content, $published_at);
            if(mysqli_stmt_execute($statment)){
                $id = mysqli_insert_id($connection);
                $path = "/www/articles.php?id=$id";
                Router::redirect($path);
            }else {
                echo "Something wrong with the statement". mysqli_stmt_errno($statment);
            }
        }
    } 
 } 
 ?>

<?php require 'includes/header.php' ?>
    <h2>Add new article</h2>
    <?php require 'includes/article-form.php'?>
<?php require 'includes/footer.php' ?>