/* Variables Globales */
resultado_campo = true;
/*Fin de Variables Globales */

$("#datemask").inputmask("dd/mm/yyyy", { placeholder: "dd/mm/yyyy" });
$("#datemask2").inputmask("mm/dd/yyyy", { placeholder: "mm/dd/yyyy" });
$("[data-mask]").inputmask();

$(document).ready(function () {
	$(":input").inputmask();
	/*
 or    Inputmask().mask(document.querySelectorAll("input"));*/
});

$(document).on("click", ".btn-view-clientes", function () {
	valor_id = $(this).val();
	$.ajax({
		url: base_url + "C_clientes_proveedores/index_modal",
		type: "POST",
		dataType: "html",
		data: { id_cliente_proveedor: valor_id }, // Verificar
		success: function (data) {
			$("#modal-clientes .modal-body").html(data);
		},
	});
});

$(document).ready(function () {
	$("#id_datatable_clientes_proveedores tfoot th").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" placeholder="Buscar ' + title + '" /> ');
	});

	var table = $("#id_datatable_clientes_proveedores").dataTable({
		//scrollY: true,
		scrollX: true,
		scrollCollapse: true,
		paging: true,
		searching: true,

		// /*------------------*/
		initComplete: function () {
			// Apply the search
			this.api()
				.columns()
				.every(function () {
					var that = this;

					$("input", this.footer()).on("keyup change clear", function () {
						if (that.search() !== this.value) {
							that.search(this.value).draw();
						}
					});
				});
		},

		/*------------------*/

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
	});
});

$("#registrar").on("click", function () {

	validar_registrar();

	if (resultado_campo == true) {
		var origen = $("#origen").val();
		var condicion = $("#condicion").val();
		var tipo_persona = $("#tipo_persona").val();
		var tipo_persona_sunat = $("#tipo_persona_sunat").val();
		var tipo_documento = $("#tipo_documento").val();
		var num_documento = $("#num_documento").val();
		var nombres = $("#nombres").val();
		var ape_paterno = $("#ape_paterno").val();
		var ape_materno = $("#ape_materno").val();
		var razon_social = $("#razon_social").val();
		var direccion_fiscal = $("#direccion_fiscal").val();
		var direccion_alm1 = $("#direccion_alm1").val();
		var direccion_alm2 = $("#direccion_alm2").val();
		var departamento = $("#departamento").val();
		var provincia = $("#provincia").val();
		var distrito = $("#distrito").val();
		var telefono = $("#telefono").val();
		var celular = $("#celular").val();
		var tipo_giro = $("#tipo_giro").val();
		var condicion_pago = $("#condicion_pago").val();
		var linea_credito_soles = $("#linea_credito_soles").val();
		var credito_unitario_soles = $("#credito_unitario_soles").val();
		var disponible_soles = $("#disponible_soles").val();
		var linea_credito_dolares = $("#linea_credito_dolares").val();
		var credito_unitario_dolares = $("#credito_unitario_dolares").val();
		var disponible_dolares = $("#disponible_dolares ").val();
		var linea_opcional = $("#linea_opcional").val();
		var linea_opcional_unitaria = $("#linea_opcional_unitaria").val();
		var linea_disponible = $("#linea_disponible ").val();
		var email = $("#email").val();
		var contacto_registro = $("#contacto_registro").val();
		var email_cobranza = $("#email_cobranza").val();
		var contacto_cobranza = $("#contacto_cobranza").val();
		var tipo_cliente_pago = $("#tipo_cliente_pago").val();
		var id_usuario = $("#id_usuario").val();
		var ds_nombre_usuario = $("#ds_nombre_usuario").val();
		$.ajax({
			async: false,
			url: base_url + "C_clientes_proveedores/insertar",
			type: "POST",
			dataType: "json",
			data: {
				origen: origen,
				condicion: condicion,
				tipo_persona: tipo_persona,
				tipo_persona_sunat: tipo_persona_sunat,
				tipo_documento: tipo_documento,
				num_documento: num_documento,
				nombres: nombres,
				ape_paterno: ape_paterno,
				ape_materno: ape_materno,
				razon_social: razon_social,
				direccion_fiscal: direccion_fiscal,
				direccion_alm1: direccion_alm1,
				direccion_alm2: direccion_alm2,
				departamento: departamento,
				provincia: provincia,
				distrito: distrito,
				telefono: telefono,
				celular: celular,
				tipo_giro: tipo_giro,
				condicion_pago: condicion_pago,
				linea_credito_soles: linea_credito_soles,
				credito_unitario_soles: credito_unitario_soles,
				disponible_soles: disponible_soles,
				linea_credito_dolares: linea_credito_dolares,
				credito_unitario_dolares: credito_unitario_dolares,
				disponible_dolares: disponible_dolares,
				linea_opcional: linea_opcional,
				linea_opcional_unitaria: linea_opcional_unitaria,
				linea_disponible: linea_disponible,
				email: email,
				contacto_registro: contacto_registro,
				email_cobranza: email_cobranza,
				contacto_cobranza: contacto_cobranza,
				tipo_cliente_pago: tipo_cliente_pago,
				id_usuario: id_usuario,
				ds_nombre_usuario: ds_nombre_usuario

			},
			success: function (data) {
				debugger;
				window.location.href = base_url + "C_clientes_proveedores";
				debugger;
			},
		});
	}

});

