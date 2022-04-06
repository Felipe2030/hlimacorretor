<?php

namespace Source\controllers;
use Source\models\Anuncio;


class AnuncioPostagem {

    public function __construct(){}
    // Criar Anuncio
    public function create($data){
        $cidade     = (isset($data["cidade"]))      ? $data["cidade"]       : false;
        $tipo       = (isset($data["tipo"]))        ? $data["tipo"]         : false;
        $objetivo   = (isset($data["objetivo"]))    ? $data["objetivo"]     : false;
        $titulo     = (isset($data["titulo"]))      ? $data["titulo"]       : false;
        $preco      = (isset($data["preco"]))       ? $data["preco"]        : false;
        $descricao  = (isset($data["descricao"]))   ? $data["descricao"]    : false;
        $quartos    = (isset($data["quartos"]))     ? $data["quartos"]      : false;
        $garagem    = (isset($data["garagem"]))     ? $data["garagem"]      : false;
        $area       = (isset($data["area"]))        ? $data["area"]         : false;
        $observacao = (isset($data["observacao"]))  ? $data["observacao"]   : false;
        $id_usuario = (isset($data["id_usuario"]))  ? $data["id_usuario"]   : false;
        $link       = (isset($data["link"]))        ? $data["link"]         : false;
        $ativo = "N";

        if($cidade == "" || $tipo == "" || $objetivo == "" || $titulo == "" || $preco == "" || $descricao == "" || $quartos == "" || $garagem == "" || $area == ""):
            $data = ["mensagem" => "Preencha todos os campos!","status" => false];
            echo json_encode($data);
            exit();
        endif;

        $anuncio = (new \Source\models\Anuncio());
        $anuncio->id_objeto = $objetivo;
        $anuncio->id_tipo_imovel = $tipo;
        $anuncio->id_cidade = $cidade;
        $anuncio->titulo = $titulo;
        $anuncio->preco = $preco;
        $anuncio->descricao = $descricao;
        $anuncio->quartos = $quartos;
        $anuncio->garagem = $garagem;
        $anuncio->area = $area;
        $anuncio->ativo = $ativo;
        $anuncio->observacao = $observacao;
        $anuncio->id_usuario = $id_usuario;
        $anuncio->link = $link;
        $anuncio->save();
        $data = ["mensagem" => "Cadastrado com sucesso!","status" => true];
        echo json_encode($data);
    }
    
    // Editar Anuncio
    public function editar($data){
        $id         = (isset($data["id"]))          ? $data["id"]           : false;
        $cidade     = (isset($data["cidade"]))      ? $data["cidade"]       : false;
        $tipo       = (isset($data["tipo"]))        ? $data["tipo"]         : false;
        $objetivo   = (isset($data["objetivo"]))    ? $data["objetivo"]     : false;
        $titulo     = (isset($data["titulo"]))      ? $data["titulo"]       : false;
        $preco      = (isset($data["preco"]))       ? $data["preco"]        : false;
        $descricao  = (isset($data["descricao"]))   ? $data["descricao"]    : false;
        $quartos    = (isset($data["quartos"]))     ? $data["quartos"]      : false;
        $garagem    = (isset($data["garagem"]))     ? $data["garagem"]      : false;
        $area       = (isset($data["area"]))        ? $data["area"]         : false;
        $observacao = (isset($data["observacao"]))  ? $data["observacao"]   : false;
        $id_usuario = (isset($data["id_usuario"]))  ? $data["id_usuario"]   : false;
        $link       = (isset($data["link"]))        ? $data["link"]         : false;
        $ativo = "S";
       
        if($cidade == "" || $tipo == "" || $objetivo == "" || $titulo == "" || $preco == "" || $descricao == "" || $quartos == "" || $garagem == "" || $area == ""):
            $data = ["mensagem" => "Preencha todos os campos!","status" => false];
            echo json_encode($data);
            exit();
        endif;

        $anuncio = (new \Source\models\Anuncio())->find("id = :id", "id=$id")->fetch();
        $anuncio->id_objeto = $objetivo;
        $anuncio->id_tipo_imovel = $tipo;
        $anuncio->id_cidade = $cidade;
        $anuncio->titulo = $titulo;
        $anuncio->preco = $preco;
        $anuncio->descricao = $descricao;
        $anuncio->quartos = $quartos;
        $anuncio->garagem = $garagem;
        $anuncio->area = $area;
        $anuncio->ativo = $ativo;
        $anuncio->observacao = $observacao;
        $anuncio->id_usuario = $id_usuario;
        $anuncio->link = $link;
        $anuncio->save();

        $data = ["mensagem" => "Editado com sucesso!","status" => true];
        echo json_encode($data);
    }


}