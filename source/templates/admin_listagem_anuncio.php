<?php $v->layout("base"); ?>


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
            <span class="float-left">Listagem de Anuncios</span>
            <button class="btn" onclick="window.location.href = '<?=url('admin/anuncios/create')?>'" >Novo cadastro</button>
        </div>
        <div class="card-body">
        <table class="table">
            <thead class="bg-n3 text-white">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo</th>
                <th class="d-none d-md-table-cell" scope="col">Tipo de imovel</th>
                <th class="d-none d-md-table-cell" scope="col">Objetivo</th>
                <th scope="col">Ativo</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($anuncios as $key => $anuncio):?>
                <tr>
                <th scope="row"><?=$anuncio->data->id?></th>
                <td><?=$anuncio->data->titulo?></td>
                <td class="d-none d-md-table-cell"><?=$anuncio->data->tipo_imovel?></td>
                <td class="d-none d-md-table-cell"><?=$anuncio->data->objeto?></td>
                <td>
                <input data-id="<?=$anuncio->data->id?>" type="checkbox" name="status_anuncio" id="status_anuncio" 
                <?php echo ($anuncio->data->ativo == "S") ? "checked": ""; ?>>
                <td>
                    <a href="<?=url("admin/anuncios/upload?id={$anuncio->data->id}")?>">
                        <span class="material-icons">file_upload</span>
                    </a>
                    <a href="<?=url("admin/anuncios/editar?id={$anuncio->data->id}")?>">
                        <span class="material-icons">create</span>
                    </a>
                    <a href="<?=url("admin/anuncios/deletar?id={$anuncio->data->id}")?>">
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
