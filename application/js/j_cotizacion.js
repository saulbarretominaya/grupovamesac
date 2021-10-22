/*  Ventanas Modal */
$(document).on("click", ".js_seleccionar_modal_clientes_proveedores", function () {
	debugger;
	clientes_proveedores = $(this).val();
	split_clientes_proveedores = clientes_proveedores.split("*");
	$("#id_cliente_proveedor").val(split_clientes_proveedores[0]);
	$("#ds_nombre_cliente_proveedor").val(split_clientes_proveedores[1]);
	$("#ds_departamento_cliente_proveedor").val(split_clientes_proveedores[2]);
	$("#ds_provincia_cliente_proveedor").val(split_clientes_proveedores[3]);
	$("#ds_distrito_cliente_proveedor").val(split_clientes_proveedores[4]);
	$("#direccion_fiscal_cliente_proveedor").val(split_clientes_proveedores[5]);
	$("#email_cliente_proveedor").val(split_clientes_proveedores[6]);
	$("#opcion_target_clientes_proveedores").modal("hide");
});
$(document).on("click", ".js_seleccionar_modal_producto", function () {
	limpiar_campos_hidden();
	productos = $(this).val();
	split_productos = productos.split("*");
	$("#hidden_id_producto").val(split_productos[0]);
	$("#descripcion_producto").val(split_productos[1]);
	$("#precio_unitario").val(split_productos[2]);
	$("#opcion_target_producto").modal("hide");
});
$(document).on("click", ".js_seleccionar_modal_tablero", function () {
	limpiar_campos_hidden();
	tableros = $(this).val();
	split_tableros = tableros.split("*");
	$("#hidden_id_tablero").val(split_tableros[0]);
	$("#descripcion_producto").val(split_tableros[1]);
	$("#precio_unitario").val(split_tableros[2]);
	$("#opcion_target_tablero").modal("hide");
});
$(document).on("click", ".js_seleccionar_modal_comodin", function () {
	limpiar_campos_hidden();
	comodin = $(this).val();
	split_comodin = comodin.split("*");
	$("#hidden_id_comodin").val(split_comodin[0]);
	$("#descripcion_producto").val(split_comodin[1]);
	$("#precio_unitario").val(split_comodin[2]);
	$("#opcion_target_tablero").modal("hide");
});
$(document).on("click", ".js_seleccionar_modal_detalle_tablero", function () {
	debugger;
	valor_id = $(this).val();
	$.ajax({
		url: base_url + "C_tableros/index_modal",
		type: "POST",
		dataType: "html",
		data: {
			id_tablero: valor_id
		},
		success: function (data) {
			debugger;
			$("#opcion_target_detalle_tablero .modal-content").html(data);
		}
	});
});
$(document).ready(function () {

	/* Modal 1 */
	$("#id_datatable_clientes_proveedores thead #dtable_ds_tipo_persona").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:150px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_clientes_proveedores thead #dtable_descripcion_razon_social").each(function () {
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


	/*Modal 3 */
	$("#id_datatable_tableros thead #dtable_ds_almacen_tablero").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:150px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_tableros thead #dtable_codigo_tablero").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:150px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_tableros thead #dtable_descripcion_producto_tablero").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:350px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_tableros thead #dtable_ds_marca_producto_tablero").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:100px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_tableros thead #dtable_ds_grupo_tablero").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:100px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_tableros thead #dtable_ds_moneda_tablero").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:100px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_tableros thead #dtable_precio_unitario_por_tablero").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:150px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_tableros").dataTable({

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
	/*Fin Modal 3*/


	/*Modal 4 */
	$("#id_datatable_comodin thead #dtable_comodin_codigo_producto").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:150px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_comodin thead #dtable_comodin_nombre_producto").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:300px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_comodin thead #dtable_comodin_ds_unidad_medida").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:100px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_comodin thead #dtable_comodin_ds_marca_producto").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:150px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_comodin thead #dtable_comodin_ds_moneda").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:100px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_comodin thead #dtable_comodin_precio_unitario").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:200px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_comodin thead #dtable_comodin_nombre_proveedor").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:300px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_comodin").dataTable({

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
	/*Fin Modal 4*/


});
/* Fin de Ventanas Modal*/


