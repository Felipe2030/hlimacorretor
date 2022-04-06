<?php $v->layout("web_base"); ?>


<?php 
    $url_base = url("");
    $url_base = str_replace("https","http",$url_base);
?>


<?php $v->start('header') ?>
    <meta property="og:url" content="<?=$url_base."/imovel?id=".$anuncio->data->id?>" />
    <!-- <meta property="og:type" content="article" /> -->
    <meta property="og:title" content="<?=$anuncio->data->titulo?>" />
    <meta property="og:description" content="<?=$anuncio->data->descricao?>" />
    <meta property="og:image" content="<?=$url_base."/".$imagens[0]->data->url_imagem?>" />
<?php $v->stop() ?>

<style>
    .conatiner_info_imovel {
        padding: 20px 30px 60px 30px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .conatiner_info_imovel div h4{
        font-size: 1.2em;
        font-weight: 600;
        margin:0px;
        text-transform: uppercase;
    }
    .conatiner_info_imovel div span{
        font-size: 0.9em;
    }
    .container_info__div_box{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0px 30px;
    }
    .cicle{
        width: 48px;
        height: 48px;
        border-radius: 24px;
        background: #ccc;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .caixa{
        margin: 0px 0px 0px 10px;
    }
    .caixa h4{
        font-size: 1em;
        margin: 0px;
    }
    .caixa span{
        margin: 0px;
        color: rgb(60, 72, 88);
        font-weight: bold;
        font-size: 1em;
    }


    .container_descricao{
        margin: 80px 0px 150px 0px;
        /* background: red; */
        width: 100%;
        /* border: 1px solid rgba(0,0,0,0.2); */
        border-radius: 5px;
        padding: 0px 100px;
    }
    .container_descricao_title{
        display: flex;
        justify-content: center;
        padding: 5px 20px;
    }
    .container_descricao_title h3{
        font-size: 1.5em;
    }
    .container_descricao_title span{
        color: rgb(60, 72, 88);
        font-weight: bold;
        font-size: 1em;
    }
    .container_img img {
        width: 100%;
        height: 80%;
    }

    .box{
        margin: 0px 0px;
        height: 385px;
    }
    .box img{
        height: 100%;
    }
    .conatiner-info{
        display: flex;
    }
    .conatiner-info .bx{
        margin: 0px 20px;
    }


    .w3-content{
        height: 598px;
        padding: 24px 120px;
        background: transparent;
    }

    .w3-button{
        width: 40px;
        height: 40px;
        font-size: 1.2em;
        font-weight: 600;
        border: 0px;
        border-radius: 2px;
        background: rgba(255,255,255,0.3);
        color: white;
        position: absolute;
        top: 45%;
    }
    .w3-button:hover{
        background: white;
        color: #1A1A1A;
    }

    .mySlides{
        width:100%;
        height: 100%;
        border-radius: 5px;
    }

    .modal-content{
        background: transparent;
        position: relative;
        border: 0px;
    }

    .button-left{
        left: 100px;
    }

    .button-right{
        right: 100px;
    }

    .container-qtd{
        position: absolute;
        top: 0;
        color: white;
        font-weight: 600;
        font-size: 1em;
    }

    .container-imagem{
        display: flex;
        padding: 0px 30px;
        margin: 0px 0px 0px 0px;
    }

    .container-ver-imagens{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 40px;
        background: #1A1A1A;
        color: white;
        font-weight: 600;
        margin: 0px 30px;
    }

    .container-ver-imagens a {
        cursor: pointer;
    }


    @media only screen and (max-width: 600px){
        .conatiner_info_imovel {
            padding: 20px 30px 10px 30px;
        }
        .container_img{
            height: 120px;
            margin-bottom: 10px;
        }
        .container_img img {
            width: 100%;
            height: 100%;
        }
        .conatiner_img{
            display: block !important;

        }
        .conatiner_img img{
            margin: 5px 0px;
        }
        .p-5{
            padding: 0px !important;
        }
        .container_descricao{
            margin: 0px 0px 40px 0px !important;
            padding: 0px !important;
        }
        .container_descricao_title h3{
            font-size: 20px !important;
        }
        .container_descricao_title span {
            color: rgb(60, 72, 88);
            font-weight: bold;
            font-size: 0.8em !important;
        }
        .caixa h4{
            color: rgb(60, 72, 88);
            font-weight: bold;
        }
        .caixa span{
            font-size: 1em !important;
        }
        .conatiner-info{
            display: block;
        }
        .conatiner-info .bx {
            margin: 20px 0px;
        }
        .box {
            margin: 10px 0px;
            height: 310px;
        }
        .box img{
            height: 100%;
        }
        .w3-content {
            height: 306px;
            padding: 0px 0px;
            background: transparent;
        }

        .button-left{
            left: 0;
        }

        .button-right{
            right: 0;
        }
        .modal-content{
            top: 170px;
            border: 0px;
        }


        .container-ver-imagens {
            margin: 0px 12px;
        }
        
        .container-imagem{
            display: block;
            padding: 0px 12px;
            margin: 0px 0px 0px 0px;
        }


    }


</style>

<!-- Modal -->
<div class="modal fade" id="modalslideimagens" tabindex="-1" role="dialog"  aria-hidden="true" style="padding:0px;">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="w3-content">
                <span class="container-qtd"><span id="troca">0</span> | <?=count($imagens)?></span>
                <?php foreach($imagens as $imagen): ?>
                    <img class="mySlides" src="<?=url("source/templates/marca_d'agua_image.php?url_image=".url($imagen->data->url_imagem));?>">
                <?php endforeach; ?>
                <button class="w3-button button-left" onclick="plusDivs(-1)">&#10094;</button>
                <button class="w3-button button-right" onclick="plusDivs(1)">&#10095;</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal --> 
<div class="modal fade" id="modalslidevideo" tabindex="-1" role="dialog"  aria-hidden="true" style="padding:0px;">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="w3-content">
                <iframe width="907" height="510" src="https://www.youtube.com/embed/<?=$anuncio->data->link?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>



<div class="align-items-center">
    <div class="col-md-12">
     
 <!-- <a class="btn" style="float: right;font-family: sans-serif;font-weight: 600;color: #212529;" id="slideimagem" style="cursor: pointer;">VER MAIS</a> -->
        
        <div class="container-ver-imagens">
            <a id="slideimagem">VER MAIS FOTOS</a>
        </div>
        
        <?php if($anuncio->data->link): ?>
            <div class="container-ver-imagens" style="background: #dc3545;">
                <a id="slidevideo">VER VIDEO</a>
            </div>
        <?php endif; ?>

        <div class="container-imagem">
            <?php 
            if(!$num_imagem < 3){ ?>
            <div class="col-md-4 box">
                <img class="w-100" src="<?=url("source/templates/marca_d'agua_image.php?url_image=".url($imagens[0]->data->url_imagem));?>" />
            </div>
            <div class="col-md-4 box">
                <img class="w-100" src="<?=url("source/templates/marca_d'agua_image.php?url_image=".url($imagens[1]->data->url_imagem));?>" />
            </div>
            <div class="col-md-4 box">
                <img class="w-100" src="<?=url("source/templates/marca_d'agua_image.php?url_image=".url($imagens[2]->data->url_imagem));?>" />
            </div>
            <?php } else { ?>
                <div class="col-md-4 box">
                    <img class="w-100" src="<?=url("source/templates/marca_d'agua_image.php?url_image=".url('source/assets/img/none.png'));?>" />
                </div>
                <div class="col-md-4 box">
                    <img class="w-100" src="<?=url("source/templates/marca_d'agua_image.php?url_image=".url('source/assets/img/none.png'));?>" />
                </div>
                <div class="col-md-4 box">
                    <img class="w-100" src="<?=url("source/templates/marca_d'agua_image.php?url_image=".url('source/assets/img/none.png'));?>" />
                </div>
            <?php }; ?>
        </div>

        <div class="conatiner_info_imovel">
            <div class="d-flex" style="justify-content: space-between;align-items: center;paddind-left:20px;">
                <h4><?=$anuncio->data->titulo?></h4>
                <span></span>
            </div>
        </div>

        <div class="container-fluid d-flex justify-content-center">
            <div class="conatiner-info">
            <div class="d-flex bx">
                <div class="caixa">
                    <?php foreach($objetivos as $objetivo):
                        if($objetivo->data->id == $anuncio->data->id_objeto){
                            $nome_tipo = $objetivo->data->nome;
                        }

                    endforeach; ?>
                    <h4><?=$nome_tipo?></h4>
                    <span style="color:rgb(1, 175, 173);font-size:1.3em;">R$ <?=$anuncio->data->preco?></span>
                </div>
            </div>
            <div class="d-flex bx">
                <div class="cicle">
                    <span class="material-icons">hotel</span>
                </div>
                <div class="caixa">
                    <h4>Dormitórios</h4>
                    <span><?=$anuncio->data->quartos?> Dormitórios</span>
                </div>
            </div>
            <div class="d-flex bx">
                <div class="cicle">
                    <span class="material-icons">directions_car</span>
                </div>
                <div class="caixa">
                    <h4>Garagens</h4>
                    <span><?=$anuncio->data->garagem?> Garagem</span>
                </div>
            </div>
            <div class="d-flex bx">
                <div class="cicle">
                    <span class="material-icons">fullscreen</span>
                </div>
                <div class="caixa">
                    <h4>Área</h4>
                    <span><?=$anuncio->data->area?> m²</span>
                </div>
            </div>
            </div>
        </div>

        <div class="container_descricao">
            <div class="container_descricao_title">
                <h3>Descrição do imóvel</h3>
            </div>
            <div class="container_descricao_title">
                <span><?=$anuncio->data->descricao?></span>
            </div>
        </div>
    </div>


    <script>
        // Modal Slide Imagens
        var slide = document.querySelector("#slideimagem");
        slide.addEventListener('click',function (e){
            e.preventDefault();
            $("#modalslideimagens").modal('show');
        })

        var slidevideo = document.querySelector("#slidevideo");
        slidevideo.addEventListener('click',function (e){
            e.preventDefault();
            $("#modalslidevideo").modal('show');
        })

        var slideIndex = 1;
        document.querySelector('#troca').innerText = slideIndex;
        showDivs(slideIndex);

        function plusDivs(n) {
            showDivs(slideIndex += n);
            document.querySelector('#troca').innerText = slideIndex;
        }

        function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("mySlides");
            if (n > x.length) {slideIndex = 1}
            if (n < 1) {slideIndex = x.length}
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            x[slideIndex-1].style.display = "block";
        }
    </script>


