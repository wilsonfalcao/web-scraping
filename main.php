<?php 

//Implementação classes do PHP para depuração de erro em tela
//Opcional
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Incluindo classes do projeto
//Incluindo Objeto GoodReads
include __DIR__.("/Sites/GoodReads.php");
//Incluindo Objeto SitesCrawler || Modelo de negócio web-scraping
include __DIR__.("/Objetos/SitesCrawler.php");


//Instanciando o Objeto GoodReads
//Objeto de referência para extração de dados HTML
$GoodReads = new GoodReads();
//Passando valor para pesquisa
$GoodReads->search = "9788566636239";

//Definindo regras para filtragem de dados e atributos classe livro
$GoodReads->SetRules('title','<h1 id="bookTitle" class="gr-h1 gr-h1--serif" itemprop="name">','</h1>');
$GoodReads->SetRules('resumo','<div id="descriptionContainer">','<a data-text-id=');
$GoodReads->SetRules('autor','"><span itemprop="name">','</span></a>');
$GoodReads->SetRules('linguagem',"itemprop='inLanguage'>",'</div>');
//Metodo SetRules recebe (variável livro, explode[0],explode[1])
$GoodReads->SetRules('isbn13',"<span itemprop='isbn'>",'</span>');

//Verificando objeto GoodReads após implementação de atributos
//print_r($GoodReads);

//Instanciando objeto web scraping e passando atributos da classe para extração
$SiteCrawler = new SitesCrawler($GoodReads);

//Executando método get HTML
$SiteCrawler->Execute();

//imprimindo resultados obtidos através do objeto livro
print_r($GoodReads->resumo);


