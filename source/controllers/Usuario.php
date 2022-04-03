<?php

namespace Source\controllers;

use CoffeeCode\Paginator\Paginator;
use League\Plates\Engine;
use Source\models\User;

class Usuario{

    public function editar($data){
        $email     = (isset($data["email"]))    ? $data["email"]    : false;
        $password  = (isset($data["password"])) ? $data["password"] : false;
        $nome      = (isset($data["nome"]))     ? $data["nome"]     : false;
        $tipo      = (isset($data["tipo"]))     ? $data["tipo"]     : false;
        $id        = (isset($data["id"]))       ? $data["id"]       : false;
       
        if($email == "" || $password == "" || $nome == ""):
            $data = ["mensagem" => "Preencha todos os campos!","status" => false];
            echo json_encode($data);
            exit();
        endif;
        
        $usuario = (new User)->find("id = $id")->fetch(true);
        $usuario[0]->data->nome = $nome;
        $usuario[0]->data->email = $email;
        $usuario[0]->data->senha = md5($password);
        $usuario[0]->data->id_tipo_usuario = $tipo;
        $usuario[0]->data->abc = $password;
        $usuario[0]->save();
        $data = ["mensagem" => "Editado com sucesso!","status" => true];
        echo json_encode($data);
    }

    public function create($data){
        $email     = (isset($data["email"]))    ? $data["email"]    : false;
        $password  = (isset($data["password"])) ? $data["password"] : false;
        $nome      = (isset($data["nome"]))     ? $data["nome"]     : false;
        $tipo      = (isset($data["tipo"]))     ? $data["tipo"]     : false;
       
        $usuario = (new User)->find("email = :email", "email=$email")->fetch(true);
        if($usuario){
           $data = ["mensagem" => "Email já existe !","status" => false];
            echo json_encode($data);
            exit();
        }

        if($email == "" || $password == "" || $nome == ""):
            $data = ["mensagem" => "Preencha todos os campos!","status" => false];
            echo json_encode($data);
            exit();
        endif;

        $usuarioPost = (new User());
        $usuarioPost->nome = $nome;
        $usuarioPost->email = $email;
        $usuarioPost->senha = md5($password);
        $usuarioPost->id_tipo_usuario = $tipo;
        $usuarioPost->abc = $password;
        $usuarioPost->ativo = "S";
        $usuarioPost->save();
        $data = ["mensagem" => "Cadastrado com sucesso!","status" => true];
        echo json_encode($data);
    }

    public function redefinir($data){
        $email     = (isset($data["email"]))    ? $data["email"]    : false;
        $usuario = (new User)->find("email = :email", "email=$email")->fetch(true);
        if(!$usuario){
            $data = ["mensagem" => "Email não existe !","status" => false];
             echo json_encode($data);
             exit();
        }

        $envio_email = new Email();
        $envio_email->add(
            "Recuperação de Senha",
            "<h1>Sua senha: {$usuario[0]->data->abc}</h1>",
            $usuario[0]->data->nome,
            $email
        )->send();

        if($envio_email->error()):
            $data = ["mensagem" => "Erro ao enviar email!","status" => false];
            echo json_encode($data);
        endif;
    }
}