<?php

namespace Source\controllers;
use League\Plates\Engine;
use Source\models\Anuncio;
use CoffeeCode\Paginator\Paginator;
use Source\models\Imagens;
use Source\models\Tipo;
use Source\models\Objetivo;
use Source\models\Cidade;
use Source\models\User;

class ApiAnuncio {
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

    public function usuario($id){
        $usuario = new User();
        $usuarios = $usuario->find("id = $id")->fetch(true);
        return $usuarios;
    }

    public function auth(){
        if(!isset($_SERVER['PHP_AUTH_USER'])):
            header('WWW-Authenticate: Basic realm='.url("/"));
        else:
            $user = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : false;
            $pass = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : false;
           
            if($user != "" && $pass != ""):
                $ativo = "S";
                $senha_md5 = md5($pass);
                $users = (new User())->find("email = :email AND senha = :senha AND ativo = :ativo", "email=$user&senha=$senha_md5&ativo=$ativo")->fetch();
                if($users):
                    return true;
                else:
                    header('HTTP/1.0 401 Unauthorized');
                    echo 'Usuario não permitido!';
                    exit;
                endif;
            else:
                header('HTTP/1.0 401 Unauthorized');
                echo 'Usuario não permitido!';
                exit;
            endif;
        endif;
    }

    public function index($data){ 
        $resulte = (new Anuncio())->find()->order("id DESC")->fetch(true);
    
        foreach($resulte as $anuncio){
            $tipo = $this->tipos($anuncio->data->id_tipo_imovel);
            $objetivos = $this->objetivo($anuncio->data->id_objeto);
            $cidade = $this->cidade($anuncio->data->id_cidade);
            $usuario = $this->usuario($anuncio->data->id_usuario);
            $anuncio->data->objeto = $objetivos[0]->data->nome;
            $anuncio->data->tipo_imovel = $tipo[0]->data->nome;

            foreach ($this->imagens($anuncio->data->id) as $key => $value) {
                $anuncio->data->imagens[] = [
                    "url_imagem" => url("").'/'.$value->data->url_imagem
                ];
            }
            
            $anuncios[] = [
                'imagens' => $anuncio->data->imagens,
                'objetivo' => $anuncio->data->objeto,
                'tipo_imovel' => $anuncio->data->tipo_imovel,
                'cidade' => $cidade[0]->data->nome,
                'titulo' => $anuncio->data->titulo,
                'preco' => $anuncio->data->preco,
                'descricao' => trim($anuncio->data->descricao),
                'quartos' => $anuncio->data->quartos,
                'garagem' => $anuncio->data->garagem,
                'area' => $anuncio->data->area,
                'ativo' => $anuncio->data->ativo,
                'observacao' => $anuncio->data->observacao,
                'usuario' => [
                    'nome' => $usuario[0]->data->nome,
                    'email' => $usuario[0]->data->email,
                ]
            ];
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($anuncios);
    }
}