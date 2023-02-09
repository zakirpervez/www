<?php
require '../includes/init.php';
AuthHelper::requireLogin();
$connection = require '../includes/database_helper.php';

if (isset($_GET['id'])) {
    $articleData = ArticleCurdOperations::getArticleData($connection, $_GET['id']);
    if (!$articleData) {
        die("article not found");
    }
} else {
    die("id not supplied, article not found");
}
$category_ids = array_column(ArticleCurdOperations::getCategories($connection, $articleData->id), 'id');

$categories = CategoryData::getCategories($connection);

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