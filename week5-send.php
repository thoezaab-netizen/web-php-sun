<!DOCTYPE html>
<html lang="th">

<head>

    <title>Document</title>
</head>

<body>
    <form action="week5.receive.php" method="get">
        <label>User name</label>
        <input type="text" name="Username">
        <br>

        <label>Password</label>
        <input type="password" name="UserPass">
        <br>
        <label>Email</label>
        <input type="email" name="UserEmail">
        <br>
        <label>Age</label>
        <input type="number" name="UserAge">
        <br>
        <input type="date" name="birthdate">
        <br>
        <textarea name="UserMsg"></textarea>
        <br>
        <input type="radio" name="gender" value="male"> ชาย
        <input type="radio" name="gender" value="female"> หญิง
        <br>
        <label>จังหวัด</label>
        <select name="Usercity">
            <option value="กรุงเทพ">กรุงเทพ</option>
            <option value="ไม่ระบุ">-</option>
        </select>
        <br>
        <label>งานอดิเรก</label>
        <input type="checkbox" name="hobby[]" value="football"> ฟุตบอล
        <input type="checkbox" name="hobby[]" value="basketball"> บาสเกตบอล
        <input type="checkbox" name="hobby[]" value="tennis"> เทนนิส
        <br>
        <button type="reset">ล้างข้อมูล</button>
        <button type="submit">ส่งข้อมูล</button>
   </form>
</body>

</html>