<?php
include('connectdb.php');
session_start();

    if(ISSET($_POST['create'])){
            $id = $_POST['id'];
            $sql = "SELECT * FROM ceate_quiz WHERE id = '$id'";
            $result = mysqli_query($conn, $sql);
            $row=mysqli_fetch_assoc($result);
            $count = $row['quantity'];
            $order = $_POST['order'];

            $questionname = $_POST['questionname'];
            $choice1 = $_POST['c-1'];
            $choice2 = $_POST['c-2'];
            $choice3 = $_POST['c-3'];
            $choice4 = $_POST['c-4'];
            $answer = $_POST['answer']; 
            
            
            // echo "คำถาม = ".$questionname."<br>";
            // echo "ตัวเลือก 1 = ".$choice1."<br>";
            // echo "ตัวเลือก 2 = ".$choice2."<br>";
            // echo "ตัวเลือก 3 = ".$choice3."<br>";
            // echo "ตัวเลือก 4 = ".$choice4."<br>";
            // echo "คำตอบ = ".$answer."<br>";
            // echo "id = ".$id."<br>";
            // echo "จำนวนคำถามที่กำหนดไว้ = ".$count."<br>";
            // echo "จำนวนคำถามที่สร้างแล้ว = ".$order."<br>";

            if($order < $count){
            $sql = "INSERT INTO question (questionname,choice1,choice2,choice3,choice4,answer,questionid) VALUES ('$questionname','$choice1','$choice2','$choice3','$choice4','$answer','$id')";
            	if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('เพิ่มคำถามเรียบร้อยแล้ว'); window.location = 'addquestion.php?id=$id';</script>";
                }else {
            	echo "Error: " . $sql . "<br>" . $conn->error;
            	}
            }
            else{
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                     window.alert('เพิ่มคำถามไม่ได้แล้ว')
                     window.location.href='addquestion.php?id=$id';
                     </SCRIPT>");
            }    
        } 

    if(ISSET($_POST['edit'])){
        header('location:./editequestion/editequestion.php');
    }

    if(ISSET($_POST['delete'])){
        $sql = "SELECT * FROM question";
        $result = mysqli_query($conn, $sql);
        $row=mysqli_fetch_assoc($result);

        $id = $_POST['id2'];
        $questionid = $row['questionid'];
        $id2 = $_POST['id'];
        // echo $id;
        
        $sql = "DELETE FROM question WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
        echo "<script>window.alert('ลบข้อสอบเรียบร้อยแล้ว'); window.location = 'addquestion.php?id=$id2';</script>";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }


    $conn->close();
?>