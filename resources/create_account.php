<?php
//note: bcrypt hash password cannot be longer than 52 characters
/*
$_POST['username'];
$_POST['email'];
$_POST['password'];
*/
//checking if the fields exists -> otherwise 'die' with Data error note
if(!isset($_POST['username'])||!isset($_POST['email'])||!isset($_POST['password'])){
    die("Data error");
}

//assumed that data is valid, then:

include_once "config.php";
$conn = new mysqli (SERVER_NAME,USERNAME,PASSWORD,DATABASE);
//check the connection
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}

$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'],PASSWORD_BCRYPT);

$stmt = $conn->prepare("INSERT INTO `users` (`username`,`email`,`password`) VALUES (?,?,?)");
        
$stmt->bind_param("sss",$username,$email,$password);
$stmt->execute();

$conn->close();

header("Location: ../signin.php");