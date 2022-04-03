<?php


namespace Source\controllers;

use CoffeeCode\Uploader\Image;
use League\Plates\Engine;
use Source\models\Cidade;
use Source\models\Geral;
use Source\models\Objetivo;
use Source\models\Tipo;
use Source\models\User;
use CoffeeCode\Paginator\Paginator;

class Configuracao
{
    private $view;
    private $cidades;
    private $objetivos;
    private $tipos;

    private $plates;
    public function __construct(){
        $cidade = (new Cidade())->find()->fetch(true);
        $objetivo = (new Objetivo())->find()->fetch(true);
        $tipo = (new Tipo())->find()->fetch(true);
        $this->cidades = $cidade;
        $this->objetivos = $objetivo;
        $this->tipos = $tipo;
        $this->plates = Engine::create("source/templates","php");
    }

    public function index($data)
    {
        $geral = new Geral();
        $garal_data = $geral->find()->fetch(true);

        echo $this->plates->render("configuracoes",[
            "title" => "Home | Pagina Anuncios",
            "pagina" => "admin/configuracoes",
            "geral" => $garal_data[0]->data,
        ]);
    }

    public function geral($data)
    {
        $celular   = (isset($data["celular"]))   ? $data["celular"]   : false;
        $creci     = (isset($data["creci"]))     ? $data["creci"]     : false;
        $endereco  = (isset($data["endereco"]))  ? $data["endereco"]  : false;
        $email     = (isset($data["email"]))     ? $data["email"]     : false;
        $facebook  = (isset($data["facebook"]))  ? $data["facebook"]  : false;
        $instagram = (isset($data["instagram"])) ? $data["instagram"] : false;
        $youtube   = (isset($data["youtube"]))   ? $data["youtube"]   : false;

        if($celular == "" || $email == "" || $creci == "" || $endereco == "" || $facebook == "" || $instagram == "" || $youtube):
            $data = ["mensagem" => "Preencha todos os campos!","status" => false];
            echo json_encode($data);
            exit();
        endif;

        $geral = (new Geral())->find("id = :id", "id=1")->fetch();
        $geral->celular = $celular;
        $geral->creci = $creci;
        $geral->endereco = $endereco;
        $geral->email = $email;
        $geral->facebook = $facebook;
        $geral->instagram = $instagram;
        $geral->youtube = $youtube;

        $geral->save();
        $data = ["mensagem" => "Cadastrado com sucesso!","status" => true];
        echo json_encode($data);
    }

    public function imagem($data)
    {
        echo $this->plates->render("admin_form_upload_configuracao",[
            "title" => "Home | Pagina Cadastro Imagem",
        ]);
    }


    public function upload($data)
    {
        $imagem = new Image("./source/storage","images");
        if(!empty($_FILES['file'])):
            $file = $_FILES['file'];
            if(empty($file["type"])):
                $data = ["mensagem" => "Selecione uma imagem valida!","status" => false];
                echo json_encode($data);
            elseif(!in_array($file["type"],$imagem::isAllowed())):
                $data = ["mensagem" => "O arquivo não é valido!","status" => false];
                echo json_encode($data);
            else:
                $upload = $imagem->upload($file,pathinfo($file['name'],PATHINFO_FILENAME),1920);
                $geral = (new Geral())->find("id = :id", "id=1")->fetch();
                unlink($geral->url);
                $geral->url = $upload;
                $geral->save();
                $data = ["mensagem" => "Upload com sucesso!","status" => true];
                echo json_encode($data);
            endif;
        endif;
    }

    public function post_tipo($data)
    {
        $tipo = (new Tipo());
        $nome  = (isset($data["nome"])) ? $data["nome"] : false;
        $zero = trim($nome);
        if($zero == ""):
            $data = ["mensagem" => "Preencha todos os campos!","status" => false];
            echo json_encode($data);
            exit();
        endif;

        $tipo->nome = $nome;
        $tipo->save();
        $data = ["mensagem" => "Tipo cadastrado com sucesso!","status" => true];
        echo json_encode($data);
    }

    public function post_cidade($data)
    {
        $cidade = (new Cidade());
        $nome  = (isset($data["nome"])) ? $data["nome"] : false;
        $zero = trim($nome);
        if($zero == ""):
            $data = ["mensagem" => "Preencha todos os campos!","status" => false];
            echo json_encode($data);
            exit();
        endif;

        $cidade->nome = $nome;
        $cidade->save();
        $data = ["mensagem" => "Cidade cadastrado com sucesso!","status" => true];
        echo json_encode($data);
    }

    public function post_objetivo($data)
    {
        $objetivo = (new Objetivo());
        $nome  = (isset($data["nome"])) ? $data["nome"] : false;

        $zero = trim($nome);
        if($zero == ""):
            $data = ["mensagem" => "Preencha todos os campos!","status" => false];
            echo json_encode($data);
            exit();
        endif;

        $objetivo->nome = $nome;
        $objetivo->save();
        $data = ["mensagem" => "Objetivo cadastrado com sucesso!","status" => true];
        echo json_encode($data);
    }


    
    public function cidades($data){
     
        $pagina_id = filter_input(INPUT_GET,"page",FILTER_SANITIZE_STRING);
        $count_cidades = (new Cidade())->find()->count();
        $paginator = new Paginator("admin/cidades?page=");
        $paginator->pager($count_cidades,8,$pagina_id,2);
        $cidades = (new Cidade())->find()->order("id DESC")->limit($paginator->limit())->offset($paginator->offset())->fetch(true);

        echo $this->plates->render("admin_listagem_cidade",[
            "title" => "Home | Página Cidades",
            "cidades" => $cidades,
            "paginas" => $paginator->pages()
        ]);
    }
    public function create_cidades($data){
        echo $this->plates->render("admin_form_create_cidade",[
            "title" => "Home | Create Cidade",
        ]);
    }

