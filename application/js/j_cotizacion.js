/*  Ventanas Modal */
$(document).on("click", ".js_seleccionar_modal_clientes_proveedores", function () {
	debugger;
	clientes_proveedores = $(this).val();
	split_clientes_proveedores = clientes_proveedores.split("*");
	$("#razon_social").val(split_clientes_proveedores[0]);
	$("#ds_departamento").val(split_clientes_proveedores[1]);
	$("#ds_provincia").val(split_clientes_proveedores[2]);
	$("#ds_distrito").val(split_clientes_proveedores[3]);
	$("#direccion_fiscal").val(split_clientes_proveedores[4]);
	$("#email").val(split_clientes_proveedores[5]);
	$("#opcion_target_clientes_proveedores").modal("hide");
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


/* Eventos */
$("#numero_dias_condicion_pago").on("keyup", function () {
	calcular_fecha_condicion_pago();
});
/* Fin Eventos*/


/* Funciones */
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
	document.getElementById("fecha_condicion_pago").value = (dia + '/' + mes + '/' + fecha.getUTCFullYear());

}
/*Fin de Funciones*/


/* Otros */
$(".select2").select2({
	theme: "bootstrap4"
});
/* Fin de Otros */










$("#tipo_moneda_cambio").on("change", function () {

	var precio_unitario = $("#precio_unitario").val();
	var valor_cambio = $("#valor_cambio").val();
	var tipo_moneda_origen = $('#tipo_moneda_origen option:selected').text();
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
	$("#precio_inicial_venta").val(convertidor_unitario);
	$("#precio_final").val(convertidor_unitario);




});

$("#g").on("keyup", function () {

	var precio_inicial_venta = $("#precio_inicial_venta").val();
	var g = $("#g").val();
	var ganancia_unidad = (precio_inicial_venta * g / 100);
	var precio_final = Number(ganancia_unidad) + Number(precio_inicial_venta);
	$("#ganancia_unidad").val(ganancia_unidad);
	$("#precio_final").val(precio_final);
	$("#precio_venta").val(precio_final);
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

	var precio_venta = $("#precio_venta").val();
	var d = $("#d").val();
	var descuento_unidad = (precio_venta * d / 100);
	var hidden_precio_descuento = precio_venta - descuento_unidad;
	var precio_inicial_venta = $("#precio_inicial_venta").val();
	var precio_descuento = $("#precio_descuento").val();

	$("#descuento_unidad").val(descuento_unidad);
	$("#hidden_precio_descuento").val(hidden_precio_descuento);
	debugger;

	if (d == "") {
		$("#hidden_precio_descuento").val(hidden_precio_descuento);
		$("#precio_descuento").val("");
		$("#descuento_unidad").val("");
		$("#d_cant_total").val("");
		$("#d").val("");
	}
	else if (hidden_precio_descuento >= precio_inicial_venta) {
		$("#precio_descuento").val(hidden_precio_descuento);
	}
	else if (hidden_precio_descuento < precio_inicial_venta) {
		$("#hidden_precio_descuento").val(hidden_precio_descuento);
		$("#precio_descuento").val("");
		$("#descuento_unidad").val("");
		$("#d").val("");
		alert("El precio con Descuento es: " + hidden_precio_descuento + ", y tiene que ser mayor o igual que el precio inicial de venta: " + precio_inicial_venta);
	}
}

function calcular_monto() {
	var cantidad = $("#cantidad").val();
	var g = $("#g").val();
	var d = $("#d").val();
	var precio_final = $("#precio_final").val();
	var precio_descuento = $("#precio_descuento").val();
	var ganancia_unidad = $("#ganancia_unidad").val();
	var descuento_unidad = $("#descuento_unidad").val();
	var monto = "";
	d_cant_total = descuento_unidad * cantidad;
	g_cant_total = Number(cantidad) * Number(ganancia_unidad)

	if (g == "" & d == "") {
		monto = precio_final * cantidad;
	}
	else if (g != "" & d != "") {
		monto = precio_descuento * cantidad;
	} else if (d == "") {
		monto = precio_final * cantidad;
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
		$("#precio_venta").val("");
		$("#precio_descuento").val("");
		$("#descuento_unidad").val("");
		$("#d").val("");
		$("#d_cant_total").val("");
		$("#ganancia_unidad").val("");
	}

	if (monto == 0) {
		monto = "";
	}

	$("#monto").val(monto);
	$("#g_cant_total").val(g_cant_total);
	$("#d_cant_total").val(d_cant_total);

}



















$("#id_agregar_cotizacion").on("click", function (e) {


	var precio_final = $("#precio_final").val();

	html = "<tr>";
	html += "<td><input type='hidden' name='ds_almacen[]' 				value='" + precio_final + "'>" + precio_final + "</td>";
	html += "<td><input type='hidden' name='ds_almacen[]' 				value='" + precio_final + "'>" + precio_final + "</td>";
	html += "<td><input type='hidden' name='ds_almacen[]' 				value='" + precio_final + "'>" + precio_final + "</td>";
	html += "<td><input type='hidden' name='ds_almacen[]' 				value='" + precio_final + "'>" + precio_final + "</td>";
	html += "<td><input type='hidden' name='ds_almacen[]' 				value='" + precio_final + "'>" + precio_final + "</td>";
	html += "<td><input type='hidden' name='ds_almacen[]' 				value='" + precio_final + "'>" + precio_final + "</td>";
	html += "<td><input type='hidden' name='ds_almacen[]' 				value='" + precio_final + "'>" + precio_final + "</td>";
	html += "<td><input type='hidden' name='ds_almacen[]' 				value='" + precio_final + "'>" + precio_final + "</td>";
	html += "<td><input type='hidden' name='ds_almacen[]' 				value='" + precio_final + "'>" + precio_final + "</td>";
	html += "<td><input type='hidden' name='ds_almacen[]' 				value='" + precio_final + "'>" + precio_final + "</td>";
	html += "<td><input type='hidden' name='ds_almacen[]' 				value='" + precio_final + "'>" + precio_final + "</td>";
	html += "<td><select class='form-select'><option>1</option></select>";
	html += "<td><button type='button' class='btn btn-outline-danger btn-sm eliminar_fila'><span class='fas fa-trash-alt'></span></button></td>";
	html += "</tr>";

	$("#id_table_detalle_cotizacion tbody").append(html);


});