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
                <input type="file" name="file[]" class="form-control" multiple="true">
            </div>
            <input type="hidden" name="id" value="<?=$id?>">
            <div class="form-group mt-4">
                <button class="btn text-white" type="submit">Enviar</button>
            </div>
        </form>

        <div class="mt-5">
            <div class="container-header__texto">
                <span>Listagem de imagem</span>
            </div>
            <table class="table">
                <thead class="bg-n3 text-white">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($imagens as $key => $imagem):?>
                    <tr>
                        <td><?=$key?></td>
                        <td><a href="<?=url($imagem->data->url_imagem)?>"><?=$imagem->data->url_imagem?></a></td>
                        <td>
                            <a href="<?=url("admin/imagem/deletar?id={$imagem->data->id}")?>">
                                <span class="material-icons">delete</span>
                            </a>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>

            <nav class="container-card--body-pagination">
                <?php $page = (isset($_GET['page'])) ? $_GET['page'] : 1; ?>
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="?id=<?=$anuncio_id?>&page=<?=($page <= 1)? 1 : $page -1 ;?>" tabindex="-1">Anterior</a>
                    </li>

                    <?php for($i=1;$i <= $paginas; $i++): ?>
                        <li class="page-item <?php if($page == $i): echo 'active-pagination'; endif;?>"><a class="page-link" href="?id=<?=$anuncio_id?>&page=<?=$i?>"><?=$i?></a></li>
                    <?php endfor; ?>

                    <li class="page-item">
                        <a class="page-link" href="?id=<?=$anuncio_id?>&page=<?=($page >= $paginas) ? $paginas : $page + 1 ;?>">Próximo</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="container_space"></div>
</div>

<script>
// Envio de Imagem
    let formImagens = document.querySelector("#form-imagens");
    formImagens.addEventListener('submit',function(e){
        e.preventDefault();
        let data = new FormData(formImagens);
        fetch(url + "/imagem/create",{
            method: "POST",
            body: data,
        }).then(function(res){
            return res.json();
        }).then(function (res){
            if(res.status){
                location.href = url + "/anuncios/upload?id=<?=$id?>";
            }else{
                alert(res.mensagem);
                location.href = url + "/anuncios/upload?id=<?=$id?>";
            }
        })
    })
</script>
<?php endif; ?>