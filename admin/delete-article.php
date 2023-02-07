<?php
// require 'includes/url.php';
// $conn = connect_database();
// if (isset($_GET['id'])) {
//     $article = getArticle($conn, $_GET['id'], 'id');
//     if ($article) {
//         $id = $article['id'];
//     } else {
//         die("article not found");
//     }
// } else {
//     die("id not supplied, article not found");
// }
// if($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $deleteSql = "DELETE FROM article WHERE id=?;";
//     $deleteStatement = mysqli_prepare($conn, $deleteSql);
//     if($deleteStatement === false) {
//         echo mysqli_error($conn);
//     } else {
//             mysqli_stmt_bind_param($deleteStatement, "i", $id);
//             if(mysqli_stmt_execute($deleteStatement)) {
//                 $path = "/www/index.php";
//                 redirect($path);
//             } else {
//                 echo mysqli_stmt_error($deleteStatement);
//             }
//     }
// }

require '../includes/init.php';
AuthHelper::requireLogin();
$connection = require '../includes/database_helper.php';

if (isset($_GET['id'])) {
    $articleData = ArticleCurdOperations::getArticle($connection, $_GET['id'], 'id');
    if (!$articleData) {
        die("article not found");
    }
} else {
    die("id not supplied, article not found");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (ArticleCurdOperations::deleteArticle($connection, $articleData)) {
        $path = "/www/admin/index.php";
        Router::redirect($path);
    }
}
?>

<?php require '../includes/header.php' ?>
<h2>Delete article</h2>
<div>
    <form method="post">
        <p>Are you sure?</p>
        <button>Delete</button>
        <a href="article-detail.php?id=<?= $articleData->id; ?>">Cancel</a>
    </form>
</div>
<?php require '../includes/footer.php' ?>