$("#numero_dias_condicion_pago").on("keyup", function () {
	calcular_fecha_condicion_pago();
});

function calcular_fecha_condicion_pago() {
	//let num = parseInt(frm.fechsa.value);
	var num = parseInt(document.getElementById("numero_dias_condicion_pago").value);

	// la fecha viene en formato yyyy-mm-dd
	var f = document.getElementById("fecha_cotizacion").value;

	var fecha = new Date(f);
	fecha.setDate(fecha.getDate() + num);

	var mes = fecha.getUTCMonth() + 1;
	if (mes <= 9) mes = '0' + mes;

	var dia = fecha.getUTCDate();
	if (dia <= 9) dia = '0' + dia;

	//rm.total.value = fecha.getUTCFullYear() + '-' + mes + '-' + dia;
	//$("#total").val(fecha.getUTCFullYear() + '-' + mes + '-' + dia);
	document.getElementById("fecha_condicion_pago").value = (dia + '-' + mes + '-' + fecha.getUTCFullYear());

}

$(".select2").select2({
	theme: "bootstrap4"
});

$("#tipo_moneda_cambio").on("change", function () {

	debugger;
	var precio_unitario = $("#precio_unitario").val();
	var valor_cambio = $("#valor_cambio").val();
	var tipo_moneda_origen = $("#tipo_moneda_origen").val();
	var tipo_moneda_cambio = $('#tipo_moneda_cambio option:selected').text();

	if (tipo_moneda_origen == tipo_moneda_cambio) {

		convertidor_unitario = precio_unitario;
	}
	else if (tipo_moneda_origen == "SOLES") {
		convertidor_unitario = precio_unitario / valor_cambio;
	}
	else if (tipo_moneda_origen == "DOLARES") {

		convertidor_unitario = precio_unitario * valor_cambio;
	}
	else if (tipo_moneda_origen == tipo_moneda_cambio) {

		convertidor_unitario = precio_unitario;
	}
	$("#convertidor_unitario").val(convertidor_unitario);
	$("#precio_inicial").val(convertidor_unitario);
	$("#precio_ganancia").val(convertidor_unitario);




});

$("#g").on("keyup", function () {

	var precio_inicial = $("#precio_inicial").val();
	var g = $("#g").val();
	var g_unidad = (precio_inicial * g / 100);
	var precio_ganancia = Number(g_unidad) + Number(precio_inicial);
	$("#g_unidad").val(g_unidad);
	$("#precio_ganancia").val(precio_ganancia);
	$("#precio_ganancia_visor").val(precio_ganancia);
	calcular_monto();
});

$("#cantidad").on("keyup", function () {
	calcular_monto();
});

$("#d").on("keyup", function () {
	calcular_precio_descuento();
	calcular_monto();
});

function calcular_precio_descuento() {

	var precio_ganancia = $("#precio_ganancia").val();
	var d = $("#d").val();
	var d_unidad = (precio_ganancia * d / 100);
	var hidden_precio_descuento = precio_ganancia - d_unidad;
	var precio_inicial = $("#precio_inicial").val();
	var precio_descuento = $("#precio_descuento").val();

	$("#d_unidad").val(d_unidad);
	$("#hidden_precio_descuento").val(hidden_precio_descuento);
	debugger;

	if (d == "") {
		$("#hidden_precio_descuento").val(hidden_precio_descuento);
		$("#precio_descuento").val("");
		$("#d_unidad").val("");
		$("#d_cant_total").val("");
		$("#d").val("");
	}
	else if (hidden_precio_descuento >= precio_inicial) {
		$("#precio_descuento").val(hidden_precio_descuento);
	}
	else if (hidden_precio_descuento < precio_inicial) {
		$("#hidden_precio_descuento").val(hidden_precio_descuento);
		$("#precio_descuento").val("");
		$("#d_unidad").val("");
		$("#d").val("");
		alert("El precio con Descuento es: " + hidden_precio_descuento + ", y tiene que ser mayor o igual que el precio inicial de venta: " + precio_inicial);
	}
}

