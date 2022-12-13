
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบทดสอบออนไลน์</title>
    <link rel="stylesheet" href="form_login.css">
    <link rel="icon" href="images/logo_computer.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="box-D"></div>

        <div class="container">
            <form action="Check_addmin_login.php" class="modal-content"  method="post">
                <div class="img-logo-header">
                    <img src="images/logo_computer.png" alt="Avatar" class="avatar style="width: 50px; height: 50px;">
                </div>
                <div class="header-login-style">
                        <h2>เข้าสู่ระบบ</h2>
                </div>

                <div class="content">
                    <div class="inputicon">
                        <label for="uname"><b>รหัสนักศึกษา</b></label>
                        <i class='bx bxs-user-circle icon-style'></i>
                        <input type="text" placeholder="ป้อนรหัสนักศึกษา" name="uname" required>
                    </div>
                    <div class="inputicon">
                        <label for="psw"><b>รหัสผ่าน</b></label>
                        <i class='bx bxs-key bx-rotate-270 icon-style'></i>
                        <input type="password" placeholder="ป้อนรหัสผ่าน" name="psw" required>
                    </div>
                    
                        <?php
                            if ($_GET['text'] != "")
                            echo "<font color='red'>Username หรือ Password ไม่ถูกต้อง</font>"
                        ?>
                    <div class="setting-continue">
                        <button type="submit" class="login-button"><i class='bx bx-log-in'></i>เข้าสู่ระบบ</button>
                        <a href="login.php" style="text-decoration: none;">
                            <div class="Go-to-login" style="text-align: center;">
                            <i class='bx bxs-home'></i>กลับหน้าแรก</div>
                        </a>
                    </div>
                </div>

            </form>
        </div>

</body>
</html>