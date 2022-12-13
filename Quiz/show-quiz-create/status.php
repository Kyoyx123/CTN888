<?php
include('connectdb.php');

        
    $id = $_GET['id'];
    $status = $_GET['status'];

    // echo $id;
    // echo $status;
        $sql = "UPDATE ceate_quiz SET statuss='$status' WHERE id=$id";
        // echo $sql;
        if ($conn->query($sql) === TRUE) {
        header('location:show-quiz.php');
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }


$conn->close();


?>