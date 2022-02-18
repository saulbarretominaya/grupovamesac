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
$(document).on("click", ".js_lupa_carga_inicial", function () {
	valor_id = $(this).val();
	$.ajax({
		url: base_url + "C_carga_inicial/index_modal",
		type: "POST",
		dataType: "html",
		data: {
			id_carga_inicial: valor_id
		},
		success: function (data) {
			$("#id_target_carga_inicial .modal-content").html(data);
		}
	});
});
$("#registrar").on("click", function () {
	debugger;
	// validar_registrar();
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

		//Detalle compras / cobranza
		var item = Array.prototype.slice.call(document.getElementsByName("item[]")).map((o) => o.value);
		var id_detalle_compra_cobranza = Array.prototype.slice.call(document.getElementsByName("id_detalle_compra_cobranza[]")).map((o) => o.value);
		var id_compra_cobranza = Array.prototype.slice.call(document.getElementsByName("id_compra_cobranza[]")).map((o) => o.value);
		var fecha_deposito = Array.prototype.slice.call(document.getElementsByName("fecha_deposito[]")).map((o) => o.value);
		var num_deposito = Array.prototype.slice.call(document.getElementsByName("num_deposito[]")).map((o) => o.value);
		var num_letra_cheque = Array.prototype.slice.call(document.getElementsByName("num_letra_cheque[]")).map((o) => o.value);
		var id_medio_pago = Array.prototype.slice.call(document.getElementsByName("id_medio_pago[]")).map((o) => o.value);
		var id_banco = Array.prototype.slice.call(document.getElementsByName("id_banco[]")).map((o) => o.value);
		var monto = Array.prototype.slice.call(document.getElementsByName("monto[]")).map((o) => o.value);
		var tipo_cambio = Array.prototype.slice.call(document.getElementsByName("total_stock[]")).map((o) => o.value);

		//Detalle programacion_pagos
		var id_dprogramacion_pagos = Array.prototype.slice.call(document.getElementsByName("id_dprogramacion_pagos[]")).map((o) => o.value);
		var id_compra_cobranza = Array.prototype.slice.call(document.getElementsByName("id_compra_cobranza[]")).map((o) => o.value);
		var fecha_cuota = Array.prototype.slice.call(document.getElementsByName("fecha_cuota[]")).map((o) => o.value);




		$.ajax({
			async: false,
			url: base_url + "C_compras_cobranzas/insertar",
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

				//Detalle compras / cobranza
				item: item,
				id_detalle_compra_cobranza: id_detalle_compra_cobranza,
				id_compra_cobranza: id_compra_cobranza,
				fecha_deposito: fecha_deposito,
				num_deposito: num_deposito,
				num_letra_cheque: num_letra_cheque,
				id_medio_pago: id_medio_pago,
				id_banco: id_banco,
				monto: monto,
				id_moneda: id_moneda,
				tipo_cambio: tipo_cambio,


				//Detalle programacion_pagos
				id_dprogramacion_pagos: id_dprogramacion_pagos,
				id_compra_cobranza: id_compra_cobranza,
				fecha_cuota: fecha_cuota,
				id_condicion_pago: id_condicion_pago,


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
$(document).on("click", ".js_seleccionar_modal_producto", function () {
	productos = $(this).val();
	split_productos = productos.split("*");
	$("#hidden_id_producto").val(split_productos[0]);
	$("#hidden_id_almacen").val(split_productos[1]);
	$("#ds_almacen").val(split_productos[2]);
	$("#hidden_codigo_producto").val(split_productos[3]);
	$("#descripcion_producto").val(split_productos[4]);
	$("#hidden_id_unidad_medida").val(split_productos[5]);
	$("#hidden_ds_unidad_medida").val(split_productos[6]);
	$("#hidden_id_marca_producto").val(split_productos[7]);
	$("#hidden_ds_marca_producto").val(split_productos[8]);
	$("#stock_actual").val(split_productos[12]);
	$("#opcion_target_producto").modal("hide");
	calcular_total_stock();
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


	/* Modal 2 */
	$("#id_datatable_productos thead #dtable_ds_almacen").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:150px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_productos thead #dtable_codigo").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:300px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_productos thead #dtable_descripcion_producto").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:400px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_productos thead #dtable_ds_unidad_medida").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:50px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_productos thead #dtable_ds_marca_producto").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:150px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_productos thead #dtable_ds_grupo").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:300px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_productos thead #dtable_stock").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:100px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_productos thead #dtable_ds_moneda").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:100px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_productos thead #dtable_precio_unitario").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:150px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_productos").dataTable({

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
	/*Fin Modal 2 */

});
/* Fin de Ventanas Modal Registrar*/


/*Evento */
$("#id_agregar_carga_inicial").on("click", function (e) {

	validar_detalle_carga_inicial();

	var resume_table = document.getElementById("id_table_detalle_carga_inicial");
	for (var i = 0, row; row = resume_table.rows[i]; i++) {
		console.log(`Fila': ${i}`);
		$("#hidden_item").val(i + 1);
	}

	var item = $("#hidden_item").val();
	var id_almacen = $("#hidden_id_almacen").val();
	var ds_almacen = $("#ds_almacen").val();
	var id_producto = $("#hidden_id_producto").val();
	var codigo_producto = $("#hidden_codigo_producto").val();
	var descripcion_producto = $("#descripcion_producto").val();
	var id_unidad_medida = $("#hidden_id_unidad_medida").val();
	var ds_unidad_medida = $("#hidden_ds_unidad_medida").val();
	var id_marca_producto = $("#hidden_id_marca_producto").val();
	var ds_marca_producto = $("#hidden_ds_marca_producto").val();
	var stock_actual = $("#stock_actual").val();
	var nueva_cantidad = $("#nueva_cantidad").val();
	var total_stock = $("#total_stock").val();
	var precio_unitario = $("#precio_unitario").val();
	var valor_total = $("#valor_total").val();

	if (resultado_campo == true) {
		html = "<tr>";
		html += "<td width='70px'><input type='text'   name='item[]'		value='" + item + "'       id='item' class='form-control' readonly=''></td>";
		html += "    <input type='hidden' name='id_almacen[]' 				value='" + id_almacen + "'>";
		html += "<td><input type='hidden' name='ds_almacen[]' 				value='" + ds_almacen + "'>" + ds_almacen + "</td>";
		html += "    <input type='hidden' name='id_producto[]' 				value='" + id_producto + "' id='id_producto' >";
		html += "<td><input type='hidden' name='codigo_producto[]'			value='" + codigo_producto + "'>" + codigo_producto + "</td>";
		html += "<td><input type='hidden' name='descripcion_producto[]' 	value='" + descripcion_producto + "'>" + descripcion_producto + "</td>";
		html += "    <input type='hidden' name='id_unidad_medida[]' 		value='" + id_unidad_medida + "'>";
		html += "<td><input type='hidden' name='ds_unidad_medida[]' 		value='" + ds_unidad_medida + "'>" + ds_unidad_medida + "</td>";
		html += "    <input type='hidden' name='id_marca_producto[]' 		value='" + id_marca_producto + "'>";
		html += "<td><input type='hidden' name='ds_marca_producto[]'		value='" + ds_marca_producto + "'>" + ds_marca_producto + "</td>";
		html += "<td><input type='hidden' name='stock_actual[]'			    value='" + stock_actual + "'>" + stock_actual + "</td>";
		html += "<td><input type='hidden' name='nueva_cantidad[]'	        value='" + nueva_cantidad + "'>" + nueva_cantidad + "</td>";
		html += "<td><input type='hidden' name='total_stock[]'	            value='" + total_stock + "'>" + total_stock + "</td>";
		html += "<td><input type='hidden' name='precio_unitario[]'		    value='" + precio_unitario + "'>" + precio_unitario + "</td>";
		html += "<td><input type='hidden' name='valor_total[]' 			    value='" + valor_total + "'>" + valor_total + "</td>";
		html += "<td><button type='button' class='btn btn-outline-danger btn-sm eliminar_fila_carga_inicial'><span class='fas fa-trash-alt'></span></button></td>";
		html += "</tr>";
		$("#id_table_detalle_carga_inicial tbody").append(html);
		calcular_monto_total();
		limpiar_campos();
	}
});
$(document).on("click", ".eliminar_fila_carga_inicial", function () {

	var id_detalle = $(this).closest("tr").find("#value_id_solicitud").val();
	html = "<input type='hidden' id='id_solicitud_to_remove' name ='id_solicitud_to_remove[]' value='" + id_detalle + "'>";
	$("#container_solicitud_id_remove").append(html);
	$(this).closest("tr").remove();
	generar_item();
	calcular_monto_total();
	limpiar_campos();
});
$("#precio_unitario").on("keyup", function () {

	var precio_unitario = $("#precio_unitario").val();
	var nueva_cantidad = $('#nueva_cantidad').val();

	if (isNaN(precio_unitario) || precio_unitario == "") {
		$("#precio_unitario").val("");
		$('#valor_total').val("");
	} else if (isNaN(nueva_cantidad) || nueva_cantidad == "") {
		alert("El producto no contiene una Nueva Cantidad")
		$("#precio_unitario").val("");
		$('#valor_total').val("");
	} else {
		calcular_valor_total();
	}

});
$("#nueva_cantidad").on("keyup", function () {

	debugger;
	var nueva_cantidad = $('#nueva_cantidad').val();
	var stock_actual = $("#stock_actual").val();
	var precio_unitario = $("#precio_unitario").val();


	if (isNaN(nueva_cantidad) || nueva_cantidad == "") {
		$('#nueva_cantidad').val("");
		$('#total_stock').val("");
	}
	else if (isNaN(stock_actual) || stock_actual == "") {
		alert("El producto no contiene Stock Actual")
		$('#nueva_cantidad').val("");
		$('#total_stock').val("");
	}
	else {
		calcular_total_stock();
		if (precio_unitario != "") {
			calcular_valor_total();
		}
	}
});
/* Fin Evento */


/* Funciones */

function calcular_total_stock() {

	var stock_actual = $("#stock_actual").val();
	var nueva_cantidad = $('#nueva_cantidad').val();

	var total_stock = Number(stock_actual) + Number(nueva_cantidad)
	$('#total_stock').val(Math.round(total_stock));

}
function calcular_valor_total() {

	var precio_unitario = $("#precio_unitario").val();
	var nueva_cantidad = $('#nueva_cantidad').val();

	var valor_total = Number(precio_unitario) * Number(nueva_cantidad)
	$('#valor_total').val(valor_total.toFixed(2));

}
function validar_detalle_carga_inicial() {


	$("#id_table_detalle_carga_inicial tbody tr").each(function () {

		id_producto_table = $(this).find("#id_producto").val();
		var id_producto = $("#hidden_id_producto").val();

		if (id_producto_table == id_producto) {
			codigo_producto_duplicado = false;
			return false;
		}

	});
	debugger;
	var descripcion_producto = $("#descripcion_producto").val();
	var ds_almacen = $("#ds_almacen").val();
	var stock_actual = $("#stock_actual").val();
	var nueva_cantidad = $("#nueva_cantidad").val();
	var total_stock = $("#total_stock").val();
	var precio_unitario = $("#precio_unitario").val();
	var valor_total = $("#valor_total").val();

	if (descripcion_producto == "") {
		alert("Seleccione un Producto");
		resultado_campo = false;
	}
	else if (ds_almacen == "") {
		alert("No tiene asignado Almacen");
		resultado_campo = false;
	}
	else if (stock_actual == "") {
		alert("El Stock Actual esta vacio");
		resultado_campo = false;
	}
	else if (nueva_cantidad == "") {
		alert("Ingrese Nueva Cantidad");
		resultado_campo = false;
	}
	else if (total_stock == "") {
		alert("No tiene asignado Total Stock");
		resultado_campo = false;
	}
	else if (precio_unitario == "") {
		alert("No tiene asignado Precio Unitario");
		resultado_campo = false;
	}
	else if (valor_total == "") {
		alert("No tiene asignado Valor Total");
		resultado_campo = false;
	}
	else if (codigo_producto_duplicado == false) {
		alert("El producto: " + descripcion_producto + ", ya existe en la tabla detalle");
		resultado_campo = false;
		codigo_producto_duplicado = true;
	}
	else {
		resultado_campo = true;
	}
};
function calcular_monto_total() {

	var acumulador = 0;
	$("#id_table_detalle_carga_inicial tbody tr").each(function () {
		var posicion_valor_total = $(this).find("td:eq(10)").text();
		posicion_valor_total = Number(posicion_valor_total);
		acumulador = (acumulador + posicion_valor_total)
		$("#monto_total").val(acumulador.toFixed(2));
	});

}
function limpiar_campos() {

	$("#hidden_id_producto").val("");
	$("#hidden_id_almacen").val("");
	$("#ds_almacen").val("");
	$("#hidden_codigo_producto").val("");
	$("#descripcion_producto").val("");
	$("#hidden_id_unidad_medida").val("");
	$("#hidden_ds_unidad_medida").val("");
	$("#hidden_id_marca_producto").val("");
	$("#hidden_ds_marca_producto").val("");
	$("#stock_actual").val("");
	$("#nueva_cantidad").val("");
	$("#total_stock").val("");
	$("#precio_unitario").val("");
	$("#valor_total").val("");

}
function validar_registrar() {

	var fecha_carga_inicial = $("#fecha_carga_inicial").val();
	var id_tipo_ingreso = $("#id_tipo_ingreso").val();
	var id_moneda = $("#id_moneda").val();
	var ds_nombre_cliente_proveedor = $("#ds_nombre_cliente_proveedor").val();
	var num_guia = $("#num_guia").val();
	var id_tipo_comprobante = $("#id_tipo_comprobante").val();
	var fecha_comprobante = $("#fecha_comprobante").val();
	var num_comprobante = $("#num_comprobante").val();
	var count_detalle_carga_inicial = $('#id_table_detalle_carga_inicial tr').length;

	if (fecha_carga_inicial == "") {
		alert("No tiene Fecha Orden");
		resultado_campo = false;
	}
	else if (id_tipo_ingreso == "0") {
		alert("Selecione Tipo Ingreso");
		resultado_campo = false;
	}
	else if (id_moneda == "0") {
		alert("Selecione Moneda");
		resultado_campo = false;
	}
	else if (ds_nombre_cliente_proveedor == "") {
		alert("Registre un Cliente o Proveedor");
		resultado_campo = false;
	}
	else if (num_guia == "") {
		alert("Registre Num. Guia");
		resultado_campo = false;
	}
	else if (id_tipo_comprobante == "0") {
		alert("Selecione Tipo Comprobante");
		resultado_campo = false;
	}
	else if (fecha_comprobante == "") {
		alert("Registre Fecha Comprobante");
		resultado_campo = false;
	}
	else if (num_comprobante == "") {
		alert("Registre Num. Comprobante");
		resultado_campo = false;
	}
	else if (count_detalle_carga_inicial == "1") {
		alertify.dialog('alert').set({ transition: 'zoom', message: 'Debe registrar al menos 1 producto en el detalle de Carga Inicial', title: 'CARGA INICIAL' }).show();
		resultado_campo = false;
	}
	else {
		resultado_campo = true;
	}
}
function generar_item() {

	var acumulador = 0;
	$("#id_table_detalle_carga_inicial tbody tr").each(function () {
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