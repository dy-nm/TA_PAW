<?php
require_once 'base.php';
define("HOST","localhost");
define("USER","root");
define("PASS","");
define("DB_NAME","ppdb");


const OPTIONS = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO("mysql:host=".HOST.";dbname=".DB_NAME, USER, PASS, OPTIONS);
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}
