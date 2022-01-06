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
/*Fin CRUD*/

/*Evento */
$(document).on("click", ".btn_aplicar_tipo_cambio", function () {

	var id_orden_despacho = $(this).parents("tr").find("td")[2].innerText;
	var condicion_pago = $(this).parents("tr").find("td")[5].innerText;
	var valor_cambio = $(this).parents("tr").find("td")[6].innerText;
	var resultado_valor_c = $(this).parents("tr").find("td")[7].innerText;
	var moneda = $(this).parents("tr").find("td")[8].innerText;
	var monto_cotizacion = $(this).parents("tr").find("td")[9].innerText;
	var resultado_valor_cambio = Number(monto_cotizacion) / Number(valor_cambio);
	debugger;
	if (condicion_pago == "CONTADO") {
		alert("No puede aplicar el Tipo Cambio ya que la condicion de Pago es al Contado");
	}
	else if (moneda == "SOLES" && resultado_valor_c == "") {
		alertify.confirm("Esta seguro de aplicar el Tipo de Cambio",
			function () {
				$.ajax({
					async: false,
					url: base_url + "C_orden_despacho/aplicar_tipo_cambio",
					type: "POST",
					dataType: "json",
					data: {
						id_orden_despacho: id_orden_despacho,
						resultado_valor_cambio: resultado_valor_cambio,
					},
					success: function (data) {
						window.location.href = base_url + "C_orden_despacho";
					},
				});
			},
			function () {
			});
	} else {
		alert("No puede aplicar el Tipo Cambio");
	}



});

$(document).on("click", ".btn_aprobar_estado", function () {

	var id_orden_despacho = $(this).parents("tr").find("td")[2].innerText;
	var id_cliente_proveedor = $(this).parents("tr").find(document.getElementsByName("id_cliente_proveedor")).val();
	var linea_credito_dolares = $(this).parents("tr").find(document.getElementsByName("disponible_dolares")).val();
	var condicion_pago = $(this).parents("tr").find("td")[5].innerText;

	var resultado_valor_cambio = $(this).parents("tr").find("td")[7].innerText;
	var tipo_moneda = $(this).parents("tr").find("td")[8].innerText;
	var monto_cotizacion = $(this).parents("tr").find("td")[9].innerText;
	var estado_orden_despacho = $(this).parents("tr").find("td")[10].innerText;
	debugger;
	if (resultado_valor_cambio == "" && tipo_moneda == "DOLARES") {
		var nueva_linea_credito = Number(linea_credito_dolares) - Number(monto_cotizacion)
	} else if (resultado_valor_cambio != "" && tipo_moneda == "SOLES") {
		var nueva_linea_credito = Number(linea_credito_dolares) - Number(resultado_valor_cambio)
	}
	debugger;

	if (condicion_pago == "CONTADO" && estado_orden_despacho == "PENDIENTE") {
		$.ajax({
			async: false,
			url: base_url + "C_orden_despacho/aprobar_estado_directo",
			type: "POST",
			dataType: "json",
			data: {
				id_orden_despacho: id_orden_despacho,
			},
			success: function (data) {
				window.location.href = base_url + "C_orden_despacho";
			},
		});
	}
	else if (estado_orden_despacho == "APROBADO") {

		alert("Ya fue Aprobado");

	}
	else if (tipo_moneda == "SOLES" && resultado_valor_cambio == "") {

		alert("Primero debe aplicar el tipo de cambio");

	} else if (estado_orden_despacho == "PENDIENTE") {

		alertify.confirm("Su linea de credito del cliente es de: $ " + linea_credito_dolares + ", esta seguro que desea aprobarlo?",
			function () {
				$.ajax({
					async: false,
					url: base_url + "C_orden_despacho/aprobar_estado",
					type: "POST",
					dataType: "json",
					data: {
						id_orden_despacho: id_orden_despacho,
						id_cliente_proveedor: id_cliente_proveedor,
						nueva_linea_credito: nueva_linea_credito,
						monto_cotizacion: monto_cotizacion,
						linea_credito_dolares: linea_credito_dolares
					},
					success: function (data) {
						window.location.href = base_url + "C_orden_despacho";
					},
				});
			},
			function () {
			});
	} else if (estado_orden_despacho == "APROBADO") {
		alert("Ya fue Aprobado")
	} else if (estado_orden_despacho == "DESAPROBADO") {
		alert("Ya fue Desaprobado")
	} else if (estado_orden_despacho == "DESAPROBADO") {
		alert("Ya fue Desaprobado")
	}
});

$(document).on("click", ".btn_desaprobar_estado", function () {

	debugger;
	var id_orden_despacho = $(this).parents("tr").find("td")[2].innerText;
	var id_cotizacion = $(this).parents("tr").find("td")[0].innerText;

	var estado_orden_despacho = $(this).parents("tr").find("td")[10].innerText;

	if (estado_orden_despacho == "PENDIENTE") {
		alertify.confirm("Seguro que desea desaprobarlo?",
			function () {
				$.ajax({
					async: false,
					url: base_url + "C_orden_despacho/desaprobar_estado",
					type: "POST",
					dataType: "json",
					data: {
						id_orden_despacho: id_orden_despacho,
						id_cotizacion: id_cotizacion
					},
					success: function (data) {
						window.location.href = base_url + "C_orden_despacho";
					},
				});
			},
			function () {
			});
	} else if (estado_orden_despacho == "APROBADO") {
		alert("Ya fue Aprobado")
	} else if (estado_orden_despacho == "DESAPROBADO") {
		alert("Ya fue Desaprobado")
	}
});

/* Fin Evento */



