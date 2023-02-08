<?php
ini_set('display_errors', 1);
require '../includes/init.php';
AuthHelper::requireLogin();
$connection = require '../includes/database_helper.php';

$articleData = isset($_GET['id']) ? ArticleCurdOperations::getArticleData($connection, $_GET['id']) : null;
if (!$articleData) {
    die("article not found");
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    try {
        $previous_file = $articleData->image_file;
        if ($previous_file) {
            // Delete previous file
            unlink('../uploads/' . $previous_file);
        }
        if ($articleData->setImageFile($connection, null)) {
            Router::redirect('/www/admin/edit-article-image.php?id=' . $articleData->id);
        }
    } catch (Exception $e) {
        $error =  '<br> Error ' . $e->getMessage();
    }
}

?>
<?php require '../includes/header.php'; ?>

    <h2>Delete article image</h2>
    <?php if ($error): ?>
        <p><?= $error; ?></p>
    <?php endif; ?>
    <form method="post" enctype="multipart/form-data">
        <div>
            <p>Are you sure?</p>
            <p><a href="edit-article.php?id=<?= $articleData->id; ?>>">Cancel</a></p>
        </div>
        <div>
            <button>Delete</button>
        </div>
    </form>
<?php if ($articleData->image_file): ?>
    <img src="../uploads/<?= $articleData->image_file; ?>" alt="Article image">
<?php endif; ?>
<?php require '../includes/footer.php'; ?>