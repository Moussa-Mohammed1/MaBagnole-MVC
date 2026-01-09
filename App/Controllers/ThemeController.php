<?php

use App\Classes\Theme;

require_once './../../vendor/autoload.php';
session_start();

$action = $_GET['action'] ?? '';
if (!isset($action)) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}
switch ($action) {
    case 'add':
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
            $titre = (string)$_POST['titre'];
            $image = $_POST['image'];
            $theme = new Theme($titre, $image);
            $theme->addTheme();
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    case 'delete':
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_GET['id'];
            Theme::deleteTheme($id);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    case 'update':
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = (int)$_POST['id'];
            $titre = trim($_POST['titre']);
            $image = trim($_POST['image']);
            Theme::updateTheme($id, $titre, $image);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
