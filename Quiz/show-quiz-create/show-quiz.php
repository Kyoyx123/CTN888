<?php
include("./connectdb.php");
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
    <title>Document</title>
    <link rel="stylesheet" href="show-quiz.css">
    <link rel="icon" href="../images/logo_computer.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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

    .btn {
        display: flex;
        justify-content: center;
        align-items: center;
        text-decoration: none;
        border: none;
        font-size: 1rem;
        border-radius: 5px;
        transition: .3s ease;
        cursor: pointer;
        padding: 10px 20px;
    }

    .btn-primary {
        background: var(--color-primary);
        color: var(--color-light);
    }

    .btn-danger {
        background: var(--danger);
        color: var(--color-light);
    }

    .btn-warning {
        background: var(--warning);
        color: #333;
    }

    .btn-success {
        background: var(--success);
        color: var(--color-light);
    }

    .btn-info {
        background: var(--info);
        color: var(--color-light);
    }

    .color-primary {
        color: var(--color-primary) !important;
    }

    .color-danger {
        color: var(--danger) !important;
    }

    .color-warning {
        color: var(--warning) !important;
    }

    .color-success {
        color: var(--success) !important;
    }

    .color-info {
        color: var(--info) !important;
    }

    .sidebar {
        max-width: 300px;
        width: 100%;
        height: 100vh;
        overflow: auto;
        background: linear-gradient(to bottom, #e9adf6, #e9c4fd, #ecd9ff, #f3ecff, #ffffff);
        padding: 0 10px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        position: fixed;
    }

    .sidebar-top,
    .sidebar-bottom {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    .fontawesome {
        font-size: 1.3rem;
        margin-right: 15px;
    }

    .sb-logo {
        width: 100px;
        height: 100px;
        margin: 30px 0;
    }

    .sb-logo img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .sb-ul {
        width: 100%;
    }

    .sb-ul li {
        list-style: none;
    }

    .sb-ul li a {
        display: flex;
        text-decoration: none;
        font-size: 1.1rem;
        font-weight: bold;
        color: #000;
        padding: 15px 30px;
        transition: .3s ease;
        border-radius: 10px;
        position: relative;
        letter-spacing: 0.3px;
    }

    .sb-ul li a:hover {
        color: #000;
        background: linear-gradient(to bottom, #f897f8, #ea7df5, #d862f4, #c446f3, #ac25f4);
        margin: 0 0 0 9px;
        transition: 0.5s ease;
    }

    .btn-logout {
        background: var(--danger);
        color: var(--theme-cut);
        border-radius: 10px;
        margin: 30px;
    }

    .btn-logout:hover {
        background: var(--theme-sub) !important;
        color: #000;
        font-weight: bold;
    }

    .dashboard {
        width: 80%;
        margin-left: 18rem;
        overflow: auto;
        background: linear-gradient(to bottom, #e4ebe4, #e8f1ef, #eff5f7, #f8fafc, #ffffff);
        padding: 30px;

    }

    .main-profile {
        margin-top: 28px;
        text-align: center;
    }

    .content-dashboard {
        background: rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        width: 100%;
        margin: auto;
    }

    .header {
        width: 50%;
        height: 9vh;
        /*background-color: #94989D;*/
        margin: 0px auto;
        border-radius: 5px;
        padding: 5px;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .content {
        width: 100%;
        height: auto;
        background-color: rgba(0, 0, 0, 0.1);
        margin: 10px auto;
        border: none;
        border-radius: 5px;
    }


    ::placeholder {
        color: #000;
    }

    .right-box-IDK {
        width: 50px;
        height: 50px;
        background: #1abc9c;

    }



    /* Full-width input fields */
    .addinput {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    /* Set a style for all buttons */
    .add {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    .add-cancel {
        background-color: #e74c3c;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    nav button:hover {
        opacity: 0.8;
    }

    /* Extra styles for the cancel button */
    .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
    }

    /* Center the image and position the close button */
    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
        position: relative;
    }

    img.avatar {
        width: 40%;
        border-radius: 50%;
    }

    .container {
        padding: 16px;
    }

    span.psw {
        float: right;
        padding-top: 16px;
    }

    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
        padding-top: 60px;
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto 15% auto;
        /* 5% from the top, 15% from the bottom and centered */
        border: 1px solid #888;
        width: 50%;
        /* Could be more or less, depending on screen size */
    }

    /* The Close Button (x) */
    .close {
        position: absolute;
        right: 25px;
        top: 0;
        color: #000;
        font-size: 35px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: red;
        cursor: pointer;
    }

    /* Add Zoom Animation */
    .animate {
        -webkit-animation: animatezoom 0.6s;
        animation: animatezoom 0.6s
    }

    @-webkit-keyframes animatezoom {
        from {
            -webkit-transform: scale(0)
        }

        to {
            -webkit-transform: scale(1)
        }
    }

    @keyframes animatezoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }

        .cancelbtn {
            width: 100%;
        }
    }

    .custom-select {
        position: relative;
        font-family: Arial;

    }

    .custom-select select {
        display: none;
        /*hide original SELECT element:*/
    }

    .select-selected {
        background-color: DodgerBlue;
    }

    /*style the arrow inside the select element:*/
    .select-selected:after {
        position: absolute;
        content: "";
        top: 14px;
        right: 10px;
        width: 0;
        height: 0;
        border: 6px solid transparent;
        border-color: #fff transparent transparent transparent;
    }

    /*point the arrow upwards when the select box is open (active):*/
    .select-selected.select-arrow-active:after {
        border-color: transparent transparent #fff transparent;
        top: 7px;
    }

    /*style the items (options), including the selected item:*/
    .select-items div,
    .select-selected {
        color: #ffffff;
        padding: 8px 16px;
        border: 1px solid transparent;
        border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
        cursor: pointer;
        user-select: none;
    }

    /*style items (options):*/
    .select-items {
        position: absolute;
        background-color: DodgerBlue;
        top: 100%;
        left: 0;
        right: 0;
        z-index: 99;
    }

    /*hide the items when the select box is closed:*/
    .select-hide {
        display: none;
    }

    .select-items div:hover,
    .same-as-selected {
        background-color: rgba(0, 0, 0, 0.1);
    }

    .class-left {
        width: 35%;
        height: 100%;
        /* background-color: red; */
    }

    .class-left-right {
        width: 100%;
        height: 100%;
        /* background-color: pink; */
        display: flex;
    }

    .class-right {
        display: flex;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        margin-top: 10px;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: center;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    .status1{
        background-color: #2ecc71;
        color: #fff;
        font-size: 15px;
        padding: 7px 10px;  
        border: none;
        border-radius: 6px;
        cursor: pointer;
        box-shadow: 2px 2px 3px #000;
        text-decoration: none;
    }
    .status0{
        background-color: red;
        color: #fff;
        font-size: 15px;
        padding: 7px 10px;  
        border: none;
        border-radius: 6px;
        cursor: pointer;
        box-shadow: 2px 2px 3px #000;
        text-decoration: none;
    }
    .add{
        background-color: #3498db;
        color: #fff;
        font-size: 15px;
        padding: 7px 10px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        box-shadow: 2px 2px 3px #000;
        text-decoration: none;
    }
    .edit{
        background-color: #e67e22;
        color: #fff;
        font-size: 15px;
        padding: 7px 10px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        box-shadow: 2px 2px 3px #000;
        text-decoration: none;
    }
    .remove{
        background-color: #e74c3c;
        color: #fff;
        font-size: 15px;
        padding: 7px 10px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        box-shadow: 2px 2px 3px #000;
    }
</style>

<body>

    <div class="sidebar">
        <div class="sidebar-top">
            <div class="sb-logo" style="width: 200px;">
                <!-- <a href="index.php"> -->

                <img class='image' src='<?php if ($row['member_img'] == '') echo './images/img_avatar.png';
                                        else echo '../../Page/teacher/uploads/' . $row['member_img']; ?>' width='167px' height='166px'>
                </a>
                <h3 style="text-align: center;"><?php echo $row['member_title'] . " " . $row['member_firstname'] . " " . $row['member_lastname'] ?></h3>
                <hr width="100%">
            </div>

            <ul class="sb-ul" style="margin-top: 10px;">
                <li style="cursor: pointer;">
                    <a href="show-quiz.php" class="" style="margin-right: 10px;">
                        <i class="fas fa-user-plus fontawesome "></i>
                        ??????????????????</a>
                </li>
                <li style="cursor: pointer;">
                    <a href="../create_quiz/create-quiz.php" class="" style="margin-right: 10px;">
                        <i class="fas fa-user-plus fontawesome "></i>
                        ?????????????????????????????????</a>
                </li>
            </ul>
        </div>
        <div class="sidebar-bottom">
            <a href="../../Page/teacher/teacher_page.php" style="margin-right: 10px;" class="btn btn-logout">
                <i class="fa-solid fa-right-from-bracket style-icon-logout"></i>
                ?????????</a>
        </div>
    </div>

    <div class="dashboard">
        <h1 style="text-align: center;">??????????????????????????????????????????</h1>
        <table>
            <tr>
                <th>??????????????????</th>
                <th>????????????????????????????????????</th>
                <th>??????????????????</th>
                <th>???????????????????????????????????????</th>
                <th>???????????????????????????????????????</th>
                <th>????????????????????????</th>
                <th>???????????????</th>
                <th>???????????????</th>
                <th>??????????????????????????????</th>
                <th>???????????????</th>
                <th>??????</th>
            </tr>
            <form action="allbutton.php" method="post">
                <?php
                include('connectdb.php');
                $sql = "SELECT * FROM ceate_quiz";
                $result = mysqli_query($conn, $sql);
                $order = 1;

                // loop ??????????????????
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <input type="hidden" value="<?php echo $row['choice']; ?>" name="choice">
                    <tr>
                        <td><?php echo $order++ ?></td>
                        <td><?php echo $row['quizname']; ?></td>
                        <td><?php echo $row['exam']; ?></td>
                        <td><?php echo $row['choice']; ?></td>
                        <td><?php echo $row['edu']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['points']; ?></td>

                        <?php if ($row['statuss'] == '1') {?>
                        <td><a href="status.php?id=<?php echo $row['id']?>&status=0" class="status1" name="status0" type="submit">????????????</a></td>
                        <?php } else { ?>
                        <td><a href="status.php?id=<?php echo $row['id']?>&status=1" class="status0" name="status1" type="submit">?????????</a></td>
                        <?php } ?>
                        <input type="hidden" value="<?php echo $row['id']?>" name="id">
                        

                        <td><a href="allbutton.php?choice=<?php echo $row['choice'] ?>&id=<?php echo $row['id'] ?>" name="add" class="add">???????????????</a></td>
                        <td><a href="./editquiz/editquestion.php?id=<?php echo $row['id']?>" name="edit" class="edit">???????????????</a></td>
                        <td><button type="submit" name="delete" class="remove" onclick="return confirm('?????????????????????????????????????????????????????????!?')">??????</button></td>
                    </tr>
                <?php } ?>
            </form>
        </table>
    </div>
    <script src="script.js"></script>
</body>

</html>