<?php

namespace App\Classes;

use App\Config\Database;
use App\Classes\Article;
use PDO;
use PDOException;
use App\Classes\Utilisateur;
use Client;

class Favoris
{
    public static function addFavoris(Article $a, Client $c) {
        $pdo = Database::getInstance()->getConnection();
        $sql = 'INSERT INTO favoris(id_article, id_client)
                VALUES (?,?)';
        $st = $pdo->prepare($sql);
        $st->execute([$a->id_article, $c->id_user]);
    }

    public static function deleteFavoris(Article $a, Client $c) {
        $pdo = Database::getInstance()->getConnection();
        $sql = 'DELETE FROM favoris WHERE id_client = ? AND id_article = ?';
        $st = $pdo->prepare($sql);
        $st->execute([$c->id_user, $a->id_article]);
    }
}
