<?php

include('connectdb.php');
if(isset($_POST['submit'])){
    $sql = "SELECT * FROM question";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);

    $questionname = $_POST['questionname'];
    $choice1 = $_POST['c-1'];
    $choice2 = $_POST['c-2'];
    $choice3 = $_POST['c-3'];
    $choice4 = $_POST['c-4'];
    $answer  = $_POST['answer'];
    $id = $_POST['id'];
    $questionid = $_POST['questionid'];

    // echo $questionname."<br>";
    // echo $choice1."<br>";
    // echo $choice2."<br>";
    // echo $choice3."<br>";
    // echo $choice4."<br>";
    // echo $answer."<br>";
    // echo $id;


    $sql = "UPDATE question SET questionname = '$questionname', choice1 = '$choice1', choice2 = '$choice2', choice3 = '$choice3', choice4 = '$choice4', answer = '$answer' WHERE  id = '$id' ";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header('location:../addquestion.php?id='.$questionid);
      } else {
        echo "Error updating record: " . $conn->error;
      }
    }
    
    $conn->close();

?>