<?php


include 'database/Database.php';

$db = new Database();

if (isset($_GET['id'])) {
    $query = "DELETE FROM students WHERE id = '" . $_GET['id'] . "'";
    $result = $db->query($query);
    header("location:index.php");
}

$db->closeConnection();