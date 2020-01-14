<?php


class NoteDB implements CRUD
{
    public $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    public function add($note)
    {
        $sql = "INSERT INTO note (title, content, type_id) VALUES (?, ?, ?)";
        $stmt = $this->connect->prepare($sql);
        $title = $note->getTitle();
        $content = $note->getContent();
        $typeId = $note->getTypeId();
        $stmt->bindParam(1, $title);
        $stmt->bindParam(2, $content);
        $stmt->bindParam(3, $typeId);
        $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM note WHERE id = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
    }

    public function search($search)
    {
        $sql = "SELECT * FROM note WHERE title LIKE '%$search%' OR content LIKE '%$search%'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $arr = [];

        foreach ($result as $item) {
            $note = new Note($item["title"],$item["content"],$item["type_id"]);
            $note->setId($item["id"]);
            array_push($arr, $note);
        }
        return $arr;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM note WHERE id = $id";
        $stmt = $this->connect->query($sql);
        $result = $stmt->fetch();
        $note = new Note($result["title"],$result["content"],$result["type_id"]);
        $note->setId($result["id"]);
        return $note;
    }

    public function edit($id, $note)
    {

        $sql = "UPDATE note SET title = ?, content = ?, type_id = ? WHERE id = ?";
        $stmt = $this->connect->prepare($sql);
        $title = $note->getTitle();
        $content = $note->getContent();
        $typeId = $note->getTypeId();
        $stmt->bindParam(1, $title);
        $stmt->bindParam(2, $content);
        $stmt->bindParam(3, $typeId);
        $stmt->bindParam(4, $id);
        $stmt->execute();
    }

}