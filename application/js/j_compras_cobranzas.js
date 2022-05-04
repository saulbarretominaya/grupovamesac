/* Variables Globales */
codigo_producto_duplicado = true;
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
$(document).on("click", ".js_lupa_compras_cobranzas", function () {
	valor_id = $(this).val();
	$.ajax({
		url: base_url + "C_compras_cobranzas/index_modal",
		type: "POST",
		dataType: "html",
		data: {
			id_compra_cobranza: valor_id
		},
		success: function (data) {
			$("#id_target_compras_cobranzas .modal-content").html(data);
		}
	});
});
$("#registrar").on("click", function () {

	validar_registrar();

	if (resultado_campo == true) {

		//Cabecera
		var id_trabajador = $("#id_trabajador").val();
		var ds_nombre_trabajador = $("#ds_nombre_trabajador").val();
		var fecha_compra_cobranza = $("#fecha_compra_cobranza").val();
		var id_tipo_comprobante = $("#id_tipo_comprobante").val();
		var ds_tipo_comprobante = $('#id_tipo_comprobante option:selected').text();
		var num_comprobante = $("#num_comprobante").val();
		var id_almacen = $("#id_almacen").val();
		var ds_almacen = $('#id_almacen option:selected').text();
		var fecha_emision = $("#fecha_emision").val();
		var fecha_vencimiento = $("#fecha_vencimiento").val();
		var id_tipo_compra_cobranza = $("#id_tipo_compra_cobranza").val();
		var ds_tipo_compra_cobranza = $('#id_tipo_compra_cobranza option:selected').text();
		var id_cliente_proveedor = $("#id_cliente_proveedor").val();
		var ds_nombre_cliente_proveedor = $("#ds_nombre_cliente_proveedor").val();
		var observacion = $("#observacion").val();
		var id_moneda = $("#id_moneda").val();
		var ds_moneda = $('#id_moneda option:selected').text();
		var sub_total = $("#sub_total").val();
		var igv = $("#igv").val();
		var total = $("#total").val();
		var id_condicion_pago = $("#id_condicion_pago").val();
		var ds_condicion_pago = $('#id_condicion_pago option:selected').text();
		var pendiente = $('#pendiente').val();
		var pagado = $('#pagado').val();
		var id_estado_compra_cobranza = $("#id_estado_compra_cobranza").val();
		//Empresa
		var id_compra_cobranza_empresa = $("#id_compra_cobranza_empresa").val();
		var id_empresa = $("#id_empresa").val();


		//Detalle programacion_pagos
		var fecha_cuota = Array.prototype.slice.call(document.getElementsByName("fecha_cuota[]")).map((o) => o.value);
		var monto_cuota = Array.prototype.slice.call(document.getElementsByName("monto_cuota[]")).map((o) => o.value);
		debugger;

		//Detalle compras / cobranza
		var item = Array.prototype.slice.call(document.getElementsByName("item[]")).map((o) => o.value);
		var fecha_deposito = Array.prototype.slice.call(document.getElementsByName("fecha_deposito[]")).map((o) => o.value);
		var num_deposito = Array.prototype.slice.call(document.getElementsByName("num_deposito[]")).map((o) => o.value);
		var num_letra_cheque = Array.prototype.slice.call(document.getElementsByName("num_letra_cheque[]")).map((o) => o.value);
		var id_medio_pago = Array.prototype.slice.call(document.getElementsByName("id_medio_pago[]")).map((o) => o.value);
		var ds_medio_pago = Array.prototype.slice.call(document.getElementsByName("ds_medio_pago[]")).map((o) => o.value);
		var id_banco = Array.prototype.slice.call(document.getElementsByName("id_banco[]")).map((o) => o.value);
		var ds_banco = Array.prototype.slice.call(document.getElementsByName("ds_banco[]")).map((o) => o.value);
		var monto = Array.prototype.slice.call(document.getElementsByName("monto[]")).map((o) => o.value);
		var tipo_cambio = Array.prototype.slice.call(document.getElementsByName("tipo_cambio[]")).map((o) => o.value);
		debugger;



		$.ajax({
			async: false,
			url: base_url + "C_compras_cobranzas/registrar",
			type: "POST",
			dataType: "json",
			data: {

				//Cabecera
				id_trabajador: id_trabajador,
				ds_nombre_trabajador: ds_nombre_trabajador,
				fecha_compra_cobranza: fecha_compra_cobranza,
				id_tipo_comprobante: id_tipo_comprobante,
				ds_tipo_comprobante: ds_tipo_comprobante,
				num_comprobante: num_comprobante,
				id_almacen: id_almacen,
				ds_almacen: ds_almacen,
				fecha_emision: fecha_emision,
				fecha_vencimiento: fecha_vencimiento,
				id_tipo_compra_cobranza: id_tipo_compra_cobranza,
				ds_tipo_compra_cobranza: ds_tipo_compra_cobranza,
				id_cliente_proveedor: id_cliente_proveedor,
				ds_nombre_cliente_proveedor: ds_nombre_cliente_proveedor,
				observacion: observacion,
				id_moneda: id_moneda,
				ds_moneda: ds_moneda,
				sub_total: sub_total,
				igv: igv,
				total: total,
				id_condicion_pago: id_condicion_pago,
				ds_condicion_pago: ds_condicion_pago,
				pendiente: pendiente,
				pagado: pagado,
				id_estado_compra_cobranza: id_estado_compra_cobranza,
				id_compra_cobranza_empresa: id_compra_cobranza_empresa,
				id_empresa: id_empresa,


				//Detalle programacion_pagos
				fecha_cuota,
				monto_cuota,

				//Detalle compras / cobranza
				item: item,
				fecha_deposito: fecha_deposito,
				num_deposito: num_deposito,
				num_letra_cheque: num_letra_cheque,
				id_medio_pago: id_medio_pago,
				ds_medio_pago: ds_medio_pago,
				id_banco: id_banco,
				ds_banco: ds_banco,
				monto: monto,
				tipo_cambio: tipo_cambio
			},
			success: function (data) {
				debugger;
				window.location.href = base_url + "C_compras_cobranzas";
			},
		});
	};
});
/*Fin CRUD*/


