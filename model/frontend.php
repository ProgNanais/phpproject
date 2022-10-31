<?php

function getPosts()
{
    $db = dbConnect();

    $req = $db->query('SELECT id, title, nickname, content, DATE_FORMAT(content_date, \'%d/%m/%Y à %Hh%i\') AS content_date_fr FROM history_blog ORDER BY content_date');

    return $req;
}

function getPost($postId)
{
    $db = dbConnect();

    $req = $db->prepare('SELECT id, title, nickname, content, DATE_FORMAT(content_date, \'%d/%m/%Y à %Hh%i\') AS content_date_fr FROM history_blog WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;
}

function getPictures()
{
    $db = dbConnect();

    $reqPictures = $db->query('SELECT id, title, nickname, picture, picture_extension, DATE_FORMAT(picture_date, \'%d/%m/%Y à %Hh%i\') AS picture_date_fr FROM history_pictures');

    return $reqPictures;
}

function getPicture($postId)
{
    $db = dbConnect();
    $reqPicture = $db->prepare('SELECT id, title, nickname, picture, picture_extension, DATE_FORMAT(picture_date, \'%d/%m/%Y à %Hh%i\') AS picture_date_fr FROM history_pictures WHERE id = ?');

    $reqPicture->execute(array($postId));
    $picture = $reqPicture->fetch();

    return $picture;
}

function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=test;charser=utf8', 'root', '');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur :' . $e->getMessage());
    }
}

function postDescription($title, $nickname, $content)
{
    $db = dbConnect();

    $contentDescription = $db->prepare('INSERT INTO history_blog(title, nickname, content, content_date) VALUES(?, ?, ?, NOW())');
    $affectedLines = $contentDescription->execute(array($title, $nickname, $content));

    return $affectedLines;
}