<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week4 - PHP Calculator</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; padding: 20px; }
        .container { max-width: 700px; margin: auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        h1, h2 { color: #333; }
        .box { margin-bottom: 24px; padding: 16px; border: 1px solid #ddd; border-radius: 8px; background: #fafafa; }
        label { display: block; margin-bottom: 8px; font-weight: bold; }
        input[type="number"] { width: 100%; padding: 10px; font-size: 1rem; margin-bottom: 12px; border: 1px solid #ccc; border-radius: 4px; }
        button { padding: 10px 16px; background: #007bff; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #0056b3; }
        .result { background: #e9ffe9; border: 1px solid #b6f0b6; padding: 12px; border-radius: 4px; margin-top: 12px; }
        .error { background: #ffe9e9; border: 1px solid #f0b6b6; padding: 12px; border-radius: 4px; margin-top: 12px; }
        .table-list { margin: 0; padding-left: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>PHP Web Application</h1>
        <p>เลือกใช้งาน 2 ฟังก์ชั่นด้านล่าง: เเสดงสูตรคูณ หรือ บวกเลข 2 จำนวน</p>

        <div class="box">
            <h2>1) สูตรคูณของตัวเลข</h2>
            <form method="post" action="week4.php">
                <label for="multiplication_number">ป้อนตัวเลข:</label>
                <input type="number" id="multiplication_number" name="multiplication_number" value="<?php echo isset($_POST['multiplication_number']) ? htmlspecialchars($_POST['multiplication_number']) : ''; ?>" required>
                <button type="submit" name="action" value="multiplication">แสดงสูตรคูณ</button>
            </form>

            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'multiplication'): ?>
                <?php
                    $number = filter_input(INPUT_POST, 'multiplication_number', FILTER_VALIDATE_INT);
                    if ($number === false || $number === null) {
                        echo '<div class="error">กรุณาป้อนตัวเลขจำนวนเต็มที่ถูกต้อง</div>';
                    } else {
                        echo '<div class="result">';
                        echo '<strong>สูตรคูณของ ' . $number . '</strong>';
                        echo '<ol class="table-list">';
                        for ($i = 1; $i <= 12; $i++) {
                            $product = $number * $i;
                            echo '<li>' . $number . ' x ' . $i . ' = ' . $product . '</li>';
                        }
                        echo '</ol>';
                        echo '</div>';
                    }
                ?>
            <?php endif; ?>
        </div>

        <div class="box">
            <h2>2) บวกเลข 2 ตัว</h2>
            <form method="post" action="week4.php">
                <label for="add_number1">ตัวเลขที่ 1:</label>
                <input type="number" id="add_number1" name="add_number1" value="<?php echo isset($_POST['add_number1']) ? htmlspecialchars($_POST['add_number1']) : ''; ?>" required>

                <label for="add_number2">ตัวเลขที่ 2:</label>
                <input type="number" id="add_number2" name="add_number2" value="<?php echo isset($_POST['add_number2']) ? htmlspecialchars($_POST['add_number2']) : ''; ?>" required>

                <button type="submit" name="action" value="addition">คำนวณผลรวม</button>
            </form>

            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'addition'): ?>
                <?php
                    $num1 = filter_input(INPUT_POST, 'add_number1', FILTER_VALIDATE_FLOAT);
                    $num2 = filter_input(INPUT_POST, 'add_number2', FILTER_VALIDATE_FLOAT);
                    if ($num1 === false || $num2 === false || $num1 === null || $num2 === null) {
                        echo '<div class="error">กรุณาป้อนตัวเลขที่ถูกต้องทั้งสองช่อง</div>';
                    } else {
                        $sum = $num1 + $num2;
                        echo '<div class="result">';
                        echo '<strong>ผลรวม:</strong> ' . $num1 . ' + ' . $num2 . ' = ' . $sum;
                        echo '</div>';
                    }
                ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
