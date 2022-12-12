<?php

$contentExample = [array(
        "name" => "Měsiční kurz",
        "price" => "1600",
        "description" => "Krátký popis kurzu"
    ),
    array(
        "name" => "Měsiční kurz",
        "price" => "1600",
        "description" => "Krátký popis kurzu"
    ),
    array(
        "name" => "Měsiční kurz",
        "price" => "1600",
        "description" => "Krátký popis kurzu"
    ),
    array(
        "name" => "Měsiční kurz",
        "price" => "1600",
        "description" => "Krátký popis kurzu"
    ),
    array(
        "name" => "Měsiční kurz",
        "price" => "1600",
        "description" => "Krátký popis kurzu"
    ),
    array(
        "name" => "Měsiční kurz",
        "price" => "1600",
        "description" => "Krátký popis kurzu"
    ),
];

class Template{
    private $template;
    private $content = array();
    private $hasNext;
    private $noOfResults;
    
    public function __construct($template,$content){
        //shopuld validate arguments before we continue
        $this->load($template,$content);
    }
    
    public function __get($val){
        if($val=="hasNext"){
            return $this->val;
        }
        else if($val=="noOfResults"){
            return $this->$val;
        }
        else{
            die("Cannot acces private property template::$val");
        }
    }
    public function output(){
        if($this->hasNext){
            $record = current($this->content);
            $html = $this->template;

            //test case: $key = "name", $val = "Měsiční kurz"

            foreach($record as $key=>$val){
                $html = str_replace("{".$key."}",$val,$html);
            }
            if(!next($this->content)){
                $this->hasNext = FALSE;
            }
            return $html;
        }
        else{
            return "";
        }
    }
    public function load($template,$content){
        $this->template = file_get_contents("http://localhost/NewWebSite2020/templates/$template",true);
        //$this->template = $template;
        $this->content = $content;
        $this->hasNext = TRUE;
        $this->noOfResults = sizeof($this->content);
        if($this->noOfResults == 0){
            $this->haNext = FALSE;
            //better echo "No products found";
        }
    }
}