<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include __DIR__.("/Sites/GoodReads.php");
include __DIR__.("/Objetos/SitesCrawler.php");

$GoodReads = new GoodReads();
$GoodReads->search = "9788566636239";

$GoodReads->SetRules('title','<h1 id="bookTitle" class="gr-h1 gr-h1--serif" itemprop="name">','</h1>');
$GoodReads->SetRules('resumo','<div id="descriptionContainer">','<a data-text-id=');
$GoodReads->SetRules('autor','"><span itemprop="name">','</span></a>');
$GoodReads->SetRules('linguagem',"itemprop='inLanguage'>",'</div>');
$GoodReads->SetRules('isbn13',"<span itemprop='isbn'>",'</span>');

//print_r($GoodReads);

$SiteCrawler = new SitesCrawler($GoodReads);

$SiteCrawler->Execute();

print_r($GoodReads->resumo);


