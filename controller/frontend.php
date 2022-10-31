<?php

require('model/frontend.php');

function listPostsPictures()
{
    $posts = getPosts();
    $postsPictures = getPictures();

    require('view/frontend/indexView.php');
}

function postPicture()
{
    $post = getPost($_GET['id']);
    $picture = getPicture($_GET['id']);

    require('view/frontend/postView.php');
}

function addDescription($title, $nickname, $content)
{
    $affectedLines = postDescription($title, $nickname, $content);

    if ($affectedLines === false) {
        die('Impossible d\'ajouter la description');
    } else {
        header('Location: index.php?action=listPostsPictures');
    }
}