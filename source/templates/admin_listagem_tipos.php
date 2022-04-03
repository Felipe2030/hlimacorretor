<?php $v->layout("base"); ?>
<?php session_start(); ?>
<?php if(!isset($_SESSION["auth_usuario"])): 
   header('Location:'.url("admin"));
   exit();
else: 
    $usuario = $_SESSION["auth_usuario"];
    if($usuario->id_tipo_usuario != 1):
        echo "<h3 class='m-2'>Sem permissão!</h3>";
        exit();
    endif;
?>

<style>
.conatiner-card{
    padding: 0px 60px 0px 60px;
}
.container-card--header button{
    background: #0F2F3F;
    color: white;
}
.container-card--header button:hover{
    color: white;
}
.container-listagem{
    padding: 0px 40px;
}
@media only screen and (max-width: 600px){
    .conatiner-card{
        padding: 0px;
    }
}
</style>

<div class="container-fluid">
    <div class="card conatiner-card">
        <div class="card-header container-card--header">
            <span class="float-left">Listagem de Tipos</span>
            <button class="btn" onclick="window.location.href = '<?=url("admin/tipos/create")?>'" >Novo cadastro</button>
        </div>
        <div class="card-body">
        <table class="table">
            <thead class="bg-n3 text-white">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($tipos as $key => $tipo):?>
                <tr>
                <th scope="row"><?=$tipo->data->id?></th>
                <td><?=$tipo->data->nome?></td>
                <td>
                    <a href="<?=url("admin/tipos/editar?id={$tipo->data->id}")?>">
                        <span class="material-icons">create</span>
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
                    <a class="page-link" href="?page=<?=($page <= 1)? 1 : $page -1 ;?>" tabindex="-1">Anterior</a>
                </li>

                <?php for($i=1;$i <= $paginas; $i++): ?>
                    <li class="page-item <?php if($page == $i): echo 'active-pagination'; endif;?>"><a class="page-link" href="?page=<?=$i?>"><?=$i?></a></li>
                <?php endfor; ?>

                <li class="page-item">
                    <a class="page-link" href="?page=<?=($page >= $paginas) ? $paginas : $page + 1 ;?>">Próximo</a>
                </li>
            </ul>
        </nav>
        </div>
    </div>
</div>

<script>
    var $status = document.querySelectorAll("#status_anuncio");
    $status.forEach((e,inx) => {
        e.addEventListener("click",function(res){
            let data = new FormData();
            let id = e.getAttribute("data-id");
            data.append("id",id);
            data.append("status",e.checked);
            fetch(url+"/status",{method: "POST",body: data})
            .then(function(res){
                return res.json();
            }).then(function(res){
                if(res.status){
                    alert(res.mensagem);
                    location.href = url + "/anuncios";
                }else{
                    alert(res.mensagem);
                    location.href = url + "/anuncios";
                }
            })
        })
    })
</script>

<?php endif; ?>