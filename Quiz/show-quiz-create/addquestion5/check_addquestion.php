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
            $choice5 = $_POST['c-5'];
            $answer = $_POST['answer'];
            

            // echo $questionname."<br>";
            // echo $choice1."<br>";
            // echo $choice2."<br>";
            // echo $choice3."<br>";
            // echo $choice4."<br>";
            // echo $choice5."<br>";
            // echo $answer."<br>";
            // echo $id;

            if($order < $count){
            $sql = "INSERT INTO question5 (questionname,choice1,choice2,choice3,choice4,choice5,answer,questionid) VALUES ('$questionname','$choice1','$choice2','$choice3','$choice4','$choice5','$answer','$id')";
            	if ($conn->query($sql) === TRUE) {
                    // echo "New record created successfully"."<br>";
                    // header('location:addquestion.php?id='.$id);
                    echo "<script>window.alert('เพิ่มคำถามเรียบร้อยแล้ว'); window.location = 'addquestion.php?id=$id';</script>";
                }else {
            	echo "Error: " . $sql . "<br>" . $conn->error;
            	}
            }else {
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                     window.alert('เพิ่มคำถามไม่ได้แล้ว')
                     window.location.href='addquestion.php?id=$id';
                     </SCRIPT>");
            }    
        }
        
    if(ISSET($_POST['delete'])){
        $sql = "SELECT * FROM question5";
        $result = $conn->query($sql);
        $row=mysqli_fetch_assoc($result);

            $id = $row['id'];
            $questionid = $_POST['id'];

            $sql = "DELETE FROM question5 WHERE id=$id";
            // echo $sql;
            	if ($conn->query($sql) === TRUE) {
                echo "<script>window.alert('ลบคำถามเรียบร้อยแล้ว'); window.location = 'addquestion.php?id=$questionid';</script>";
            	} else {
            	echo "Error: " . $sql . "<br>" . $conn->error;
            	}
        }
    $conn->close();
?>