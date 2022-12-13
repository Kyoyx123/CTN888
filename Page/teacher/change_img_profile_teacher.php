<?php
include("../connectdb.php");
session_start();
$sql = "SELECT * FROM tb_member INNER JOIN jointthectn_tb ON tb_member.member_code=jointthectn_tb.member_code where tb_member.member_code='" . $_SESSION['username'] . "'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);

if ($row['member_code'] == '') {
    $sql = "SELECT * FROM tb_member where member_code='" . $_SESSION['username'] . "'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    $conn->close();
}

if ($_SESSION['username'] != $row['member_code'] || $_SESSION['username'] == '') {
    header("location:login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบทดสอบออนไลน์</title>
    <link rel="stylesheet" href="../page.css">
    <link rel="icon" href="images/logo_computer.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<style>
    :root {
        --theme-primary: #6F1E51;
        --theme-sub: #8e44ad;
        --theme-cut: #fff;
        --theme-cut-sub: #f1c40f;
        --theme-fade-f7: #f7f7f7;
        --theme-fade-e5: #e5e5e5;
        --theme-fade-ad: #adadad;
        --danger: #EA2027;
        --warning: #FFC312;
        --success: #1abc9c;
        --info: #3498db;
        --liner1: linear-gradient(to bottom, #929b92, #a8b4b1, #c4ccce, #e2e5e7, #ffffff);
    }

    input[type=text] {
        border: 2px solid #aaa;
        width: 40%;
        font-size: 17px;
        padding: 7px;
        margin: 5px 10px;
        outline: none;
        border-radius: 4px;
        display: inline-block;
        box-sizing: border-box;
    }

    .style-icon-logout {
        margin-right: 5px;
    }

    .dashboard-bottom {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .style-icon-CPF {
        font-size: 1.3rem;
        margin-right: 5px;
    }

    .fa-pen-to-square {
        margin-right: 5px;
    }

    .button-style-change-profile {
        margin-left: 1.5rem;
        margin-right: 10px;
        background: #4fee2d;
        color: #fff;

    }

    .button-style-change-private {
        background: var(--danger);
        color: #fff;
    }
</style>

<body>

    <section class="main">
        <div class="btn btn-hamburger">
            <i class="fas fa-bars"></i>
        </div>
        <div class="sidebar">
            <div class="sidebar-top">
                <div class="sb-logo">
                    <a href="index.php">
                        <img src="../images/logo_computer.png">
                    </a>
                </div>
                <ul class="sb-ul">
                    <li>
                        <a href="teacher_page.php"><i class="fa-solid fa-user fontawesome"></i></i>โปรไฟล์</a>
                    </li>
                    
                    <li>
                    <a href="change_img_profile_teacher.php">
                            <i class="fa-solid fa-image-portrait fontawesome"></i>
                                เปลี่ยนรูปโปรไฟล์
                             </a>
                    </li>
                    <li>
                    <a href="change_profile_teacher.php">
                            <i class="fa-solid fa-pen-to-square fontawesome"></i>
                            แก้ไขข้อมูลส่วนตัว
                            </a>
                    </li>
                    <li>
                        <a href="../../Quiz/show-quiz-create/show-quiz.php">
                            <i class="fa-solid fa-file fontawesome"></i>
                            สร้างแบบทดสอบ</a>
                    </li>
                 
                </ul>
            </div>
            <div class="sidebar-bottom">
                <a href="../../login/login.php" class="btn btn-logout">
                    <i class="fa-solid fa-right-from-bracket style-icon-logout"></i>
                    ออกจากระบบ</a>
            </div>
        </div>
        <div class="dashboard">
        <form action="update_change_img_profile_teacher.php" method="post" enctype="multipart/form-data"> 
            <h1 style="text-align: center;">ข้อมูลส่วนตัว</h1>
            <br>
            <div class='data' style="display: flex; justify-content: center; margin-bottom: 10px;">
                <img class='image' src='<?php if ($row['member_img'] == '') echo '../images/img_avatar.png';
                                        else echo 'uploads/' . $row['member_img']; ?>' width='334px' height='333px'>
            </div>
            <?php
                if ($_GET['text'] != "")
                echo "<center><font color='red'>ไฟล์รูปภาพของคุณขนาดใหญ่เกินไป</font></center>"
            ?>
            
                <div style="width: 100%;margin: 10px auto;" >
                    <div style="margin: 0 auto; width: 20%;">
                        <input type="hidden" name="picname" value="<?php echo $_SESSION['username'] ?>">
                        <input type="file" name="filUpload">
                    </div>
                <div class="dashboard-bottom">
                    <button class="btn button-style-change-profile " type="submit">
                        <!-- <i class='bx bx-edit style-icon-CPF'></i> -->
                        ตกลง
                    </button>
                    </form>
                    <a href="teacher_page.php" class="btn button-style-change-private">
                        <!-- <i class="fa-solid fa-pen-to-square"></i> -->
                        ยกเลิก
                    </a>
                </div>
            </form>



        </div>
    </section>
    <script src="../page.js"></script>
</body>

</html>