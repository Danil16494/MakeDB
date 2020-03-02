<?php


class UserData
{
public function Auth($data)
{
    $stmt = $this->pdo->prepare("select * from users where login=:login and password=:password");
    if ($stmt->execute([
        "login" => $data["login"],
        "password" => $data["password"]
    ])) {
        if ($stmt != null) return $stmt->fetch();
        else return null;
    }
return null;
}
    public function getUserID($data)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE user_id=:user_id and Login=:Login");
        if ($stmt->execute(["user_id"=>$data["user_id"],"Login"=>$data["Login"]])) {
            return $stmt->fetch();
        };
        return null;
    }
}
public function insertPost($data)
{
    $stmt = $this->pdo->prepare("INSERT INTO posts (title,description,datePublication,Photo,user_id)
        values (:title,:description,:datePublication,:Photo,:user_id)");
    if ($stmt->execute([
        "title" => $data["title"],
        "description" => $data["description"],
        "datePublication" => $data["datePublication"],
        "Photo"=>$data["Photo"],
        "user_id"=>$data["user_id"]
    ])) {
        return $this->pdo->lastInsertId();
    };
    return -1;
}