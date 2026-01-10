<?php

use App\Classes\Article;
use App\Classes\ArticleTags;

require_once './../../vendor/autoload.php';
session_start();
$tags = [];
$action = $_GET['action'] ?? '';
if (!isset($action)) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}
switch ($action) {
    case 'add':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $titre = trim($_POST['titre'] ?? '');
            $texte = trim($_POST['texte'] ?? '');
            $id_theme = $_POST['id_theme'] ?? null;
            $idclient = $_POST['id_client'] ?? null;
            $tags = $_POST['tag'] ?? [];

            if (empty($titre) || empty($texte) || empty($id_theme) || empty($idclient)) {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }
                $article = new Article($titre, $texte, (int)$id_theme, (int)$idclient);
                $articleId = $article->createArticle();
                
                if (!empty($tags)) {
                    ArticleTags::addArticleTags($article, $tags);
                }

            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }
        break;
}
