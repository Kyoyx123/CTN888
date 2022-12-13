<?php
include("connectdb.php");

$strUsername = $_POST['uname'];
$strPassword = $_POST['psw'];

if ($_POST != "admin"){
	$sql = "SELECT * FROM tb_member where member_code='$strUsername'";
	$result = $conn->query($sql);
	$row=mysqli_fetch_array($result);
	$conn->close();
}

session_start();
 if($strUsername == "admin" && $strPassword == "admin"){
	$_SESSION["username"] = $strUsername;
	session_write_close();
	
	//*** Go to Main page
	header("location:../Page/addmin_page.php");
}
else{
	header("location:login_addmin.php?text=somethingwrong");
	exit();
	// header("location:login.php");
}


?>