


$("#ingresar").on("click", function () {

    debugger;

    var usuario = $("#usuario").val();
    var contraseña = $("#contraseña").val();

    $.ajax({
        async: false,
        url: base_url + "C_inicio/ingresar",
        type: "POST",
        dataType: "json",
        data: {
            usuario: usuario,
            contraseña: contraseña,
        },
        success: function (data) {
            debugger;
            window.location.href = base_url + "C_menu";
        },
    });
});