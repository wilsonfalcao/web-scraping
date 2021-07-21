<?php

class Livro {

    public $title;
    public $autor;
    public $isbn10;
    public $isbn13;
    public $anopublish;

}

class LivroFull extends Livro {

    public $link;
    public $resumo;
    public $autorlink;
    public $paginas;
    public $imagem_autor;
    public $imagem_livro;
    public $rating;
    public $qyavaliantion;
    public $genero;
    public $personagens;
    public $linguagem;
    public $tipocapa;
    public $autorimage;

}

class Personagens{
    public $name;
    public $about;
    public $image;
}

class LivroPrice extends Livro{
    
    public $price;
    public $price_capaDura;
    public $price_capaFlex;
    public $price_Kindle;
    public $desconto;

}

