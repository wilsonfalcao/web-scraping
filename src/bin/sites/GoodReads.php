<?php

namespace SiteObject;

include __DIR__.("/abstractions/SiteMap.php");

use abstractions\SiteMapLivroFull;

class GoodReads extends SiteMapLivroFull{

    public $ISBN;

    public function __construct($NewURL = null){
        
        //Atribuindo URL para o atributo
        if(empty($this->address = $NewURL))
            $this->address = "https://www.goodreads.com/book/isbn/";

        //Iniciando regras padrões do objeto.
        $this->customBookRules();
    }

    protected function customBookRules(){

        //Serializando atributos do GetBookSites
        $this->propirtiesClass= (array)$this;

        //Definindo regra padrão.
        $this->SetRules('title','<h1 id="bookTitle" class="gr-h1 gr-h1--serif" itemprop="name">','</h1>');
        $this->SetRules('resumo','<div id="descriptionContainer">','<a data-text-id=');
        $this->SetRules('autor','"><span itemprop="name">','</span></a>');
        $this->SetRules('linguagem',"itemprop='inLanguage'>",'</div>');
        $this->SetRules('isbn13',"<span itemprop='isbn'>",'</span>');
    }
    protected function dataFormat(){

        //Tratando resumo
        if(!empty($this->resumo =str_replace("\n", "",$this->propirtiesClass["resumo"][0]))){
            $this->resumo =str_replace("</p>", "",$this->resumo);
            $this->resumo = str_replace("\\n", "", $this->resumo);
            $this->resumo = str_replace("                ", "", $this->resumo);
            $this->resumo = strip_tags($this->resumo);
            $this->resumo = substr($this->resumo,16,10000);
        }

        //Tratando ISBN13
        if(!empty($this->isbn13 =$this->propirtiesClass["isbn13"][0]))

        //Tratando Título
        if(!empty($this->title = str_replace("\n", "",$this->propirtiesClass["title"][0]))){
            $this->title = trim($this->title);
            $this->title = strval($this->title);
        }

        //Tratando Autor
        if(!empty($this->autor =str_replace("\n", "",$this->propirtiesClass["autor"][0]))){
            $this->autor = trim($this->autor);
            $this->autor = strval($this->autor);
        }

        //Tratando Linguagem
        if(!empty($this->linguagem = str_replace("Portuguese","Português",$this->propirtiesClass["linguagem"][0]))){
            $this->linguagem = trim($this->linguagem);
            $this->linguagem = strval($this->linguagem);
        }

    }

    public function Extract($HTML){

        for($i=3;$i<count($this->propirtiesClass);$i++){
            
            if(!empty($this->propirtiesClass[array_keys($this->propirtiesClass)[$i]][0])){

                $pegarelemento = explode($this->propirtiesClass[array_keys($this->propirtiesClass)[$i]][0],
                $HTML);
                
                if(isset($pegarelemento[1])){
                    $this->propirtiesClass[array_keys($this->propirtiesClass)[$i]] = 
                    explode($this->propirtiesClass[array_keys($this->propirtiesClass)[$i]][1],$pegarelemento[1]);
                }else{
                    $this->propirtiesClass[array_keys($this->propirtiesClass)[$i]] = null;
                }
            }

        }

        $this->dataFormat();

    }

}