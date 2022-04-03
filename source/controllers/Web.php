<?php


namespace Source\controllers;

use CoffeeCode\Paginator\Paginator;
use League\Plates\Engine;
use Source\models\Cidade;
use Source\models\Geral;
use Source\models\Imagens;
use Source\models\Objetivo;
use Source\models\Tipo;
use Source\models\Anuncio;

class Web
{
    public function __construct(){
        $this->plates = Engine::create("source/templates","php");
    }

    public function imagens($id){
        $imagem = new Imagens();
        $imagens = $imagem->find("id_anuncio = $id")->fetch(true);
        return $imagens;
    }

    public function index($data)
    {
        $conn       = conn();
        $pagina     = (isset($_GET['page']))? $_GET['page'] : 1;

        $filter_objetivo = (isset($_GET['objetivo'])) ? (int)$_GET['objetivo'] : false; 
        $filter_tipo     = (isset($_GET['tipo'])) ? (int)$_GET['tipo'] : false; 
        $filter_cidade   = (isset($_GET['cidade'])) ? (int)$_GET['cidade'] : false; 

        if($filter_objetivo && $filter_tipo && $filter_cidade):
            $url_filtro = "&objetivo=$filter_objetivo&tipo=$filter_tipo&cidade=$filter_cidade";
            $consulta_total = $conn->query("SELECT * FROM anuncio WHERE ((id_objeto=$filter_objetivo) AND (id_tipo_imovel=$filter_tipo) AND (id_cidade=$filter_cidade)) AND ativo='S'");
        else:
            $consulta_total = $conn->query("SELECT * FROM anuncio WHERE ativo='S'");
        endif;
        
        $registros  = 16; 
        $inicio     = ($registros * $pagina) - $registros; 
        $numPaginas = ceil(count($consulta_total->fetchAll()) / $registros);
        
        if($filter_objetivo && $filter_tipo && $filter_cidade):
            $consulta = $conn->query("SELECT * FROM anuncio WHERE ((id_objeto=$filter_objetivo) AND (id_tipo_imovel=$filter_tipo) AND (id_cidade=$filter_cidade)) AND ativo='S' ORDER BY id DESC LIMIT $inicio, $registros");
        else:
            $consulta = $conn->query("SELECT * FROM anuncio WHERE ativo='S' ORDER BY id DESC LIMIT $inicio, $registros");
        endif;

        
        foreach ($consulta->fetchAll() as $key => $value) {
            $imagem = $conn->query("SELECT * FROM anuncio_imagem WHERE id_anuncio=".$value->id);
            $value->imagens = $imagem->fetchAll();
            $anuncios[$key] = $value;
        }

        $configuracao_geral = (new Geral())->find()->fetch(true);
        $cidades = (new Cidade())->find()->fetch(true);
        $tipos = (new Tipo())->find()->fetch(true);
        $objetivos = (new Objetivo())->find()->fetch(true);
      
        echo $this->plates->render("home",[
            "title" => "Hlima | Pagina Inicial",
            "navbar" => "home",
            "geral" => $configuracao_geral[0]->data,
            "cidades" => $cidades,
            "tipos" => $tipos,
            "objetivos" => $objetivos,
            "anuncios" => $anuncios,
            "paginas" => $numPaginas,
            "filtro" => isset($url_filtro) ? $url_filtro : ""
        ]);
    }

    public function imoveis($data){
        $anuncio = new Anuncio();
        $ativo = "S";
        $pagina_id = filter_input(INPUT_GET,"page",FILTER_SANITIZE_STRING);
        $count_anuncio = (new Anuncio())->find()->count();
        $paginator = new Paginator("home?page=");
        $paginator->pager($count_anuncio,16,$pagina_id,2);
        $anuncios = $anuncio->find("ativo = :ativo","ativo=$ativo")->order("id DESC")->limit($paginator->limit())->offset($paginator->offset())->fetch(true);

        foreach($anuncios as $anuncio){
            $anuncio->data->imagens = $this->imagens($anuncio->data->id);
        }

        $configuracao_geral = (new Geral())->find()->fetch(true);
        $tipos = (new Tipo())->find()->fetch(true);
        $objetivos = (new Objetivo())->find()->fetch(true);

        echo $this->plates->render("imoveis",[
            "title" => "Hlima | Pagina Imoveis",
            "navbar" => "imoveis",
            "geral" => $configuracao_geral[0]->data,
            "tipos" => $tipos,
            "objetivos" => $objetivos,
            "anuncios" => $anuncios,
            "paginas" => $paginator->pages()
        ]);
    }

    public function imovel($data){
        $anuncio = new Anuncio();
        $imagem = new Imagens();
        $id = filter_input(INPUT_GET,"id",FILTER_SANITIZE_STRING);
        $count_imagens = $imagem->find("id_anuncio = $id")->count();
        $imagens = $imagem->find("id_anuncio = $id")->fetch(true);
        $anuncios = $anuncio->find("id = $id")->fetch();
        $objetivo = (new Objetivo())->find()->fetch(true);
        $configuracao_geral = (new Geral())->find()->fetch(true);
        
        
        echo $this->plates->render("imovel",[
            "title" => "Hlima | Pagina Imoveis",
            "navbar" => "",
            "geral" => $configuracao_geral[0]->data,
            "imagens" => $imagens,
            "anuncio" => $anuncios,
            "objetivos" => $objetivo,
            "num_imagem" =>  $count_imagens
        ]);
    }


    public function simulacao($data){
        $configuracao_geral = (new Geral())->find()->fetch(true);
        echo $this->plates->render("simulacao",[
            "title" => "Hlima | Pagina Simulação",
            "navbar" => "simulacao",
            "geral" => $configuracao_geral[0]->data,
        ]);
    }

}
