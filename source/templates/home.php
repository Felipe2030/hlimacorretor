<?php $v->layout("web_base"); ?>

<div class="container-body">
    <div class="alert"></div>
    <div class="container-body-fanpage">
       <img src="<?=url($geral->url);?>" >
    </div>
    <div class="container-body-filter">
        <form id="form_filter" method="get" action="<?=url('')?>">
            <div class="conatiner-body-filter-div">
                <div>
                    <label for="objetivo">Objetivo</label>
                     <select name="objetivo" id="objetivo">
                        <option value="">Selecione</option>
                         <?php foreach($objetivos as $cidade): ?>
                             <option value="<?=$cidade->data->id?>"><?=$cidade->data->nome?></option>
                         <?php endforeach; ?>
                     </select>
                </div>
            </div>
            <div class="conatiner-body-filter-div">
                <div>
                    <label for="tipo">Tipo do Imóvel</label>
                     <select name="tipo" id="tipo">
                        <option value="">Selecione</option>
                         <?php foreach($tipos as $cidade): ?>
                             <option value="<?=$cidade->data->id?>"><?=$cidade->data->nome?></option>
                         <?php endforeach; ?>
                     </select>
                </div>
            </div>
            <!-- <div class="conatiner-body-filter-div">
                <div>
                    <label for="min">Valor mínimo</label>
                    <input type="number" name="min" id="min" placeholder="R$ 0,00">
                </div>
            </div> -->
            <!-- <div class="conatiner-body-filter-div">
                <div>
                    <label for="max">Valor máximo</label>
                    <input type="number" name="max" id="max" placeholder="R$ 0,00">
                </div>
            </div> -->
            <div class="conatiner-body-filter-div">
                <div>
                    <label for="cidade">Cidade</label>
                    <select name="cidade" id="cidade">
                         <option value="">Selecione</option>
                        <?php foreach($cidades as $cidade): ?>
                            <option value="<?=$cidade->data->id?>"><?=$cidade->data->nome?></option>
                        <?php endforeach; ?>
                     </select>
                </div>
            </div>
            <div class="conatiner-body-filter-div">
                <button class="button-filter" type="submit">Pesquisar</button>
            </div>
        </form>
    </div>
    <div class="container-body-header-cards">
        <h2>Imóveis em Destaque</h2>
    </div>
    <div class="container-body-cards">
        <div class="box-cards">
            <?php foreach($anuncios as $anuncio): ?>
            <div class="cards">
                <a href="<?=url("imovel?id=".$anuncio->id);?>">
                <div class="cards-header">
                    <div class="cards-header-hover"></div>
                    <!-- <div class="cards-header-title">
                        <span>--- | ---</span>
                    </div> -->
                    <div class="cards-header-codigo">
                        <span>Ref.:<?=$anuncio->id?></span>
                    </div>
                    <img src="<?=url($anuncio->imagens[0]->url_imagem);?>">
                </div>
                </a>
                <div class="cards-body">
                    <div class="cards-body-header">
                        <h3><b><?=$anuncio->titulo?></b></h3>
                    </div>
                    <div class="cards-body-valores">
                        <h3><b>R$ <?=$anuncio->preco?></b></h3>
                        <div>
                            <?php
                            foreach($objetivos as $objetivo):
                                if($objetivo->data->id == $anuncio->id_objeto){
                                    $objetivo_card = $objetivo->data->nome;
                                }?>
                            <?php endforeach;?>
                            <span><?=$objetivo_card?></span>
                        </div>
                    </div>
                    <div class="cards-body-atributos">
                        <div>
                            <span class="material-icons">hotel</span>
                            <?=$anuncio->quartos?>  Dormitórios
                        </div>
                        <div>
                            <span class="material-icons">directions_car</span>
                            <?=$anuncio->garagem?> Garagem
                        </div>
                        <div>
                            <span class="material-icons">fullscreen</span>
                            <?=$anuncio->area?> m² (Área Total)
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
    <div class="container-body-paginations">
    
        <nav aria-label="Page navigation example">
            <?php $page = (isset($_GET['page'])) ? $_GET['page'] : 1; ?>
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="?page=<?=($page <= 1)? 1 : $page -1 ;?><?=(isset($filtro)) ? $filtro : '';?>" tabindex="-1">
                        <span class="material-icons">keyboard_arrow_left</span>
                    </a>
                </li>

                <?php for($i=1;$i <= $paginas; $i++): ?>
                    <li class="page-item <?php if($page == $i): echo 'active-pagination'; endif;?>">
                        <a class="page-link" href="?page=<?=$i?><?=(isset($filtro)) ? $filtro : '';?>"><?=$i?></a>
                    </li>
                <?php endfor; ?>

                <li class="page-item">
                    <a class="page-link" href="?page=<?=($page >= $paginas) ? $paginas : $page + 1 ;?><?=(isset($filtro)) ? $filtro : '';?>">
                        <span class="material-icons">keyboard_arrow_right</span>
                    </a>
                </li>
            </ul>
        </nav>
       
    </div>
</div>

<script>
    let objetivo      = document.querySelector("#objetivo");
    let tipo_imovel   = document.querySelector("#tipo");
    let cidade        = document.querySelector("#cidade");

    let button_filter = document.querySelector("#form_filter");
    button_filter.addEventListener("submit", function(event){
        if(!objetivo.value.trim() || !tipo_imovel.value.trim() || !cidade.value.trim()){
            event.preventDefault();
            alert("Selecione todos os campos!");
        }
    })
</script>