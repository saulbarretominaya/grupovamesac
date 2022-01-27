/* Variables Globales */
resultado_campo = true;
/*Fin de Variables Globales */


/* CRUD */
$("#listar").dataTable({

	scrollX: true,
	scrollCollapse: true,
	paging: true,
	searching: true,

	language: {
		lengthMenu: "Mostrar _MENU_ registros por pagina",
		zeroRecords: "No se encontraron resultados en su busqueda",
		searchPlaceholder: "Buscar registros",
		info: "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
		infoEmpty: "No existen registros",
		infoFiltered: "(filtrado de un total de _MAX_ registros)",
		search: "Buscar:",
		paginate: {
			first: "Primero",
			last: "Último",
			next: "Siguiente",
			previous: "Anterior",
		},
	},
	"ordering": false
});
$("#registrar").on("click", function () {

	var usuario = $("#usuario").val();

	validar_registrar();

	if (resultado_campo == true) {

		$.ajax({
			async: false,
			url: base_url + "C_usuarios/validar_usuario_repetido_registrar",
			type: "POST",
			dataType: "json",
			data: {
				usuario: usuario
			},
			success: function (data) {
				debugger;
				cantidad_usuario = data["cantidad_usuario"]
				if (cantidad_usuario == "0") {
					registrar();
				} else if (cantidad_usuario == "1") {
					alert("El usuario ya se encuentra Registrado");
				}
			},
		});
	}
});
$("#actualizar").on("click", function () {
	var id_usuario = $("#id_usuario").val();
	var usuario = $("#usuario").val();

	validar_registrar();

	if (resultado_campo == true) {
		$.ajax({
			async: false,
			url: base_url + "C_usuarios/validar_usuario_repetido_actualizar",
			type: "POST",
			dataType: "json",
			data: {
				id_usuario: id_usuario,
				usuario: usuario
			},
			success: function (data) {
				cantidad_usuario = data["cantidad_usuario"]
				if (cantidad_usuario == "1") {
					actualizar();
				} else if (cantidad_usuario == "0") {
					$.ajax({
						async: false,
						url: base_url + "C_usuarios/validar_usuario_repetido_registrar",
						type: "POST",
						dataType: "json",
						data: {
							usuario: usuario
						},
						success: function (data) {
							cantidad_usuario = data["cantidad_usuario"]
							if (cantidad_usuario == "0") {
								actualizar();
							} else if (cantidad_usuario == "1") {
								alert("El usuario ya se encuentra Registrado");
							}
						},
					});
				}
			},
		});
	}
});
/*Fin CRUD*/


/*  Ventanas Modal Registrar */
$(document).on("click", ".js_seleccionar_modal_trabajadores", function () {
	trabajadores = $(this).val();
	split_trabajadores = trabajadores.split("*");
	$("#id_trabajador").val(split_trabajadores[0]);
	$("#ds_nombre_trabajador").val(split_trabajadores[1]);
	$("#ds_empresa").val(split_trabajadores[2]);
	$("#ds_almacen").val(split_trabajadores[3]);
	$("#opcion_target_trabajadores").modal("hide");
});
$(document).ready(function () {

	/* Modal 1 */
	$("#id_datatable_trabajadores thead #dtable_num_documento").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:150px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_trabajadores thead #dtable_nombres").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:150px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_trabajadores thead #dtable_ape_paterno").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:150px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_trabajadores thead #dtable_ape_materno").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:150px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_trabajadores thead #dtable_ds_cargo_trabajador").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:200px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_trabajadores thead #dtable_ds_empresa").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:200px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_trabajadores thead #dtable_ds_sucursal").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:200px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_trabajadores thead #dtable_telefono").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:100px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_trabajadores").dataTable({

		initComplete: function () {
			this.api()
				.columns()
				.every(function () {
					var that = this;

					$("input", this.header()).on("keyup change clear", function () {
						if (that.search() !== this.value) {
							that.search(this.value).draw();
						}
					});
				});
		},

		language: {
			lengthMenu: "Mostrar _MENU_ registros por pagina",
			zeroRecords: "No se encontraron resultados en su busqueda",
			searchPlaceholder: "Buscar registros",
			info: "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
			infoEmpty: "No existen registros",
			infoFiltered: "(filtrado de un total de _MAX_ registros)",
			search: "Buscar:",
			paginate: {
				first: "Primero",
				last: "Último",
				next: "Siguiente",
				previous: "Anterior",
			},
		},
		"ordering": false
	});
	/*Fin Modal 1 */

});
/* Fin de Ventanas Modal Registrar*/


function validar_registrar() {

	var ds_nombre_trabajador = $('#ds_nombre_trabajador').val();
	var ds_empresa = $('#ds_empresa').val();
	var ds_almacen = $('#ds_almacen').val();
	var usuario = $('#usuario').val();
	var password = $('#password').val();
	var id_empresa = $('#id_empresa').val();
	var id_rol = $('#id_rol').val();

	if (ds_nombre_trabajador == "") {
		alert("El trabajador debe tener un Nombre")
		resultado_campo = false;
	}
	else if (ds_empresa == "") {
		alert("El trabajador debe pertecener a una Empresa")
		resultado_campo = false;
	}
	else if (ds_almacen == "") {
		alert("El trabajador debe pertecener a una Sucursal")
		resultado_campo = false;
	}
	else if (usuario == "") {
		alert("Debe Ingresar Usuario")
		resultado_campo = false;
	}
	else if (password == "") {
		alert("Debe Ingresar Contraseña")
		resultado_campo = false;
	}
	else if (id_empresa == 0) {
		alert("Debe Seleccionar Acessos Empresas")
		resultado_campo = false;
	}
	else if (id_rol == 0) {
		alert("Debe Seleccionar Rol")
		resultado_campo = false;
	}
	else {
		resultado_campo = true;
	}
}
function registrar() {

	var usuario = $("#usuario").val();
	var password = $("#password").val();
	var id_empresa = $("#id_empresa").val();
	var id_rol = $("#id_rol").val();
	var id_trabajador = $("#id_trabajador").val();

	$.ajax({
		async: false,
		url: base_url + "C_usuarios/registrar",
		type: "POST",
		dataType: "json",
		data: {
			usuario: usuario,
			password: password,
			id_empresa: id_empresa,
			id_rol: id_rol,
			id_trabajador: id_trabajador
		},
		success: function (data) {
			debugger;
			window.location.href = base_url + "C_usuarios";
		},
	});
}
function actualizar() {

	var id_usuario = $("#id_usuario").val();
	var usuario = $("#usuario").val();
	var password = $("#password").val();
	var id_empresa = $("#id_empresa").val();
	var id_rol = $("#id_rol").val();
	var id_trabajador = $("#id_trabajador").val();

	$.ajax({
		async: false,
		url: base_url + "C_usuarios/actualizar",
		type: "POST",
		dataType: "json",
		data: {
			id_usuario: id_usuario,
			usuario: usuario,
			password: password,
			id_empresa: id_empresa,
			id_rol: id_rol,
			id_trabajador: id_trabajador
		},
		success: function (data) {
			debugger;
			window.location.href = base_url + "C_usuarios";
		},
	});
}


/* Otros */
$(".select2").select2({
	theme: "bootstrap4"
});
/* Fin de Otros */