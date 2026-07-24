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

    $sql ="SELECT * FROM students";
    $stmt = $pdo->query($sql);

    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($students as $student) {
        echo "ID: " . $student['id'] . "<br>";
        echo "Name: " . $student['name'] . "<br>";
        echo "Email: " . $student['email'] . "<br>";
        echo "Age: " . $student['age'] . "<br>";
        echo "Created At: " . $student['created_at'] . "<br><hr>";
    }
} catch (PDOException $e) {
    echo "เกิดข้อผิดพลาด: " . $e->getMessage();
}
