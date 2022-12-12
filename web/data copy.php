<?php //uložené položky menu

require_once 'libdb.php';
DB::init("db010867");

class Stranka
{
    protected $id;
    protected $titulek;
    protected $menu;
    protected $menuSideBar;
    function __construct($id, $titulek, $menu, $menuSideBar) 
    {
        $this ->id=$id;
        $this ->titulek=$titulek;
        $this ->menu=$menu;
        $this ->menuSideBar=$menuSideBar;
    }
    function getId()
    {
        return $this->id;
    }
    function setId($id)
    {
        $this->id=$id;
    }
        
    function getTitulek()
    {
        return $this->titulek;
    }
    function setTitulek($titulek)
    {
        $this->titulek=$titulek;
    }
    function getMenu()
    {
        return $this->menu;
    }
    function setMenu($menu)
    {
        $this->menu=$menu;
    }
    function getmenuSideBar()
    {
        return $this->menuSideBar;
    }
    function setmenuSideBar($menuSideBar)
    {
        $this->menuSideBar=$menuSideBar;
    }
    
    function getObsah()
    {       //pokud není Id, pak není co hledat
        if ($this->id == '')
        {
            return "";
        }    
        // return file_get_contents($this->id.".html");     Zakomentovano, aby se zprovoznilo načítání SQL
        $radky = DB::doSql($sql = "SELECT obsah FROM stranka WHERE id=".DB::toSql($this->id));
        return $radky[0]["obsah"];
    }
    function setObsah($obsah)
    {
        //file_put_contents($this->id.".html", $obsah);     Zakomentovano, aby se zprovoznilo načítání SQL
        DB::doSql("UPDATE stranka SET obsah=".DB::toSql($obsah)."WHERE id=".DB::toSql($this->id));
    }  //definice funkce delete
    function delete ()
    {
        DB::doSql("DELETE FROM stranka WHERE id=".DB::toSql($this->id));
    }
    function save ($puvodniId)
    {   
        if ($puvodniId)
        {    
        /*DB::doSql("UPDATE stranka set id=".DB::toSql($this->getId()).",titulek=".DB::toSql($this->getTitulek()).",menu=".DB::toSql($this->getMenu()));*/
        
        //stejný zápis "jednodušeji"
        $sql = sprintf(
                "UPDATE stranka set id=%s,titulek=%s,menu=%s,menuSideBar=%s WHERE id=%s",
                DB::toSql($this->getId()),
                DB::toSql($this->getTitulek()),
                DB::toSql($this->getMenu()),
                DB::toSql($this->getmenuSideBar()),
                DB::toSql($puvodniId)
                );
                DB::doSql($sql);
        }
        else
        {
            $sql = sprintf(
                "INSERT INTO stranka SET id=%s,titulek=%s,menu=%s,menuSideBar=%s",
                DB::toSql($this->getId()),
                DB::toSql($this->getTitulek()),
                DB::toSql($this->getMenu()),
                DB::toSql($this->getMenuSideBar())    
                );
                DB::doSql($sql);
        }
    }
    // následující funkce uloží pořadí stránek, tak jak byli navoleny v admin.php
    static function ulozPoradi ($poradi){
        //$poradi = array ("cenik", "kontakt");
        $pocitadlo = 0;
        foreach ($poradi as $idstranky)
        {
            DB::doSql ("UPDATE stranka SET poradi=".DB::toSql($pocitadlo)." WHERE id=".DB::toSql($idstranky));
            $pocitadlo++;
        }
        
    }

}

// načteme seznam stranek dynamicky z databáze
$stranky = DB::doSql("SELECT * FROM stranka ORDER BY poradi");
$seznamStranek = array ();
foreach ($stranky as $zaznam)
{
    $seznamStranek[$zaznam['id']] = new Stranka($zaznam['id'], $zaznam['titulek'], $zaznam['menu'], $zaznam['menuSideBar']);
}


