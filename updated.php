<?php

require_once "connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $champions = $_POST['champ'];
    $team = $_POST['team'];
    $fileName = $_FILES['image']['name'];
    $tempName = $_FILES['image']['tmp_name'];
    $folder = 'uploads/' . $fileName;

    $query = "UPDATE `drivers` SET `name`='$name',`description`='$description',`champ`='$champions',`team`='$team',`image`='$fileName' WHERE`id`='$id'";
    $select = mysqli_query($conn, $query);

    if (move_uploaded_file($tempName, $folder)) {
        $msg = 'Image uploaded succesfuly';
    } else {
        $msg = 'Failed to upload image';
    }

    if ($_FILES['image']['size'] > 2097152) {
        echo 'Sorry, your file is too large.';
    }

    if ($select) {
        header("Location:index.php");
    } else {
        echo 'Kindly check your query';
    }
}