/*  Ventanas Modal Registrar */
$(document).on("click", ".js_seleccionar_modal_clientes_proveedores", function () {
	clientes_proveedores = $(this).val();
	split_clientes_proveedores = clientes_proveedores.split("*");
	$("#id_cliente_proveedor").val(split_clientes_proveedores[0]);
	$("#ds_nombre_cliente_proveedor").val(split_clientes_proveedores[1]);
	$("#opcion_target_clientes_proveedores").modal("hide");
});
$(document).ready(function () {

	/* Modal 1 */
	$("#id_datatable_clientes_proveedores thead #dtable_ds_tipo_persona").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:150px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_clientes_proveedores thead #dtable_ds_nombre_cliente_proveedor").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:300px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_clientes_proveedores thead #dtable_ds_tipo_documento").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:200px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_clientes_proveedores thead #dtable_num_documento").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:200px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_clientes_proveedores thead #dtable_direccion_fiscal").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:300px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_clientes_proveedores thead #dtable_email").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:300px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_clientes_proveedores thead #dtable_contacto_registro").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:300px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_clientes_proveedores thead #dtable_telefono").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:200px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_clientes_proveedores thead #dtable_celular").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:150px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_clientes_proveedores thead #dtable_ds_tipo_giro").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:200px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_clientes_proveedores").dataTable({

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


/*Evento */
$("#id_agregar_programacion_pagos").on("click", function (e) {

	validar_detalle_programacion_pagos();

	var fecha_cuota = $("#fecha_cuota").val();
	var fecha_split = fecha_cuota.split("-");
	var fecha_cuota = fecha_split[2] + '/' + fecha_split[1] + '/' + fecha_split[0];
	var monto_cuota = $("#monto_cuota").val();


	if (resultado_campo == true) {
		html = "<tr>";
		html += "<td><input type='hidden' name='fecha_cuota[]' value='" + fecha_cuota + "'>" + fecha_cuota + "</td>";
		html += "<td><input type='hidden' name='monto_cuota[]' value='" + monto_cuota + "'>" + monto_cuota + "</td>";
		html += "<td><button type='button' class='btn btn-outline-danger btn-sm eliminar_fila_programacion_pago'><span class='fas fa-trash-alt'></span></button></td>";
		html += "</tr>";
		$("#id_table_detalle_programacion_pagos tbody").append(html);
		calcular_programacion_pagos();
		limpiar_campos_programacion_pagos();
	}
});
$("#id_agregar_compras_cobranzas").on("click", function (e) {

	validar_detalle_compras_cobranzas();

	var resume_table = document.getElementById("id_table_detalle_compras_cobranzas");
	for (var i = 0, row; row = resume_table.rows[i]; i++) {
		console.log(`Fila': ${i}`);
		$("#hidden_item").val(i + 1);
	}

	var item = $("#hidden_item").val();
	var fecha_deposito = $("#fecha_deposito").val();
	var num_deposito = $("#num_deposito").val();
	var num_letra_cheque = $("#num_letra_cheque").val();
	var id_medio_pago = $("#id_medio_pago").val();
	var ds_medio_pago = $('#id_medio_pago option:selected').text();
	var id_banco = $("#id_banco").val();
	var ds_banco = $('#id_banco option:selected').text();
	var monto = $("#monto").val();
	var tipo_cambio = $("#tipo_cambio").val();

	if (resultado_campo == true) {
		html = "<tr>";
		html += "<td width='70px'><input type='text'   name='item[]'		value='" + item + "'       id='item' class='form-control' readonly=''></td>";
		html += "<td><input type='hidden' name='fecha_deposito[]' 			value='" + fecha_deposito + "'>" + fecha_deposito + "</td>";
		html += "<td><input type='hidden' name='num_deposito[]'				value='" + num_deposito + "'>" + num_deposito + "</td>";
		html += "<td><input type='hidden' name='num_letra_cheque[]' 		value='" + num_letra_cheque + "'>" + num_letra_cheque + "</td>";
		html += "    <input type='hidden' name='id_medio_pago[]' 			value='" + id_medio_pago + "'>";
		html += "<td><input type='hidden' name='ds_medio_pago[]'			value='" + ds_medio_pago + "'>" + ds_medio_pago + "</td>";
		html += "    <input type='hidden' name='id_banco[]' 				value='" + id_banco + "'>";
		html += "<td><input type='hidden' name='ds_banco[]'	        		value='" + ds_banco + "'>" + ds_banco + "</td>";
		html += "<td><input type='hidden' name='monto[]'	            	value='" + monto + "'>" + monto + "</td>";
		html += "<td><input type='hidden' name='tipo_cambio[]'		    	value='" + tipo_cambio + "'>" + tipo_cambio + "</td>";
		html += "<td><button type='button' class='btn btn-outline-danger btn-sm eliminar_fila_compras_cobranzas'><span class='fas fa-trash-alt'></span></button></td>";
		html += "</tr>";
		$("#id_table_detalle_compras_cobranzas tbody").append(html);
		calcular_pagado();
		calcular_pendiente();
		limpiar_campos_compras_cobranzas();
	}
});
$("#total").on("keyup", function () {

	var total = $("#total").val();

	if (isNaN(total)) {
		alert("Ingrese un Total Valido");
		$('#total').val("");
	} else {
		$('#total_espejo').val(total);
		calcular_pendiente();
	}

});
$(document).on("click", ".eliminar_fila_compras_cobranzas", function () {

	var id_detalle = $(this).closest("tr").find("#value_id_solicitud").val();
	html = "<input type='hidden' id='id_solicitud_to_remove' name ='id_solicitud_to_remove[]' value='" + id_detalle + "'>";
	$("#container_solicitud_id_remove").append(html);
	$(this).closest("tr").remove();
	generar_item();
	//calcular_monto_total();
	//limpiar_campos();
});
$(document).on("click", ".eliminar_fila_programacion_pago", function () {

	var id_detalle = $(this).closest("tr").find("#value_id_solicitud").val();
	html =
		"<input type='hidden' id='id_solicitud_to_remove' name ='id_solicitud_to_remove[]' value='" +
		id_detalle +
		"'>";

	$("#container_solicitud_id_remove").append(html);
	$(this).closest("tr").remove();
	// calcular_sumatoria_cuotas_eliminar_detalle();

});
/* Fin Evento */


/* Funciones */

function validar_detalle_programacion_pagos() {

	var fecha_cuota = $("#fecha_cuota").val();
	var monto_cuota = $("#monto_cuota").val();

	if (fecha_cuota == "") {
		alert("Seleccione Fecha Cuota");
		resultado_campo = false;
	}
	else if (isNaN(monto_cuota)) {
		alert("Ingrese Monto Correcto");
		$("#monto_cuota").val("");
		resultado_campo = false;
	}
	else if (monto_cuota == "") {
		alert("Ingrese Monto Cuota");
		resultado_campo = false;
	}
	else {
		resultado_campo = true;
	}
};
function validar_detalle_compras_cobranzas() {

	var fecha_deposito = $("#fecha_deposito").val();
	var num_deposito = $("#num_deposito").val();
	var id_medio_pago = $("#id_medio_pago").val();
	var id_banco = $("#id_banco").val();
	var monto = $("#monto").val();

	if (fecha_deposito == "") {
		alert("Seleccione Fecha Deposito");
		resultado_campo = false;
	}
	else if (num_deposito == "") {
		alert("Ingrese Num. Deposito");
		resultado_campo = false;
	}
	else if (id_medio_pago == 0) {
		alert("Seleccione Medio Pago");
		resultado_campo = false;
	}
	else if (id_banco == 0) {
		alert("Seleccione Banco");
		resultado_campo = false;
	}
	else if (monto == "") {
		alert("Ingrese Monto");
		resultado_campo = false;
	}
	else if (isNaN(monto)) {
		alert("Ingrese Monto Correcto");
		$("#monto").val("");
		resultado_campo = false;
	}
	else {
		resultado_campo = true;
	}
};
function calcular_programacion_pagos() {
	var acumulador = 0;
	$("#id_table_detalle_programacion_pagos tbody tr").each(function () {
		var posicion_valor_tabla = Number($(this).find("td:eq(1)").text());
		acumulador = (acumulador + posicion_valor_tabla)
		$("#total_label").text(acumulador.toFixed(2));
	});
}
function calcular_pagado() {

	var acumulador = 0;
	$("#id_table_detalle_compras_cobranzas tbody tr").each(function () {
		var posicion_valor_monto = $(this).find("td:eq(6)").text();
		posicion_valor_monto = Number(posicion_valor_monto);
		acumulador = (acumulador + posicion_valor_monto)
		$("#pagado").val(acumulador.toFixed(2));
	});

}
function calcular_pendiente() {
	var total = $("#total").val();
	var pagado = $("#pagado").val();
	var pendiente = Number(total) - Number(pagado);
	$("#pendiente").val(pendiente.toFixed(2));
}
function limpiar_campos_programacion_pagos() {

	$("#fecha_cuota").val("");
	$("#monto_cuota").val("");
}
function limpiar_campos_compras_cobranzas() {

	debugger;
	$("#fecha_deposito").val("");
	$("#num_deposito").val("");
	$("#num_letra_cheque").val("");
	$("#id_medio_pago").select2("val", "0");
	$("#id_banco").select2("val", "0");
	$("#monto").val("");
	$("#tipo_cambio").val("");

}
function validar_registrar() {

	var id_tipo_comprobante = $("#id_tipo_comprobante").val();
	var num_comprobante = $("#num_comprobante").val();
	var id_almacen = $("#id_almacen").val();
	var fecha_emision = $("#fecha_emision").val();
	var fecha_vencimiento = $("#fecha_vencimiento").val();
	var id_tipo_compra_cobranza = $("#id_tipo_compra_cobranza").val();
	var id_estado_compra_cobranza = $("#id_estado_compra_cobranza").val();
	var ds_nombre_cliente_proveedor = $("#ds_nombre_cliente_proveedor").val();
	var id_condicion_pago = $("#id_condicion_pago").val();
	var id_moneda = $("#id_moneda").val();
	var sub_total = $("#sub_total").val();
	var igv = $("#igv").val();
	var total = $("#total").val();

	if (id_tipo_comprobante == 0) {
		alert("Seleccione Tipo Comprobante");
		resultado_campo = false;
	}
	else if (num_comprobante == "") {
		alert("Ingrese Num. Comprobante");
		resultado_campo = false;
	}
	else if (id_almacen == 0) {
		alert("Seleccione Sucursal");
		resultado_campo = false;
	}
	else if (fecha_emision == "") {
		alert("Registre Fecha Emision");
		resultado_campo = false;
	}
	else if (fecha_vencimiento == "") {
		alert("Registre Fecha Vencimiento");
		resultado_campo = false;
	}
	else if (id_tipo_compra_cobranza == 0) {
		alert("Seleccione Tipo Compra o Cobranza");
		resultado_campo = false;
	}
	else if (id_estado_compra_cobranza == 0) {
		alert("Seleccione Estado Compra o Cobranza");
		resultado_campo = false;
	}
	else if (ds_nombre_cliente_proveedor == "") {
		alert("Ingrese Cliente o Proveedor");
		resultado_campo = false;
	}
	else if (id_condicion_pago == 0) {
		alert("Seleccione Condicion Pago");
		resultado_campo = false;
	}
	else if (id_moneda == 0) {
		alert("Seleccione Moneda");
		resultado_campo = false;
	}
	else if (sub_total == "") {
		alert("Registre Sub Total");
		resultado_campo = false;
	}
	else if (isNaN(sub_total)) {
		alert("Registre Sub Total Valido");
		$("#sub_total").val("");
		resultado_campo = false;
	}
	else if (igv == "") {
		alert("Registre Igv");
		resultado_campo = false;
	}
	else if (isNaN(igv)) {
		alert("Registre Igv Valido");
		$("#igv").val("");
		resultado_campo = false;
	}
	else if (total == "") {
		alert("Registre Total");
		resultado_campo = false;
	}
	else {
		resultado_campo = true;
	}
}
function generar_item() {

	var acumulador = 0;
	$("#id_table_detalle_compras_cobranzas tbody tr").each(function () {
		var item = $(this).closest('tr').find('#item').val();
		acumulador = acumulador + 1;
		$(this).closest('tr').find('#item').val(acumulador);
	});
}
/* Fin Funciones */


/* Otros */
$(".select2").select2({
	theme: "bootstrap4"
});
/* Fin de Otros */