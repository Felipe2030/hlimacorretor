<?php $v->layout("base"); ?>
<?php session_start(); ?>
<?php if(!isset($_SESSION["auth_usuario"])): 
   header('Location:'.url("admin"));
   exit();
else: 
    $usuario = $_SESSION["auth_usuario"];
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
            <span>Cadastrar Anuncio</span>
        </div>
         <form class="row" method="post" id="form-anuncio">
            <input type="hidden" name="id_usuario" value="<?=$usuario->id?>">
            <div class="form-group col-md-6 mt-2">
                <label>Cidade</label>
                <select name="cidade" class="form-control">
                    <option selected value="">--- options ---</option>
                    <?php foreach($cidades as $cidade): ?>
                        <option value="<?=$cidade->data->id?>"><?=$cidade->data->nome?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-6 mt-2">
                <label>Tipo</label>
                <select name="tipo" class="form-control">
                    <option selected value="">--- options ---</option>
                    <?php foreach($tipos as $tipo): ?>
                        <option value="<?=$tipo->data->id?>"><?=$tipo->data->nome?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-6 mt-2">
                <label>Objetivo</label>
                <select name="objetivo" class="form-control">
                    <option selected value="">--- options ---</option>
                    <?php foreach($objetivos as $objetivo): ?>
                        <option value="<?=$objetivo->data->id?>"><?=$objetivo->data->nome?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-6 mt-2">
                <label>Titulo</label>
                <input class="form-control" type="text" name="titulo">
            </div>
            <div class="form-group col-md-6 mt-2">
                <label>Preço</label>
                <input class="form-control" type="text" name="preco">
            </div>
            <div class="form-group col-md-6 mt-2">
                <label>Descricao</label>
                <textarea class="form-control" name="descricao"></textarea>
            </div>
            <div class="form-group col-md-6 mt-2">
                <label>Quartos</label>
                <input class="form-control" type="text" name="quartos">
            </div>
            <div class="form-group col-md-6 mt-2">
                <label>Garagem</label>
                <input class="form-control" type="text" name="garagem">
            </div>
            <div class="form-group col-md-6 mt-2">
                <label>Area</label>
                <input class="form-control" type="text" name="area">
            </div>
            <div class="form-group col-md-6 mt-2">
                <label>Observação</label>
                <textarea class="form-control" name="observacao"></textarea>
            </div>
            <div class="form-group mt-4">
                <button type="submit" class="btn text-white" style="background: #0a202b;">Cadastrar</button>
            </div>
        </form> 
    </div>
    <div class="container_space"></div>
</div>

<script>
    // Envio de Formulario Anuncio
    let formUsuario = document.querySelector("#form-anuncio");
    formUsuario.addEventListener('submit',function(e){
        e.preventDefault();
        let data = new FormData(formUsuario);
        fetch(url + "/anuncios/create",{
            method: "POST",
            body: data
        }).then(function(res){
            return res.json();
        }).then(function (res){
            if(res.status){
                alert(res.mensagem);
                location.href = url + "/anuncios";
            }else{
                alert(res.mensagem);
                location.href = url + "/anuncios";
            }
        })
    })
</script>
<?php endif; ?>