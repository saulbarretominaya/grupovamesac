/* Variables Globales */

resultado_campo = true;
codigo_voucher_duplicado = true;
/*Fin de Variables Globales */



$("#datemask").inputmask("dd/mm/yyyy", { placeholder: "dd/mm/yyyy" });
//Datemask2 mm/dd/yyyy
$("#datemask2").inputmask("mm/dd/yyyy", { placeholder: "mm/dd/yyyy" });
//Money Euro
$("[data-mask]").inputmask();

$(document).ready(function () {
	$(":input").inputmask();
	/*
 or    Inputmask().mask(document.querySelectorAll("input"));*/
});



//MODAL DE DETALLE DE COMPRAS
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

// Listar Compras
$("#id_datatable_compras").dataTable({

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



$(document).on("click", ".js_seleccionar_modal_proveedores", function () {

	proveedores = $(this).val();
	split_proveedores = proveedores.split("*");
	$("#id_proveedor").val(split_proveedores[0]);
	$("#proveedor").val(split_proveedores[1]);


	// $("#opcion_target_producto").modal("hide");
});
$(document).ready(function () {

	/* Modal 1 */
	$("#id_datatable_proveedores thead #dtable_codigo").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:150px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_proveedores thead #dtable_razon_social").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:300px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_proveedores thead #dtable_ruc").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:400px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_proveedores thead #dtable_correo").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:50px;" placeholder="' + title + '" /> ');
	});

	$("#id_datatable_proveedores").dataTable({

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
/* Fin de Modal*/
$("#subtotal_factura").keyup(function () {

	var subtotal_factura = Number($("#subtotal_factura").val());
	// debugger;
	var igv = subtotal_factura * 0.18
	var total_factura = Number((subtotal_factura) + (igv));
	$("#igv_factura").val(igv);
	$("#total_factura").val(total_factura);
	$("#total_deuda_voucher").val(total_factura);
	$("#monto_pagado_voucher").val(0);
	$("#monto_pendiente_voucher").val(0);

});
$("#agregar_pago").on("click", function (e) {

	// validar_registro();
	validar_detalle_pagos();



	// debugger;
	var voucher_pago = "P00-" + $("#voucher_pago").val();
	var transaccion = $("#transaccion").val();
	var fecha_pago_voucher = $("#fecha_pago_voucher").val();
	var tipo_cambio = $("#tipo_cambio").val();
	var numero_deposito = $("#numero_deposito").val();
	var numero_letra_cheque = $("#numero_letra_cheque").val();
	var banco = $("#banco").val();
	var ds_banco = $('#banco option:selected').text();
	var medio_pago_voucher = $("#medio_pago_voucher").val();
	var ds_medio_pago_voucher = $('#medio_pago_voucher option:selected').text();
	var leyenda = $("#leyenda").val();
	var estado_voucher = $("#estado_voucher").val(1);
	var importe_pago = Number($("#importe_pago").val());
	var observacion_voucher = $("#observacion_voucher").val();

	if (resultado_campo == true) {

		html = "<tr>";
		html += "<input type='hidden' name='transaccion[]'	 value='" + transaccion + "'>";
		html += "<input type='hidden' name='tipo_cambio[]' 	value='" + tipo_cambio + "'>";
		html += "<input type='hidden' name='numero_deposito[]' 	value='" + numero_deposito + "'>";
		html += "<input type='hidden' name='numero_letra_cheque[]' 	value='" + numero_letra_cheque + "'>";
		html += "<input type='hidden' name='leyenda[]' 	value='" + leyenda + "'>";
		html += "<input type='hidden' name='observacion_voucher[]' 	value='" + observacion_voucher + "'>";

		html += "<td><input type='hidden' name='voucher_pago[]'	 value='" + voucher_pago + "'>" + voucher_pago + "</td>";
		html += "<td><input type='hidden' name='fecha_pago_voucher[]' 	value='" + fecha_pago_voucher + "'>" + fecha_pago_voucher + "</td>";
		html += "<input type='hidden' name='medio_pago_voucher[]' 	value='" + medio_pago_voucher + "'>";
		html += "<td><input type='hidden' name='ds_medio_pago_voucher[]' 	value='" + ds_medio_pago_voucher + "'>" + ds_medio_pago_voucher + "</td>";
		html += "<input type='hidden' name='banco[]' 	value='" + banco + "'>";
		html += "<td><input type='hidden' name='ds_banco[]' 	value='" + ds_banco + "'>" + ds_banco + "</td>";
		html += "<td><input type='hidden' name='importe_pago[]' 	value='" + importe_pago + "'>" + importe_pago + "</td>";
		html += "<td><input type='hidden' name='estado_voucher[]' 	value='" + estado_voucher + "'>" + estado_voucher + "</td>";


		html += "</tr>";

		$("#id_table_detalles_pagos tbody").append(html);

		// Posibemente
		var monto_pre = 0;
		$("#id_table_detalles_pagos tbody tr").each(function () {
			debugger;

			var monto_pago = $(this).find("td:eq(4)").text();
			// valor = Number(valorcito.replace(/,/g, ''));
			valor = Number(monto_pago);

			monto_pre += valor;

			var pago = $("#monto_pagado_voucher").val(monto_pre);

		});

		var monto_pagado_voucher = Number($("#monto_pagado_voucher").val());
		var total_deuda_voucher = Number($("#total_deuda_voucher").val());

		var pendiente = (total_deuda_voucher) - (monto_pagado_voucher);

		var monto_pendiente_voucher = ($("#monto_pendiente_voucher").val(pendiente));

	}

	// limpiar_campos_pagos();
});




$("#subtotal_factura").keyup(function () {

	var subtotal_factura = Number($("#subtotal_factura").val());
	// debugger;
	var igv = subtotal_factura * 0.18
	var total_factura = Number((subtotal_factura) + (igv));
	$("#igv_factura").val(igv);
	$("#total_factura").val(total_factura);
	$("#total_deuda_voucher").val(total_factura);
	$("#monto_pagado_voucher").val(0);
	$("#monto_pendiente_voucher").val(0);

});


// INSERTAR

$("#registrar").on("click", function () {
	debugger;
	validar_registro()
	// validar_detalle_pagos();

	if (resultado_campo == true) {
		// Registro de Compras
		var count = $('#id_table_detalles_pagos tr').length;



		var id_trabajador = $("#encargado").val();
		var fecha_emision_voucher = $("#fecha_emision_voucher").val();
		var fecha_vencimiento_voucher = $("#fecha_vencimiento_voucher").val();
		var tipo_comprobante = $("#tipo_comprobante").val();
		var numero_serie = $("#numero_serie").val();
		var mercaderia = $("#mercaderia ").val();
		var id_cliente_proveedor = $("#id_proveedor").val();
		var condicion_pago = $("#condicion_pago").val();
		var medio_pago = $("#medio_pago").val();
		var moneda = $("#moneda ").val();
		var cta_ent = $("#cta_ent").val();
		var subtotal_factura = $("#subtotal_factura").val();
		var igv_factura = $("#igv_factura").val();
		var total_factura = $("#total_factura").val();
		var estado_compra = $("#estado_compra").val();
		var observacion_pago = $("#observacion_pago").val();

		// Pagos Compras

		// var codigo_pago_voucher = $("#codigo_pago_voucher").val();
		// var voucher_pago = $("#voucher_pago").val();
		// var fecha_pago_voucher = $("#fecha_pago_voucher").val();
		// var medio_pago_voucher = $("#medio_pago_voucher").val();
		// var estado_voucher = $("#estado_voucher").val();

		var transaccion = Array.prototype.slice.call(document.getElementsByName("transaccion[]")).map((e) => e.value);
		var tipo_cambio = Array.prototype.slice.call(document.getElementsByName("tipo_cambio[]")).map((e) => e.value);
		var numero_deposito = Array.prototype.slice.call(document.getElementsByName("numero_deposito[]")).map((e) => e.value);
		var numero_letra_cheque = Array.prototype.slice.call(document.getElementsByName("numero_letra_cheque[]")).map((e) => e.value);
		var banco = Array.prototype.slice.call(document.getElementsByName("banco[]")).map((e) => e.value);
		var importe_pago = Array.prototype.slice.call(document.getElementsByName("importe_pago[]")).map((e) => e.value);
		var leyenda = Array.prototype.slice.call(document.getElementsByName("leyenda[]")).map((e) => e.value);
		var observacion_voucher = Array.prototype.slice.call(document.getElementsByName("observacion_voucher[]")).map((e) => e.value);

		// Detalle de Programacion de Pagos

		var voucher_pago = Array.prototype.slice.call(document.getElementsByName("voucher_pago[]")).map((e) => e.value);
		var fecha_pago_voucher = Array.prototype.slice.call(document.getElementsByName("fecha_pago_voucher[]")).map((e) => e.value);
		var medio_pago_voucher = Array.prototype.slice.call(document.getElementsByName("medio_pago_voucher[]")).map((e) => e.value);
		var estado_voucher = Array.prototype.slice.call(document.getElementsByName("estado_voucher[]")).map((e) => e.value);

		// Suma de Precios

		var total_deuda_voucher = $("#total_deuda_voucher").val();
		var monto_pagado_voucher = $("#monto_pagado_voucher").val();
		var monto_pendiente_voucher = $("#monto_pendiente_voucher").val();


		$.ajax({
			async: false,
			url: base_url + "C_compras/insertar",
			type: "POST",
			dataType: "json",
			data: {
				count: count,
				id_trabajador: id_trabajador,
				fecha_emision_voucher: fecha_emision_voucher,
				fecha_vencimiento_voucher: fecha_vencimiento_voucher,
				tipo_comprobante: tipo_comprobante,
				numero_serie: numero_serie,
				mercaderia: mercaderia,
				id_cliente_proveedor: id_cliente_proveedor,
				condicion_pago: condicion_pago,
				medio_pago: medio_pago,
				moneda: moneda,
				cta_ent: cta_ent,
				subtotal_factura: subtotal_factura,
				igv_factura: igv_factura,
				total_factura: total_factura,
				estado_compra: estado_compra,
				observacion_pago: observacion_pago,


				// Pagos Compras

				// codigo_pago_voucher: codigo_pago_voucher,
				voucher_pago: voucher_pago,
				transaccion: transaccion,
				fecha_pago_voucher: fecha_pago_voucher,
				tipo_cambio: tipo_cambio,
				numero_deposito: numero_deposito,
				numero_letra_cheque: numero_letra_cheque,
				banco: banco,
				medio_pago_voucher: medio_pago_voucher,
				importe_pago: importe_pago,
				leyenda: leyenda,
				observacion_voucher: observacion_voucher,
				estado_voucher: estado_voucher,

				// Detalle de Programacion de Pagos

				// dt_voucher_pago: dt_voucher_pago,
				// dt_fecha_pago_voucher: dt_fecha_pago_voucher,
				// dt_ds_medio_pago_voucher: dt_ds_medio_pago_voucher,
				// dt_medio_pago_voucher: dt_medio_pago_voucher,
				// dt_banco: dt_banco,
				// dt_ds_banco: dt_ds_banco,
				// dt_importe_pago: dt_importe_pago,
				// dt_estado_voucher: dt_estado_voucher,


				// Suma de Precios

				total_deuda_voucher: total_deuda_voucher,
				monto_pagado_voucher: monto_pagado_voucher,
				monto_pendiente_voucher: monto_pendiente_voucher,


			},
			success: function (data) {
				debugger;
				window.location.href = base_url + "C_compras";
				debugger;
			},
		});
	}
});

$("#actualizar").on("click", function () {
	debugger;
	validar_registro();
	validar_detalle_pagos();


	if (resultado_campo == true) {
		// Registro de Compras
		var count = $('#id_table_detalles_pagos tr').length;



		// var id_trabajador = $("#encargado").val();
		// var fecha_emision_voucher = $("#fecha_emision_voucher").val();
		// var fecha_vencimiento_voucher = $("#fecha_vencimiento_voucher").val();
		// var tipo_comprobante = $("#tipo_comprobante").val();
		// var numero_serie = $("#numero_serie").val();
		// var mercaderia = $("#mercaderia ").val();
		// var id_cliente_proveedor = $("#id_proveedor").val();
		// var condicion_pago = $("#condicion_pago").val();
		// var medio_pago = $("#medio_pago").val();
		// var moneda = $("#moneda ").val();
		var cta_ent = $("#cta_ent").val();
		// var subtotal_factura = $("#subtotal_factura").val();
		// var igv_factura = $("#igv_factura").val();
		// var total_factura = $("#total_factura").val();
		var estado_compra = $("#estado_compra").val();
		var observacion_pago = $("#observacion_pago").val();

		// Pagos Compras
		var transaccion = Array.prototype.slice.call(document.getElementsByName("transaccion[]")).map((e) => e.value);
		var tipo_cambio = Array.prototype.slice.call(document.getElementsByName("tipo_cambio[]")).map((e) => e.value);
		var numero_deposito = Array.prototype.slice.call(document.getElementsByName("numero_deposito[]")).map((e) => e.value);
		var numero_letra_cheque = Array.prototype.slice.call(document.getElementsByName("numero_letra_cheque[]")).map((e) => e.value);
		var banco = Array.prototype.slice.call(document.getElementsByName("banco[]")).map((e) => e.value);
		var importe_pago = Array.prototype.slice.call(document.getElementsByName("importe_pago[]")).map((e) => e.value);
		var leyenda = Array.prototype.slice.call(document.getElementsByName("leyenda[]")).map((e) => e.value);
		var observacion_voucher = Array.prototype.slice.call(document.getElementsByName("observacion_voucher[]")).map((e) => e.value);

		// Detalle de Programacion de Pagos

		var voucher_pago = Array.prototype.slice.call(document.getElementsByName("voucher_pago[]")).map((e) => e.value);
		var fecha_pago_voucher = Array.prototype.slice.call(document.getElementsByName("fecha_pago_voucher[]")).map((e) => e.value);
		var medio_pago_voucher = Array.prototype.slice.call(document.getElementsByName("medio_pago_voucher[]")).map((e) => e.value);
		var estado_voucher = Array.prototype.slice.call(document.getElementsByName("estado_voucher[]")).map((e) => e.value);

		// Suma de Precios

		var total_deuda_voucher = $("#total_deuda_voucher").val();
		var monto_pagado_voucher = $("#monto_pagado_voucher").val();
		var monto_pendiente_voucher = $("#monto_pendiente_voucher").val();


		$.ajax({
			async: false,
			url: base_url + "C_compras/insertar",
			type: "POST",
			dataType: "json",
			data: {
				count: count,
				id_trabajador: id_trabajador,
				fecha_emision_voucher: fecha_emision_voucher,
				fecha_vencimiento_voucher: fecha_vencimiento_voucher,
				tipo_comprobante: tipo_comprobante,
				numero_serie: numero_serie,
				mercaderia: mercaderia,
				id_cliente_proveedor: id_cliente_proveedor,
				condicion_pago: condicion_pago,
				medio_pago: medio_pago,
				moneda: moneda,
				cta_ent: cta_ent,
				subtotal_factura: subtotal_factura,
				igv_factura: igv_factura,
				total_factura: total_factura,
				estado_compra: estado_compra,
				observacion_pago: observacion_pago,


				// Pagos Compras

				// codigo_pago_voucher: codigo_pago_voucher,
				voucher_pago: voucher_pago,
				transaccion: transaccion,
				fecha_pago_voucher: fecha_pago_voucher,
				tipo_cambio: tipo_cambio,
				numero_deposito: numero_deposito,
				numero_letra_cheque: numero_letra_cheque,
				banco: banco,
				medio_pago_voucher: medio_pago_voucher,
				importe_pago: importe_pago,
				leyenda: leyenda,
				observacion_voucher: observacion_voucher,
				estado_voucher: estado_voucher,

				// Detalle de Programacion de Pagos

				// dt_voucher_pago: dt_voucher_pago,
				// dt_fecha_pago_voucher: dt_fecha_pago_voucher,
				// dt_ds_medio_pago_voucher: dt_ds_medio_pago_voucher,
				// dt_medio_pago_voucher: dt_medio_pago_voucher,
				// dt_banco: dt_banco,
				// dt_ds_banco: dt_ds_banco,
				// dt_importe_pago: dt_importe_pago,
				// dt_estado_voucher: dt_estado_voucher,


				// Suma de Precios

				total_deuda_voucher: total_deuda_voucher,
				monto_pagado_voucher: monto_pagado_voucher,
				monto_pendiente_voucher: monto_pendiente_voucher,


			},
			success: function (data) {
				debugger;
				window.location.href = base_url + "C_compras";
				debugger;
			},
		});
	}
});


function validar_detalle_pagos() {
	debugger;

	$("#id_table_detalles_pagos tbody tr").each(function () {
		debugger;
		var valida = $(this).find("td:eq(0)").text();
		codigo_voucher_pago = valida.replace(/ /g, '');
		var voucher_pago = "P00-" + $("#voucher_pago").val();

		if (codigo_voucher_pago == voucher_pago) {
			debugger;
			codigo_voucher_duplicado = false;
			return false;
		}

	});



	debugger;

	var voucher_pago = $("#voucher_pago").val();
	var transaccion = $("#transaccion").val();
	var fecha_pago_voucher = $("#fecha_pago_voucher").val();
	var tipo_cambio = $("#tipo_cambio").val();
	var numero_deposito = $("#numero_deposito").val();
	var numero_letra_cheque = $("#numero_letra_cheque").val();
	var banco = $("#banco").val();
	var medio_pago_voucher = $("#medio_pago_voucher").val();
	var importe_pago = $("#importe_pago").val();
	var leyenda = $("#leyenda").val();
	var observacion_voucher = $("#observacion_voucher").val();
	var estado_voucher = $("#estado_voucher").val();

	if (voucher_pago == "") {
		alert("Ingrese el N° Voucher")
		resultado_campo = false;
	}
	else if (transaccion == "" || transaccion == "0") {
		alert("Tipo de Transaccion Vacio")
		resultado_campo = false;
	}
	else if (fecha_pago_voucher == "") {
		alert("Fecha de Pago Vacio")
		resultado_campo = false;
	}
	else if (tipo_cambio == "") {
		alert("Tipo de Cambio Vacio")
		resultado_campo = false;
	}
	else if (numero_deposito == "") {
		alert("Numero de Deposito Vacio")
		resultado_campo = false;
	}
	else if (numero_letra_cheque == "") {
		alert("N° letra de cheke Vacio")
		resultado_campo = false;
	}
	else if (banco == "" || banco == "0") {
		alert("Banco Vacio")
		resultado_campo = false;
	}
	else if (medio_pago_voucher == "" || medio_pago_voucher == "0") {
		alert("Medio de Pago Vacio")
		resultado_campo = false;
	}
	else if (importe_pago == "") {
		alert("Importe de Pago Vacio")
		resultado_campo = false;
	}
	else if (medio_pago_voucher == "") {
		alert("Medio de Pago Vacio")
		resultado_campo = false;
	}
	else if (leyenda == "" || leyenda == "0") {
		alert("Leyenda Vacio")
		resultado_campo = false;
	}
	else if (observacion_voucher == "") {
		alert("Observacion de Voucher Vacio")
		resultado_campo = false;
	}
	// else if (estado_voucher == "" || estado_voucher == "0") {
	// 	alert("Estado_Voucher Vacio")
	// 	resultado_campo = false;
	// }
	else if (codigo_voucher_duplicado == false) {
		alert(`El codigo del Voucher : ${codigo_voucher_pago}, ya existe en el detalle`);
		resultado_campo = false;
		codigo_voucher_duplicado == true;
	}
	else {

		resultado_campo = true;

	}

};

function validar_registro() {
	debugger;

	var id_compras = $("#id_compras").val();
	var id_trabajador = $("#encargado").val();
	var fecha_emision_voucher = $("#fecha_emision_voucher").val();
	var fecha_vencimiento_voucher = $("#fecha_vencimiento_voucher").val();
	var tipo_comprobante = $("#tipo_comprobante").val();
	var numero_serie = $("#numero_serie").val();
	var mercaderia = $("#mercaderia ").val();
	var id_cliente_proveedor = $("#id_proveedor").val();
	var condicion_pago = $("#condicion_pago").val();
	var medio_pago = $("#medio_pago").val();
	var moneda = $("#moneda ").val();
	var cta_ent = $("#cta_ent").val();
	var subtotal_factura = $("#subtotal_factura").val();
	var igv_factura = $("#igv_factura").val();
	var total_factura = $("#total_factura").val();
	var estado_compra = $("#estado_compra").val();
	var observacion_pago = $("#observacion_pago").val();

	if (id_compras == "") {
		alert("Ingrese el N° Voucher")
		resultado_campo = false;
	}
	else if (id_trabajador == "" || id_trabajador == "0") {
		alert("Encargado Vacio")
		resultado_campo = false;
	}
	else if (fecha_emision_voucher == "") {
		alert("Fecha de Emision Vacio")
		resultado_campo = false;
	}
	else if (fecha_vencimiento_voucher == "") {
		alert("Fecha Vencimiento Vacio")
		resultado_campo = false;
	}
	else if (tipo_comprobante == "" || tipo_comprobante == "0") {
		alert("Tipo Comprobante Vacio")
		resultado_campo = false;
	}
	else if (numero_serie == "") {
		alert("Numero de Serie Vacio")
		resultado_campo = false;
	}
	else if (mercaderia == "" || mercaderia == "0") {
		alert("Mercaderia Vacio")
		resultado_campo = false;
	}
	else if (id_cliente_proveedor == "" || id_cliente_proveedor == "0") {
		alert("Proveedor Vacio")
		resultado_campo = false;
	}

	else if (condicion_pago == "" || condicion_pago == "0") {
		alert("Condicion Pago Vacio")
		resultado_campo = false;
	}
	else if (medio_pago == "" || medio_pago == "0") {
		alert("Medio de Pago Vacio")
		resultado_campo = false;
	}
	else if (moneda == "" || moneda == "0") {
		alert("Moneda Vacio")
		resultado_campo = false;
	}
	// else if (cta_ent == "" || cta_ent == "0") {
	// 	alert("Cta Ent Vacio")
	// 	resultado_campo = false;
	// }
	else if (subtotal_factura == "") {
		alert("Subtotal Vacio")
		resultado_campo = false;
	}
	else if (igv_factura == "") {
		alert("Igv Vacio")
		resultado_campo = false;
	}
	else if (total_factura == "") {
		alert("Total Factura Vacio")
		resultado_campo = false;
	}
	// else if (estado_compra == "" || estado_compra == "0") {
	// 	alert("Estado de Voucher Vacio")
	// 	resultado_campo = false;
	// }
	else {

		resultado_campo = true;


	}
};

function limpiar_campos_pagos() {

	debugger;

	$("#voucher_pago").val("");
	$("#transaccion").val("");
	$("#fecha_pago_voucher").val("");
	$("#tipo_cambio").val("");
	$("#numero_deposito").val("");
	$("#numero_letra_cheque").val("");
	$("#banco").val("");
	$('#banco option:selected').text("");
	$("#medio_pago_voucher").val("");
	$('#medio_pago_voucher option:selected').text("");
	$("#estado_voucher").val("1");
	$("#importe_pago").val("");
	$("#leyenda").val("");
	$("#observacion_voucher").val("");

}

