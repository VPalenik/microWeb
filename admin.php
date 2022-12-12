<?php
    //require_once "../data.php";
    //include_once "resources/functions.php";
    include "head.inc.php";
?>

<html>
    <body>
        <section class="quickLinks">
            <h3>Rychlý přístup</h3>
            <div class="button"><a class="abutton" href="web/index.php" target="_blank">WEB</a></div>
            <div class="button"><a class="abutton" href="https://docs.google.com/spreadsheets/d/1noR_LP09e6Ki2G45p7CmGnVJcpdZBGcxwQ46XHMWA30/edit?usp=sharing" target="_blank">Přihlašování</a></div>
            <div class="button"><a class="abutton" href="#" target="_blank">Kalendář</a></div>
        </section>
        <section id="adminMenu">
            <p><b>Zvolte položku z menu a nebo vytvořte novou:</b></p>
            <h2>Horní lišta menu</h2>

                <ul id="menuStranek">       

                    <?php
                    foreach ($seznamStranek as $idstranky => $parametryStranky)
                    {
                        //vypsat vsechny polozky krome 404, ktera nema menu
                        if ($parametryStranky->getMenu() != "")
                        {
                            echo "<li data-stranka-id='$idstranky'><a class='abutton' href='?stranka=$idstranky'>{$parametryStranky->getMenu()}</a></li>";
                            echo "<li><a href='?action=delete&stranka=$idstranky'> [Odstranit]</a></li>";                
                        }
                    }

                    ?>
                </ul>
                <div class="button" class="adminMenu"><a class="abutton" href="?action=create">Vytvořit</a></div>

            <h2>Sidebar Menu</h2>

                <ul id="menuStranek">

                    <?php
                    foreach ($seznamStranek as $idstranky => $parametryStranky)
                    {
                        //vypsat vsechny polozky krome 404, ktera nema menu
                        if ($parametryStranky->getMenuSideBar() != "")
                        {
                            echo "<li data-stranka-id='$idstranky'><a class='abutton' href='?stranka=$idstranky'>{$parametryStranky->getMenuSideBar()}</a></li>";
                            echo "<li><a href='?action=delete&stranka=$idstranky'>[Odstranit]</a></li>";                
                        }
                    }

                    ?>
                </ul>
                <div class="button" class="adminMenu"><a class="abutton" href="?action=create">Vytvořit</a></div>
        </section>

        <section id="edit">    
            <?php
                if ($aktualniStranka != null)
                {
                    echo "<h1>{$aktualniStranka->getId()}</h1>";
            ?>
                    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
                    <script>tinymce.init({ 
                        selector:'textarea', 
                        plugins: 'code'
                        //plugins: 'image'
                        //menubar: 'insert',
                        //toolbar: 'image'
                    });</script>
                    <div id='edit-options'>
                    <form method="POST">
                        <b>Id</b> <input type="text" name="id" value="<?php 
                        echo htmlspecialchars($aktualniStranka->getId());
                        ?>">
                        <b>Titulek</b> <input type="text" name="titulek" value="<?php 
                        echo htmlspecialchars($aktualniStranka->getTitulek());
                        ?>">
                        <b>Menu</b> <input type="text" name="menu" value="<?php 
                        echo htmlspecialchars($aktualniStranka->getMenu());
                        ?>">
                        <b>SideBarMenu</b> <input type="text" name="menuSideBar" value="<?php 
                        echo htmlspecialchars($aktualniStranka->getMenuSideBar());
                        ?>">
                    </div>
                        <h2>Obsah</h2><textarea name="obsah"><?php 
                        echo htmlspecialchars($aktualniStranka->getObsah());
                        ?></textarea>
                            
                        <div class="button"><input type="submit" value="Potvrdit"></div>
                    </form>
            <?php    
                }
            ?>
        </section>
    </body>
</html>
    