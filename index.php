<?php
session_start();
include 'db.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$is_admin = isset($_SESSION['role']) && $_SESSION['role'] == 'admin';

if ($is_admin) {
    $result = mysqli_query($conn, "SELECT tasks.*, users.username as owner, categories.name as cat_name 
                                   FROM tasks 
                                   LEFT JOIN users ON tasks.user_id = users.id 
                                   LEFT JOIN categories ON tasks.category_id = categories.id
                                   ORDER BY tasks.created_at DESC");
} else {
    $result = mysqli_query($conn, "SELECT tasks.*, users.username as owner, categories.name as cat_name 
                                   FROM tasks 
                                   LEFT JOIN users ON tasks.user_id = users.id 
                                   LEFT JOIN categories ON tasks.category_id = categories.id
                                   WHERE tasks.user_id = {$_SESSION['user_id']} 
                                   ORDER BY tasks.created_at DESC");
}

$cats = mysqli_query($conn, "SELECT * FROM categories");
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5" style="max-width:600px">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>📝 บันทึกงาน</h2>
        <div>
            <span class="badge <?= $is_admin ? 'bg-danger' : 'bg-primary' ?> me-2">
                <?= $is_admin ? 'Admin' : 'User' ?>
            </span>
            <span class="text-muted me-3">👤 <?= $_SESSION['username'] ?></span>
            <a href="logout.php" class="btn btn-sm btn-outline-danger">Logout</a>
        </div>
    </div>

    <!-- ฟอร์มเพิ่มงาน -->
    <form action="actions.php" method="POST" enctype="multipart/form-data" class="mb-4">
        <div class="mb-2">
            <input type="text" name="title" class="form-control" placeholder="พิมพ์งานที่ต้องทำ..." required>
        </div>
        <div class="mb-2">
            <label class="text-muted">🗂️ หมวดหมู่ (ไม่บังคับ)</label>
            <select name="category_id" class="form-select">
                <option value="">-- เลือกหมวดหมู่ --</option>
                <?php 
                mysqli_data_seek($cats, 0);
                while ($cat = mysqli_fetch_assoc($cats)): ?>
                <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['name']) ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-2">
            <label class="text-muted">📅 กำหนดส่ง (ไม่บังคับ)</label>
            <input type="date" name="due_date" class="form-control">
        </div>
        <div class="mb-2">
            <input type="file" name="file" class="form-control">
            <small class="text-muted">แนบไฟล์ได้ (ไม่บังคับ)</small>
        </div>
        <button type="submit" name="add" class="btn btn-primary w-100">เพิ่มงาน</button>
    </form>

    <!-- รายการงาน -->
    <?php while ($row = mysqli_fetch_assoc($result)):
        $done = $row['status'] == 1;
        $overdue = false;
        if (!empty($row['due_date']) && !$done) {
            $overdue = strtotime($row['due_date']) < strtotime(date('Y-m-d'));
        }
    ?>
    <div class="card mb-2 <?= $overdue ? 'border-danger' : '' ?>">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span style="<?= $done ? 'text-decoration:line-through; color:gray;' : '' ?>">
                        <?= htmlspecialchars($row['title']) ?>
                    </span>
                    <?php if ($is_admin && !empty($row['owner'])): ?>
                    <span class="badge bg-secondary ms-2"><?= htmlspecialchars($row['owner']) ?></span>
                    <?php endif; ?>
                    <?php if (!empty($row['cat_name'])): ?>
                    <span class="badge bg-info ms-1"><?= htmlspecialchars($row['cat_name']) ?></span>
                    <?php endif; ?>
                    <?php if (!empty($row['due_date'])): ?>
                    <br>
                    <small class="<?= $overdue ? 'text-danger fw-bold' : 'text-muted' ?>">
                        📅 กำหนดส่ง: <?= date('d/m/Y', strtotime($row['due_date'])) ?>
                        <?= $overdue ? ' ⚠️ เกินกำหนด!' : '' ?>
                    </small>
                    <?php endif; ?>
                </div>
                <div class="d-flex gap-2">
                    <a href="edit.php?edit_id=<?= $row['id'] ?>&title=<?= urlencode($row['title']) ?>" 
                       class="btn btn-sm btn-warning">แก้ไข</a>
                    <a href="actions.php?toggle=<?= $row['id'] ?>" 
                       class="btn btn-sm <?= $done ? 'btn-secondary' : 'btn-success' ?>">
                        <?= $done ? 'ยกเลิก' : 'เสร็จแล้ว' ?>
                    </a>
                    <a href="actions.php?delete=<?= $row['id'] ?>" 
                       class="btn btn-sm btn-danger"
                       onclick="return confirm('ลบงานนี้?')">ลบ</a>
                </div>
            </div>
            <?php if (!empty($row['file_path'])): ?>
            <div class="mt-2">
                <small>📎 ไฟล์แนบ: 
                    <a href="uploads/<?= htmlspecialchars($row['file_path']) ?>" target="_blank">
                        <?= htmlspecialchars($row['file_path']) ?>
                    </a>
                </small>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php endwhile; ?>

</div>
</body>
</html>