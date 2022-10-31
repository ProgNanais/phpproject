<?php $title = 'History Short - Article ' . $_GET['id']; ?>
<?php $activeArticle = "active"; ?>

<?php ob_start(); ?>

<p><a href="index.php">Retour</a></p>

<div>
    <h2>Descriptif</h2>
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['content_date_fr'] ?></em>
    </h3>

    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
    <p>
        <?= htmlspecialchars($post['nickname']) ?>
    </p>
    <p>
        <a href="#">Ajouter / Modifier une image</a>
    </p>
</div>

<div>
    <h2>Image</h2>
    <p>
        <img id="image" src="<?= htmlspecialchars($picture['picture']) . '.' . htmlspecialchars($picture['picture_extension']) ?>" />
    </p>
    <p>
        <?= htmlspecialchars($picture['nickname']) ?><br>
        Le <?= htmlspecialchars($picture['picture_date_fr']) ?>
    </p>
</div>


<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>