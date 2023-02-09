<?php
require 'includes/init.php';

if (isset($_GET['id'])) {
    $connection = require 'includes/database_helper.php';
    $articleData = ArticleCurdOperations::getArticleData($connection, $_GET['id']);
    $articles = ArticleCurdOperations::getArticlesWithCategories($connection, $articleData->id);
}
?>

<?php require 'includes/header.php' ?>
<h2>Article with categories</h2>
<ul>
    <?php foreach ($articles as $article) : ?>
        <li>
            <article>
                <a href="article_catagory_detail.php?id=<?= $article['id']; ?>">
                    <h4><?= htmlspecialchars($article['title']); ?></h4>
                </a>
            </article>
        </li>
    <?php endforeach; ?>
</ul>
<?php require 'includes/footer.php' ?>
