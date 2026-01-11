<?php

namespace App\Classes;

use App\Config\Database;
use PDO;
use PDOException;

class Article
{
    private $id_article;
    private $titre;
    private $texte;
    private $image;
    private $video;
    private $id_theme;
    private $id_client;

    public function __construct(string $titre, string $texte, int $id_theme, int $id_client)
    {
        $this->titre = $titre;
        $this->texte = $texte;
        $this->id_theme = $id_theme;
        $this->id_client = $id_client;
    }

    public function __get($name)
    {
        return $this->$name;
    }
    public function __set($name, $value)
    { 
        $this->$name = $value;
    }

    public function createArticle(): int|bool
    {
        $pdo = Database::getInstance()->getConnection();
        $sql = 'INSERT INTO article(titre, texte, id_theme, id_client)
                VALUES (?, ?, ?, ?)';
        $st = $pdo->prepare($sql);
        if ($st->execute([$this->titre, $this->texte, $this->id_theme, $this->id_client])) {
            $this->id_article = $pdo->lastInsertId();
            return $this->id_article;
        } else {
            return false;
        }
    }

    public static function updateArticle($titre, $texte, $id_article): bool
    {
        $pdo = Database::getInstance()->getConnection();
        $sql = 'UPDATE article SET titre = ?, texte = ? WHERE id_article = ?';
        $st = $pdo->prepare($sql);
        if ($st->execute([$titre, $texte, $id_article])) {
            return true;
        } else {
            return false;
        }
    }

    public static function deleteArticle(int $id_article): bool 
    {
        $pdo = Database::getInstance()->getConnection();
        $sql = 'DELETE FROM article WHERE id_article = ?';
        $st = $pdo->prepare($sql);
        if ($st->execute([$id_article])) {
            return true;
        } else {
            return false;
        }
    }

    public static function approveArticle($id_article): bool
    {
        $pdo = Database::getInstance()->getConnection();
        $sql = 'UPDATE article SET status = ? WHERE id_article = ?';
        $st = $pdo->prepare($sql);
        if ($st->execute(['APPROVED', $id_article])) {
            return true;
        } else {
            return false;
        }
    }

    public static function getArticlesByTheme($id_theme): ?array
    {
        $pdo = Database::getInstance()->getConnection();
        $sql = 'SELECT a.*, t.titre
                FROM article a
                LEFT JOIN theme t
                ON a.id_theme = t.id_theme
                WHERE t.id_theme = ?';
        $st = $pdo->prepare($sql);
        if ($st->execute([$id_theme])) {
            return $st->fetchAll(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }

    public static function getArticlesByTag($id_tag): ?array
    {
        $pdo = Database::getInstance()->getConnection();
        $sql = 'SELECT a.*, t.titre
                FROM article a
                LEFT JOIN tag t
                ON t.id_article = a.id_article
                WHERE t.id_tag = ?';
        $st = $pdo->prepare($sql);
        if ($st->execute([$id_tag])) {
            return $st->fetchAll(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }

    public static function getAllArticles() : ?array {
        $pdo = Database::getInstance()->getConnection();
        $sql = 'SELECT a.*, t.titre AS theme, u.nom AS author
                FROM article a
                LEFT JOIN theme t ON a.id_theme = t.id_theme
                LEFT JOIN utilisateur u ON a.id_client = u.id_user';
        $st = $pdo->prepare($sql);
        return $st->execute() ? $st->fetchAll(PDO::FETCH_OBJ) : null;
    }


    public static function getArticleById(int $id_article): ?array
    {
        $pdo = Database::getInstance()->getConnection();
        $sql = 'SELECT a.*, t.titre AS theme_name, u.nom AS author_name
                FROM article a
                LEFT JOIN theme t ON a.id_theme = t.id_theme
                LEFT JOIN utilisateur u ON a.id_client = u.id_user
                WHERE a.id_article = ?';
        $st = $pdo->prepare($sql);
        return $st->execute([$id_article]) ? $st->fetchAll(PDO::FETCH_OBJ): null;
        
    }
}
