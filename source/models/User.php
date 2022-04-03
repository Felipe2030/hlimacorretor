<?php


namespace Source\models;

use CoffeeCode\DataLayer\DataLayer;

class User extends DataLayer
{
    public function __construct()
    {
        parent::__construct("usuario", ["nome","email","senha","id_tipo_usuario","ativo","abc"],"id",false);
    }
}