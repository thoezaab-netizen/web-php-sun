<?php
$host = 'localhost';
$dbname = 'school';
$username = 'root';
$password = '';


try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );

    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    $sql = "
    CREATE DATABASE IF NOT EXISTS school
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;";

    $pdo->exec($sql);

    echo "สร้างฐานข้อมูลสำเร็จ";
} catch (PDOException $e) {
    die("เกิดข้อผิดพลาด: " . $e->getMessage());
}
