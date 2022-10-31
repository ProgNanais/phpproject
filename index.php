<?php
require('controller/frontend.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPostsPictures') {
        listPostsPictures();
    }
    elseif ($_GET['action'] == 'postPicture') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            postPicture();
        }
        else {
            echo 'Erreur dans l\'identifiant du descriptif ou de l\'image';
        }
    }
    elseif ($_GET['action'] == 'addDescription') {
        if (!empty($_POST['title']) && !empty($_POST['nickname']) && !empty($_POST['content'])) {
            addDescription($_POST['title'], $_POST['nickname'], $_POST['content']);
        }
        else {
            echo 'Erreur : tous les champs ne sont pas remplis !';
        }
    }
}
else {
    listPostsPictures();
}