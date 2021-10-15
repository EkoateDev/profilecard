<?php

require_once "connection.php";

$msg = "";
$name = $_POST['name'];
$description = $_POST['description'];
$champions = $_POST['champ'];
$team = $_POST['team'];
$fileName = $_FILES['image']['name'];
$tempFilePath = $_FILES['image']['tmp_name'];
$path = 'uploads/' . $fileName;

if ($_FILES['image']['size'] > (2097152 / 2)) {
    echo 'Sorry, your file is too large.';
    die;
}

$sql = "INSERT INTO `drivers` (`name`, `description`, `champ`, `team`, `image`)
VALUES ('$name', '$description', '$champions', '$team', '$fileName')";



if (move_uploaded_file($tempFilePath, $path)) {
    $msg = 'Image uploaded succesfuly';
} else {
    $msg = 'Failed to upload image';
}


if ($conn->query($sql) === true) {
    header('Location:index.php');
} else {
    echo 'Error: ' . $sql . '<br>' . $conn->error;
}

$conn->close();
