<?php

require_once "connection.php";

$msg = "";
$name = $_POST['name'];
$description = $_POST['description'];
$champions = $_POST['champ'];
$team = $_POST['team'];
$fileName = $_FILES['image']['name'];
$tempName = $_FILES['image']['tmp_name'];
$folder = 'uploads/' . $fileName;

$sql = "INSERT INTO `drivers` (`id`, `name`, `description`, `champ`, `team`, `image`)
VALUES ('0', '$name', '$description', '$champions', '$team', '$fileName')";

if (move_uploaded_file($tempName, $folder)) {
    $msg = 'Image uploaded succesfuly';
} else {
    $msg = 'Failed to upload image';
}

if ($_FILES['image']['size'] > 2097152) {
    echo 'Sorry, your file is too large.';
}

if ($conn->query($sql) === true) {
    header('Location:index.php');
} else {
    echo 'Error: ' . $sql . '<br>' . $conn->error;
}

$conn->close();
