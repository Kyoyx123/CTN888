<?php

include("connectdb.php");
$id = $_GET['id'];

$sql = "DELETE FROM ceate_quiz WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header('location:show-quiz.php');
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();

?>