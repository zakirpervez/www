<?php
// ini_set('display_errors', 1);
// require 'includes/database.php';
// require 'includes/article.php';
// $conn = connect_database();
// $article = getArticle($conn, $_GET['id']); // Procedural way
// if($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $errors = validateArticle($articleData->title, $articleData->$content, $articleData->published_at);
//     if(empty($errors)) {
//         $updateSql = "UPDATE article SET title=?, content=?, published_at=? WHERE id=?;";
//         $updateStatement = mysqli_prepare($conn, $updateSql);
//         if($updateStatement === false) {
//             echo mysqli_error($conn);
//         }else {
//             if($articleData->published_at == '') {
//                 $articleData->published_at = null;
//             }

//             mysqli_stmt_bind_param($updateStatement, "sssi", $articleData->title, $articleData->content, $articleData->published_at, $articleData->id);
//             if(mysqli_stmt_execute($updateStatement)) {
//                 $path = "/www/articles.php?id=$id";
//                 redirect($path);
//             } else {
//                 echo mysqli_stmt_error($updateStatement);
//             }
//         }
//     }

// require 'includes/url.php';

require '../includes/init.php';
AuthHelper::requireLogin();
$connection = require '../includes/database_helper.php';

if (isset($_GET['id'])) {
    $articleData = ArticleCurdOperations::getArticle($connection, $_GET['id']);
    if (!$articleData) {
        die("article not found");
    }
} else {
    die("id not supplied, article not found");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $articleData->title = $_POST['title'];
    $articleData->content = $_POST['content'];
    $articleData->published_at = $_POST['published_at'];
    $errors = ArticleCurdOperations::validateArticle($articleData);
    if (empty($errors)) {
        if (ArticleCurdOperations::updateArticle($connection, $articleData)) {
            $path = "/www/admin/article-detail.php?id=$articleData->id";
            Router::redirect($path);
        }
    }
}

?>
<?php require '../includes/header.php'; ?>

<h2>Edit article</h2>

<?php require '../includes/article-form.php'; ?>

<?php require '../includes/footer.php'; ?>