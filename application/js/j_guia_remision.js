
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
$(document).on("click", ".js_lupa_cotizacion", function () {
	debugger;
	valor_id = $(this).val();
	$.ajax({
		url: base_url + "C_cotizacion/index_modal",
		type: "POST",
		dataType: "html",
		data: {
			id_cotizacion: valor_id
		},
		success: function (data) {
			$("#id_target_cotizacion .modal-content").html(data);
		}
	});
});
$("#registrar").on("click", function () {
	// validar_registrar();
	// if (resultado_campo == true) {

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
	var kilos = $("#kilos").val();
	var peso_bruto_total = $("#peso_bruto_total").val();
	var punto_partida = $("#punto_partida").val();
	var punto_llegada = $("#punto_llegada").val();
	var contenedor = $("#contenedor").val();
	var embarque = $("#embarque").val();
	var ds_sucursal_trabajador = $("#ds_sucursal_trabajador").val();
	var ds_serie_guia_remision = $("#ds_serie_guia_remision").val();
	var id_parcial_completa = $("#id_parcial_completa").val();
	debugger

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
			kilos: kilos,
			peso_bruto_total: peso_bruto_total,
			punto_partida: punto_partida,
			punto_llegada: punto_llegada,
			contenedor: contenedor,
			embarque: embarque,
			ds_sucursal_trabajador: ds_sucursal_trabajador,
			ds_serie_guia_remision: ds_serie_guia_remision,
			id_parcial_completa: id_parcial_completa

		},
		success: function (data) {
			debugger;
			window.location.href = base_url + "C_guia_remision";
			debugger;
		},
	});
	// };
});
$(document).on("click", ".btn_aprobar_estado", function () {

	debugger;
	var id_cotizacion = $(this).parents("tr").find("td")[0].innerText;
	var estado_cotizacion = $(this).parents("tr").find("td")[6].innerText;
	var id_orden_despacho = $(this).parents("tr").find("td")[7].innerText;
	var estado_orden_despacho = $(this).parents("tr").find("td")[8].innerText;

	if (estado_cotizacion == "APROBADO" && estado_orden_despacho == "PENDIENTE") {

		alert("Ya fue aprobado por el vendedor, pendiente por OD");

	} else if (estado_cotizacion == "APROBADO" && estado_orden_despacho == "APROBADO") {

		alert("Ya fue aprobado por OD, llamar al area de TI para cualquier cambio, que tenga buen dia :D");

	} else if (id_orden_despacho == "") {
		alertify.confirm("Esta seguro que desea aprobarlo",
			function () {
				$.ajax({
					async: false,
					url: base_url + "C_cotizacion/aprobar_estado",
					type: "POST",
					dataType: "json",
					data: {
						id_cotizacion: id_cotizacion,
					},
					success: function (data) {
						window.location.href = base_url + "C_cotizacion";
					},
				});
			});
	} else if (id_orden_despacho != "") {
		alertify.confirm("Esta Cotizacion ya fue aprobada anteriormente, seguro que desea hacerlo otra vez?",
			function () {
				$.ajax({
					async: false,
					url: base_url + "C_cotizacion/cambiar_estado_pendiente_cotizacion",
					type: "POST",
					dataType: "json",
					data: {
						id_cotizacion: id_cotizacion,
						id_orden_despacho: id_orden_despacho,
					},
					success: function (data) {
						window.location.href = base_url + "C_cotizacion";
					},
				});
			});
	}



});
$(document).on("click", ".btn_alerta_actualizar", function () {
	var estado_orden_despacho = $(this).parents("tr").find("td")[6].innerText;

	if (estado_orden_despacho == "APROBADO") {
		alert("Ya fue Aprobado por la OD, no puede Actualizar")
	}
});
/*Fin CRUD*/






/* Otros */
$(".select2").select2({
	theme: "bootstrap4"
});
/* Fin de Otros */