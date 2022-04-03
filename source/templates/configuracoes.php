<?php $v->layout("base"); ?>
<?php session_start(); ?>
<?php if(!isset($_SESSION["auth_usuario"])): 
   header('Location:'.url("admin"));
   exit();
else: ?>

<style>
    .conatiner-card{
        padding: 5px 60px 5px 60px;
        border-radius: 0px;
    }

    .container-card--header{
        border-bottom: 1px solid #0F2F3F !important;
    }

    .container-card--header button{
        background: #0F2F3F;
        color: white;
    }

    .container-card--header button:hover{
        color: white;
    }

    #button_geral button{
        background: #0F2F3F;
        color: white;
        padding: 5px 55px;
    }

    #form-cadastro-geral{
        padding: 10px;
    }

    #form-cadastro-geral label{
        margin: 4px 0px;
        font-weight: 600;
    }

    #form-cadastro-geral #button_geral{
        margin: 10px 0px;
        display: flex;
        justify-content: flex-end;
    }

    .upercase{
        text-transform: uppercase;
    }
    @media only screen and (max-width: 600px){
        .conatiner-card{
            padding: 0px;
        }
    }
</style>

<!-- Modal Objetivo -->
<!-- <div class="modal fade" id="modalobjetivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-modal-login-header">
                    <h3>Novo Objetivo</h3>
                </div>
                <div class="container-modal-login-body">
                    <form method="post" id="form-objetivo">
                        <div class="form-group mt-2">
                            <label>Objetivo</label>
                            <input class="form-control" type="text" name="objetivo">
                        </div>
                        <div class="form-group mt-4">
                            <button class="btn text-white col-md-12" style="background: #0a202b;" type="submit">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- Modal Tipo -->
<!-- <div class="modal fade" id="modaltipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-modal-login-header">
                    <h3>Novo Tipo</h3>
                </div>
                <div class="container-modal-login-body">
                    <form method="post" id="form-tipo">
                        <div class="form-group mt-2">
                            <label>Tipo</label>
                            <input class="form-control" type="text" name="tipo">
                        </div>
                        <div class="form-group mt-4">
                            <button class="btn text-white col-md-12" style="background: #0a202b;" type="submit">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- Modal Cidade -->
<!-- <div class="modal fade" id="modalcidade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-modal-login-header">
                    <h3>Nova Cidade</h3>
                </div>
                <div class="container-modal-login-body">
                    <form method="post" id="form-cidade">
                        <div class="form-group mt-2">
                            <label>Cidade</label>
                            <input class="form-control" type="text" name="cidade">
                        </div>
                        <div class="form-group mt-4">
                            <button class="btn text-white col-md-12" style="background: #0a202b;" type="submit">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="container-fluid mb-5">
    <div class="card conatiner-card">
        <div class="card-header container-card--header">
            <span class="float-left">Informações Gerais</span>
        </div>
        <div class="mt-2">
          <form id="form-cadastro-geral" method="post">
              <div class="row">
                  <div class="form-group col-md-6">
                    <label id="email">Email</label>
                    <input name="email" class="form-control" type="email" id="email" value="<?=$geral->email?>">
                  </div>
                  <div class="form-group col-md-6">
                      <label id="celular">Celular</label>
                      <input name="celular" class="form-control" type="text" id="celular" value="<?=$geral->celular?>">
                  </div>
                  <div class="form-group col-md-6">
                      <label id="creci">Creci</label>
                      <input name="creci" class="form-control" type="text" id="creci" value="<?=$geral->creci?>">
                  </div>
                  <div class="form-group col-md-6">
                      <label id="endereco">Endereço</label>
                      <input name="endereco" class="form-control" type="text" id="endereco" value="<?=$geral->endereco?>">
                  </div>
                  <div class="form-group col-md-6">
                      <label id="facebook">Facebook</label>
                      <input name="facebook" class="form-control" type="text" id="facebook" value="<?=$geral->facebook?>">
                  </div>
                  <div class="form-group col-md-6">
                      <label id="instagram">Instagran</label>
                      <input name="instagram" class="form-control" type="text" id="instagram" value="<?=$geral->instagram?>">
                  </div>
                   <div class="form-group col-md-6">
                      <label id="youtube">Youtube</label>
                      <input name="youtube" class="form-control" type="text" id="youtube" value="<?=$geral->youtube?>">
                   </div>
                  <div id="button_geral">
                      <button class="btn" id="cadastrogeral" type="submit">Salvar</button>
                  </div>
              </div>
          </form>
        </div>
    </div>
</div>

