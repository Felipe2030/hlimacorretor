<?php

namespace Source\controllers;
use League\Plates\Engine;
use Source\models\User;
use CoffeeCode\Paginator\Paginator;

class AdminUsuario {

    private $plates;
    public function __construct(){
        $this->plates = Engine::create("source/templates","php");
    }

    // Rederizar Pagina de Admin Anuncio
    public function index($data){
        $pagina_id = filter_input(INPUT_GET,"page",FILTER_SANITIZE_STRING);
        $count_anuncio = (new User())->find()->count();
        $paginator = new Paginator("admin/usuarios?page=");
        $paginator->pager($count_anuncio,8,$pagina_id,2);
        $usuarios = (new User())->find()->limit($paginator->limit())->offset($paginator->offset())->fetch(true);

        echo $this->plates->render("admin_listagem_usuario",[
            "title" => "Home | Página Usuarios",
            "usuarios" => $usuarios,
            "paginas" => $paginator->pages()
        ]);
    }

    public function status($data){
        $id = $data['id'];
        $status = ($data['status'] == "true") ? "S" : "N";
        $usuario = (new User())->find("id = $id")->fetch();
        $usuario->data->ativo = $status;
        $usuario->save();
        $data = ["mensagem" => "Editado com sucesso!","status" => true];
        echo json_encode($data);
    }

   
    public function create($data){
        echo $this->plates->render("admin_form_create_usuario",[
            "title" => "Home | Página Usuarios",
        ]);
    }
   
    public function editar($data){
        $id = filter_input(INPUT_GET,"id",FILTER_SANITIZE_STRING);
        $usuario = (new User())->find("id = $id")->fetch();
        
        echo $this->plates->render("admin_form_editar_usuario",[
            "title" => "Home | Página Usuarios",
            "usuario" => $usuario
        ]);
    }

    public function delete(){
        $id = filter_input(INPUT_GET,"id",FILTER_SANITIZE_STRING);
        $usuario = (new \Source\models\User())->findById($id)->destroy();
     
        header("Location:".url("admin/usuarios"));
        exit();
    }
}