<?php

use App\Classes\Favoris;
use App\Classes\Article;
use App\Classes\Client;

require_once __DIR__ . '/../../vendor/autoload.php';

session_start();

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'delete':
        if (isset($_GET['id_article']) && isset($_GET['id_client'])) {
            $id_article = (int)$_GET['id_article'];
            $id_client = (int)$_GET['id_client'];

            Favoris::deleteFavoris($id_article, $id_client);
            header('Location: ../Views/Client/blog/favoris.php');
            exit();
        } 
        break;

    case 'add':
        if (isset($_POST['id_article']) && isset($_POST['id_client'])) {
            $id_article = (int)$_POST['id_article'];
            $id_client = (int)$_POST['id_client'];

            Favoris::addFavoris($id_article, $id_client);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        } 
        break;

    default:
        header('Location: ../Views/Client/blog/favoris.php');
        exit();
}
