<?php

//note: bcrypt hash password cannot be longer than 52 characters

if(!isset($_POST['username'])||!isset($_POST['password'])){ //isset=is set !isset=is not set
    die("Error:".var_dump($_POST));
}
//assumed that data is valid, then:
//secured session option
include_once "functions.php";
secure_session_start();

include_once "config.php";
$conn = new mysqli(SERVER_NAME,USERNAME,PASSWORD,DATABASE);//database name, username, password and database
//check the connection
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}

//statement = stmt - template of sql query
$stmt = $conn->prepare("SELECT `id`,`username`,`password` FROM `users` WHERE `username` = ?");

$stmt->bind_param("s",$_POST['username']); //"s" = one value - string, "ss" = two values - string and string
$stmt->execute();
$stmt->bind_result($id,$name,$password);
$stmt->fetch();

//succesful login leads back to homepage

if(password_verify($_POST['password'],$password)){//password comparison
    $_SESSION['id'] = $id;
    $_SESSION['username'] = $name;
    header("Location: ../admin.php");
}
//unsuccesful login leads back to sign-in page
else{
    header("Location: ../index.php");
}

$conn->close();
