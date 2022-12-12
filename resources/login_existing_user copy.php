<?php

//note: bcrypt hash password cannot be longer than 52 characters
/*
$_POST['username'];
$_POST['email'];
$_POST['password'];
*/
//checking if the fields exists -> otherwise 'die' with Data error note
if(!isset($_POST['username'])||!isset($_POST['email'])||!isset($_POST['password'])){ //isset=isset !isset=isnotset
    die("Data error");
}
//assumed that data is valid, then:
//start session
session_start();

include_once "config.php";
$conn = new mysqli(SERVER_NAME,USERNAME,PASSWORD,DATABASE);//database name, username, password and database
//check the connection
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}

//statement = stmt - template of sql query
$stmt = $conn->prepare("SELECT `id`,`username`,`email`,`password`) FROM `users` WHERE `username` = ?");
        
$stmt->bind_param("s",$_POST['username']); //"s" = one value - string, "ss" = two values - string and string
$stmt->execute();
$stmt->bind_result($id,$name,$password);
$stmt->fetch();

//succesful login leads back to homepage

if($_POST['password']==$password){//password comparison
    $_SESSION['id'] = $id;
    $_SESSION['username'] = $name;
    header("Location: ../index.php");
}
//unsuccesful login leads back to signin page
else{
    header("Location: ../signin.php");
}

$conn->close();

header("Location: signin.php");