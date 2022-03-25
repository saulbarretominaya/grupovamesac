/* Variables Globales */
resultado_campo = true;
/*Fin de Variables Globales */

$("#datemask").inputmask("dd/mm/yyyy", { placeholder: "dd/mm/yyyy" });
//Datemask2 mm/dd/yyyy
$("#datemask2").inputmask("mm/dd/yyyy", { placeholder: "mm/dd/yyyy" });
//Money Euro
$("[data-mask]").inputmask();

$(document).ready(function () {
	$(":input").inputmask();
});

$(document).on("click", ".js_lupa_trabajador", function () {
	valor_id = $(this).val();
	$.ajax({
		url: base_url + "C_trabajadores/index_modal",
		type: "POST",
		dataType: "html",
		data: { id_trabajador: valor_id },
		success: function (data) {
			$("#id_target_trabajador .modal-content").html(data);
		},
	});
});

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

	validar_registrar();

	if (resultado_campo == true) {

		var num_documento = $("#num_documento").val();
		var nombres = $("#nombres").val();
		var ape_paterno = $("#ape_paterno").val();
		var ape_materno = $("#ape_materno").val();
		var email = $("#email").val();
		var fecha_nacimiento = $("#fecha_nacimiento").val();
		var lugar_nacimiento = $("#lugar_nacimiento").val();
		var domicilio = $("#domicilio").val();
		var referencia = $("#referencia").val();
		var telefono = $("#telefono").val();
		var celular = $("#celular").val();
		var tipo_trabajador = $("#tipo_trabajador").val();
		var almacen = $("#almacen").val();
		var cargo_trabajador = $("#cargo_trabajador").val();
		var sexo = $("#sexo").val();
		var tipo_documento = $("#tipo_documento").val();
		var nacionalidad = $("#nacionalidad").val();
		var est_civil = $("#est_civil").val();
		var grado_instruccion = $("#grado_instruccion").val();
		var departamento = $("#departamento").val();
		var provincia = $("#provincia").val();
		var distrito = $("#distrito").val();
		var id_empresa = $("#id_empresa").val();


		$.ajax({
			async: false,
			url: base_url + "C_trabajadores/registrar",
			type: "POST",
			dataType: "json",
			data: {
				num_documento: num_documento,
				nombres: nombres,
				ape_paterno: ape_paterno,
				ape_materno: ape_materno,
				email: email,
				fecha_nacimiento: fecha_nacimiento,
				lugar_nacimiento: lugar_nacimiento,
				domicilio: domicilio,
				referencia: referencia,
				telefono: telefono,
				celular: celular,
				tipo_trabajador: tipo_trabajador,
				almacen: almacen,
				cargo_trabajador: cargo_trabajador,
				sexo: sexo,
				tipo_documento: tipo_documento,
				nacionalidad: nacionalidad,
				est_civil: est_civil,
				grado_instruccion: grado_instruccion,
				departamento: departamento,
				provincia: provincia,
				distrito: distrito,
				id_empresa: id_empresa
			},
			success: function (data) {
				debugger;
				window.location.href = base_url + "C_trabajadores";
				debugger;
			},
		});
	}

});

$("#actualizar").on("click", function () {

	validar_registrar();

	if (resultado_campo == true) {

		var id_trabajador = $("#id_trabajador").val();
		var num_documento = $("#num_documento").val();
		var nombres = $("#nombres").val();
		var ape_paterno = $("#ape_paterno").val();
		var ape_materno = $("#ape_materno").val();
		var email = $("#email").val();
		var fecha_nacimiento = $("#fecha_nacimiento").val();
		var lugar_nacimiento = $("#lugar_nacimiento").val();
		var domicilio = $("#domicilio").val();
		var referencia = $("#referencia").val();
		var telefono = $("#telefono").val();
		var celular = $("#celular").val();
		var tipo_trabajador = $("#tipo_trabajador").val();
		var almacen = $("#almacen").val();
		var cargo_trabajador = $("#cargo_trabajador").val();
		var sexo = $("#sexo").val();
		var tipo_documento = $("#tipo_documento").val();
		var nacionalidad = $("#nacionalidad").val();
		var est_civil = $("#est_civil").val();
		var grado_instruccion = $("#grado_instruccion").val();
		var departamento = $("#departamento").val();
		var provincia = $("#provincia").val();
		var distrito = $("#distrito").val();
		var id_empresa = $("#id_empresa").val();
		var resultado = "";

		$.ajax({
			async: false,
			url: base_url + "C_trabajadores/actualizar",
			type: "POST",
			dataType: "json",
			data: {
				id_trabajador: id_trabajador,
				num_documento: num_documento,
				nombres: nombres,
				ape_paterno: ape_paterno,
				ape_materno: ape_materno,
				email: email,
				fecha_nacimiento: fecha_nacimiento,
				lugar_nacimiento: lugar_nacimiento,
				domicilio: domicilio,
				referencia: referencia,
				telefono: telefono,
				celular: celular,
				tipo_trabajador: tipo_trabajador,
				almacen: almacen,
				cargo_trabajador: cargo_trabajador,
				sexo: sexo,
				tipo_documento: tipo_documento,
				nacionalidad: nacionalidad,
				est_civil: est_civil,
				grado_instruccion: grado_instruccion,
				departamento: departamento,
				provincia: provincia,
				distrito: distrito,
				id_empresa: id_empresa
			},
			success: function (data) {
				window.location.href = base_url + "C_trabajadores";
				debugger;
			},

		});

	}
});

function validar_registrar() {

	var tipo_documento = $('#tipo_documento').val();
	var num_documento = $("#num_documento").val().length;
	var nombres = $('#nombres').val();
	var ape_paterno = $('#ape_paterno').val();
	var id_empresa = $('#id_empresa').val();
	var almacen = $('#almacen').val();
	var cargo_trabajador = $('#cargo_trabajador').val();
	var celular = $('#celular').val();
	var email = $('#email').val();

	if (id_empresa == 0) {
		alert("Debe Seleccionar Empresa")
		resultado_campo = false;
	}
	else if (almacen == 0) {
		alert("Debe Seleccionar Sucursal")
		resultado_campo = false;
	}
	else if (cargo_trabajador == 0) {
		alert("Debe Seleccionar Cargo del Trabajador")
		resultado_campo = false;
	}
	else if (tipo_documento == "0") {
		alert("Debe seleccionar el Tipo de Documento")
		resultado_campo = false;
	}
	else if (tipo_documento == "594" && num_documento != 8) {
		alert("El numero de DNI son 8 Digitos")
		resultado_campo = false;
	}
	else if (tipo_documento == "595" && num_documento != 12) {
		alert("El numero de CARNET DE EXTRANJERIA son 12 Digitos")
		resultado_campo = false;
	}
	else if (tipo_documento == "596" && num_documento != 11) {
		alert("El numero de PERSONA JURIDICA son 11 Digitos")
		resultado_campo = false;
	}
	else if (tipo_documento == "597" && num_documento != 11) {
		alert("El numero de PERSONA NATURAl CON NEGOCIO son 11 Digitos")
		resultado_campo = false;
	}
	else if (nombres == "") {
		alert("Debe Ingresar Nombre")
		resultado_campo = false;
	}
	else if (ape_paterno == "") {
		alert("Debe Ingresar Apellido Paterno")
		resultado_campo = false;
	}
	else if (celular == "") {
		alert("Debe Ingresar Celular")
		resultado_campo = false;
	}
	else if (email == "") {
		alert("Debe Ingresar Correo Electronico")
		resultado_campo = false;
	}
	else {
		resultado_campo = true;
	}
}