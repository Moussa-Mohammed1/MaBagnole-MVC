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
    public static function addFavoris(int $id_article, int $id_user)
    {
        $pdo = Database::getInstance()->getConnection();
        $sql = 'INSERT INTO favoris(id_article, id_client)
                VALUES (?,?)';
        $st = $pdo->prepare($sql);
        $st->execute([$id_user, $id_article]);
    }

    public static function deleteFavoris(int $id_article, int $id_user)
    {
        $pdo = Database::getInstance()->getConnection();
        $sql = 'DELETE FROM favoris WHERE id_client = ? AND id_article = ?';
        $st = $pdo->prepare($sql);
        $st->execute([$id_user, $id_article]);
    }

    public static function getFavoris(int $id_user): ?array
    {
        $pdo = Database::getInstance()->getConnection();
        $sql = 'SELECT a.id_article, a.titre, a.texte, a.id_theme, a.id_client, a.created_at
                FROM favoris f
                INNER JOIN article a ON f.id_article = a.id_article
                WHERE f.id_client = ?
                ORDER BY a.created_at DESC';
        $st = $pdo->prepare($sql);
        return $st->execute([$id_user]) ? $st->fetchAll(PDO::FETCH_OBJ) : null;
    }
}
