<?php $v->layout("base"); ?>
<?php session_start(); ?>
<?php if(!isset($_SESSION["auth_usuario"])): 
   header('Location:'.url("admin"));
   exit();
else: 
    $id = isset($_GET['id']) ? $_GET['id'] : false;
?>
<style>
    #form-anuncio label{
        display: inline-block;
        font-size: 0.8em;
        color: #212529;
        text-transform: uppercase;
        font-weight: bold;
    }
    #form-anuncio button{
        background: #0a202b;
        float: right;
    }


    .container-header__texto{
        display: flex;
        justify-content: flex-start;
        padding: 10px 0px;
        font-size: 1em;
        font-weight: 600;
    }

    .container_space{
        display: flex;
        height: 100vh;
        width: 20%;
    }
    .container_center{
        display: block;
        height: 100vh;
        width: 80%;
        padding: 20px 0px;
    }

    @media only screen and (max-width: 600px){
        .container_center{
            width: 90%;
            display: block;
        }
        .container_space{
            width: 10%;
        }
    }
</style>

<div class="d-flex">
    <div class="container_space"></div>
    <div class="container_center">
        <div class="container-header__texto">
            <span>Editando Objetivo</span>
        </div>
        <form class="row" method="post" id="form-usuario">
            <input type="hidden" name="id" value="<?=$objetivo[0]->data->id?>">
            <div class="form-group mt-2">
                <label for="nome">Nome</label>
                <input class="form-control" type="text" name="nome" id="nome" value="<?=$objetivo[0]->data->nome?>">
            </div>
            <div class="form-group mt-4">
                <button type="submit" class="btn text-white" style="float: right;background: #0a202b;">Editar</button>
            </div>
        </form>
    </div>
    <div class="container_space"></div>
</div>

<script>
    // Envio de Formulario cidades
    let formUsuario = document.querySelector("#form-usuario");
    formUsuario.addEventListener('submit',function(e){
        e.preventDefault();
        let data = new FormData(formUsuario);
        fetch(url + "/objetivos/editar",{
            method: "POST",
            body: data
        }).then(function(res){
            return res.json();
        }).then(function (res){
            if(res.status){
                alert(res.mensagem);
                location.href = url + "/objetivos";
            }else{
                alert(res.mensagem);
                location.href = url + "/objetivos";
            }
        })
    })
</script>
<?php endif; ?>