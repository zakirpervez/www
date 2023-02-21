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

    public static function setCategories($connection, $articleData)
    {
       if ($articleData->categoryIds) {
           $sql = "INSERT IGNORE INTO article_category (article_id, category_id) VALUES";
           $values = [];
           foreach ($articleData->categoryIds as $category) {
               $values[] = "({$articleData->id}, ?)";
           }
           $sql .= implode(", ", $values);
           $stmt = $connection->prepare($sql);
           foreach ($articleData->categoryIds as $category => $index) {
               $stmt->bindValue($category+1, $index, PDO::PARAM_INT);
           }
           $stmt->execute();
//           $sql = "INSERT IGNORE INTO article_category (article_id, category_id)
//                VALUES ({$articleData->id}, :category_id)";
//           $stmt = $connection->prepare($sql);
//           foreach ($articleData->categoryIds as $category) {
//               $stmt->bindValue(':category_id', $category, PDO::PARAM_INT);
//               $stmt->execute();
//           }
       }
        self::deleteCategories($connection, $articleData);
    }

    public static function deleteCategories($connection, $articleData) {
        $sql = "DELETE FROM article_category WHERE article_id={$articleData->id}";
        if ($articleData->categoryIds) {
            $placeholders = array_fill(0, count($articleData->categoryIds), '?');
            $sql .= " AND category_id NOT IN (".implode(", ", $placeholders) . ")";
        }

        $stmt = $connection->prepare($sql);
        foreach ($articleData->categoryIds as $category => $index) {
            $stmt->bindValue($category+1, $index, PDO::PARAM_INT);
        }
        $stmt->execute();
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
//        $sql = "SELECT * FROM `article` ORDER BY title LIMIT :limit OFFSET :offset;";
        $sql = "SELECT a.*, category.name as category_name FROM
        (SELECT * FROM `article` ORDER BY published_at LIMIT :limit OFFSET :offset) AS a
        LEFT JOIN article_category ON a.id=article_category.article_id
        LEFT JOIN category ON category.id=article_category.category_id";

        $stmt = $connection->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        $result =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        $articles = [];
        $previous_article_id = null;
        foreach ($result as $row) {
            $articleId = $row['id'];
            if ($articleId != $previous_article_id) {
                $row['category_names'] = [];
                $articles[$articleId] = $row;
            }
            $articles[$articleId]['category_names'][] = $row['category_name'];
            $previous_article_id = $articleId;
        }
        return $articles;
    }

    public static function getTotalCount($connection)
    {
        return $connection->query($sql = "SELECT COUNT(*) FROM article")->fetchColumn();
    }

    public static function getArticlesWithCategories($connection, $id, $only_published = false)
    {
        $joinSql = "SELECT article.*, category.name AS category_name FROM article 
                    LEFT JOIN article_category ON article.id=article_category.article_id 
                    JOIN category ON category.id=article_category.category_id 
                    WHERE article.id=:id";
        if ($only_published) {
            $joinSql .= ' AND article.published_at IS NOT NULL;';
        }
        $stmt = $connection->prepare($joinSql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getCategories($connection, $id)
    {
        $joinSql = "SELECT category.* FROM category 
                    LEFT JOIN article_category ON category.id=article_category.category_id  
                    WHERE article_id=:id;";
        $stmt = $connection->prepare($joinSql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
