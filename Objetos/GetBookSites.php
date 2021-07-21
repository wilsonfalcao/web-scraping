<?php

include $_SERVER['DOCUMENT_ROOT'].("/projetos/web-scraping/Interfaces/ISites.php");
include $_SERVER['DOCUMENT_ROOT'].("/projetos/web-scraping/Objetos/Livro.php");

abstract class GetBookSites extends LivroFull implements ISites{

    abstract protected function customBookRules();
    abstract protected function DataFormat();
    abstract public function Extract($HTML);
    protected $address;
    protected $propirtiesClass;

    public function SetRules($propirty, $iniRule, $endRule){

        $this->propirtiesClass[$propirty] = [$iniRule,$endRule];
        return $this->propirtiesClass;
    }

    public function URLAddress(){
        return $this->address .= $this->search;
    }

    public function Authorization(){
        if(!empty($this->search))
            return true;
        else
            return false;
    }

}