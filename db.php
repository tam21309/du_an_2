<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'du_an';
try {
    $conn = new PDO('mysql:host=localhost;dbname='.$database, $username, $password);
} catch (\Exception $e) {
    echo $e->getMessage();
    die();
}

?>