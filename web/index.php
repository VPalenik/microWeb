<?php
    require_once "data.php";

    if (array_key_exists ("stranka", $_GET))
    {
        $stranka = $_GET['stranka'];
        if (!array_key_exists ($stranka, $seznamStranek))
        {
            $stranka = "404";
            http_response_code(404);
        }
    }
    else 
    {
    $stranka = array_keys($seznamStranek)[0];
    }
        
?>

<!DOCTYPE html>
<html lang="cs">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $seznamStranek[$stranka]->getTitulek();?></title>
        <meta http-equiv="X-UA-Compatibile" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="Oddíl Bobři, Bobři, 4. přístav Jana Nerudy, 4. PVS, Vodácký Oddíl, Vodní Skauti, Skauti, tlumočení, tlumočit" />
        <meta name="description" content="Překlady a překladatelské služby: překlady z angličtiny, technické překlady, a jiné překlady s využitím moderních technologií." />
        <!--Bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="files/css.css">
        <!--Favicon-->
        <link rel="icon" type="image/png" href="files/img/bobr.png">
        <!--Font Awesome-->
        <script src="https://kit.fontawesome.com/f770463624.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>    
            <div class="container-fluid">
                <div id='logo-bobri'>
                    <img src='files/img/bobr.png'>
                </div>
                <div id='logo-4pvs'>
                    <img src='files/img/4pvs.png'>
                </div>
                <a href="index.php"><div class='jumbotron text-center'>
                    <h1>Oddíl Bobři</h1><br>
                    <h2>4. přístav Jana Nerudy<h2>
                    <p>Vodní skauti</p>
                </div></a>
            </div>    
        </header>
                    
        <nav class='navbar navbar-inverse' id='navbar'>
            <div class='container' id="menu">
                <ul class='nav navbar-nav' id='myNavbar2'>
                    <?php
                        foreach ($seznamStranek as $idstranky => $parametryStranky)
                        {
                            if ($parametryStranky->getMenu() != "")
                            {
                                echo "<li><a href='?stranka=$idstranky'>{$parametryStranky->getMenu()}</a></li>";
                            }
                    }?>
                </ul>
            </div>
        </nav>
        <div class='container'>
            <nav>
                
                <section class="col-md-2 col-sm-2 sidebar">
                    <p class='lead'>Oddílové aktivity:</p>
                    <div class='list-group'>
                        <ul class="#" id="menuSideBar">
                            <?php
                                foreach ($seznamStranek as $idstranky => $parametryStranky)
                                {
                                    if ($parametryStranky->getMenuSideBar() != "")
                                    {
                                        echo "<li><a href='?stranka=$idstranky' class='list-group-item'>{$parametryStranky->getMenuSideBar()}</a></li>";
                                    }
                            }?>
                            <!--<li>
                                <form class='navbar-form' action='#' method='POST'>
                                    <input type='text' class='form-control' placeholder='Hledat'>
                                    <button type='submit' class='btn btn-primary'><span class='glyphicon glyphicon-search'></span>Hledat</button>
                                </form>
                            </li>-->
                        </ul>
                    </div>
                </section>
                    
            </nav>        
            <main>
                <div class='container' id='main'>
                    <section class="col-md-10 col-sm-10">    
                        <?php             
                            echo $seznamStranek[$stranka] -> getObsah();
                        ?>
                    </section>
                </div>        
            </main>    
        </div>        
        
        <div class='container-fluid' id='logo-bottom'>
            <div id='logo-junak'>
                <img src='files/img/junak.png'>
            </div>
            <div id='logo-p3'>
                <img src='files/img/p3.png'>
            </div>
        </div>

        <footer class="text-center">
            <nav class='navbar navbar-inverse navbar-fixed-bottom'>
                <div class='container-fluid'>
                    <ul class='nav navbar-nav' id='footer'>
                        <li><a href="#"><i class='fa fa-instagram'>Instagram</i></a></li>
                    </ul>
                    <span class='text-center' id='copy'>Copyright &copy; 2014-2021 Designed and Coded by Vladislav Páleník</span>
                    <ul class='nav navbar-nav navbar-right' id='footer'>
                        <li><a href="index.php?stranka=Kontakty">Kontakty</a></li>
                    </ul>
                </div>
                
            </nav>
        </footer>   
    </body>            

    <!-- Jquery library-->    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>    
    <!-- Bootstrap JS-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="js/ajax.js"></script>

</html>
