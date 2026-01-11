<?php

use App\Classes\Favoris;
use App\Classes\Article;
use App\Classes\Client;

require_once __DIR__ . '/../../vendor/autoload.php';

session_start();

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'toggle':
        if (isset($_GET['id_article']) && isset($_GET['id_client'])) {
            $id_article = (int)$_GET['id_article'];
            $id_client = (int)$_GET['id_client'];

            if (Favoris::isFavorite($id_article, $id_client)) {
                Favoris::deleteFavoris($id_article, $id_client);
            } else {
                Favoris::addFavoris($id_article, $id_client);
            }
            header('Location: ../Views/Client/blog/ArticlesList.php');
            exit();
        }
        break;

    default:
        header('Location: ../Views/Client/blog/favoris.php');
        exit();
}
