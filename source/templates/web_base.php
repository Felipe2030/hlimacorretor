<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <?=$v->section("header");?>

    <title><?=$title?></title>
    <script src="<?=url("source/assets/js/jquery-3.1.1.min.js");?>"></script>
    <script src="<?=url("source/assets/js/popper.min.js");?>"></script>
    <script src="<?=url("source/assets/js/bootstrap.min.js");?>"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-216874504-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-216874504-1');
    </script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2664879713619932" crossorigin="anonymous"></script>
    
    <link href="<?=url("source/assets/css/bootstrap.min.css");?>" rel="stylesheet">
    <link href="<?=url("source/assets/css/material_icon.css");?>" rel="stylesheet">
    <link rel="stylesheet" href="<?=url("source/assets/css/home.css");?>" />
    <link rel="stylesheet" href="<?=url("source/assets/css/imoveis.css");?>" />
    <link rel="stylesheet" href="<?=url("source/assets/css/simulacao.css");?>" />
    <style> 
    * { padding: 0px; margin: 0px; list-style-type: none !important; text-decoration: none !important; }
    .m-3{ margin:0px !important; padding: 0px !important; }
    </style>
</head>
<body>
    <div class="container-whatsap">
        <button class="button_whatsap_flutuante" onclick="location.href='https://api.whatsapp.com/send?phone=+55<?=$geral->celular?>'">
            <img src="<?=url('source/assets/img/whatsapp_white.svg');?>" />
        </button>
    </div>

    <div class="container-header">
        <div class="container-header-button">
            <button>
                <span><!-- (44) 99828-7203 -->
                <?=$geral->celular?>
                </span>
                <img src="<?=url('source/assets/img/whatsapp.svg');?>" />
                <span class="material-icons">expand_more</span>
            </button>
        </div>
        <div class="container-header-social">
            <a href="<?=$geral->instagram?>">
                <img src="<?=url('source/assets/img/instagram.svg');?>" />
            </a>
            <a href="<?=$geral->facebook?>">
                <img src="<?=url('source/assets/img/facebook.svg');?>" />
            </a>
            <a href="<?=$geral->youtube?>">
                <img src="<?=url('source/assets/img/youtube.svg');?>" />
            </a>
        </div>
    </div>

    <div class="container-navbar">
        <ul>
            <li class="<?php if($navbar == "home"){ echo "active"; }; ?>"><a href="<?=url('');?>">Início</a></li>
            <li class="<?php if($navbar == "imoveis"){ echo "active"; }; ?>"><a href="<?=url('imoveis');?>">Imóveis</a></li>
            <li class="<?php if($navbar == "simulacao"){ echo "active"; }; ?>"><a href="<?=url('simulacao');?>">Simulação</a></li>
        </ul>
    </div>

    <?=$v->section("content");?>

    <div class="container-footer">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6 container_img">
                    <img  src="<?=url('source/assets/img/logo_hlima.png');?>">
                </div>
                <div class="col-md-6 footer_descricao">
                    <span>Hlima Imóveis</span>
                    <!-- <span>CNPJ - 32.528.075/0001-36</span> -->
                    <span><?=$geral->endereco?>, CRECI: <?=$geral->creci?></span>
                </div>
            </div>
        </div>
        <div class="col-md-6 footer_descricao_contato">
            <span>Contato</span>
            <span><?=$geral->email?></span>
            <button class="list-button-whatsapp" onclick="location.href='https://api.whatsapp.com/send?phone=+55<?=$geral->celular?>'">
                <!-- (44) 99828-7203 -->
                <?=$geral->celular?>
                <img src="<?=url('source/assets/img/whatsapp.svg');?>" />
            </button>
            <span class="dev">Desenvolvedor BR</span>
        </div>
    </div>
</body>
</html>
