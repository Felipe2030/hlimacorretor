<?php


namespace Source\models;

use CoffeeCode\DataLayer\DataLayer;

class Objetivo extends DataLayer
{
    public function __construct()
    {
        parent::__construct("objetivo", ["nome"],"id",false);
    }
}