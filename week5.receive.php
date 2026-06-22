<?php
$name = $_GET["Username"];
$password = $_GET["UserPass"];
$email = $_GET["UserEmail"];
$age = $_GET["UserAge"];
$birthdate = $_GET["birthdate"];
$gender = $_GET["gender"];
$city = $_GET["Usercity"];
$hobby = $_GET["hobby"];
$message = $_GET["UserMsg"];
echo "สวัสดีคุณ $name<br> ";
echo "รหัสผ่านของคุณคือ $password<br>";
echo "อีเมลของคุณคือ $email<br>";
echo "อายุของคุณคือ $age<br>";
echo "วันเกิดของคุณคือ $birthdate<br>";
echo "เพศของคุณคือ $gender<br>";
echo "จังหวัดของคุณคือ $city<br>";
echo "งานอดิเรกของคุณคือ " . implode(", ", $hobby) . "<br>";       
echo "ข้อความของคุณคือ " . $_GET["UserMsg"] . "<br>";