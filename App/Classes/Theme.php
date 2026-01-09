<?php

namespace App\Classes;

use PDO;
use App\Config\Database;

class Theme
{
    private $id_theme;
    private $titre;
    private $image;

    public function __construct(string $titre, string $image)
    {
        $this->titre = $titre;
        $this->image = $image;
    }

    public function addTheme() : void
    {
        $pdo = Database::getInstance()->getConnection();
        $sql = 'INSERT INTO theme(titre,image)
                VALUES (?,?)';
        $st = $pdo->prepare($sql);
        $st->execute([$this->titre, $this->image]);
    }
    public static function updateTheme(int $id_theme, string $titre, string $image)
    {
        $pdo = Database::getInstance()->getConnection();
        $sql = 'UPDATE theme SET titre = ?, image = ? WHERE id_theme = ?';
        $st = $pdo->prepare($sql);
        $st->execute([$titre, $image, $id_theme]);
    }

    public static function deleteTheme(int $id_theme) : void
    {
        $pdo = Database::getInstance()->getConnection();
        $sql = 'DELETE FROM theme WHERE id_theme = ?';
        $st = $pdo->prepare($sql);
        $st->execute([$id_theme]);
    }

    public static function getAllThemes() : ?array {
        $pdo = Database::getInstance()->getConnection();
        $sql = 'SELECT  t.image, t.id_theme, 
                        t.titre, COUNT(a.id_theme) 
                FROM theme t
                LEFT JOIN article a 
                ON t.id_theme = a.id_theme
                GROUP BY t.image, t.id_theme, t.titre';
        $st = $pdo->prepare($sql);
        return $st->execute() ? $st->fetchAll(PDO::FETCH_OBJ) : null;
    }
}
