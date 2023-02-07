<?php $base = strtok($_SERVER['REQUEST_URI'], '?');?>
<nav>
<ul>
    <li>
        <?php if($paginator->previousPage): ?>
            <p><a href="<?= $base; ?>?page=<?= $paginator->previousPage; ?>">Previous</a></p>
        <?php else : ?>
            <p>Previous</p>
        <?php endif; ?>
    </li>
    <li>
    <?php if($paginator->nextPage): ?>
            <a href="<?= $base; ?>?page=<?= $paginator->nextPage; ?>"><p>Next</p></a>
        <?php else : ?>
            <p>Next</p>
        <?php endif; ?>
    </li>
</ul>
</nav>