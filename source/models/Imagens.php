<?php


namespace Source\models;

use CoffeeCode\DataLayer\DataLayer;

class Imagens extends DataLayer
{
    public function __construct()
    {
        parent::__construct("anuncio_imagem", ["url_imagem","id_anuncio"],"id",false);
    }
}