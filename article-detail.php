<?php
require 'includes/init.php';
$connection = require 'includes/database_helper.php';

if (isset($_GET['id'])) {
    $articleData = ArticleCurdOperations::getArticleData($connection, $_GET['id']);
    $articleWithCategories = ArticleCurdOperations::getArticlesWithCategories($connection, $articleData->id, true);
} else {
    $articleData = null;
    $articleWithCategories = null;
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
    <div>
        <fieldset>
            <?php if ($articleData == null) : ?>
                <p>No articles with categories found.</p>
            <?php else : ?>
                <h4>Categories: </h4>
                <?php foreach ($articleWithCategories as $article) : ?>
                    <?= htmlspecialchars($article['category_name']); ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </fieldset>
    </div>
<?php require 'includes/footer.php' ?>