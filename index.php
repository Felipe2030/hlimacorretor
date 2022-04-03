<?php

require __DIR__."/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);
$router->namespace("Source\controllers");

$router->group(null);
$router->get("/","Web:index");
$router->get("/imoveis","Web:imoveis");
$router->get("/simulacao","Web:simulacao");
$router->get("/imovel","Web:imovel");

$router->group("api");
$router->get("/anuncios","ApiAnuncio:index");

$router->group("admin");
$router->get("/","Login:index");
$router->get("/logout","Login:logout");
$router->post("/login","Login:login");
$router->post("/redefinir","Login:redefinir");

## Routers de Anuncio.
$router->get("/anuncios","AdminAnuncio:index");
$router->get("/anuncios/editar","AdminAnuncio:editar");
$router->get("/anuncios/create","AdminAnuncio:create");
$router->get("/anuncios/upload","AdminAnuncio:upload");
$router->get("/anuncios/deletar","AdminAnuncio:delete");
$router->post("/status","AdminAnuncio:status");
$router->post("/anuncios/editar","AnuncioPostagem:editar");
$router->post("/anuncios/create","AnuncioPostagem:create");
$router->get("/imagem/deletar","Imagem:delete");
$router->post("/imagem/create","Imagem:create");

## Routers de Usuario.
$router->get("/usuarios","AdminUsuario:index");
$router->get("/usuarios/editar","AdminUsuario:editar");
$router->get("/usuarios/create","AdminUsuario:create");
$router->get("/usuarios/deletar","AdminUsuario:delete");
$router->post("/usuarios/editar","Usuario:editar");
$router->post("/usuarios/create","Usuario:create");
$router->post("/usuarios/status","AdminUsuario:status");
$router->post("/usuarios/redefinir","Usuario:redefinir");

## Routers de Configuração.
$router->get("/configuracao","Configuracao:index");
$router->get("/configuracao/imagem","Configuracao:imagem");
$router->post("/configuracao/geral","Configuracao:geral");
$router->post("/configuracao/imagem","Configuracao:upload");


$router->get("/tipos/create","Configuracao:create_tipos");
$router->get("/tipos","Configuracao:tipos");
$router->get("/tipos/editar","Configuracao:editar_tipos");
$router->post("/tipos/editar","Configuracao:post_editar_tipos");
$router->post("/tipos/create","Configuracao:post_tipo");

$router->get("/cidades/create","Configuracao:create_cidades");
$router->get("/cidades","Configuracao:cidades");
$router->get("/cidades/editar","Configuracao:editar_cidades");
$router->post("/cidades/editar","Configuracao:post_editar_cidades");
$router->post("/cidades/create","Configuracao:post_cidade");

$router->get("/objetivos/create","Configuracao:create_objetivos");
$router->get("/objetivos","Configuracao:objetivos");
$router->get("/objetivos/editar","Configuracao:editar_objetivos");
$router->post("/objetivos/editar","Configuracao:post_editar_objetivos");
$router->post("/objetivos/create","Configuracao:post_objetivo");


$router->dispatch();