<?php
require_once "connection.php";

$name = '';
$image = '';
$description = '';
$champions = '';
$team = '';

if (isset($_POST['name'])) {
    $name = $_POST['name'];
}

if (isset($_POST['description'])) {
    $description = $_POST['description'];
}

if (isset($_POST['champ'])) {
    $champions = $_POST['champ'];
}

if (isset($_POST['team'])) {
    $team = $_POST['team'];
}


if (isset($_FILES['image'])) {
    $errors = array();
    $allowedExtension = ['jpeg', 'jpg', 'png', 'gif'];
    $fileName = $_FILES['image']['name'];
    $fileExtension = strtolower(end(explode('.', $fileName)));

    $fileSize = $_FILES['image']['size'];
    $tempFilePath = $_FILES['image']['tmp_name'];
    // echo $tempFilePath;
    // echo '<br>';
    $path = 'images/' . $fileName;
    $type = pathinfo($tempFilePath, PATHINFO_EXTENSION);
    $data = file_get_contents($tempFilePath);
    $base64 = 'data:image/' . $type . ';base64' . base64_encode($data);
    // echo 'The Base64 file is ' . $base64;
}
if (in_array($fileExtension, $allowedExtension) === false) {
    $errors[] = 'The Extension or File you Selected is not valid';
}

if ($fileSize > (2097152)) {
    $errors[] = 'Sorry, your file is too large.';
    echo '<br>';
    echo 'File must be less tham 2mb';
    die;
}

$sql = "INSERT INTO `drivers` (`name`, `description`, `champ`, `team`, `image_name`)
    VALUES ('$name', '$description', '$champions', '$team', '$fileName')";

if (empty($errors)) {
    if (move_uploaded_file($tempFilePath, $path)); {
        echo "<script>
        alert('File Uploaded');
        </script>";
        header('location.index.php');
    }
} else {
    foreach ($errors as $error) {
        echo $error, '<br>';
    }
}

if ($conn->query($sql) === true) {
    header('Location:index.php');
} else {
    echo 'Error: ' . $sql . '<br>' . $conn->error;
}

$conn->close();
