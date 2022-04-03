<?php

namespace Source\controllers;
use League\Plates\Engine;
use Source\models\Anuncio;
use CoffeeCode\Paginator\Paginator;
use Source\models\Imagens;
use Source\models\Tipo;
use Source\models\Objetivo;
use Source\models\Cidade;

class AdminAnuncio {

    private $plates;
    public function __construct(){
        $this->plates = Engine::create("source/templates","php");
    }

    public function imagens($id){
        $imagem = new Imagens();
        $imagens = $imagem->find("id_anuncio = $id")->fetch(true);
        return $imagens;
    }

    public function tipos($id){
        $tipo = new Tipo();
        $tipos = $tipo->find("id = $id")->fetch(true);
        return $tipos;
    }

    public function objetivo($id){
        $objetivo = new Objetivo();
        $objetivos = $objetivo->find("id = $id")->fetch(true);
        return $objetivos;
    }

    public function cidade($id){
        $cidade = new Cidade();
        $cidades = $cidade->find("id = $id")->fetch(true);
        return $cidades;
    }

    // Rederizar Pagina de Admin Anuncio
    public function index($data){        
       
        session_start(); 
        if(!isset($_SESSION["auth_usuario"])): 
            header('Location:'.url("admin"));
            exit();
        endif;

        $usuario = $_SESSION["auth_usuario"];
        $pagina_id = filter_input(INPUT_GET,"page",FILTER_SANITIZE_STRING);
        $count_anuncio = (new Anuncio())->find("id_usuario = $usuario->id")->count();
        $paginator = new Paginator("admin/anuncios?page=");
        $paginator->pager($count_anuncio,8,$pagina_id,2);
        $anuncios = (new Anuncio())->find("id_usuario = $usuario->id")->order("id DESC")->limit($paginator->limit())->offset($paginator->offset())->fetch(true);

        foreach($anuncios as $anuncio){
            $tipo = $this->tipos($anuncio->data->id_tipo_imovel);
            $objetivos = $this->objetivo($anuncio->data->id_objeto);
            $anuncio->data->objeto = $objetivos[0]->data->nome;
            $anuncio->data->tipo_imovel = $tipo[0]->data->nome;
            $anuncio->data->imagens = $this->imagens($anuncio->data->id);
        }

        echo $this->plates->render("admin_listagem_anuncio",[
            "title" => "Home | Página Anuncios",
            "anuncios" => $anuncios,
            "paginas" => $paginator->pages()
        ]);
    }

    public function status($data){
        $id       = $data['id'];
        $conn     = conn();
        $status   = ($data['status'] === "true") ? "S" : "N";
       
        $data = ['ativo' => $status, 'id' => $id,];
        $sql = "UPDATE anuncio SET ativo=:ativo WHERE id=:id";
        $stmt= $conn->prepare($sql);
        $stmt->execute($data);

        $data = ["mensagem" => "Editado com sucesso!","status" => true];
        echo json_encode($data);
    }

    // Rederizar Pagina de Admin Anuncio Novo
    public function create($data){
        $cidades = (new Cidade())->find()->fetch(true);
        $tipos = (new Tipo())->find()->fetch(true);
        $objetivos = (new Objetivo())->find()->fetch(true);
        echo $this->plates->render("admin_form_create_anuncio",[
            "title" => "Home | Página Novo Anuncio",
            "cidades" => $cidades,
            "tipos" => $tipos,
            "objetivos" => $objetivos,
        ]);
    }
    // Rederizar Pagina de Admin Anuncio Editar
    public function editar($data){
        $id = filter_input(INPUT_GET,"id",FILTER_SANITIZE_STRING);
        $anuncio = (new Anuncio())->find("id = $id")->fetch(true);
        $cidade = $this->cidade($anuncio[0]->data->id_cidade);
        $tipo = $this->tipos($anuncio[0]->data->id_tipo_imovel);
        $objetivo = $this->objetivo($anuncio[0]->data->id_objeto);
        $cidades = (new Cidade())->find()->fetch(true);
        $tipos = (new Tipo())->find()->fetch(true);
        $objetivos = (new Objetivo())->find()->fetch(true);
        
        echo $this->plates->render("admin_form_editar_anuncio",[
            "title" => "Home | Página Editar Anuncio",
            "anuncio" => $anuncio,
            "cidade" => $cidade,
            "tipo" => $tipo,
            "objetivo" => $objetivo,
            "cidades" => $cidades,
            "tipos" => $tipos,
            "objetivos" => $objetivos,
        ]);
    }
    // Rederizar Pagina de Admin Anuncio upload
    public function upload($data){
        $anuncio_id = filter_input(INPUT_GET,"id",FILTER_SANITIZE_STRING);
        $upload_pagina_id = filter_input(INPUT_GET,"page",FILTER_SANITIZE_STRING);
        $count_imagens = (new Imagens())->find("id_anuncio = $anuncio_id")->count();
        $paginator = new Paginator("admin/upload?id={$anuncio_id}&page=");
        $paginator->pager($count_imagens,8,$upload_pagina_id,2);
        $imagens = (new Imagens())->find("id_anuncio = $anuncio_id")->limit($paginator->limit())->offset($paginator->offset())->fetch(true);
    
        echo $this->plates->render("admin_form_upload_anuncio",[
            "title" => "Home | Página Upload Anuncio",
            "imagens" => $imagens,
            "paginas" => $paginator->pages(),
            "anuncio_id" => $anuncio_id 
        ]);
    }

     // Excluir Anuncio e Imagens 
    public function destroy_imagem($id,$url){
        $img = (new Imagens())->findById($id)->destroy();
        unlink($url);
    }
    // Excluir Anuncio e Imagens 
    public function delete(){
        $id = filter_input(INPUT_GET,"id",FILTER_SANITIZE_STRING);
        $anuncio = (new \Source\models\Anuncio())->findById($id)->destroy();
        $dbimg = (new Imagens())->find("id_anuncio = $id")->fetch(true);
        function destroy($id,$link){
            $img = (new Imagens())->findById($id)->destroy();
            unlink($link);
        }

        if($dbimg):
            foreach ($dbimg as $img):
                $this->destroy_imagem($img->data->id, $img->data->url_imagem);
            endforeach;
        endif;


        header("Location:".url("admin/anuncios"));
        exit();
    }
}