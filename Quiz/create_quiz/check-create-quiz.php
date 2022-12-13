<?php
include('connectdb.php');
session_start();

    if(ISSET($_POST['submit'])){
       
        $quizname = $_POST['quizname'];
        $type = $_POST['exam'];
        $edu = $_POST['edu'];
        $quanlity = $_POST['quanlity'];
        $point = $_POST['point'];
        $choice = $_POST['choice'];

        // echo $quizname."<br>";
        // echo $type."<br>";
        // echo $edu."<br>";
        // echo $quanlity."<br>";
        // echo $point;


        $sql = "INSERT INTO ceate_quiz (quizname,exam,edu,quantity,points,choice) VALUES ('$quizname','$type','$edu','$quanlity','$point','$choice')";
			if ($conn->query($sql) === TRUE) {
            echo ("<script LANGUAGE='JavaScript'>
                    window.alert('สร้างแบบทดสอบเรียบร้อย');
                    window.location.href='../show-quiz-create/show-quiz.php';
                    </script>");
            }else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			}
        }
    $conn->close();
?>