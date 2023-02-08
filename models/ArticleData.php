<?php 

class ArticleData {
    public $id;
    public $title;
    public $content;
    public $published_at;
    public $image_file;

    public function setImageFile($connection, $file)
    {
        $sql = "UPDATE article SET image_file=:file WHERE id=:id";
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(':file', $file, PDO::PARAM_STR);
        $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}