function calcular_monto() {
	var cantidad = $("#cantidad").val();
	var g = $("#g").val();
	var d = $("#d").val();
	var precio_ganancia = $("#precio_ganancia").val();
	var precio_descuento = $("#precio_descuento").val();
	var g_unidad = $("#g_unidad").val();
	var d_unidad = $("#d_unidad").val();
	var monto = "";
	d_cant_total = d_unidad * cantidad;
	g_cant_total = Number(cantidad) * Number(g_unidad)

	if (g == "" & d == "") {
		monto = precio_ganancia * cantidad;
	}
	else if (g != "" & d != "") {
		monto = precio_descuento * cantidad;
	} else if (d == "") {
		monto = precio_ganancia * cantidad;
	}

	if (g_cant_total == 0 & d_cant_total == 0) {
		g_cant_total = ""
		d_cant_total = ""
	}
	else if (d_cant_total == 0) {
		d_cant_total = ""
	} else if (g_cant_total == 0) {
		g_cant_total = ""
	}

	if (g == "") {
		$("#precio_ganancia_visor").val("");
		$("#precio_descuento").val("");
		$("#d_unidad").val("");
		$("#d").val("");
		$("#d_cant_total").val("");
		$("#g_unidad").val("");
	}

	if (monto == 0) {
		monto = "";
	}

	$("#monto").val(monto);
	$("#g_cant_total").val(g_cant_total);
	$("#d_cant_total").val(d_cant_total);

}

$("#id_agregar_cotizacion").on("click", function (e) {
	debugger;

	/*Producto*/
	var id_producto = $("#hidden_id_producto").val();
	var id_tablero = $("#hidden_id_tablero").val();
	var id_comodin = $("#hidden_id_comodin").val();
	var cantidad = $("#cantidad").val();
	var precio_ganancia = $("#precio_ganancia").val();




	var codigo_producto = $("#hidden_codigo_producto").val();
	var descripcion_producto = $("#descripcion_producto").val();
	var ds_unidad_medida = $("#hidden_ds_unidad_medida").val();
	var ds_marca_producto = $("#hidden_ds_marca_producto").val();
	//var precio_ganancia = $("#precio_ganancia").val();
	//var cantidad = $("#cantidad").val();
	d = $("#d").val();
	precio_descuento = $("#precio_descuento").val();
	d_cant_total = $("#d_cant_total").val();
	valor_venta = $("#monto").val();





	debugger;

	html = "<tr>";
	html += "    <input type='hidden' name='id_producto[]' 				value='" + id_producto + "'>";
	html += "    <input type='hidden' name='id_tablero[]' 				value='" + id_tablero + "'>";
	html += "    <input type='hidden' name='id_comodin[]' 				value='" + id_comodin + "'>";
	html += "<td><input type='hidden' name='ds_almacen[]' 				value='" + codigo_producto + "'>" + codigo_producto + "</td>";
	html += "<td><input type='hidden' name='ds_almacen[]' 				value='" + descripcion_producto + "'>" + descripcion_producto + "</td>";
	html += "<td><input type='hidden' name='ds_almacen[]' 				value='" + ds_unidad_medida + "'>" + ds_unidad_medida + "</td>";
	html += "<td><input type='hidden' name='ds_almacen[]' 				value='" + ds_marca_producto + "'>" + ds_marca_producto + "</td>";
	html += "<td><input type='hidden' name='precio_unitario[]' 			value='" + precio_ganancia + "'>" + precio_ganancia + "</td>";
	html += "<td><input type='hidden' name='cantidad[]' 				value='" + cantidad + "'>" + cantidad + "</td>";
	html += "<td><input type='hidden' name='ds_almacen[]' 				value='" + d + "'>" + d + "</td>";
	html += "<td><input type='hidden' name='ds_almacen[]' 				value='" + precio_descuento + "'>" + precio_descuento + "</td>";
	html += "<td><input type='hidden' name='ds_almacen[]' 				value='" + d_cant_total + "'>" + d_cant_total + "</td>";
	html += "<td><input type='hidden' name='ds_almacen[]' 				value='" + valor_venta + "'>" + valor_venta + "</td>";
	html += "<td><select class='form-select'><option>1</option><option>2</option></select>";
	//html += "<td><button type='button' class='btn btn-outline-danger btn-sm eliminar_fila'><span class='fas fa-trash-alt'></span></button></td>";
	html += "</tr>";

	$("#id_table_detalle_cotizacion tbody").append(html);

	total();
	descuento_total();
	igv();
	precio_venta();
});

