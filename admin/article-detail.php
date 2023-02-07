<?php
require '../includes/init.php';
$connection = require '../includes/database_helper.php';

if (isset($_GET['id'])) {
    $article = ArticleCurdOperations::getArticle($connection, $_GET['id']);
} else {
    $article = null;
}

?>

<?php require '../includes/header.php' ?>
<?php if ($article == null) : ?>
    <p>No articles found</p>
<?php else : ?>
    <article>
        <h2><?= htmlspecialchars($article->title); ?></h2>
        <p><?= htmlspecialchars($article->content); ?></p>
    </article>
<?php endif; ?>
<div>
    <?php if (AuthHelper::isLoggedIn()) : ?>
        <a href="edit-article.php?id=<?= $article->id; ?>">Edit</a>
        <a href="delete-article.php?id=<?= $article->id; ?>">Delete</a>
        <a href="edit-article-image.php?id=<?= $article->id; ?>">Edit Image</a>
    <?php endif; ?>
</div>
<?php require '../includes/footer.php' ?>