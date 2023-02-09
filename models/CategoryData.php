<?php
class CategoryData
{
//    public $id;
//    public $name;
//
//    public function __construct($id, $name)
//    {
//        $this->id = $id;
//        $this->name = $name;
//    }

    /**
     * @return mixed
     */
    public static function getCategories($connection)
    {
        $sql = "SELECT * FROM category ORDER BY name";
        $stmt = $connection->query($sql);
        $stmt->execute();
        if ($stmt->execute()) {
            return $stmt->fetchAll();
        }
    }
}