<?php


namespace Source\models;

use CoffeeCode\DataLayer\DataLayer;

class Tipo extends DataLayer
{
    public function __construct()
    {
        parent::__construct("tipo_imovel", ["nome"],"id",false);
    }
}