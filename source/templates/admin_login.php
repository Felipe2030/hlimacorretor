<?php $v->layout("base"); ?>
<?php session_start(); ?>

<?php include_once("source/templates/modal_login.php"); ?>
<?php include_once("source/templates/modal_redefinir_senha.php"); ?>

<style>
/* HOME */
.container-card{
    padding: 0px 60px 0px 60px;
}
.container-descricao{
    padding: 60px 0px 0px 0px;
}
.container-descricao h3{
    color:#0F2F3F;
    font-size: 3em;
}
.container-descricao span{
    color:#0a202b;
    font-size: 1.5em;
}
.container-descricao .link-github{
    padding: 10px 40px 10px 40px;
    background: #0a202b;
    color: white !important;
}
@media only screen and (max-width: 600px){
    .container-card{
        padding: 0px 0px 0px 8px;
    }
    .container-descricao{
        padding: 20px 0px 0px 0px;
    }
    .container-descricao h3{
        color:#0F2F3F;
        font-size: 2em;
    }
    .container-descricao span{
        color:#0a202b;
        font-size: 1em;
    }
    .container-descricao .link-github{
        padding: 10px 40px 10px 40px;
        background: #0a202b;
        color: white !important;
        width: 100%;
    }
}
/* ENDHOME */
</style>

<!-- PAGINA HOME -->
<div class="container-fluid">
    <div class="card container-card">
        <div class="row">
            <div class="col-md-6 d-md-none d-sm-block">
                <img style="width: 100%;" src="<?=url("source/assets/img/logo.png");?>" />
            </div>
            <div class="col-md-6 container-descricao">
                <h3>
                    <b>Sejá Bem Vindo ao Painel Administrativo.</b>
                </h3>
                <span>
                   Painel administrativo e uma central de configurações
                    do sistema onde temos diversos recursos.
                    Atuais configurações estão no menu acima onde podemos
                    navegar para aplicações de cadastro.
                    Para mais informações click no botão abaixo para nossa pagina
                    do projeto.
                </span>
                <div class="mt-3">
                    <a class="btn link-github" href="https://github.com/Felipe2030">
                        Github
                    </a>
                </div>
            </div>
            <div class="col-md-6 d-none d-md-block">
                <img style="width: 100%;" src="<?=url("source/assets/img/logo.png");?>" />
            </div>
        </div>
    </div>
</div>