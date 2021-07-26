<?php

namespace SiteObject;

include __DIR__.("/abstractions/SiteMap.php");

use abstractions\SiteMapLivroPrice;

class Amazon extends SiteMapLivroPrice{

    public $ISBN;

    public function __construct($NewURL = null){
        
        //Atribuindo URL para o atributo
        if(empty($this->address = $NewURL))
            $this->address = "http://api.scraperapi.com/?api_key=413056bb17e6fa1ac07d108bd09fa0b8&url=https://www.amazon.com.br/dp/";

        //Iniciando regras padrões do objeto.
        $this->customBookRules();
    }

    protected function customBookRules(){

        //Serializando atributos do GetBookSites
        $this->propirtiesClass= (array)$this;

        //Definindo regra padrão.
        $this->SetRules('title','<span id="productTitle" class="a-size-extra-large">','</span>');
        $this->SetRules('price_capaComun','a-size-base a-color-price a-color-price">','</span>');
    }
    protected function dataFormat(){

        //Tratando Título
        if(!empty($this->propirtiesClass["title"][0])){
            $this->title = $this->propirtiesClass["title"][0];
            $this->title = trim($this->title);
            $this->title = strval($this->title);
        }

        //Tratando Capa Comun
        if(!empty($this->propirtiesClass["price_capaComun"][0])){
            $this->price_capaComun =$this->propirtiesClass["price_capaComun"][0];
            $this->price_capaComun = trim($this->price_capaComun);
            $this->price_capaComun = str_replace("R$","",$this->price_capaComun);
            $this->price_capaComun = str_replace(",",".",$this->price_capaComun);
            $this->price_capaComun = strval($this->price_capaComun);
            $this->price_capaComun = str_replace(" ","",$this->price_capaComun);
        }

        //Tratando Capa Kindle
        if(!empty($this->propirtiesClass["price_Kindle"][0])){
            $this->price_Kindle = $this->propirtiesClass["price_Kindle"][0];
            $this->price_Kindle = trim($this->price_Kindle);
            $this->price_Kindle = strval($this->price_Kindle);
            $this->price_Kindle = str_replace("R$","",$this->price_Kindle);
            $this->price_Kindle = str_replace(" ","",$this->price_Kindle);
            $this->price_Kindle = str_replace(",",".",$this->price_Kindle);
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