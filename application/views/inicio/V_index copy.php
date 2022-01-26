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
            <form action="<?php echo base_url(); ?>C_inicio/ingresar" method="post">
                <input name="usuario" class="frm-control frm-control-lg" type="text" placeholder="Usuario">
                <hr>
                <input name="contraseña" class="frm-control frm-control-lg" type="password" placeholder="Contraseña">
                <hr>
                <select name="id_empresa" class="frm-control frm-control-lg">
                    <option value="0" selected>Seleccionar</option>
                    <?php foreach ($cbox_empresa as $cbox_empresa) : ?>
                        <option value="<?php echo $cbox_empresa->id_dmultitabla; ?>">
                            <?php echo $cbox_empresa->descripcion; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <hr>
                <button type="submit" class="btn btn-2 btn-lg btn-eff-1 btn-block">Ingresar</button>
            </form>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>plantilla/login/login.js"></script>
<script src="<?php echo base_url(); ?>plantilla/login/plugin/jquery-3.3.1.min.js"></script>
<script>
    var base_url = "<?php echo base_url(); ?>";
</script>
<!-- <script src="<?php echo base_url() ?>application/js/j_inicio.js"></script> -->

</html>