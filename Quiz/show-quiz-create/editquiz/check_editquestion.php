<?php

include('connectdb.php');
    if(ISSET($_POST['submit'])){
        $sql = "SELECT * FROM ceate_quiz";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);

        $quizname = $_POST['quizname'];
        $exam = $_POST['exam'];
        $edu = $_POST['edu'];
        $quantity = $_POST['quantity'];
        $point = $_POST['point'];
        $choice = $_POST['choice'];
        $id = $_POST['id'];

        // echo $quizname."<br>";
        // echo $exam."<br>";
        // echo $edu."<br>";
        // echo $choice."<br>";
        // echo $quantity."<br>";
        // echo $point."<br>";

        $sql = "UPDATE ceate_quiz SET quizname = '$quizname', exam = '$exam', edu = '$edu', quantity = '$quantity', points = '$point', choice = '$choice' WHERE id = '$id'";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            header('location:../show-quiz.php');
          } else {
            echo "Error updating record: " . $conn->error;
          }
          $conn->close();
    }


?>
