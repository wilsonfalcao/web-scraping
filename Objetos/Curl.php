<?php

include $_SERVER['DOCUMENT_ROOT'].("/projetos/SOLID/Interfaces/ICrawler.php");

class Curl implements ICrawler {


    public function __construct($URL){
        
        if(empty($this->HTML = $this->CurlExecute($URL))){
            $this->Error = ["Erro"=>"Curl","Message"=>"Erro para Obter HTML"];
        }
    }

    protected function CurlExecute($URL){

        $ch = curl_init();
        $datasite = null;

        try{
        
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $URL);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);       
        
            $datasite = curl_exec($ch);
            curl_close($ch);
        }catch (Exception $e){
            \Cache::put("proxietime",intval(\Cache::get("proxietime"))+1, 44640);
            return null;
        }

        return $datasite;

    }

    protected $HTML;
    protected $ERROR;

    public function GetCurl(){
        if($this->HTML)
            return $this->HTML;
        if($this->Error)
            return $this->Error;
    }
    
}