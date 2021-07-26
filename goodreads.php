<?php

//Implementação classes do PHP para depuração de erro em tela
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("vendor/autoload.php");

use SiteObject\GoodReads;
use bin\SitesCrawler;

//Instanciando o Objeto GoodReads
//Objeto de referência para extração de dados HTML
$GoodReads = new GoodReads();
//Passando ISBN do livro para pesquisa
$GoodReads->ISBN = "655587239X";

//Definindo regras para filtragem de dados e atributos classe livro (opcional)
//Metodo SetRules recebe (variável livro, explode[0],explode[1])
$GoodReads->SetRules('linguagem',"itemprop='inLanguage'>",'</div>');

//Verificando objeto GoodReads após implementação de atributos
//print_r($GoodReads);

//Instanciando objeto web scraping e passando atributos da classe para extração
$SiteCrawler = new SitesCrawler($GoodReads);

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
                <th>Autor</th>
                <th>Resumo</th>
                <th>ISBN</th>
                <th>Linguagem</th>
            </tr>
            <tr>
                <td><?php echo $GoodReads->title;?></td>
                <td><?php echo $GoodReads->autor;?></td>
                <td><?php echo $GoodReads->resumo;?></td>
                <td><?php echo $GoodReads->isbn13;?></td>
                <td><?php echo $GoodReads->linguagem;?></td>
            </tr>
            </table>
        </body>

    </html>


