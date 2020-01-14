<?php


class NoteManagement
{
    protected $noteType;
    protected $note;

    public function __construct($noteStore)
    {
        if($noteStore == "File"){
            $this->note = new NoteFile("Json/Note.json");
            $this->noteType = new NoteTypeFile("Json/NoteType.json");
            return true;
        } else {
            $db = new DBConnection("mysql:host=localhost;dbname=iNotes", "root", "Dieu1988");
            $this->noteType = new NoteTypeDB($db->connect());
            $this->note = new NoteDB($db->connect());
        }
    }



    public function getListNoteType()
    {
        $search =  isset($_GET["search"]) ? $_GET["search"] : null;
        $noteTypes = $this->noteType->search($search);
        include_once "view/NoteType/listNoteType.php";
        return $noteTypes;

    }

    public function addNoteType()
    {
        if ($_SERVER["REQUEST_METHOD"] === "GET")
            include_once "view/NoteType/addNoteType.php";
        else {
            $name = $_POST["name"];
            $description = $_POST["description"];
            $noteType = new NoteType($name);
            $noteType->setDescription($description);
            if ($name == null)
                $message = "error";
            else {
                $this->noteType->add($noteType);
                $message = "New Note type created";
            }
            include_once "view/NoteType/addNoteType.php";

        }

    }

    public function deleteNoteType()
    {
        $id = $_GET["id"];
        $noteType = $this->noteType->getById($id);
        include_once "view/NoteType/deleteNoteType.php";

    }

    public function editNoteType()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $id = $_GET["id"];
            $noteType = $this->noteType->getById($id);
            include_once "view/NoteType/editNoteType.php";
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $id = $_POST["id"];
            $name = $_POST["name"];
            $description = $_POST["description"];
            $noteType = new NoteType($name);
            $noteType->setId($id);
            $noteType->setDescription($description);
            $this->noteType->edit($id, $noteType);
            header("Location:noteType.php");
        }

    }

    public function getListNote()
    {
        $search =  isset($_GET["search"]) ? $_GET["search"] : null;
        $notes = $this->note->search($search);
        $noteTypes = $this->noteType->search($search);
        include_once "view/Note/listNote.php";

    }

    public function addNote()
    {
        $search =  isset($_GET["search"]) ? $_GET["search"] : null;
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            $noteTypes = $this->noteType->search($search);
            include_once "view/Note/addNote.php";
        } else {
            $title = $_POST["title"];
            $content = $_POST["content"];
            $typeId = $_POST["typeId"];
            $note = new Note($title, $content, $typeId);

            if ($title == null || $content == null || $typeId == null)
                $message = "error";
            else {
                $this->note->add($note);
                $message = "New Note created";
            }
            $noteTypes = $this->noteType->search($search);
            include_once "view/Note/addNote.php";

        }

    }

    public function deleteNote()
    {
        $id = $_GET["id"];
        $note = $this->note->getById($id);
        include_once "view/Note/deleteNote.php";

    }

    public function editNote()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $id = $_GET["id"];
            $note = $this->note->getById($id);
            $noteTypes = $this->noteType->search();
            include_once "view/Note/editNote.php";
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $title = $_POST["title"];
            $content = $_POST["content"];
            $typeId = $_POST["typeId"];
            $note = new Note($title, $content, $typeId);
            $this->note->edit($id, $note);
            header("Location:index.php");
        }

    }


}