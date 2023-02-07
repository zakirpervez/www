<?php
class UserController
{
    public static function atuhenticateUser($connection, $userData)
    {
        $sql = "SELECT * FROM user_data WHERE user_id=:username";
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(':username', $userData->userId, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'UserData');
        $stmt->execute();
        if ($dbUserData = $stmt->fetch()) {
            var_dump(password_verify($userData->password, $dbUserData->password));
            return password_verify($userData->password, $dbUserData->password);
        }
    }
}
