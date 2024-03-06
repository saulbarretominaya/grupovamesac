
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

$("#listar_2").dataTable({

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

$(document).on("click", ".js_lupa_guia_remision_productos", function () {
	valor_id = $(this).val();
	$.ajax({
		url: base_url + "C_guia_remision/index_modal_productos",
		type: "POST",
		dataType: "html",
		data: {
			id_guia_remision: valor_id
		},
		success: function (data) {
			$("#id_target_guia_remision_productos .modal-content").html(data);
		}
	});
});
$(document).on("click", ".js_lupa_guia_remision_tableros", function () {
	debugger;
	valor_id = $(this).val();
	$.ajax({
		url: base_url + "C_guia_remision/index_modal_tableros",
		type: "POST",
		dataType: "html",
		data: {
			id_guia_remision: valor_id
		},
		success: function (data) {
			$("#id_target_guia_remision_tableros .modal-content").html(data);
		}
	});
});


$("#registrar").on("click", function () {

	//validar_registrar();
	if (resultado_campo == true) {

		//Cabecera
		var tipo_transporte = $("#tipo_transporte").val();
		var ruc = $("#ruc").val();
		var transportista = $("#transportista").val();
		var domiciliado = $("#domiciliado").val();
		var licencia = $("#licencia").val();
		var marca_modelo = $("#marca_modelo").val();
		var placa = $("#placa").val();
		var observaciones = $("#observaciones").val();
		var id_tipo_envio_guia_remision = $("#id_tipo_envio_guia_remision").val();
		var ds_tipo_envio_guia_remision = $('#id_tipo_envio_guia_remision option:selected').text();
		var num_bulto = $("#num_bulto").val();
		var peso_bruto_total = $("#peso_bruto_total").val();
		var punto_partida = $("#punto_partida").val();
		var punto_llegada = $("#punto_llegada").val();
		var contenedor = $("#contenedor").val();
		var embarque = $("#embarque").val();
		var ds_sucursal_trabajador = $("#ds_sucursal_trabajador").val();
		var ds_serie_guia_remision = $("#ds_serie_guia_remision").val();
		var id_parcial_completa = $("#id_parcial_completa").val();
		var id_trabajador = $("#id_trabajador").val();
		var ds_nombre_trabajador = $("#ds_nombre_trabajador").val();
		//Empresa
		var id_guia_remision_empresa = $("#id_guia_remision_empresa").val();
		var id_empresa = $("#id_empresa").val();


		$.ajax({
			async: false,
			url: base_url + "C_guia_remision/registrar",
			type: "POST",
			dataType: "json",
			data: {
				//Cabecera
				tipo_transporte: tipo_transporte,
				ruc: ruc,
				transportista: transportista,
				domiciliado: domiciliado,
				licencia: licencia,
				marca_modelo: marca_modelo,
				placa: placa,
				observaciones: observaciones,
				id_tipo_envio_guia_remision: id_tipo_envio_guia_remision,
				ds_tipo_envio_guia_remision: ds_tipo_envio_guia_remision,
				num_bulto: num_bulto,
				peso_bruto_total: peso_bruto_total,
				punto_partida: punto_partida,
				punto_llegada: punto_llegada,
				contenedor: contenedor,
				embarque: embarque,
				ds_sucursal_trabajador: ds_sucursal_trabajador,
				ds_serie_guia_remision: ds_serie_guia_remision,
				id_parcial_completa: id_parcial_completa,
				id_trabajador: id_trabajador,
				ds_nombre_trabajador: ds_nombre_trabajador,
				//Empresa
				id_guia_remision_empresa: id_guia_remision_empresa,
				id_empresa: id_empresa

			},
			success: function (data) {
				debugger;
				window.location.href = base_url + "C_guia_remision";
				debugger;
			},
		});
	}
});

$("#actualizar").on("click", function () {

	//validar_registrar();
	if (resultado_campo == true) {

		//Cabecera
		var id_guia_remision = $("#id_guia_remision").val();
		var tipo_transporte = $("#tipo_transporte").val();
		var ruc = $("#ruc").val();
		var transportista = $("#transportista").val();
		var domiciliado = $("#domiciliado").val();
		var licencia = $("#licencia").val();
		var marca_modelo = $("#marca_modelo").val();
		var placa = $("#placa").val();
		var observaciones = $("#observaciones").val();
		var id_tipo_envio_guia_remision = $("#id_tipo_envio_guia_remision").val();
		var ds_tipo_envio_guia_remision = $('#id_tipo_envio_guia_remision option:selected').text();
		var num_bulto = $("#num_bulto").val();
		var peso_bruto_total = $("#peso_bruto_total").val();
		var punto_partida = $("#punto_partida").val();
		var punto_llegada = $("#punto_llegada").val();
		var contenedor = $("#contenedor").val();
		var embarque = $("#embarque").val();

		debugger;

		$.ajax({
			async: false,
			url: base_url + "C_guia_remision/actualizar",
			type: "POST",
			dataType: "json",
			data: {
				//Cabecera
				id_guia_remision: id_guia_remision,
				tipo_transporte: tipo_transporte,
				ruc: ruc,
				transportista: transportista,
				domiciliado: domiciliado,
				licencia: licencia,
				marca_modelo: marca_modelo,
				placa: placa,
				observaciones: observaciones,
				id_tipo_envio_guia_remision: id_tipo_envio_guia_remision,
				ds_tipo_envio_guia_remision: ds_tipo_envio_guia_remision,
				num_bulto: num_bulto,
				peso_bruto_total: peso_bruto_total,
				punto_partida: punto_partida,
				punto_llegada: punto_llegada,
				contenedor: contenedor,
				embarque: embarque
			},
			success: function (data) {
				debugger;
				window.location.href = base_url + "C_guia_remision";
				debugger;
			},
		});
	}
});

$(document).on("click", ".btn_aprobar_estado", function () {

	debugger;

	var id_guia_remision = $(this).closest('tr').find('#id_guia_remision').val();
	var estado_guia = $(this).parents("tr").find("td")[13].innerText;


	if (estado_guia == "PENDIENTE") {
		alertify.confirm("Esta seguro que desea aprobarlo",
			function () {
				$.ajax({
					async: false,
					url: base_url + "C_guia_remision/aprobar_estado",
					type: "POST",
					dataType: "json",
					data: {
						id_guia_remision: id_guia_remision,
					},
					success: function (data) {
						window.location.href = base_url + "C_guia_remision";
					},
				});
			});
	} else if (estado_guia == "APROBADO") {
		alert("Ya fue Aprobado");
	}

});
$(document).on("click", ".btn_alerta_actualizar", function () {
	var estado_orden_despacho = $(this).parents("tr").find("td")[6].innerText;

	if (estado_orden_despacho == "APROBADO") {
		alert("Ya fue Aprobado por la OD, no puede Actualizar")
	}
});
/*Fin CRUD*/


function validar_registrar() {

	var tipo_transporte = $("#tipo_transporte").val();
	var ruc = $("#ruc").val();
	var transportista = $("#transportista").val();
	var domiciliado = $("#domiciliado").val();
	var licencia = $("#licencia").val();
	var marca_modelo = $("#marca_modelo").val();
	var placa = $("#placa").val();
	var id_tipo_envio_guia_remision = $("#id_tipo_envio_guia_remision").val();
	var peso_bruto_total = $("#peso_bruto_total").val();
	var num_bulto = $("#num_bulto").val();
	var punto_partida = $("#punto_partida").val();
	var punto_llegada = $("#punto_llegada").val();

	if (tipo_transporte == "") {
		alert("Ingrese Tipo Transporte")
		resultado_campo = false;
	}
	else if (ruc == "") {
		alert("Ingrese RUC")
		resultado_campo = false;
	}
	else if (transportista == "") {
		alert("Ingrese Transportista")
		resultado_campo = false;
	}
	else if (domiciliado == "") {
		alert("Ingrese Domiciliado")
		resultado_campo = false;
	}
	else if (licencia == "") {
		alert("Ingrese Licencia")
		resultado_campo = false;
	}
	else if (marca_modelo == "") {
		alert("Ingrese Marca y Modelo")
		resultado_campo = false;
	}
	else if (placa == "") {
		alert("Ingrese Placa")
		resultado_campo = false;
	}
	else if (id_tipo_envio_guia_remision == 0) {
		alert("Seleccione Tipo Envio")
		resultado_campo = false;
	}
	else if (peso_bruto_total == "") {
		alert("Ingrese Peso Bruto Total")
		resultado_campo = false;
	}
	else if (num_bulto == "") {
		alert("Ingrese Num. Bulto")
		resultado_campo = false;
	}
	else if (punto_partida == "") {
		alert("Ingrese Punto Partida")
		resultado_campo = false;
	}
	else if (punto_llegada == "") {
		alert("Ingrese Punto Llegada")
		resultado_campo = false;
	}
	else {
		resultado_campo = true;
	}
}

/* Otros */
$(".select2").select2({
	theme: "bootstrap4"
});
/* Fin de Otros */