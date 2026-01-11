<?php

namespace App\Classes;

use App\Config\Database;
use PDO;
use App\Classes\Article;
use App\Classes\Tag;

use PDOException;

class ArticleTags
{
    private static function insert(Article $article, Tag $tag)
    {
        $pdo = Database::getInstance()->getConnection();
        $sql = 'INSERT INTO article_tag(id_article, id_tag)
                VALUES (?,?)';
        $st = $pdo->prepare($sql);
        $st->execute([$article->id_article, $tag->id_tag]);
    }
    public static function addArticleTags(Article $article, array $tagIds)
    {
        foreach ($tagIds as $tagId) {
            $tag = Tag::getTagById((int)$tagId);
            if ($tag) {
                self::insert($article, $tag);
            }
        }
    }

    public static function getArticleTags(int $id_article): ?array
    {
        $pdo = Database::getInstance()->getConnection();
        $sql = "SELECT t.titre, t.id_tag FROM tag t 
                INNER JOIN article_tag art ON t.id_tag = art.id_tag 
                WHERE art.id_article = ?";
        $tagStmt = $pdo->prepare($sql);
        $tagStmt->execute([$id_article]);
        $tags = $tagStmt->fetchAll(PDO::FETCH_OBJ);
        return $tags;
    }
}
