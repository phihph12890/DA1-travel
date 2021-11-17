<?php
try {
    $local = new PDO("mysql:host=localhost;dbname=Duan1;charset=utf8", 'root', '');
} catch (PDOException $e) {
    echo "return connect false";
}