<?php
session_start();

include_once "controller/NoteManagement.php";
include_once "model/class/CRUD.php";
include_once "model/class/Note.php";
include_once "model/class/NoteType.php";
include_once "model/database/DBConnection.php";
include_once "model/database/NoteDB.php";
include_once "model/database/NoteTypeDB.php";
include_once "model/file/JsonConnection.php";
include_once "model/file/NoteFile.php";
include_once "model/file/NoteTypeFile.php";

$notesManager = new NoteManagement($_SESSION["noteStore"]);

if(isset($_POST["noteStore"])){
    $_SESSION["noteStore"] = $_POST["noteStore"];
}

$notesManager = new NoteManagement($_SESSION["noteStore"]);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>iNote</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        img{
            width: 50px;
            height: 50px;
        }

    </style>
</head>
<body>
<div class="container">
    <?php include_once "layout/menu.php" ?>

    <?php
    $page = isset($_REQUEST["page"]) ? $_REQUEST["page"] : null;

    switch ($page) {
        case "addNote":
            $notesManager->addNote();
            break;
        case 'deleteNote':
            $notesManager->deleteNote();
            break;
        case 'editNote':
            $notesManager->editNote();
            break;
        default:
            $notesManager->getListNote();
    }


    ?>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>