<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$title?></title>
    <script src="<?=url("source/assets/js/jquery-3.1.1.min.js");?>"></script>
    <script src="<?=url("source/assets/js/popper.min.js");?>"></script>
    <script src="<?=url("source/assets/js/bootstrap.min.js");?>"></script>
    <link href="<?=url("source/assets/css/bootstrap.min.css");?>" rel="stylesheet">
    <link href="<?=url("source/assets/css/material_icon.css");?>" rel="stylesheet">
    <script> let url = '<?=url('admin')?>'; </script>
    <style> 
    * { padding: 0px; margin: 0px; list-style-type: none !important; text-decoration: none !important; }
    .m-3{ margin:0px !important; padding: 0px !important; }
    </style>
</head>
<body>
    <?php include_once("source/templates/admin_navegador.php"); ?>
    <main class="main_content m-3">
      <?= $v->section("content"); ?>
    </main>
</body>
</html>
