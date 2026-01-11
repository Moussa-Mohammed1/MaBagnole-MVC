<?php

namespace App\Classes;

use App\Config\Database;
use PDO;
use PDOException;

class Tag
{
    private $id_tag;
    private $titre;

    public function __construct($titre)
    {
        $this->titre = $titre;
    }
    public function __get($name)
    {
        return $this->$name;
    }
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function addTag(): int|bool
    {
        $pdo = Database::getInstance()->getConnection();
        $sql = 'INSERT INTO tag(titre)
                VALUES (?)';
        $st = $pdo->prepare($sql);
        return $st->execute([$this->titre]) ? $pdo->lastInsertId() : false;
    }

    public static function updateTag($titre, $id_tag): bool
    {
        $pdo = Database::getInstance()->getConnection();
        $sql = 'UPDATE tag SET titre = ? WHERE id_tag = ?';
        $st = $pdo->prepare($sql);
        return $st->execute([$titre, $id_tag]) ? true : false;
    }

    public static function deleteTag($id_tag): bool
    {
        $pdo = Database::getInstance()->getConnection();
        $sql = 'DELETE FROM tag WHERE id_tag = ?';
        $st = $pdo->prepare($sql);
        return $st->execute([$id_tag]) ? true : false;
    }

    public static function getAllTags(): ?array{
        $pdo = Database::getInstance()->getConnection();
        $sql = 'SELECT t.id_tag, t.titre, COUNT(art.id_tag) AS posts
                FROM tag t
                LEFT JOIN article_tag art
                ON t.id_tag = art.id_tag
                GROUP BY t.id_tag, t.titre';
        $st = $pdo->prepare($sql);
        return $st->execute() ? $st->fetchAll(PDO::FETCH_OBJ) : null;
    }

    public static function getTagById(int $id_tag): ?Tag
    {
        $pdo = Database::getInstance()->getConnection();
        $sql = 'SELECT * FROM tag WHERE id_tag = ?';
        $st = $pdo->prepare($sql);
        $st->execute([$id_tag]);
        $data = $st->fetch(PDO::FETCH_OBJ);
        return $date ?? null;
    }

}
