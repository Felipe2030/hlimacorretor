<?php $v->layout("web_base"); ?>

<!-- <div class="component-maior-menor">
    <button>Menor preço</button>
    <button>Maior preço</button>
</div> -->

<div class="container-body-imoveis p-4">
    <div class="container-body-geral"></div>
    <div class="container-body-cards-imoveis">
        <?php foreach($anuncios as $anuncio):?>
            <div class="cards">
                <a href="<?=url("imovel?id=".$anuncio->data->id);?>">
                    <div class="cards-header">
                        <div class="cards-header-hover"></div>
                        <!-- <div class="cards-header-title">
                            <span>--- | ---</span>
                        </div> -->
                        <div class="cards-header-codigo">
                            <span>Ref.:<?=$anuncio->data->id?></span>
                        </div>
                        <img src="<?=url("source/templates/marca_d'agua_image.php?url_image=".url($anuncio->data->imagens[0]->data->url_imagem));?>">
                    </div>
                </a>
                <div class="cards-body">
                    <div class="cards-body-header">
                        <h3><b><?=$anuncio->data->titulo?></b></h3>
                    </div>
                    <div class="cards-body-valores">
                        <h3><b>R$ <?=$anuncio->data->preco?></b></h3>
                        <div>
                            <?php
                            foreach($objetivos as $objetivo):
                                if($objetivo->data->id == $anuncio->data->id_objeto){
                                    $objetivo_card = $objetivo->data->nome;
                                }?>
                            <?php endforeach;?>
                            <span><?=$objetivo_card?></span>
                        </div>
                    </div>
                    <div class="cards-body-atributos">
                        <div>
                            <span class="material-icons">hotel</span>
                            <?=$anuncio->data->quartos?>  Dormitórios
                        </div>
                        <div>
                            <span class="material-icons">directions_car</span>
                            <?=$anuncio->data->garagem?> Garagem
                        </div>
                        <div>
                            <span class="material-icons">fullscreen</span>
                            <?=$anuncio->data->area?> m² (Área Total)
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
    <div class="container-body-paginations">
        <nav aria-label="Page navigation example">
            <?php $page = (isset($_GET['page'])) ? $_GET['page'] : 1; ?>
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="?page=<?=($page <= 1)? 1 : $page -1 ;?>" tabindex="-1">
                        <span class="material-icons">keyboard_arrow_left</span>
                    </a>
                </li>

                <?php for($i=1;$i <= $paginas; $i++): ?>
                    <li class="page-item <?php if($page == $i): echo 'active-pagination'; endif;?>"><a class="page-link" href="?page=<?=$i?>"><?=$i?></a></li>
                <?php endfor; ?>

                <li class="page-item">
                    <a class="page-link" href="?page=<?=($page >= $paginas) ? $paginas : $page + 1 ;?>">
                        <span class="material-icons">keyboard_arrow_right</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>