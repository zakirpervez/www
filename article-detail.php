<?php
require 'includes/init.php';
$connection = require 'includes/database_helper.php';

if (isset($_GET['id'])) {
    $articleData = ArticleCurdOperations::getArticleData($connection, $_GET['id']);
} else {
    $articleData = null;
}
?>

<?php require 'includes/header.php' ?>
<?php if ($articleData == null) : ?>
    <p>No articles found</p>
<?php else : ?>
    <article>
        <h2><?= htmlspecialchars($articleData->title); ?></h2>
        <p><?= htmlspecialchars($articleData->content); ?></p>
        <?php if($articleData->image_file): ?>
            <img src="/www/uploads/<?= $articleData->image_file; ?>">
        <?php endif; ?>
    </article>
<?php endif; ?>
<?php require 'includes/footer.php' ?>