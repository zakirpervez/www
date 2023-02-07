<?php
ini_set('display_errors', 1);
require '../includes/init.php';
AuthHelper::requireLogin();
$connection = require '../includes/database_helper.php';

$paginator = new Paginator($_GET['page'] ?? 1, 10, ArticleCurdOperations::getTotalCount($connection));
$articles = ArticleCurdOperations::page($connection, $paginator->limit, $paginator->offset);
?>

<?php require '../includes/header.php' ?>
<fieldset>
    <article>
        <h3><a href="/www/admin/new-article.php">Add new article</a></h3>
    </article>
</fieldset>
<h2>Administration</h2>
<table>
    <thead>
        <th>Title</th>
    </thead>
    <?php foreach ($articles as $article) : ?>
        <tbody>
            <tr>
                <td>
                    <a href="/www/admin/article-detail.php?id=<?= $article['id']; ?>">
                        <?= htmlspecialchars($article['title']); ?>
                    </a>
                </td>
            </tr>
        </tbody>
    <?php endforeach; ?>
</table>

<?php require '../includes/pagination.php'; ?>
<?php require '../includes/footer.php'; ?>