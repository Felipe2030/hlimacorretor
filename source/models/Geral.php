<?php


namespace Source\models;

use CoffeeCode\DataLayer\DataLayer;

class Geral extends DataLayer
{
    public function __construct()
    {
        parent::__construct("geral", ["email","celular","creci","endereco","facebook","instagram","youtube","url"],"id",false);
    }
}