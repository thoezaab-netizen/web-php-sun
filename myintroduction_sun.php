<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ประวัติส่วนตัว - สัณห์ สังขพงศ์</title>
    <style>
        body { margin: 0; font-family: "Sarabun", Arial, sans-serif; background: #f9fafb; color: #1f2937; }
        .card { max-width: 720px; margin: 3rem auto; padding: 2rem; background: #ffffff; border-radius: 16px; box-shadow: 0 16px 40px rgba(15,23,42,0.08); }
        h1 { margin-top: 0; color: #0f172a; }
        .field { margin-bottom: 1rem; }
        .label { display: inline-block; min-width: 135px; font-weight: 700; color: #334155; }
        .value { color: #0f172a; }
    </style>
</head>
<body>
    <div class="card">
        <?php
            $name = "นายสัณห์ สังขพงศ์";
            $student_id = "69319010025";
            $class = "สท01";
            $level = "ปวส.1";
            $age = 18;
            $description = "ฉันกำลังศึกษาในระดับ ปวส.1 สาขาเทคโนโลยีสารสนเทศ เพื่อพัฒนาทักษะด้านการพัฒนาเว็บและงานไอที";
        ?>
        <h1>ประวัติส่วนตัว</h1>
        <div class="field"><span class="label">ชื่อ :</span> <span class="value"><?php echo $name; ?></span></div>
        <div class="field"><span class="label">รหัสนักศึกษา :</span> <span class="value"><?php echo $student_id; ?></span></div>
        <div class="field"><span class="label">ห้อง :</span> <span class="value"><?php echo $class; ?></span></div>
        <div class="field"><span class="label">ระดับการศึกษา :</span> <span class="value"><?php echo $level; ?></span></div>
        <div class="field"><span class="label">อายุ :</span> <span class="value"><?php echo $age; ?> ปี</span></div>
        <div class="field"><span class="label">เกี่ยวกับฉัน :</span> <span class="value"><?php echo $description; ?></span></div>
    </div>
</body>
</html>
