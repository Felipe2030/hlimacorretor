<?php $v->layout("base"); ?>
<?php session_start(); ?>
<?php if(!isset($_SESSION["auth_usuario"])): 
   header('Location:'.url("admin"));
   exit();
else: 
    $id = isset($_GET['id']) ? $_GET['id'] : false;
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
            <span>Editando Anuncio</span>
        </div>
         <form class="row" method="post" id="form-anuncio">
            <input type="hidden" name="id_usuario" value="<?=$usuario->id?>">
            <input type="hidden" name="id" value="<?=$id?>">
            <div class="form-group col-md-6 mt-2">
                <label>Cidade</label>
                <select name="cidade" class="form-control">
                    <option selected value="<?=$cidade[0]->data->id?>"><?=$cidade[0]->data->nome?></option>
                    <?php 
                        $cidade_id = $cidade[0]->data->id;
                        foreach($cidades as $cidade): 
                            if($cidade->data->id !=  $cidade_id):
                        ?>
                        <option value="<?=$cidade->data->id?>"><?=$cidade->data->nome?></option>
                    <?php  endif;
                    endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-6 mt-2">
                <label>Tipo</label>
                <select name="tipo" class="form-control">
                    <option selected value="<?=$tipo[0]->data->id?>"><?=$tipo[0]->data->nome?></option>
                    <?php 
                        $tipo_id = $tipo[0]->data->id;
                        foreach($tipos as $tipo): 
                            if($tipo->data->id !=  $tipo_id):
                        ?>
                        <option value="<?=$tipo->data->id?>"><?=$tipo->data->nome?></option>
                    <?php endif;
                    endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-6 mt-2">
                <label>Objetivo</label>
                <select name="objetivo" class="form-control">
                    <option selected value="<?=$objetivo[0]->data->id?>"><?=$objetivo[0]->data->nome?></option>
                    <?php 
                        $obj_id = $objetivo[0]->data->id;
                        foreach($objetivos as $objetivo): 
                        if($objetivo->data->id !=  $obj_id):
                    ?>
                        <option value="<?=$objetivo->data->id?>"><?=$objetivo->data->nome?></option>
                    <?php endif;
                    endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-6 mt-2">
                <label>Titulo</label>
                <input class="form-control" type="text" name="titulo" value="<?=$anuncio[0]->data->titulo?>">
            </div>
            <div class="form-group col-md-6 mt-2">
                <label>Preço</label>
                <input class="form-control" type="text" name="preco" value="<?=$anuncio[0]->data->preco?>">
            </div>
            <div class="form-group col-md-6 mt-2">
                <label>Descricao</label>
                <textarea class="form-control" name="descricao">
                    <?=$anuncio[0]->data->descricao?>
                </textarea>
            </div>
            <div class="form-group col-md-6 mt-2">
                <label>Quartos</label>
                <input class="form-control" type="text" name="quartos" value="<?=$anuncio[0]->data->quartos?>">
            </div>
            <div class="form-group col-md-6 mt-2">
                <label>Garagem</label>
                <input class="form-control" type="text" name="garagem"  value="<?=$anuncio[0]->data->garagem?>">
            </div>
            <div class="form-group col-md-6 mt-2">
                <label>Area</label>
                <input class="form-control" type="text" name="area"  value="<?=$anuncio[0]->data->area?>">
            </div>
            <div class="form-group col-md-6 mt-2">
                <label>Observação</label>
                <textarea class="form-control" name="observacao"><?=$anuncio[0]->data->observacao?></textarea>
            </div>
            <div class="form-group col-md-6 mt-2">
                <label>Link (Youtube) Ex: N4Nys-qFzAI</label>
                <input class="form-control" name="link" type="text" value="<?=$anuncio[0]->data->link?>">
            </div>
            <div class="form-group mt-4">
                <button type="submit" class="btn text-white" style="background: #0a202b;">Editar</button>
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
        fetch(url + "/anuncios/editar",{
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