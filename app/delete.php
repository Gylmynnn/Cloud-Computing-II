<?php
include 'config.php';
$id = $_GET['id'];
$connection->query("DELETE FROM collections WHERE id = $id");
header('Location:index.php');
