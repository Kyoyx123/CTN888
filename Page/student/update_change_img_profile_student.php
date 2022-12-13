<?php

  include('../connectdb.php');

  $picname = $_POST["picname"];
  $_FILES["filUpload"]["name"] = $_POST["picname"].".jpg";
  $url = $_FILES["filUpload"]["name"];
  
  if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"uploads/".$_FILES["filUpload"]["name"]))
  {
    
    include("connect_db.php");

    session_start();
    $sql = "SELECT * FROM  tb_member where member_code='".$_SESSION['username']."'";
    $result = $conn->query($sql);
    $row=mysqli_fetch_array($result);

    if($row['member_code'] == ''){
        $sql = "INSERT INTO tb_member (member_code, member_img)
        VALUES ('$member_code', '$url')";
    
        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header('location:student_page.php');
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }else{
      $sql = "UPDATE tb_member SET member_img='$url' WHERE member_code='$picname'";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            header('location:student_page.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    
  }else{
    header('location:change_img_profile_student.php?text=something');
    echo "ไฟล์รูปภาพของคุณขนาดใหญ่เกินไป";
  }
?>