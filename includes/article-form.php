<?php
ini_set('display_errors', 1);
?>
<?php if (!empty($errors)): ?>
    <label for="ul_error"> Errors</label>
    <fieldset>
        <ul id="ul_error">
            <?php foreach ($errors as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </fieldset>
<?php endif; ?>

<form method="post" id="newArticleForm">
    <div class="form-group">
        <label for="title">Title</label>
        <input name="title" id="title" placeholder="Article Title" type="text"
               value="<?= htmlspecialchars($articleData->title); ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea id="content" name="content" placeholder="Article Content" rows="4"
                  cols="40" class="form-control"><?= htmlspecialchars($articleData->content); ?></textarea>
    </div>
    <div class="form-group">
        <label for="published_at">Publication date and time</label>
        <input name="published_at" id="published_at" type="datetime-local"
               value="<?= htmlspecialchars($articleData->published_at); ?>" class="form-control"/>
    </div>
    <?php if(!empty($categories)): ?>
    <div class="form-check">
        <fieldset>
            <legend>Categories</legend>
            <?php foreach ($categories as $category) : ?>
                <div>
                    <input type="checkbox"
                           name="category[]"
                           class="form-check-input"
                           value="<?= $category['id'];?>"
                           id="<?= $category['id'];?>"
                           <?php if (in_array($category['id'], $category_ids)): ?>
                            checked
                           <?php endif; ?>
                    >
                    <label class="form-check-label" for="<?= $category['id'];?>"><?= $category['name'];?></label>
                </div>
            <?php endforeach; ?>
        </fieldset>
    </div>
    <?php endif; ?>
    <div>
        <button class="btn btn-primary">Save</button>
    </div>
</form>