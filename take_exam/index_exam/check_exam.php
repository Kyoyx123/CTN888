<?php
include('connectdb.php');

    $choice = $_GET['choice'];
    echo $choice;

    $id = $_GET['id'];
    echo $id;

    if($choice == "4 ตัวเลือก"){
        header('location:../exam/choice4/exam.php?id='.$id);
    }else if ($choice == "5 ตัวเลือก"){
        header('location:../exam/choice5/exam.php?id='.$id);
    }


    if(isset($_POST['back'])){
     header('location:../../Page/student/student_page.php');
    }

?>