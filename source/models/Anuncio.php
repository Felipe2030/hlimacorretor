<?php


namespace Source\models;

use CoffeeCode\DataLayer\DataLayer;

class Anuncio extends DataLayer
{
    public function __construct()
    {
        parent::__construct("anuncio", ["id_objeto","id_tipo_imovel","id_cidade","titulo","preco","descricao","quartos","garagem","area","ativo","observacao","id_usuario","link"],"id",false);
    }
}