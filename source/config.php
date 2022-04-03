<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__."./../");
$dotenv->load();

define("CONF_SMTP_MAIL",[
    "host" => $_ENV["MAIL_ROOT"],
    "port" => $_ENV["MAIL_PORT"],
    "user" => $_ENV["MAIL_USER"],
    "passwd" => $_ENV["MAIL_PASSWORD"],
    "from_name" => $_ENV["MAIL_NAME"],
    "from_email" => $_ENV["MAIL_EMAIL"]
]);

define("URL_BASE",$_ENV["URLBASE"]);

define("DATA_LAYER_CONFIG",[
    "driver" => "mysql",
    "host" => $_ENV["ROOT"],
    "port" => $_ENV["PORT"],
    "dbname" => $_ENV["DBNAME"],
    "username" => $_ENV["USERNAME"],
    "passwd" => $_ENV["PASSWORD"],
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);

function conn(){
    return new PDO('mysql:host='.$_ENV["ROOT"].';dbname='.$_ENV["DBNAME"], $_ENV["USERNAME"], $_ENV["PASSWORD"],array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ));
}

function url(string $url = null): string
{
    if($url): return URL_BASE ."/{$url}"; endif;
    return URL_BASE;
}

