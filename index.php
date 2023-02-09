<?php
require 'includes/init.php';
$connection = require 'includes/database_helper.php';
$paginator = new Paginator($_GET['page'] ?? 1, 10, ArticleCurdOperations::getTotalCount($connection));
$articles = ArticleCurdOperations::page($connection, $paginator->limit, $paginator->offset);

// Procedural way to execute the query.
// require 'includes/database.php';
// require 'includes/auth.php';
// $connection = connect_database(); //procedural way connecting database refere 'includes/database.php'.
// $get_all_article_query = "SELECT * FROM {$article_table_name}";
// $get_all_article_result = mysqli_query($connection, $get_all_article_query);
// echo mysqli_error($connection);
// if( $get_a ̰ll_article_result===false) {
//     echo mysqli_error($connection);
// } else {
//     $articles = mysqli_fetch ̰_all($get_all_article_result, MYSQLI_ASSOC);
// }
?>


<?php require 'includes/header.php' ?>
    <!-- <fieldset>
        <article>
            <h3><a href="new-article.php">Add new article</a></h3>
        </article>
        <article>
            <h3><a href="new-article-sql-injection-proof.php">Add new article sql injection proof</a></h3>
        </article>
    </fieldset> -->
    <!-- <article>
            <h3><a href="forms.php">PHP Forms</a></h3>
        </article>
        <article>
            <h3><a href="form2.php">PHP Forms 2</a></h3>
        </article>
        <article>
            <h3><a href="function-example.php">PHP Functions</a></h3>
        </article>
        <article>
            <h3><a href="form3.php">PHP Forms 3</a></h3>
        </article>
        <article>
            <h3><a href="label.php">Lables</a></h3>
        </article>
        <article>
            <h3><a href="formvalidation.php">PHP Form Validataion</a></h3>
        </article> -->
    <ul>
        <?php foreach ($articles as $article) : ?>
            <li>
                <article>
                    <a href="article-detail.php?id=<?= $article['id']; ?>">
                        <h2><?= htmlspecialchars($article['title']); ?></h2>
                    </a>
                </article>
            </li>
        <?php endforeach; ?>
    </ul>
<?php require 'includes/pagination.php'; ?>
<?php require 'includes/footer.php' ?>