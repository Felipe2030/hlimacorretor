<style>
    /* MODALREDEFINIR */
    #modalLoginSenha .modal-body{
        border-bottom: 5px solid #0a202b;
        border-bottom-left-radius: 2px;
        border-bottom-right-radius: 2px;
        padding: 40px;
    }

    #modalLoginSenha .modal-body .container-modal-login-header{
        text-align: center;
        border-bottom: 2px solid #0a202b;
        margin-bottom: 30px;
    }

    #modalLoginSenha .modal-body .container-modal-login-header h3{
        font-size: 2.3em;
        font-weight: 600;
        font-family: sans-serif;
    }

    #modalLoginSenha .modal-body .container-modal-login-body form label{
        font-weight: 600;
        font-family: sans-serif;
        font-size: 0.9em;
        margin: 2px 0px;
    }

    #modalLoginSenha .modal-body .container-modal-login-body form input{
        padding: 3px 10px;
    }

    #modalLoginSenha .modal-body .container-modal-login-body form button{
        font-weight: bold;
        font-family: sans-serif;
        font-size: 0.9em;
        color: white;
        width: 100%;
    }
    /* ENDMODALREDEFINIR */
</style>

<!-- Modal Esqueci Senha -->
<div class="modal fade" id="modalLoginSenha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
         <div class="container-modal-login-header">
            <h3>Redefinir senha</h3>
         </div>
         <div class="container-modal-login-body">
            <form method="post" id="form-redefiner-senha">
                <div class="form-group mt-2">
                    <label for="email">Seu e-mail</label>
                    <input class="form-control" type="email" name="email" id="email" placeholder="Digite seu e-mail">
                </div>
                <div class="form-group mt-4">
                    <button class="btn text-white col-md-12" style="background: #0a202b;" type="submit">Redefinir</button>
                </div>
            </form>
         </div>
      </div>
    </div>
  </div>
</div>

<script>
    // Modal de Esqueci Senha
    $('#login_senha').click(function(){ 
        $("#modalLogin").modal('hide');
        $("#modalLoginSenha").modal('show'); 
    })
     // Envio de Formulario Redefinir Senha
    let formRedefinirSenha = document.querySelector("#form-redefiner-senha");
    formRedefinirSenha.addEventListener('submit',function(e){
        e.preventDefault();
        let data = new FormData(formRedefinirSenha);
        fetch(url + "/usuarios/redefinir",{
            method: "POST",
            body: data
        }).then(function(res){
            return res.json();
        }).then(function(res){
            alert(res.mensagem);
            location.href = url;
        })
    })
</script>