$("#registrar").on("click", function () {


	//Cabecera
	var serie_cotizacion = $("#serie_cotizacion").val();
	var id_vendedor = "100001";
	var ds_nombre_vendedor = "Roger Saul Barreto Minaya";
	var fecha_cotizacion = $("#fecha_cotizacion").val();
	var validez_oferta_cotizacion = $("#validez_oferta_cotizacion").val();
	var id_cliente_proveedor = $("#id_cliente_proveedor").val();
	var ds_nombre_cliente_proveedor = $("#ds_nombre_cliente_proveedor").val();
	var ds_departamento_cliente_proveedor = $("#ds_departamento_cliente_proveedor").val();
	var ds_provincia_cliente_proveedor = $("#ds_provincia_cliente_proveedor").val();
	var ds_distrito_cliente_proveedor = $("#ds_distrito_cliente_proveedor").val();
	var direccion_fiscal_cliente_proveedor = $("#direccion_fiscal_cliente_proveedor").val();
	var email_cliente_proveedor = $("#email_cliente_proveedor").val();
	var clausula = $("#clausula").val();
	var lugar_entrega = $("#lugar_entrega").val();
	var nombre_encargado = $("#nombre_encargado").val();
	var observacion = $("#observacion").val();
	var id_condicion_pago = $("#id_condicion_pago").val();
	var ds_condicion_pago = $('#id_condicion_pago option:selected').text();
	var numero_dias_condicion_pago = $("#numero_dias_condicion_pago").val();
	var fecha_condicion_pago = $("#fecha_condicion_pago").val();
	var total = $("#total").val();
	var descuento_total = $("#descuento_total").val();
	var igv = $("#igv").val();
	var precio_venta = $("#precio_venta").val();
	debugger;


	//Detalle
	var id_producto = Array.prototype.slice.call(document.getElementsByName("id_producto[]")).map((o) => o.value);
	var id_tablero = Array.prototype.slice.call(document.getElementsByName("id_tablero[]")).map((o) => o.value);
	var id_comodin = Array.prototype.slice.call(document.getElementsByName("id_comodin[]")).map((o) => o.value);
	var cantidad = Array.prototype.slice.call(document.getElementsByName("cantidad[]")).map((o) => o.value);
	var precio_unitario = Array.prototype.slice.call(document.getElementsByName("precio_unitario[]")).map((o) => o.value);
	// var id_unidad_medida = Array.prototype.slice.call(document.getElementsByName("id_unidad_medida[]")).map((o) => o.value);
	// var ds_unidad_medida = Array.prototype.slice.call(document.getElementsByName("ds_unidad_medida[]")).map((o) => o.value);
	// var id_marca_producto = Array.prototype.slice.call(document.getElementsByName("id_marca_producto[]")).map((o) => o.value);
	// var ds_marca_producto = Array.prototype.slice.call(document.getElementsByName("ds_marca_producto[]")).map((o) => o.value);
	// var precio_unitario = Array.prototype.slice.call(document.getElementsByName("precio_unitario[]")).map((o) => o.value);
	// var cantidad_unitaria = Array.prototype.slice.call(document.getElementsByName("cantidad_unitaria[]")).map((o) => o.value);
	// var cantidad_total_producto = Array.prototype.slice.call(document.getElementsByName("cantidad_total_producto[]")).map((o) => o.value);
	// var monto_total_producto = Array.prototype.slice.call(document.getElementsByName("monto_total_producto[]")).map((o) => o.value);

	$.ajax({
		async: false,
		url: base_url + "C_cotizacion/insertar",
		type: "POST",
		dataType: "json",
		data: {
			//Cabecera
			serie_cotizacion: serie_cotizacion,
			id_vendedor: id_vendedor,
			ds_nombre_vendedor: ds_nombre_vendedor,
			fecha_cotizacion: fecha_cotizacion,
			validez_oferta_cotizacion: validez_oferta_cotizacion,
			id_cliente_proveedor: id_cliente_proveedor,
			ds_nombre_cliente_proveedor: ds_nombre_cliente_proveedor,
			ds_departamento_cliente_proveedor: ds_departamento_cliente_proveedor,
			ds_provincia_cliente_proveedor: ds_provincia_cliente_proveedor,
			ds_distrito_cliente_proveedor: ds_distrito_cliente_proveedor,
			direccion_fiscal_cliente_proveedor: direccion_fiscal_cliente_proveedor,
			email_cliente_proveedor: email_cliente_proveedor,
			clausula: clausula,
			lugar_entrega: lugar_entrega,
			nombre_encargado: nombre_encargado,
			observacion: observacion,
			id_condicion_pago: id_condicion_pago,
			ds_condicion_pago: ds_condicion_pago,
			numero_dias_condicion_pago: numero_dias_condicion_pago,
			fecha_condicion_pago: fecha_condicion_pago,
			total: total,
			descuento_total: descuento_total,
			igv: igv,
			precio_venta: precio_venta,

			//Detalle
			id_producto: id_producto,
			id_tablero: id_tablero,
			id_comodin: id_comodin,
			cantidad: cantidad,
			precio_unitario: precio_unitario
		},
		success: function (data) {
			debugger;
			window.location.href = base_url + "C_cotizacion";
			debugger;
		},
	});
});

