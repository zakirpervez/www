<?php 
ini_set('display_errors', 1);
?>
<?php if(! empty($errors)): ?>
        <label for="ul_error"> Errors</label>
        <fieldset>
            <ul id="ul_error">
                <?php foreach($errors as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </fieldset>
    <?php endif; ?>

    <form method="post">
        <div>
            <label for="title">Title</label>
            <input name="title" id="title" placeholder="Article Title" type="text" value="<?= htmlspecialchars($articleData->title); ?>"/>
        </div>
        <div>
            <label for="content">Content</label>
            <textarea id="content" name="content" placeholder="Article Content" rows="4" cols="40" ><?= htmlspecialchars($articleData->content); ?></textarea>
        </div>
        <div>
            <label for="published_at">Publication date and time</label>
            <input name="published_at" id="published_at" type="datetime-local" placeholder="Article Published Date & Time" value="<?= htmlspecialchars($articleData->published_at); ?>" />
        </div>
        <div>
            <button>Save</button>
        </div>
    </form>