<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>VAME</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>plantilla/login/fontawesome-all.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>plantilla/login/login.css">

</head>
<div class="container-login-c">
    <div class="container-login">
        <div class="login-logo">
            <img src="<?php echo base_url(); ?>plantilla/login/img/logo-382x62.png" class="img-responsive">
        </div>
        <div class="login-title">
            Inicio de Sesión
        </div>
        <div class="login-form">
            <div class="login-user-photo">
                <img src="<?php echo base_url(); ?>plantilla/login/img/profile-login.png" class="img-responsive">
            </div>
            <input id="usuario" class="frm-control frm-control-lg" type="text" placeholder="Usuario">
            <hr>
            <input id="contraseña" class="frm-control frm-control-lg" type="password" placeholder="Contraseña">
            <hr>
            <button class="btn btn-2 btn-lg btn-eff-1 btn-block" id="ingresar">Ingresar</button>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>plantilla/login/login.js"></script>
<script src="<?php echo base_url(); ?>plantilla/login/plugin/jquery-3.3.1.min.js"></script>
<script>
    var base_url = "<?php echo base_url(); ?>";
</script>
<script src="<?php echo base_url() ?>application/js/j_inicio.js"></script>

</html>