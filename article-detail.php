<?php
require 'includes/init.php';
$connection = require 'includes/database_helper.php';

if (isset($_GET['id'])) {
    $article = ArticleCurdOperations::getArticle($connection, $_GET['id']);
} else {
    $article = null;
}
?>

<?php require 'includes/header.php' ?>
<?php if ($article == null) : ?>
    <p>No articles found</p>
<?php else : ?>
    <article>
        <h2><?= htmlspecialchars($article->title); ?></h2>
        <p><?= htmlspecialchars($article->content); ?></p>
    </article>
<?php endif; ?>
<?php require 'includes/footer.php' ?>