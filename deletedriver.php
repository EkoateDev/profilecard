<?php

require_once "connection.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM `drivers` WHERE id='" . $id . "'";
    $select = mysqli_query($conn, $query);

    if ($select) {
        header("Location:index.php");
        echo 'Driver Deleted';
    } else {
        echo 'Kindly check your query';
    }
}
