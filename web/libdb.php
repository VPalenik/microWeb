<?php

class db
{   
    // promenna pro uložení vytvořeného spolejí
    protected static $conn;
    
    //vytvoří spojení se serverem a vybere databázi podle parametru
    static function init($nazevDatabaze)
    {
        //self::$conn = mysqli_connect("46.229.230.163", "ec024900", "jtihatob");
        self::$conn = mysqli_connect("localhost","root");  // self přiřadí funkce přímo k sobě samé
        if (self::$conn == false)
        {
            throw new Exception ("Připojení k databázi se nezdařilo.".mysqli_connect_error());
        }
        mysqli_set_charset (self::$conn, "utf8");
        
        mysqli_select_db(self::$conn, $nazevDatabaze);
    }
    
    // provede sql dotaz a zkontroluje zda li dopadl dobře, jinak hodí vyjímku, pokud půjde o select, vrátí ple řádek 
    static function doSql($sql)
    {
        $vysledek = mysqli_query(self::$conn, $sql);
        // pokud je SQL dotaz špatný, výsledek je false
        if ($vysledek === false)                                    // !!! příkaz === posuzuje datový typ a je nutný
        {
            throw new exception ("Spatny sql: (".$sql.") Err: ".mysqli_error(self::$conn));
        }        
        elseif ($vysledek === true)
        {
            //byl proveden validní SQL dotaz, ale dotaz nevrací výsledek (nebyl to select ale update nebo cokoliv jiného není potřeba nic vracet ani dělat)
        }
        else
        {
            //byl proveden select dotaz s vysledkem chceme výsledek jako pole řádek
            $radky = array ();
            while ($radka = mysqli_fetch_assoc($vysledek))
            {
                $radky[]= $radka;
            }
            return $radky;
        }    
    }
    
    //prevede danou hodnotu na SQL reprezenzaci, NULL převede na "NULL"
    static function toSql($hodnota)
    {
        if (is_null($hodnota))
        {
            return "NULL";
        }
        elseif (is_numeric($hodnota))
        {
            return $hodnota;
        }
        elseif (is_string($hodnota))
        {
            $escapovano = mysqli_real_escape_string(self::$conn,$hodnota);
            return "'$escapovano'";
        }
        else
        {
            throw new exception("neznamy datovy typ pro prevod do SQL");
        }    
    }
}