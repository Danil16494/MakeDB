<?php


class PostData
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllPosts()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM posts ORDER BY datePublication");
        if ($stmt->execute()) {
            return $stmt->fetchAll();
        };
        return null;
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

    public function deletePost($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM posts WHERE id=:id");
        if ($stmt->execute(["id" => $id])) {
            return 1;
        };
        return -1;
    }

    public function getPostsID($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM posts WHERE id=:id");
        if ($stmt->execute(["id" => $id])) {
            return $stmt->fetch();
        };
        return null;
    }

    public function updatePost($data)
    {
        $stmt = $this->pdo->prepare("UPDATE posts  set title=:title, 
                                                description=:description,datePublication=:datePublication,Photo=:Photo WHERE id=:id");
        if ($stmt->execute([
            "id" => $data["id"],
            "title" => $data["title"],
            "description" => $data["description"],
            "datePublication" => $data["datePublication"],
            "Photo"=>$data["Photo"]
            ])) {
            return 1;
        };
        return -1;
    }
}

