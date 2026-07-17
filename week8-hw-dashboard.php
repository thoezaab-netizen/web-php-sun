<?php
session_start();

// 1. ตรวจสอบว่ามี username ใน session หรือไม่
if (!isset($_SESSION['username'])) {

    // 2. ถ้าไม่มีใน session ให้ตรวจสอบใน cookie
    if (isset($_COOKIE['username'])) {
        // ดึงมาเก็บไว้ใน session
        $_SESSION['username'] = $_COOKIE['username'];
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>หน้าแดชบอร์ด</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body text-center">

                        <?php if (isset($_SESSION['username'])): ?>

                            <h4 class="text-success">
                                ยินดีต้อนรับ <?= htmlspecialchars($_SESSION['username']) ?>
                            </h4>

                        <?php else: ?>

                            <h4 class="text-danger">โปรดล็อคอิน</h4>
                            <a href="week8-hw-login.php" class="btn btn-primary mt-3">ไปยังหน้าล็อคอิน</a>

                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>