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
    CREATE TABLE IF NOT EXISTS students(
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100),
        age INT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ";

    $pdo->exec($sql);

    echo "สร้างตารางสำเร็จ";
} catch (PDOException $e) {
    echo "เกิดข้อผิดพลาด: " . $e->getMessage();
}