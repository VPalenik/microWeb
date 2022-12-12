<?php
    //secured session option
    include_once "resources/functions.php";
    secure_session_start();
    $_SESSION = array();
    $params = session_get_cookie_params();
    //unset the session cookie by setting a time in the distant past
    setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"],$params["secure"],$params["httponly"]);
    session_destroy();
?>

<?php
    include_once ("head.inc.php");
?>
    <!--HEADER-->
    <header>
        <div class='container'>
            <h1>Ohlášení</h1>
        </div>    
    </header>
    <!--MAIN-->
    <main class='container'>
        <p>Byli jste úspěšně odhlášni</p>
        <a href='signin.php' class='btn btn-primary'>Znovu se přihlásit</a>
    </main>
    <!--FOOTER-->
