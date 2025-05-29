<?php
$hostname = 'mariadb-gilman';
$username = 'root';
$password = '24434';
$database = 'museum_db';
$connection = new mysqli($hostname, $username, $password, $database);
if ($connection->connect_error) {
    die("Koneksi gagal :" . $connection->connect_error);
} 