$("#actualizar").on("click", function () {

	validar_registrar();

	if (resultado_campo == true) {

		var id_cliente_proveedor = $("#id_cliente_proveedor").val();
		var origen = $("#origen").val();
		var condicion = $("#condicion").val();
		var tipo_persona = $("#tipo_persona").val();
		var tipo_persona_sunat = $("#tipo_persona_sunat").val();
		var tipo_documento = $("#tipo_documento").val();
		var num_documento = $("#num_documento").val();
		var nombres = $("#nombres").val();
		var ape_paterno = $("#ape_paterno").val();
		var ape_materno = $("#ape_materno").val();
		var razon_social = $("#razon_social").val();
		var direccion_fiscal = $("#direccion_fiscal").val();
		var direccion_alm1 = $("#direccion_alm1").val();
		var direccion_alm2 = $("#direccion_alm2").val();
		var departamento = $("#departamento").val();
		var provincia = $("#provincia").val();
		var distrito = $("#distrito").val();
		var telefono = $("#telefono").val();
		var celular = $("#celular").val();
		var tipo_giro = $("#tipo_giro").val();
		var condicion_pago = $("#condicion_pago").val();
		var linea_credito_soles = $("#linea_credito_soles").val();
		var credito_unitario_soles = $("#credito_unitario_soles").val();
		var disponible_soles = $("#disponible_soles").val();
		var linea_credito_dolares = $("#linea_credito_dolares").val();
		var credito_unitario_dolares = $("#credito_unitario_dolares").val();
		var disponible_dolares = $("#disponible_dolares ").val();
		var linea_opcional = $("#linea_opcional").val();
		var linea_opcional_unitaria = $("#linea_opcional_unitaria").val();
		var linea_disponible = $("#linea_disponible ").val();
		var email = $("#email").val();
		var contacto_registro = $("#contacto_registro").val();
		var email_cobranza = $("#email_cobranza").val();
		var contacto_cobranza = $("#contacto_cobranza").val();
		var tipo_cliente_pago = $("#tipo_cliente_pago").val();
		var id_usuario = $("#id_usuario").val();
		var ds_nombre_usuario = $("#ds_nombre_usuario").val();

		$.ajax({
			async: false,
			url: base_url + "C_clientes_proveedores/actualizar",
			type: "POST",
			dataType: "json",
			data: {
				id_cliente_proveedor: id_cliente_proveedor,
				origen: origen,
				condicion: condicion,
				tipo_persona: tipo_persona,
				tipo_persona_sunat: tipo_persona_sunat,
				tipo_documento: tipo_documento,
				num_documento: num_documento,
				nombres: nombres,
				ape_paterno: ape_paterno,
				ape_materno: ape_materno,
				razon_social: razon_social,
				direccion_fiscal: direccion_fiscal,
				direccion_alm1: direccion_alm1,
				direccion_alm2: direccion_alm2,
				departamento: departamento,
				provincia: provincia,
				distrito: distrito,
				telefono: telefono,
				celular: celular,
				tipo_giro: tipo_giro,
				condicion_pago: condicion_pago,
				linea_credito_soles: linea_credito_soles,
				credito_unitario_soles: credito_unitario_soles,
				disponible_soles: disponible_soles,
				linea_credito_dolares: linea_credito_dolares,
				credito_unitario_dolares: credito_unitario_dolares,
				disponible_dolares: disponible_dolares,
				linea_opcional: linea_opcional,
				linea_opcional_unitaria: linea_opcional_unitaria,
				linea_disponible: linea_disponible,
				email: email,
				contacto_registro: contacto_registro,
				email_cobranza: email_cobranza,
				contacto_cobranza: contacto_cobranza,
				tipo_cliente_pago: tipo_cliente_pago,
				id_usuario: id_usuario,
				ds_nombre_usuario: ds_nombre_usuario
			},
			success: function (data) {
				debugger;
				window.location.href = base_url + "C_clientes_proveedores";
			},
		});

	}
});

function validar_registrar() {

	debugger
	var id_tipo_documento = $('#tipo_documento').val();
	var num_documento = $("#num_documento").val().length;

	if (id_tipo_documento == "0") {
		alert("Debe seleccionar el tipo de documento")
		resultado_campo = false;
	}
	else if (id_tipo_documento == "594" && num_documento != 8) {
		alert("El numero de DNI son 8 Digitos")
		resultado_campo = false;
	}
	else if (id_tipo_documento == "595" && num_documento != 12) {
		alert("El numero de CARNET DE EXTRANJERIA son 12 Digitos")
		resultado_campo = false;
	}
	else if (id_tipo_documento == "596" && num_documento != 11) {
		alert("El numero de PERSONA JURIDICA son 11 Digitos")
		resultado_campo = false;
	}
	else if (id_tipo_documento == "597" && num_documento != 11) {
		alert("El numero de PERSONA NATURAl CON NEGOCIO son 11 Digitos")
		resultado_campo = false;
	}
	else {
		resultado_campo = true;
	}
}

$("#num_documento").on({
	"focus": function (event) {
		$(event.target).select();
	},
	"keyup": function (event) {
		$(event.target).val(function (index, value) {
			return value.replace(/\D/g, "");
		});
	}
});