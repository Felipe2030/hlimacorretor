<?php

namespace Source\controllers;
use League\Plates\Engine;
use Source\models\User;

class Login {

    private $plates;
    public function __construct(){
        $this->plates = Engine::create("source/templates","php");
    }
    // Rederizar Pagina de Login
    public function index($data){
        echo $this->plates->render("admin_login",[
            "title" => "Home | Página Admin"
        ]);
    }
    // Fazer Login de Usuario
    public function login($data){
        $email = isset($data['email']) ? $data['email'] : false;
        $senha = isset($data['password']) ? $data['password'] : false;
        $ativo = 'S';

        if($email == '' || $senha == ''):
            $data = ["mensagem" => "Preencha todos os campos!","status" => false];
            echo json_encode($data);
            exit();
        endif;

        $senha_md5 = md5($senha);
        $users = (new User())->find("email = :email AND senha = :senha AND ativo = :ativo", "email=$email&senha=$senha_md5&ativo=$ativo")->fetch();
        if($users):
            session_start();
            $_SESSION["auth_usuario"] = $users->data;
            $data = ["mensagem" => "Usuario logado com sucesso.","status" => true];
            echo json_encode($data);
        else:
            $data = ["mensagem" => "Usuario ou senha invalida!","status" => false];
            echo json_encode($data);
        endif;
    }
    // Fechar Session de Login
    public function logout($data){
        session_start();
        session_destroy();
        header("Location:".url("admin"));
    }
    // Redefinição de Senha de Usuario
    public function redefinir($data){
        $email = isset($data['email']) ? $data['email'] : false;

        if($email == ''):
            $data = ["mensagem" => "Preencha todos os campos!","status" => false];
            echo json_encode($data);
            exit();
        endif;

        $users = (new User())->find("email = :email", "email=$email")->fetch();
        if($users):
            var_dump($users->data);
        else:
            $data = ["mensagem" => "Usuario invalido!","status" => false];
            echo json_encode($data);
        endif;
    }
}