<?php
require_once 'env.php';
ini_set('display_errors', true);
function connection()
{
    $host = DB_HOST;
    $db = DB_NAME;
    $user = DB_USER;
    $pass =DB_PASS;

    $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

    try {
        $pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        return $pdo;
    } catch(PDOException $e) {
        print "接続失敗". $e->getMessage();
        exit();
    }
}
