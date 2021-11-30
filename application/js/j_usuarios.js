
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
	var password = $("#password").val();
	var id_empresa = $("#id_empresa").val();
	var id_rol = $("#id_rol").val();
	var id_trabajador = $("#id_trabajador").val();

	debugger;
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
});
$("#actualizar").on("click", function () {
	debugger;
	var id_usuario = $("#id_usuario").val();
	var usuario = $("#usuario").val();
	var password = $("#password").val();
	var id_rol = $("#id_rol").val();
	debugger;
	$.ajax({
		async: false,
		url: base_url + "C_usuarios/actualizar",
		type: "POST",
		dataType: "json",
		data: {
			id_usuario: id_usuario,
			usuario: usuario,
			password: password,
			id_rol: id_rol
		},
		success: function (data) {
			debugger;
			window.location.href = base_url + "C_usuarios";
		},
	});
});
/*Fin CRUD*/



/*  Ventanas Modal Registrar */
$(document).on("click", ".js_seleccionar_modal_trabajadores", function () {
	trabajadores = $(this).val();
	split_trabajadores = trabajadores.split("*");
	$("#id_trabajador").val(split_trabajadores[0]);
	$("#ds_nombre_trabajador").val(split_trabajadores[1]);
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
		$(this).html('<input type="text" class="border-0" style="width:300px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_trabajadores thead #dtable_ape_paterno").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:200px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_trabajadores thead #dtable_ape_materno").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:200px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_trabajadores thead #dtable_ds_tipo_empresa").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:300px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_trabajadores thead #dtable_telefono").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:300px;" placeholder="' + title + '" /> ');
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



/* Otros */
$(".select2").select2({
	theme: "bootstrap4"
});
/* Fin de Otros */