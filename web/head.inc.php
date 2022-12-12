<?php
    //secured session option
    include_once "../resources/functions.php";
    require_once "data.php";
    secure_session_start();
    //session_start(); starts session for logged in user
?>
<!DOCTYPE html>
<html lang="cs">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <meta http-equiv="X-UA-Compatibile" content="IE=edge"> <!-- zpetna kompatibilata pro edge-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="files/css.css">
        <!--Favicon-->
        <link rel="icon" type="image/png" href="files/img/bobr.png">
        <!--Font Awesome-->
        <script src="https://kit.fontawesome.com/f770463624.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top"> <!--navbar-fixed-Top - stays on top even while scrolling down, navbar-inverse - inverse colors-->
            <div class="container-fluid">
                <header class='navbar-header'>
                    <a class='navbar-brand' href='index.php'>Domů</a>
                </header>
                <div class='collapse navbar-collapse' id='myNavbar'>
                    <ul class='nav navbar-nav navbar-right'>
                        <?php
                            if(isset($_SESSION['id'])){
                                echo "<li><a href='signout.php'><span class='glyphicon glyphicon-user'></span>Odhlásit se</a></li>";
                            }
                            else{
                                echo "<li><a href='index.php'><span class='glyphicon glyphicon-user'></span>Přihlásit se</a></li>";
                            }
                        ?>
                    </ul>    
                </div>
            </div>
        </nav>