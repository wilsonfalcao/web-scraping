<?php

namespace abstractions;

include __DIR__.("/ISites.php");
include __DIR__.("/Livro.php");

use ISites;

abstract class SiteMapLivroFull extends Livro implements ISites{

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
        return $this->address .= $this->ISBN;
    }

    public function CheckAddress(){
        if(!empty($this->ISBN))
            return true;
        else
            return false;
    }

}

abstract class SiteMapLivro extends LivroFull implements ISites{

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
        return $this->address .= $this->ISBN;
    }

    public function CheckAddress(){
        if(!empty($this->ISBN))
            return true;
        else
            return false;
    }

}

abstract class SiteMapLivroPrice extends LivroPrice implements ISites{

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
        return $this->address .= $this->ISBN;
    }

    public function CheckAddress(){
        if(!empty($this->ISBN))
            return true;
        else
            return false;
    }

}

