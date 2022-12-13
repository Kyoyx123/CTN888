<?php

include('../connectdb.php');
session_start();

    if(ISSET($_POST['submit'])){

                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $phone_number = $_POST['phone-number'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $id = $_POST['id'];
                
                echo $id;
                $sql = "UPDATE tb_member SET member_mobile = '$phone_number' WHERE member_id = '$id'";
                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully"."<br>";
                    header('location:teacher_page.php');
                } else {    
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
        }
    $conn->close()
?>