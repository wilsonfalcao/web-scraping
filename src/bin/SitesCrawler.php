<?php

/*
CLASSE ESTRUTURA SITE

-- Recebe a interface ISites (contrato da classe objeto sites) por inverção de dependência e IReadsMethods por implementação 
-- 
*/

namespace bin;

//Inclusão do Objeto CURL (função para obter HTML do site)
include __DIR__.("/scraping/abstractions/Curl.php");
//Inclusão de contrato de métodos
include __DIR__.("/scraping/abstractions/IReadsMethods.php");

use IReadsMethods;
use ISites;
use abstractions\Curl;


class SitesCrawler implements IReadsMethods{

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

        if($this->SiteStruct->CheckAddress()){

          $this->ExtractHTML($this->SiteStruct->URLAddress());
          $this->SiteStruct->Extract($this->HTML);
          return $this->HTML;
        }
        else{
            echo "Object class wasnt's validate";
        }
    }

}

