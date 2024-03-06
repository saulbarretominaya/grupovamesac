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
$(document).on("click", ".js_lupa_orden_compra", function () {
	valor_id = $(this).val();
	$.ajax({
		url: base_url + "C_orden_compras/index_modal",
		type: "POST",
		dataType: "html",
		data: {
			id_orden_compra: valor_id
		},
		success: function (data) {
			$("#id_target_orden_compra .modal-content").html(data);
		}
	});
});
$("#registrar").on("click", function () {
	debugger;
	validar_registrar();
	if (resultado_campo == true) {

		//Cabecera
		var id_trabajador = $("#id_trabajador").val();
		var ds_nombre_trabajador = $("#ds_nombre_trabajador").val();
		var fecha_orden_compra = $("#fecha_orden_compra").val();
		var id_cliente_proveedor = $("#id_cliente_proveedor").val();
		var ds_nombre_cliente_proveedor = $("#ds_nombre_cliente_proveedor").val();
		var ds_departamento_cliente_proveedor = $("#ds_departamento_cliente_proveedor").val();
		var ds_provincia_cliente_proveedor = $("#ds_provincia_cliente_proveedor").val();
		var ds_distrito_cliente_proveedor = $("#ds_distrito_cliente_proveedor").val();
		var direccion_fiscal_cliente_proveedor = $("#direccion_fiscal_cliente_proveedor").val();
		var clausula = $("#clausula").val();
		var lugar_entrega = $("#lugar_entrega").val();
		var nombre_encargado = $("#nombre_encargado").val();
		var observacion = $("#observacion").val();
		var id_condicion_pago = $("#id_condicion_pago").val();
		var ds_condicion_pago = $('#id_condicion_pago option:selected').text();
		var id_moneda = $("#id_moneda").val();
		var ds_moneda = $('#id_moneda option:selected').text();
		var valor_venta = $("#valor_venta").val();
		var igv = $("#igv").val();
		var precio_venta = $("#precio_venta").val();
		//Empresa
		var id_orden_compra_empresa = $("#id_orden_compra_empresa").val();
		var id_empresa = $("#id_empresa").val();


		//Detalle
		var id_producto = Array.prototype.slice.call(document.getElementsByName("id_producto[]")).map((o) => o.value);
		var codigo_producto = Array.prototype.slice.call(document.getElementsByName("codigo_producto[]")).map((o) => o.value);
		var descripcion_producto = Array.prototype.slice.call(document.getElementsByName("descripcion_producto[]")).map((o) => o.value);
		var id_unidad_medida = Array.prototype.slice.call(document.getElementsByName("id_unidad_medida[]")).map((o) => o.value);
		var ds_unidad_medida = Array.prototype.slice.call(document.getElementsByName("ds_unidad_medida[]")).map((o) => o.value);
		var id_marca_producto = Array.prototype.slice.call(document.getElementsByName("id_marca_producto[]")).map((o) => o.value);
		var ds_marca_producto = Array.prototype.slice.call(document.getElementsByName("ds_marca_producto[]")).map((o) => o.value);
		var cantidad = Array.prototype.slice.call(document.getElementsByName("cantidad[]")).map((o) => o.value);

		var precio_unitario_venta = Array.prototype.slice.call(document.getElementsByName("precio_unitario_venta[]")).map((o) => o.value);
		var precio_unitario_costo = Array.prototype.slice.call(document.getElementsByName("precio_unitario_costo[]")).map((o) => o.value);
		var rentabilidad = Array.prototype.slice.call(document.getElementsByName("rentabilidad[]")).map((o) => o.value);
		var total_compra = Array.prototype.slice.call(document.getElementsByName("total_compra[]")).map((o) => o.value);
		var item = Array.prototype.slice.call(document.getElementsByName("item[]")).map((o) => o.value);


		$.ajax({
			async: false,
			url: base_url + "C_orden_compras/registrar",
			type: "POST",
			dataType: "json",
			data: {
				//Cabecera
				id_trabajador: id_trabajador,
				ds_nombre_trabajador: ds_nombre_trabajador,
				fecha_orden_compra: fecha_orden_compra,
				id_cliente_proveedor: id_cliente_proveedor,
				ds_nombre_cliente_proveedor: ds_nombre_cliente_proveedor,
				ds_departamento_cliente_proveedor: ds_departamento_cliente_proveedor,
				ds_provincia_cliente_proveedor: ds_provincia_cliente_proveedor,
				ds_distrito_cliente_proveedor: ds_distrito_cliente_proveedor,
				direccion_fiscal_cliente_proveedor: direccion_fiscal_cliente_proveedor,
				clausula: clausula,
				lugar_entrega: lugar_entrega,
				nombre_encargado: nombre_encargado,
				observacion: observacion,
				id_condicion_pago: id_condicion_pago,
				ds_condicion_pago: ds_condicion_pago,
				id_moneda: id_moneda,
				ds_moneda: ds_moneda,
				valor_venta: valor_venta,
				igv: igv,
				precio_venta: precio_venta,
				//Empresa
				id_orden_compra_empresa: id_orden_compra_empresa,
				id_empresa: id_empresa,


				//Detalle Orden Compras
				id_producto: id_producto,
				codigo_producto: codigo_producto,
				descripcion_producto: descripcion_producto,
				id_unidad_medida: id_unidad_medida,
				ds_unidad_medida: ds_unidad_medida,
				id_marca_producto: id_marca_producto,
				ds_marca_producto: ds_marca_producto,
				cantidad: cantidad,
				precio_unitario_venta: precio_unitario_venta,
				precio_unitario_costo: precio_unitario_costo,
				rentabilidad: rentabilidad,
				total_compra: total_compra,
				item: item
			},
			success: function (data) {
				debugger;
				window.location.href = base_url + "C_orden_compras";
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
	$("#ds_departamento_cliente_proveedor").val(split_clientes_proveedores[2]);
	$("#ds_provincia_cliente_proveedor").val(split_clientes_proveedores[3]);
	$("#ds_distrito_cliente_proveedor").val(split_clientes_proveedores[4]);
	$("#direccion_fiscal_cliente_proveedor").val(split_clientes_proveedores[5]);
	$("#email_cliente_proveedor").val(split_clientes_proveedores[6]);
	$("#opcion_target_clientes_proveedores").modal("hide");
});
$(document).on("click", ".js_seleccionar_modal_producto", function () {

	productos = $(this).val();
	split_productos = productos.split("*");
	$("#hidden_id_producto").val(split_productos[0]);
	$("#hidden_codigo_producto").val(split_productos[1]);
	$("#descripcion_producto").val(split_productos[2]);
	$("#hidden_id_unidad_medida").val(split_productos[3]);
	$("#hidden_ds_unidad_medida").val(split_productos[4]);
	$("#hidden_id_marca_producto").val(split_productos[5]);
	$("#hidden_ds_marca_producto").val(split_productos[6]);
	$("#opcion_target_producto").modal("hide");
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
$("#id_agregar_orden_compra").on("click", function (e) {

	validar_detalle_orden_compra();

	var resume_table = document.getElementById("id_table_detalle_orden_compra");
	for (var i = 0, row; row = resume_table.rows[i]; i++) {
		console.log(`Fila': ${i}`);
		$("#hidden_item").val(i + 1);
	}

	debugger;
	var item = $("#hidden_item").val();
	var id_producto = $("#hidden_id_producto").val();
	var codigo_producto = $("#hidden_codigo_producto").val();
	var descripcion_producto = $("#descripcion_producto").val();
	var id_unidad_medida = $("#hidden_id_unidad_medida").val();
	var ds_unidad_medida = $("#hidden_ds_unidad_medida").val();
	var id_marca_producto = $("#hidden_id_marca_producto").val();
	var ds_marca_producto = $("#hidden_ds_marca_producto").val();
	var cantidad = $("#cantidad").val();
	var precio_unitario_venta = $("#precio_unitario_venta").val();
	var precio_unitario_costo = $("#precio_unitario_costo").val();
	var rentabilidad = $("#rentabilidad").val();
	var total_compra = $("#total_compra").val();

	if (resultado_campo == true) {
		html = "<tr>";
		html += "<td width='70px'><input type='text'   name='item[]'		value='" + item + "'       id='item' class='form-control' readonly=''></td>";
		html += "    <input type='hidden' name='id_producto[]' 				value='" + id_producto + "' id='id_producto' >";
		html += "<td><input type='hidden' name='codigo_producto[]'			value='" + codigo_producto + "'>" + codigo_producto + "</td>";
		html += "<td><input type='hidden' name='descripcion_producto[]' 	value='" + descripcion_producto + "'>" + descripcion_producto + "</td>";
		html += "    <input type='hidden' name='id_unidad_medida[]' 		value='" + id_unidad_medida + "'>";
		html += "<td><input type='hidden' name='ds_unidad_medida[]' 		value='" + ds_unidad_medida + "'>" + ds_unidad_medida + "</td>";
		html += "    <input type='hidden' name='id_marca_producto[]' 		value='" + id_marca_producto + "'>";
		html += "<td><input type='hidden' name='ds_marca_producto[]'		value='" + ds_marca_producto + "'>" + ds_marca_producto + "</td>";
		html += "<td><input type='hidden' name='cantidad[]'					value='" + cantidad + "'>" + cantidad + "</td>";
		html += "<td><input type='hidden' name='precio_unitario_venta[]'	value='" + precio_unitario_venta + "'>" + precio_unitario_venta + "</td>";
		html += "<td><input type='hidden' name='precio_unitario_costo[]'	value='" + precio_unitario_costo + "'>" + precio_unitario_costo + "</td>";
		html += "<td><input type='hidden' name='rentabilidad[]'				value='" + rentabilidad + "'>" + rentabilidad + "</td>";
		html += "<td><input type='hidden' name='total_compra[]' 			value='" + total_compra + "'>" + total_compra + "</td>";
		html += "<td><button type='button' class='btn btn-outline-danger btn-sm eliminar_fila_orden_compra'><span class='fas fa-trash-alt'></span></button></td>";
		html += "</tr>";
		$("#id_table_detalle_orden_compra tbody").append(html);
		valor_venta();
		igv();
		precio_venta();
		limpiar_campos();
	}
});
$(document).on("click", ".eliminar_fila_orden_compra", function () {

	var id_detalle = $(this).closest("tr").find("#value_id_solicitud").val();
	html = "<input type='hidden' id='id_solicitud_to_remove' name ='id_solicitud_to_remove[]' value='" + id_detalle + "'>";
	$("#container_solicitud_id_remove").append(html);
	$(this).closest("tr").remove();
	generar_item();
	valor_venta();
	igv();
	precio_venta();
	limpiar_campos();
});
$("#precio_unitario_venta").on("keyup", function () {

	var precio_unitario_venta = $("#precio_unitario_venta").val();
	var precio_unitario_costo = $("#precio_unitario_costo").val();

	if (isNaN(precio_unitario_venta) || precio_unitario_venta == "") {
		$("#precio_unitario_venta").val("");
		$("#rentabilidad").val("");
	}
	else if (isNaN(precio_unitario_costo) || precio_unitario_costo == "") {
		$('#precio_unitario_costo').val("");
		$('#rentabilidad').val("");
	} else {
		calcular_rentabilidad();
	}

});
$("#precio_unitario_costo").on("keyup", function () {

	var precio_unitario_costo = $("#precio_unitario_costo").val();
	var precio_unitario_venta = $("#precio_unitario_venta").val();
	var cantidad = $('#cantidad').val();

	if (isNaN(precio_unitario_costo) || precio_unitario_costo == "") {
		$('#precio_unitario_costo').val("");
		$('#total_compra').val("");
		$('#rentabilidad').val("");
	}
	else if (cantidad == "") {
		if (precio_unitario_costo != "" & precio_unitario_venta != "") {
			calcular_rentabilidad();
		} else {
			$('#cantidad').val("");
			$('#total_compra').val("");
		}
	}
	else {
		calcular_total_compra();
		calcular_rentabilidad();
	}

});
$("#cantidad").on("keyup", function () {

	var cantidad = $('#cantidad').val();
	var precio_unitario_costo = $("#precio_unitario_costo").val();


	if (isNaN(cantidad) || cantidad == "") {
		$('#cantidad').val("");
		$('#total_compra').val("");
	}
	else if (isNaN(precio_unitario_costo) || precio_unitario_costo == "") {
		$('#precio_unitario_costo').val("");
		$('#total_compra').val("");
	}
	else {
		calcular_total_compra();
	}
});
/* Fin Evento */


/* Funciones */

function calcular_total_compra() {

	var cantidad = $("#cantidad").val();
	var precio_unitario_costo = $("#precio_unitario_costo").val();
	var total_compra = $('#total_compra').val();

	total_compra = Number(precio_unitario_costo) * Number(cantidad)
	$('#total_compra').val(total_compra.toFixed(2));

}
function calcular_rentabilidad() {

	var precio_unitario_venta = $("#precio_unitario_venta").val();
	var precio_unitario_costo = $("#precio_unitario_costo").val();
	var rentabilidad = $("#rentabilidad").val();

	rentabilidad = (1 - (Number(precio_unitario_costo) / Number(precio_unitario_venta))) * 100


	if (rentabilidad == -Infinity) {
		$('#rentabilidad').val("");
	} else {
		$("#rentabilidad").val(Math.round(rentabilidad));
	}
}
function validar_detalle_orden_compra() {


	$("#id_table_detalle_orden_compra tbody tr").each(function () {

		id_producto_table = $(this).find("#id_producto").val();
		var id_producto = $("#hidden_id_producto").val();

		if (id_producto_table == id_producto) {
			codigo_producto_duplicado = false;
			return false;
		}

	});
	debugger;
	var descripcion_producto = $("#descripcion_producto").val();
	var cantidad = $("#cantidad").val();
	var precio_unitario_costo = $("#precio_unitario_costo").val();
	var total_compra = $("#total_compra").val();

	if (descripcion_producto == "") {
		alert("Seleccione un Producto");
		resultado_campo = false;
	}
	else if (cantidad == "") {
		alert("Ingrese una Cantidad");
		resultado_campo = false;
	}
	else if (precio_unitario_costo == "") {
		alert("Ingrese el Precio Unitario Compra");
		resultado_campo = false;
	}
	else if (total_compra == "") {
		$("No tiene asignado Total Compra").val("");
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
function valor_venta() {

	var acumulador = 0;
	$("#id_table_detalle_orden_compra tbody tr").each(function () {
		var posicion_total_compra = $(this).find("td:eq(9)").text();
		posicion_total_compra = Number(posicion_total_compra);
		acumulador = (acumulador + posicion_total_compra)
		$("#valor_venta").val(acumulador.toFixed(2));
	});

}
function igv() {
	debugger;
	var valor_venta = $("#valor_venta").val();

	if (valor_venta == "") {
		$("#igv").val("");
	} else {
		var igv = (valor_venta * 0.18);
		$("#igv").val(igv.toFixed(2));
	}
}
function precio_venta() {
	var valor_venta = Number($("#valor_venta").val());
	var igv = Number($("#igv").val());
	var precio_venta = valor_venta + igv;
	$("#precio_venta").val(precio_venta.toFixed(2));
}
function limpiar_campos() {

	$("#hidden_id_producto").val("");
	$("#hidden_codigo_producto").val("");
	$("#descripcion_producto").val("");
	$("#hidden_id_unidad_medida").val("");
	$("#hidden_ds_unidad_medida").val("");
	$("#hidden_id_marca_producto").val("");
	$("#hidden_ds_marca_producto").val("");
	$("#cantidad").val("");
	$("#precio_unitario_venta").val("");
	$("#precio_unitario_costo").val("");
	$("#rentabilidad").val("");
	$("#total_compra").val("");
}
function validar_registrar() {


	var fecha_orden_compra = $("#fecha_orden_compra").val();
	var id_condicion_pago = $("#id_condicion_pago").val();
	var id_moneda = $("#id_moneda").val();
	var ds_nombre_cliente_proveedor = $("#ds_nombre_cliente_proveedor").val();
	var ds_departamento_cliente_proveedor = $("#ds_departamento_cliente_proveedor").val();
	var ds_provincia_cliente_proveedor = $("#ds_provincia_cliente_proveedor").val();
	var ds_distrito_cliente_proveedor = $("#ds_distrito_cliente_proveedor").val();
	var direccion_fiscal_cliente_proveedor = $("#direccion_fiscal_cliente_proveedor").val();
	var count_detalle_orden_compra = $('#id_table_detalle_orden_compra tr').length;

	if (fecha_orden_compra == "") {
		alert("No tiene Fecha Orden")
		resultado_campo = false;
	}
	else if (id_condicion_pago == "0") {
		alert("Selecione Condicion Pago")
		resultado_campo = false;
	}
	else if (id_moneda == "0") {
		alert("Selecione Moneda")
		resultado_campo = false;
	}

	else if (ds_nombre_cliente_proveedor == "") {
		alert("Registre un Cliente o Proveedor")
		resultado_campo = false;
	}
	else if (ds_departamento_cliente_proveedor == "") {
		alert("No tiene asignado un Departamento")
		resultado_campo = false;
	}
	else if (ds_provincia_cliente_proveedor == "") {
		alert("No tiene asignado una Provincia")
		resultado_campo = false;
	}
	else if (ds_distrito_cliente_proveedor == "") {
		alert("No tiene asignado un Distrito")
		resultado_campo = false;
	}
	else if (direccion_fiscal_cliente_proveedor == "") {
		alert("Registre su direccion fiscal")
		resultado_campo = false;
	}
	else if (count_detalle_orden_compra == "1") {
		alertify.dialog('alert').set({ transition: 'zoom', message: 'Debe registrar al menos 1 producto en el detalle de Orden Compra', title: 'COTIZACION' }).show();
		resultado_campo = false;
	}
	else {
		resultado_campo = true;
	}
}
function generar_item() {

	var acumulador = 0;
	$("#id_table_detalle_orden_compra tbody tr").each(function () {
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