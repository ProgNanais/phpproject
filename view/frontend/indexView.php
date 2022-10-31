<?php $title = "History Short"; ?>
<?php $activeIndex = "active"; ?>

<?php ob_start(); ?>

<div class="row">
    <div class="col-lg-6">

        <?php

            while ($dataPost = $posts->fetch())
            {
        ?>

        <h2>Descriptif</h2>
        <div id="black">
            <h3 class="text-center">
                <?= htmlspecialchars($dataPost['title']) ?>
            </h3>

            <p>
                <?= nl2br(htmlspecialchars($dataPost['content'])) ?>
            </p>

            <p>
                Par <?= htmlspecialchars($dataPost['nickname']) ?><br>
                <em>le <?= $dataPost['content_date_fr'] ?></em>
            </p>
            <p>
                <a href="index.php?id=<?= $dataPost['id'] ?>&action=postPicture">Afficher</a>
            </p>
        </div>

        <?php
            }
            $posts->closeCursor();
        ?>
    </div>

    <div class="col-lg-6">
        <?php
            while ($dataPicture = $postsPictures->fetch())
            {
        ?>

        <h2>Image</h2>

        <div id="pink">
            <h3 class="text-center">
                <?= htmlspecialchars($dataPicture['title']) ?>
            </h3>
            <div>
                <div>
                    <img src="<?= htmlspecialchars($dataPicture['picture']) . '.' . htmlspecialchars($dataPicture['picture_extension']) ?>" />
                </div>
            </div>

            <p>
                Par <?= htmlspecialchars($dataPicture['nickname']) ?><br>
                <em>le <?= htmlspecialchars($dataPicture['picture_date_fr']) ?></em>
            </p>
            <p>
                <a href="index.php?id=<?= $dataPicture['id'] ?>&action=postPicture">Afficher</a>
            </p>
        </div>

        <?php
            }
            $postsPictures->closeCursor();
        ?>
    </div>
</div>
<div class="row">
    <form action="index.php?action=addDescription" method="post" class="col-lg-10 well">
        <legend>Ajouter une description</legend>
        <div>
            <label for="nickname">Pseudo</label><br>
            <input type="text" id="nickname" name="nickname" class="form-control" />
        </div>
        <div>
            <label for="title">Titre</label><br>
            <input type="text" id="title" name="title" class="form-control" />
        </div>
        <div>
            <label for="content">Description</label><br>
            <textarea id="content" name="content" class="form-control"></textarea>
        </div>
        <div>
            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok-sign"></span> Envoyer</button>
        </div>
    </form>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
