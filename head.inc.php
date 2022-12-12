<?php
    require_once "web/data.php";
    //secured session option
    include_once "resources/functions.php";
    secure_session_start();
    //session_start(); starts session for logged in user
    
            // prace pro prihlasene uzivatele

        if (isset($_SESSION['id'])){ //(isset($_SESSION['id']) OR (array_key_exists('prihlasen', $_SESSION))
            $aktualniStranka = null;
            // pokud je v url vybrana stranka
            if (array_key_exists('stranka', $_GET))
            {
                // do promennne si ulozim objekt aktualni stranky
                $aktualniStranka = $seznamStranek[ $_GET['stranka'] ];
            }

            //zjištění zda li přišel parametr action
            if (array_key_exists("action", $_GET))
                {
                    $action = $_GET['action'];
                        if ($action=="create")
                                {
                                    $aktualniStranka = new Stranka('', '', '', '', '');
                                } //nastavení funkce delete, která je definována v data.php
                            else if ($action=="delete")
                                {
                                    $aktualniStranka->delete();
                                    header ("location: ?");
                                    exit;
                                }//uložení nastavení pořadí stránek v admin rozhraní
                            else if ($action=='nastavPoradi')       
                                {
                                    Stranka::ulozPoradi($_POST['poradi']);
                                    echo "OK";
                                    exit;
                                }   
                }
            if (array_key_exists('obsah', $_POST))
                {
                    $puvodniId = $aktualniStranka->getId();
                    $aktualniStranka->setId($_POST['id']);
                    $aktualniStranka->setTitulek($_POST['titulek']);
                    $aktualniStranka->setMenu($_POST['menu']);
                    $aktualniStranka->setMenuSideBar($_POST['menuSideBar']);
                    $aktualniStranka->save($puvodniId);
                    $aktualniStranka->setObsah($_POST['obsah']);

                    // Přesměrování nového Id
                    header("location: ?stranka=".$aktualniStranka->getId());
                    exit;
                }
        }
?>

    
    <!-- Script pro přetahování položek v menu myší -->
<html>
    <head> 
        <meta charset="utf-8"/>
        <title>Administrace</title>
        <meta http-equiv="X-UA-Compatibile" content="IE=edge"> <!-- zpetna kompatibilata pro edge-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="web/files/css.css">
        <link rel="stylesheet" href="resources/admin.css">
        <!--Favicon-->
        <link rel="icon" type="image/png" href="web/files/img/bobr.png">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="resources/admin.js"></script>
    </head>
    <body>
        <header>    
            <div class="container-fluid">
                <div id='logo-bobri'>
                    <img src='web/files/img/bobr.png'>
                </div>
                <div id='logo-4pvs'>
                    <img src='web/files/img/4pvs.png'>
                </div>
                <!--<a href="web/index.php">--><div class='jumbotron text-center'>
                    <h1>Oddíl Bobři</h1><br>
                    <h2>4. přístav Jana Nerudy<h2>
                    <p>Vodní skauti</p><!--jumbotron is a great place for placing keywords-->
                </div><!--</a>-->
            </div>    
        </header>
        <nav class="navbar navbar-inverse navbar-fixed-top"> <!--navbar-fixed-Top - stays on top even while scrolling down, navbar-inverse - inverse colors-->
            <div class="container-fluid">
            <!--<div class="container-fluid">-->
                <header class='navbar-header'>
                    <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
                    <!--<span class='glyphicon glyphicon-menu-hamburger'></span> for responsive, while shrinking it will hide menu items under this icon-->
                    <!--for better visibility - workaround-->
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                    </button>
                    <!--<a class='navbar-brand' href='web/index.php'>Domů</a>-->
                </header>
            <!--</div>-->    
                <div class='collapse navbar-collapse' id='myNavbar'>
                    
                    <ul class='nav navbar-nav navbar-right'>
                        <?php
                            if(isset($_SESSION['id'])){
                                echo "<li><a href='signout.php'><span class='glyphicon glyphicon-user'></span>Odhlásit se</a></li>";
                            }
                            else{
                                echo "<li><a href='signin.php'><span class='glyphicon glyphicon-user'></span>Přihlásit se</a></li>";
                            }
                        ?>
                    </ul>    
                </div>
            </div>
        </nav>