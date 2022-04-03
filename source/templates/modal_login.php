<style>
    /* MODALLOGIN */
    #modalLogin .modal-body{
        border-bottom: 5px solid #0a202b;
        border-bottom-left-radius: 2px;
        border-bottom-right-radius: 2px;
        padding: 40px;
    }

    #modalLogin .modal-body .container-modal-login-header{
        text-align: center;
        border-bottom: 2px solid #0a202b;
        margin-bottom: 30px;
    }

    #modalLogin .modal-body .container-modal-login-header h3{
        font-size: 2.3em;
        font-weight: 600;
        font-family: sans-serif;
    }

    #modalLogin .modal-body .container-modal-login-body form label{
        font-weight: 600;
        font-family: sans-serif;
        font-size: 0.9em;
        margin: 2px 0px;
    }

    #modalLogin .modal-body .container-modal-login-body form input{
        padding: 3px 10px;
    }

    #modalLogin .modal-body .container-modal-login-body form a{
        font-weight: 600;
        font-family: sans-serif;
        font-size: 0.9em;
        text-decoration: none;
        color: #0a202b;
        float: right;
        margin: 10px 0px 20px 0px;
    }

    #modalLogin .modal-body .container-modal-login-body form button{
        font-weight: bold;
        font-family: sans-serif;
        font-size: 0.9em;
        color: white;
        width: 100%;
    }
    /* ENDMODALLOGIN */
</style>

<!-- Modal Login -->
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
         <div class="container-modal-login-header">
            <h3>Login</h3>
         </div>
         <div class="container-modal-login-body">
            <form method="post" id="form-login">
                <div class="form-group mt-2">
                    <label for="email">Seu e-mail</label>
                    <input class="form-control" type="email" name="email" id="email" placeholder="Digite seu e-mail">
                </div>
                <div class="form-group mt-2">
                    <label for="password">Sua senha</label>
                    <input class="form-control" type="password" name="password" id="password" placeholder="Digite sua senha">
                    <a href="#" id="login_senha">Esqueci minha senha</a>
                </div>
                <div class="form-group mt-4">
                    <button class="btn text-white col-md-12" style="background: #0a202b;" type="submit">Logar</button>
                </div>
            </form>
         </div>
      </div>
    </div>
  </div>
</div>

<script>
    // Modal de Login
    $('#login').click(function(){ 
        $("#modalLogin").modal('show'); 
    })

    // Envio de Formulario Login
    let formLogin = document.querySelector("#form-login");
    formLogin.addEventListener('submit',function(e){
        e.preventDefault();
        let data = new FormData(formLogin);
        fetch(url+"/login",{
            method: "POST",
            body: data
        }).then(function(res){
            return res.json();
        }).then(function(res){
            if(res.status){
                location.href = url;
            }else{
                alert(res.mensagem);
                location.href = url;
            }
        })
    })
</script>