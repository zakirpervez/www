<?php

class ArticleCurdOperations
{

    public static function createArticle($connection, $articleData)
    {
        $sql = "INSERT INTO 
        article (title, content, published_at) 
        VALUES (:title, :content, :published_at)";
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(':title', $articleData->title);
        $stmt->bindValue(':content', $articleData->content);
        if ($articleData->published_at == '') {
            $stmt->bindValue(':published_at', null);
        } else {
            $stmt->bindValue(':published_at', $articleData->published_at);
        }
        if ($stmt->execute()) {
            $articleData->id = $connection->lastInsertId();
            return true;
        }
    }
    /**
     * Validate the article form
     * @param string $title article title 
     * @param string $content article content 
     * @param string $published_at article published date
     * 
     * @return Validation error array
     */
    public static function validateArticle($articleData)
    {
        $errors = [];

        if ($articleData->title == null) {
            $errors[] = "Article title is required";
        }

        if ($articleData->content == null) {
            $errors[] = "Article content is required";
        }

        if ($articleData->published_at == '') {
            $errors[] = "Article date is required";
        }

        return $errors;
    }

    public static function getArticleData($connection, $id, $colSelection = '*')
    {
        $selectSingleArticleQuery = "SELECT $colSelection FROM article WHERE id=:id";
        $statement = $connection->prepare($selectSingleArticleQuery);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->setFetchMode(PDO::FETCH_CLASS, 'ArticleData');
        if ($statement->execute()) {
            return $statement->fetch();
        }
    }

    public static function getArticles($connection)
    {
        $get_all_article_query = "SELECT * FROM article";
        $get_all_article_result = $connection->query($get_all_article_query);
        $articles = $get_all_article_result->fetchAll(PDO::FETCH_ASSOC);
        return $articles;
    }

    public static function updateArticle($connection, $articleData)
    {
        $sql = "UPDATE article SET title=:title, content=:content, published_at=:published_at WHERE id=:id;";
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(':title', $articleData->title);
        $stmt->bindValue(':content', $articleData->content);
        if ($articleData->published_at == '') {
            $stmt->bindValue(':published_at', null);
        } else {
            $stmt->bindValue(':published_at', $articleData->published_at);
        }
        $stmt->bindValue(':id', $articleData->id);
        return $stmt->execute();
    }

    public static function deleteArticle($connection, $articleData)
    {
        $deleteSql = "DELETE FROM article WHERE id=:id;";
        $stmt = $connection->prepare($deleteSql);
        $stmt->bindValue(":id", $articleData->id);
        return $stmt->execute();
    }

    public static function page($connection, $limit, $offset)
    {
        $sql = "SELECT * FROM `article` ORDER BY title LIMIT :limit OFFSET :offset;";

        $stmt = $connection->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getTotalCount($connection) {
        return $connection->query($sql = "SELECT COUNT(*) FROM article")->fetchColumn();
    }

    public static function getArticlesWithCategories($connection, $id) {
        $joinSql = "SELECT article.*, category.name AS category_name FROM article 
                    LEFT JOIN article_category ON article.id=article_category.article_id 
                    JOIN category ON category.id=article_category.category_id 
                    WHERE article.id=:id;";
        $stmt = $connection->prepare($joinSql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getCategories($connection, $id) {
        $joinSql = "SELECT category.* FROM category 
                    LEFT JOIN article_category ON category.id=article_category.category_id  
                    WHERE article_id=:id;";
        $stmt = $connection->prepare($joinSql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