function total() {
	var acumulador = 0;
	$("#id_table_detalle_cotizacion tbody tr").each(function () {
		var posicion_valor_venta = $(this).find("td:eq(9)").text();
		// valor = Number(valorcito.replace(/,/g, ''));
		debugger;
		valor_venta = Number(posicion_valor_venta);
		acumulador = (acumulador + valor_venta)
		$("#total").val(acumulador);

	});

}

function descuento_total() {
	var acumulador = 0;
	$("#id_table_detalle_cotizacion tbody tr").each(function () {
		var posicion_total_descuento = $(this).find("td:eq(8)").text();
		// valor = Number(valorcito.replace(/,/g, ''));
		total_descuento = Number(posicion_total_descuento);
		acumulador = (acumulador + total_descuento)

		$("#descuento_total").val(acumulador);

	});

}

function igv() {
	var total = Number($("#total").val());
	var igv = (total * 0.18);
	$("#igv").val(igv);
}

function precio_venta() {
	var total = Number($("#total").val());
	var igv = Number($("#igv").val());
	var precio_venta = total + igv;
	$("#precio_venta").val(precio_venta);
}

function limpiar_campos_hidden() {
	$("#hidden_id_producto").val("");
	$("#hidden_id_tablero").val("");
	$("#hidden_id_comodin").val("");
}

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