    public function editar_cidades($data){
        $id = filter_input(INPUT_GET,"id",FILTER_SANITIZE_STRING);
        $cidades = (new Cidade())->find("id = :id","id=$id")->fetch(true);
        echo $this->plates->render("admin_form_editar_cidade",[
            "title" => "Home | Página Editar Cidade",
            "cidades" => $cidades,
        ]);
    }

    public function post_editar_cidades($data){
        $id = isset($data["id"]) ? $data["id"] : false;
        $cidade = (new Cidade())->find("id = :id", "id=$id")->fetch();
        $nome  = (isset($data["nome"])) ? $data["nome"] : false;
        $zero = trim($nome);
        if($zero == ""):
            $data = ["mensagem" => "Preencha todos os campos!","status" => false];
            echo json_encode($data);
            exit();
        endif;

        $cidade->nome = $nome;
        $cidade->save();
        $data = ["mensagem" => "Cidade editada com sucesso!","status" => true];
        echo json_encode($data);
    }
    

    public function objetivos($data){
     
        $pagina_id = filter_input(INPUT_GET,"page",FILTER_SANITIZE_STRING);
        $count_objetivos = (new Objetivo())->find()->count();
        $paginator = new Paginator("admin/objetivos?page=");
        $paginator->pager($count_objetivos,8,$pagina_id,2);
        $objetivos = (new Objetivo())->find()->order("id DESC")->limit($paginator->limit())->offset($paginator->offset())->fetch(true);

        echo $this->plates->render("admin_listagem_objetivos",[
            "title" => "Home | Página Objetivos",
            "objetivos" => $objetivos,
            "paginas" => $paginator->pages()
        ]);
    }

    public function create_objetivos($data){
        echo $this->plates->render("admin_form_create_objetivo",[
            "title" => "Home | Create Objetivo",
        ]);
    }

    public function editar_objetivos($data){
        $id = filter_input(INPUT_GET,"id",FILTER_SANITIZE_STRING);
        $objetivo = (new Objetivo())->find("id = :id","id=$id")->fetch(true);
        echo $this->plates->render("admin_form_editar_objetivo",[
            "title" => "Home | Página Editar Objetivo",
            "objetivo" => $objetivo,
        ]);
    }

    public function post_editar_objetivos($data){
        $id = isset($data["id"]) ? $data["id"] : false;
        $objetivo = (new Objetivo())->find("id = :id", "id=$id")->fetch();
        $nome  = (isset($data["nome"])) ? $data["nome"] : false;
        $zero = trim($nome);
        if($zero == ""):
            $data = ["mensagem" => "Preencha todos os campos!","status" => false];
            echo json_encode($data);
            exit();
        endif;

        $objetivo->nome = $nome;
        $objetivo->save();
        $data = ["mensagem" => "Objetivo editada com sucesso!","status" => true];
        echo json_encode($data);
    }

    public function tipos($data){
     
        $pagina_id = filter_input(INPUT_GET,"page",FILTER_SANITIZE_STRING);
        $count_tipos = (new Tipo())->find()->count();
        $paginator = new Paginator("admin/tipos?page=");
        $paginator->pager($count_tipos,8,$pagina_id,2);
        $tipos = (new Tipo())->find()->order("id DESC")->limit($paginator->limit())->offset($paginator->offset())->fetch(true);

        echo $this->plates->render("admin_listagem_tipos",[
            "title" => "Home | Página Tipos",
            "tipos" => $tipos,
            "paginas" => $paginator->pages()
        ]);
    }

    
    public function create_tipos($data){
        echo $this->plates->render("admin_form_create_tipo",[
            "title" => "Home | Create Tipo",
        ]);
    }

    public function editar_tipos($data){
        
        $id = filter_input(INPUT_GET,"id",FILTER_SANITIZE_STRING);
        $tipos = (new Tipo())->find("id = :id","id=$id")->fetch(true);
        echo $this->plates->render("admin_form_editar_tipo",[
            "title" => "Home | Página Editar Tipo",
            "tipos" => $tipos[0]->data,
        ]);
    }

    public function post_editar_tipos($data){
        $id = isset($data["id"]) ? $data["id"] : false;
        $tipo = (new Tipo())->find("id = :id", "id=$id")->fetch();
        $nome  = (isset($data["nome"])) ? $data["nome"] : false;
        $zero = trim($nome);
        if($zero == ""):
            $data = ["mensagem" => "Preencha todos os campos!","status" => false];
            echo json_encode($data);
            exit();
        endif;

        $tipo->nome = $nome;
        $tipo->save();
        $data = ["mensagem" => "Tipo editada com sucesso!","status" => true];
        echo json_encode($data);
    }

}