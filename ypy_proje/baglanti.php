<?php

$conn = new mysqli("localhost", "root","", "benimki");

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

?>