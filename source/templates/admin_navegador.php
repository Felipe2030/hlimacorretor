<style>
/* THEME */
.card{
    border: 0px !important;
}
.card-header{
    border: 0px !important;
    background: #FFF !important;
}
.bg-n1{
    background: #0a202b;
}
.bg-n2{
    background: #1a4c37;
}
.bg-n3{
    background: #0F2F3F;
}

.container-card--header{
    justify-content: space-between;
    display: flex;
    align-items: center;
}

.container-card--header span{
    font-size: 1.2em;
    color: #0a202b;
    font-weight: 500;
}

.container-card--body-pagination{
    display: flex;
    justify-content: flex-end;
}

.container-card--body-pagination .active-pagination a{
    background: #0F2F3F;
    color: #FFF;
}

.container-card--body-pagination ul li a{
    color: #0a202b;
}

.container-card--body-pagination ul li a:hover{
    background: #0F2F3F;
    color: #FFF;
}
/* ENDTHEME */
</style>


<?php if(isset($_SESSION["auth_usuario"])): 
    $usuario = $_SESSION["auth_usuario"];
endif; ?>

<nav class="navbar navbar-expand-md navbar-dark bg-n1">
        <div class="container-fluid justify-content-start">
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <?php if(isset($usuario)): ?>
                <a class="d-md-none text-white nav-link"><?=$usuario->nome?> | Admin</a>
            <?php endif; ?>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               
                <ul class="col-md-8 navbar-nav me-auto mb-2 mb-lg-0 container-fluid justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="<?=url("admin")?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(!isset($usuario)) echo 'disabled';?>" href="<?=url("admin/anuncios")?>">Anuncios</a>
                    </li>
         

                    <li class="nav-item">
                        <a class="nav-link <?php if($usuario->id_tipo_usuario != 1 || !isset($usuario)) echo 'disabled';?>" href="<?=url("admin/usuarios")?>">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($usuario->id_tipo_usuario != 1 || !isset($usuario)) echo 'disabled';?>" href="<?=url("admin/configuracao")?>">Configurações</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($usuario->id_tipo_usuario != 1 || !isset($usuario)) echo 'disabled';?>" href="<?=url("admin/cidades")?>">Cidades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($usuario->id_tipo_usuario != 1 || !isset($usuario)) echo 'disabled';?>" href="<?=url("admin/tipos")?>">Tipos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($usuario->id_tipo_usuario != 1 || !isset($usuario)) echo 'disabled';?>" href="<?=url("admin/objetivos")?>">Objetivos</a>
                    </li>
                   
                </ul>
                
              
               <ul class="navbar-nav col-md-3">
                    <li class="nav-item">
                        <?php if(isset($usuario)): ?>
                            <a class="d-none d-md-block nav-link text-white"><?=$usuario->nome?> | Admin</a>
                        <?php else: ?>
                            <a class="nav-link text-white" id="login" style="cursor: pointer;">Fazer login</a>
                        <?php endif; ?>
                    </li>
                    <?php if(isset($usuario)): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=url("admin/logout")?>">Sair</a>
                    </li>
                    <?php endif; ?>
                </ul> 
                
            </div>
        </div>
    </nav>