<!-- <div class="container-fluid">
    <div class="card conatiner-card">
        <div class="card-header container-card--header">
            <span class="float-left">Objetivo</span>
            <div>
                <button class="btn" id="cadastroObjetivo">Novo</button>
                <button class="btn" id="delObjetivo">Deletar</button>
            </div>
        </div>
        <div class="form-group mt-2">
            <select  id="selectObjetivo" class="form-control upercase">
                <option selected>--- Selecione ---</option>
                <?php foreach($objetivos as $objetivo): ?>
                    <option value="<?=$objetivo->data->id?>"><?=$objetivo->data->nome?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card conatiner-card">
        <div class="card-header container-card--header">
            <span class="float-left">Tipo Imóvel</span>
            <div>
                <button class="btn" id="cadastroTipo">Novo</button>
                <button class="btn" id="delTipo">Deletar</button>
            </div>
        </div>
        <div class="form-group mt-2">
            <select  id="selectTipo" class="form-control upercase">
                <option selected>--- Selecione ---</option>
                <?php foreach($tipos as $tipo): ?>
                    <option value="<?=$tipo->data->id?>"><?=$tipo->data->nome?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="card conatiner-card">
        <div class="card-header container-card--header">
            <span class="float-left">Cidades</span>
            <div>
                <button class="btn" id="cadastroCidade">Novo</button>
                <button class="btn" id="delCidade">Deletar</button>
            </div>
        </div>
        <div class="form-group mt-2">
            <select id="selectCidades" class="form-control upercase">
                <option selected>--- Selecione ---</option>
                <?php foreach($cidades as $cidade): ?>
                    <option value="<?=$cidade->data->id?>"><?=$cidade->data->nome?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
</div>

-->

<div class="container-fluid mt-5" style="margin-bottom: 100px;">
    <div class="card conatiner-card">
        <div class="card-header container-card--header">
            <span class="float-left">Imagens Gerais</span>
            <a  style="background: #0F2F3F !important;" class="btn text-white" href="<?=url("admin/configuracao/imagem?id={$geral->id}")?>">Editar</a>
        </div>
        <div class="w-100 mt-2">
            <img class="w-100" src="<?=url($geral->url);?>" />
        </div>
    </div>
</div> 

<script>
    // Envio de Formulario Geral
    let formGeral = document.querySelector("#form-cadastro-geral");
    formGeral.addEventListener('submit',function(e){
        e.preventDefault();
        let data = new FormData(formGeral);
        fetch(url + "/configuracao/geral",{
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

    // // Envio de Formulario Tipo
    // let formTipo = document.querySelector("#form-tipo");
    // formTipo.addEventListener('submit',function(e){
    //     e.preventDefault();
    //     let data = new FormData(formTipo);
    //     fetch(url + "/tipo",{
    //         method: "POST",
    //         body: data,
    //     }).then(function(res){
    //         return res.json();
    //     }).then(function (res){
    //         if(res.status){
    //             location.href = url + "/configuracao";
    //         }else{
    //             alert(res.mensagem);
    //             location.href = url + "/configuracao";
    //         }
    //     })
    // })

    // // Envio de Formulario Cidade
    // let formCidade = document.querySelector("#form-cidade");
    // formCidade.addEventListener('submit',function(e){
    //     e.preventDefault();
    //     let data = new FormData(formCidade);
    //     fetch(url + "/cidade",{
    //         method: "POST",
    //         body: data,
    //     }).then(function(res){
    //         return res.json();
    //     }).then(function (res){
    //         if(res.status){
    //             location.href = url + "/configuracao";
    //         }else{
    //             alert(res.mensagem);
    //             location.href = url + "/configuracao";
    //         }
    //     })
    // })

    // // Envio de Formulario Objetivo
    // let formObjetivo = document.querySelector("#form-objetivo");
    // formObjetivo.addEventListener('submit',function(e){
    //     e.preventDefault();
    //     let data = new FormData(formObjetivo);
    //     fetch(url + "/objetivo",{
    //         method: "POST",
    //         body: data,
    //     }).then(function(res){
    //         return res.json();
    //     }).then(function (res){
    //         if(res.status){
    //             location.href = url + "/configuracao";
    //         }else{
    //             alert(res.mensagem);
    //             location.href = url + "/configuracao";
    //         }
    //     })
    // })

    // // Del tipo
    // $('#delTipo').click(function(){
    //     let id = $("#selectTipo option:selected").val();
    //     fetch(url + "/deltipo/" + id,{ method: "POST" }).then(function (res){
    //         return res.json();
    //     }).then(function (res){
    //         location.href = url + "/configuracao";
    //     })
    // })

    // // Del objetivo
    // $('#delObjetivo').click(function(){
    //     let id = $("#selectObjetivo option:selected").val();
    //     fetch(url + "/delobjetivo/" + id,{ method: "POST" }).then(function (res){
    //         return res.json();
    //     }).then(function (res){
    //         location.href = url + "/configuracao";
    //     })
    // })

    // // Del cidade
    // $('#delCidade').click(function(){
    //     let id = $("#selectCidades option:selected").val();
    //     fetch(url + "/delcidade/" + id,{ method: "POST" }).then(function (res){
    //         return res.json();
    //     }).then(function (res){
    //         location.href = url + "/configuracao";
    //     })
    // })
</script>

<?php endif; ?>