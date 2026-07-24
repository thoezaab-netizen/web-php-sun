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
    UPDATE students
    SET age = 21
    WHERE id = 5
    ";

    $pdo->exec($sql);
    echo "อัปเดตข้อมูลสำเร็จ";
} catch (PDOException $e) {
    echo "เกิดข้อผิดพลาด: " . $e->getMessage();
}
