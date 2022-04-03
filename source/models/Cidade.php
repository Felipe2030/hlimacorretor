<?php


namespace Source\models;

use CoffeeCode\DataLayer\DataLayer;

class Cidade extends DataLayer
{
    public function __construct()
    {
        parent::__construct("cidade", ["nome"],"id",false);
    }
}