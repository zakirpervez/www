<?php
require '../includes/init.php';

AuthHelper::requireLogin();
$connection = require '../includes/database_helper.php';

$articleData = new ArticleData();
$articleData->title = '';
$articleData->content = '';
$articleData->published_at = '';

$category_ids = [];
$categories = CategoryData::getCategories($connection);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $articleData->title = $_POST['title'];
    $articleData->content = $_POST['content'];
    $articleData->published_at = $_POST['published_at'];
    $articleData->categoryIds = $_POST['category'] ?? [];

    $errors = ArticleCurdOperations::validateArticle($articleData);
    if (empty($errors)) {
        if (ArticleCurdOperations::createArticle($connection, $articleData)) {
            ArticleCurdOperations::setCategories($connection, $articleData);
            $path = "/www/admin/article-detail.php?id=$articleData->id";
            Router::redirect($path);
        }
    }
}
?>

<?php require '../includes/header.php'; ?>

<h2>Create article</h2>

<?php require '../includes/article-form.php'; ?>

<?php require '../includes/footer.php'; ?>