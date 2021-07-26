<?php

//Implementação classes do PHP para depuração de erro em tela
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("vendor/autoload.php");

use SiteObject\Amazon;
use bin\SitesCrawler;

//Instanciando o Objeto GoodReads
//Objeto de referência para extração de dados HTML
$Amazon = new Amazon();
//Passando ISBN do livro para pesquisa
$Amazon->ISBN = "655587239X";


//Definindo regras para filtragem de dados e atributos classe livro (opcional)
$Amazon->SetRules('price_Kindle','<span class="a-size-base a-color-secondary">','</span>');

//Verificando objeto GoodReads após implementação de atributos
//print_r($GoodReads);

//Instanciando objeto web scraping e passando atributos da classe para extração
$SiteCrawler = new SitesCrawler($Amazon);

//print_r($SiteCrawler);

//Executando método get HTML
$SiteCrawler->Execute();


?>

    <html>
        <head>
            <style>
                table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
                }

                td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
                }

                tr:nth-child(even) {
                background-color: #dddddd;
                }
            </style>
            <title>.:Resultado da Busca:.</title>
        </head>

        <body>      
            <table>
            <tr>
                <th>Título</th>
                <th>Preço Comum</th>
                <th>Preço Kindle</th>
            </tr>
            <tr>
                <td><?php echo $Amazon->title;?></td>
                <td><?php echo $Amazon->price_capaComun;?></td>
                <td><?php echo $Amazon->price_Kindle ;?></td>
            </tr>
            </table>
        </body>

    </html>


