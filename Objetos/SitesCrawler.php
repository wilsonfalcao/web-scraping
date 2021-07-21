<?php

//Models
include $_SERVER['DOCUMENT_ROOT'].("/projetos/web-scraping/Objetos/Curl.php");

//Interfaces
include $_SERVER['DOCUMENT_ROOT'].("/projetos/web-scraping/Interfaces/IReadsMethods.php");

class SitesCrawler implements ReadsMethods{

    protected $SiteStruct;
    protected $HTML;


    public function __construct(ISites $SiteStruct){
        $this->SiteStruct = $SiteStruct;
    }

    protected function ExtractHTML($URLValue){

        $GetDataHTML = new Curl($URLValue);
        $this->HTML = $GetDataHTML->GetCurl();
    }

    public function Execute(){

        if($this->SiteStruct->Authorization()){

          $this->ExtractHTML($this->SiteStruct->URLAddress());
          $this->SiteStruct->Extract($this->HTML);
          return $this->HTML;
        }
        else{
            echo "Object class wasnt's validate";
        }
    }

}