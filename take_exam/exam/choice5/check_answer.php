<?php
include('connectdb.php');
$by = $_POST['by'];
$test = 'คะแนน';

for ($i=1; $i <= $by ; $i++) { 
    $answer = $_POST["anshidden".$i];
     $ans = $_POST["ans".$i];
     if($answer == $ans){
         $score++;
     }
 }

 echo "<script>window.alert('คุณได้ $score คะแนน'); window.location = '../../index_exam/index_exam.php';</script>";


?>
