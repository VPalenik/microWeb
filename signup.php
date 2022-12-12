<?php
    //session_start();//starts session for logged in user
    include "head.inc.php";
?>

    <!--HEADER-->
    <header>
        <div class='container'>
            <h1>Vytvořte účet</h1>
        </div>    
    </header>
    <!--MAIN-->
    <main class='container'>
        <form action='resources/create_account.php' method='POST'>
            <div class='form-group'>
                <label for='username'>Username:</label>
                <input id='username' type='text' class='form-control' name='username'>
            </div>
            <div class='form-group'>
                <label for='email'>Email:</label>
                <input id='email' type='text' class='form-control' name='email'>
            </div>
            <div class='form-group'>
                <label for='password'>Password:</label>
                <input id='password' type='password' class='form-control' name='password'>
            </div>
            
            <button type='submit' class='btn btn-primary'>Vytvořit účet</button>
        </form>
        <hr>
    </main>
    <!--FOOTER-->
