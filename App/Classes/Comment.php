<?php

namespace App\Classes;

use PDO;
use PDOException;
use App\Config\Database;

class Comment
{
    private $id_comment;
    private $texte;
    private $id_client;
    private $id_article;

    public function __construct(string $texte, int $id_client, int $id_article)
    {
        $this->texte = $texte;
        $this->id_client = $id_client;
        $this->id_article = $id_article;
    }

    public function __get($name)
    {
        return $this->$name;
    }
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function addComment(): bool
    {
        $pdo = Database::getInstance()->getConnection();
        $sql = 'INSERT INTO comment(texte, id_client, id_article)
                VALUES (?,?,?)';
        $st = $pdo->prepare($sql);
        if ($st->execute([$this->texte, $this->id_client, $this->id_article])) {
            $this->id_comment = $pdo->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public static function updateComment($texte, $id_comment): bool
    {
        $pdo = Database::getInstance()->getConnection();
        $sql = 'UPDATE comment SET texte = ? WHERE id_comment = ?';
        $st = $pdo->prepare($sql);
        if ($st->execute([$texte, $id_comment])) {
            return true;
        } else {
            return false;
        }
    }

    public static function deleteComment($id_comment): bool
    {
        $pdo = Database::getInstance()->getConnection();
        $sql = 'UPDATE  comment SET deleted_at = NOW() WHERE id_comment = ?';
        $st = $pdo->prepare($sql);
        if ($st->execute([$id_comment])) {
            return true;
        } else {
            return false;
        }
    }

    public static function getCommentByArticle($id_article): ?array
    {
        $pdo = Database::getInstance()->getConnection();
        $sql = 'SELECT c.*, u.nom AS user_name 
                FROM comment c
                LEFT JOIN utilisateur u ON c.id_client = u.id_user
                WHERE c.id_article = ? AND c.deleted_at IS NULL
                ORDER BY c.created_at DESC';
        $st = $pdo->prepare($sql);
        if ($st->execute([$id_article])) {
            return $st->fetchAll(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }

    public static function getAllComments(): ?array
    {
        $pdo = Database::getInstance()->getConnection();
        $sql = 'SELECT c.*, u.nom, u.email, a.titre AS article
                FROM comment c
                LEFT JOIN utilisateur u ON c.id_client = u.id_user
                LEFT JOIN article a ON c.id_article = a.id_article';
        $st = $pdo->prepare($sql);
        return $st->execute() ? $st->fetchAll(PDO::FETCH_OBJ) : null;
    }
}
