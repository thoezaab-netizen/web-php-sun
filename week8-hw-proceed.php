<?php
session_start();

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$remember = isset($_POST['remember']);

if ($username === 'admin' && $password === 'admin1234') {

    // เก็บ username ไว้ใน session
    $_SESSION['username'] = $username;

    // ถ้าติ๊ก remember me ให้บันทึก username ไว้ใน cookie (30 วัน)
    if ($remember) {
        setcookie('username', $username, time() + (30 * 24 * 60 * 60), "/");
    }

    echo "ล็อคอินสำเร็จ";

} else {
    echo "ล็อคอินไม่สำเร็จ";
}
?>