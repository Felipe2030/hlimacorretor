<?php $v->layout("base"); ?>
<?php session_start(); ?>
<?php if(!isset($_SESSION["auth_usuario"])): 
   header('Location:'.url("admin"));
   exit();
else: 
 $id = isset($_GET['id']) ? $_GET['id'] : false;
?>

<style>
    #form-imagens label{
        display: inline-block;
        font-size: 1em;
        color: #212529;
        text-transform: uppercase;
        font-weight: bold;
    }
    #form-imagens button{
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
            <span>Upload de imagem</span>
        </div>
        <form method="post" id="form-imagens" enctype="multipart/form-data">
            <div class="form-group mt-2">
                <label>Imagem</label>
                <input type="file" name="file" class="form-control">
            </div>
            <input type="hidden" name="id" value="<?=$id?>">
            <div class="form-group mt-4">
                <button class="btn text-white" type="submit">Enviar</button>
            </div>
        </form>
    </div>
    <div class="container_space"></div>
</div>

<script>
// Envio de Imagem
    let formImagens = document.querySelector("#form-imagens");
    formImagens.addEventListener('submit',function(e){
        e.preventDefault();
        let data = new FormData(formImagens);
        fetch(url + "/configuracao/imagem",{
            method: "POST",
            body: data,
        }).then(function(res){
            return res.json();
        }).then(function (res){
            if(res.status){
                alert(res.mensagem);
                location.href = url + "/configuracao";
            }else{
                alert(res.mensagem);
                location.href = url + "/configuracao";
            }
        })
    })
</script>
<?php endif; ?>