<?php


class NoteTypeDB implements CRUD
{
    public $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    public function add($noteType)
    {
        $sql = "INSERT INTO note_type (name, description) VALUES (?, ?)";
        $stmt = $this->connect->prepare($sql);
        $name = $noteType->getName();
        $description = $noteType->getDescription();
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $description);
        $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM note_type WHERE id = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
    }

    public function search($search)
    {
        $sql = "SELECT * FROM note_type";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $arr = [];

        foreach ($result as $item) {
            $noteType = new NoteType($item["name"]);
            $noteType->setId($item["id"]);
            $noteType->setDescription($item["description"]);
            array_push($arr, $noteType);
        }
        return $arr;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM note_type WHERE id = $id";
        $stmt = $this->connect->query($sql);
        $result = $stmt->fetch();
        $notetype = new NoteType($result["name"]);
        $notetype->setId($result["id"]);
        $notetype->setDescription($result["description"]);
        return $notetype;
    }

    public function edit($id, $noteType)
    {

        $sql = "UPDATE note_type SET name = ?, description = ? WHERE id = ?";
        $stmt = $this->connect->prepare($sql);
        $name = $noteType->getName();
        $description = $noteType->getDescription();
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $description);
        $stmt->bindParam(3, $id);
        $stmt->execute();
    }

}