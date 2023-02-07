<?php
/**
 * Get the article based on the ID
 * @param object $connection is the connection to database
 * @param integer $id is the articles id
 * @param string $columns Optional list of columns for the select statement, By default it select all of them 
 * 
 * @return mixed an associative array containing the article with that ID, or null if not found.
 */
function getArticle($connection, $id, $columns = '*') {
    $sql = "SELECT $columns FROM article WHERE id=?";
    $statement = mysqli_prepare($connection, $sql);
    if($statement === false) {
        echo mysqli_error($connection);
    } else {
        mysqli_stmt_bind_param($statement, "i", $id);
        if(mysqli_stmt_execute($statement)){
            $result = mysqli_stmt_get_result($statement);
            return mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
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
function validateArticle($title, $content, $published_at) {
    $errors = [];
    
    if($title == null) {
        $errors[] = "Article title is required";
        }
    
    if($content == null) {
        $errors[] = "Article content is required";
    }
    
    if($published_at == '') {
        $errors[] = "Article date is required";
    }

    return $errors;
}