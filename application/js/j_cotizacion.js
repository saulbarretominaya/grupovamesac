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



	//Detalle
	var id_producto = Array.prototype.slice.call(document.getElementsByName("id_producto[]")).map((o) => o.value);
	var id_tablero = Array.prototype.slice.call(document.getElementsByName("id_tablero[]")).map((o) => o.value);
	var id_comodin = Array.prototype.slice.call(document.getElementsByName("id_comodin[]")).map((o) => o.value);
	var codigo_producto = Array.prototype.slice.call(document.getElementsByName("codigo_producto[]")).map((o) => o.value);
	var descripcion_producto = Array.prototype.slice.call(document.getElementsByName("descripcion_producto[]")).map((o) => o.value);


	var id_unidad_medida = Array.prototype.slice.call(document.getElementsByName("id_unidad_medida[]")).map((o) => o.value);
	var ds_unidad_medida = Array.prototype.slice.call(document.getElementsByName("ds_unidad_medida[]")).map((o) => o.value);
	var id_marca_producto = Array.prototype.slice.call(document.getElementsByName("id_marca_producto[]")).map((o) => o.value);
	var ds_marca_producto = Array.prototype.slice.call(document.getElementsByName("ds_marca_producto[]")).map((o) => o.value);
	var cantidad = Array.prototype.slice.call(document.getElementsByName("cantidad[]")).map((o) => o.value);



	var precio_inicial = Array.prototype.slice.call(document.getElementsByName("precio_inicial[]")).map((o) => o.value);
	var precio_ganancia = Array.prototype.slice.call(document.getElementsByName("precio_ganancia[]")).map((o) => o.value);
	var g = Array.prototype.slice.call(document.getElementsByName("g[]")).map((o) => o.value);
	var g_unidad = Array.prototype.slice.call(document.getElementsByName("g_unidad[]")).map((o) => o.value);
	var g_cant_total = Array.prototype.slice.call(document.getElementsByName("g_cant_total[]")).map((o) => o.value);

	debugger;
	var precio_descuento = Array.prototype.slice.call(document.getElementsByName("precio_descuento[]")).map((o) => o.value);
	var d = Array.prototype.slice.call(document.getElementsByName("d[]")).map((o) => o.value);
	var d_unidad = Array.prototype.slice.call(document.getElementsByName("d_unidad[]")).map((o) => o.value);
	var d_cant_total = Array.prototype.slice.call(document.getElementsByName("d_cant_total[]")).map((o) => o.value);

	var valor_venta = Array.prototype.slice.call(document.getElementsByName("valor_venta[]")).map((o) => o.value);
	var dias_entrega = Array.prototype.slice.call(document.getElementsByName("dias_entrega[]")).map((o) => o.value);


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
			codigo_producto: codigo_producto,
			descripcion_producto: descripcion_producto,
			id_unidad_medida: id_unidad_medida,
			ds_unidad_medida: ds_unidad_medida,
			id_marca_producto: id_marca_producto,
			ds_marca_producto: ds_marca_producto,
			cantidad: cantidad,

			precio_inicial: precio_inicial,
			precio_ganancia: precio_ganancia,
			g: g,
			g_unidad: g_unidad,
			g_cant_total: g_cant_total,

			precio_descuento: precio_descuento,
			d: d,
			d_unidad: d_unidad,
			d_cant_total: d_cant_total,

			valor_venta: valor_venta,
			dias_entrega: dias_entrega
		},
		success: function (data) {
			debugger;
			window.location.href = base_url + "C_cotizacion";
			debugger;
		},
	});
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

	limpiar_campos();
	productos = $(this).val();
	split_productos = productos.split("*");
	$("#hidden_id_producto").val(split_productos[0]);
	$("#hidden_codigo_producto").val(split_productos[1]);
	$("#descripcion_producto").val(split_productos[2]);
	$("#hidden_id_unidad_medida").val(split_productos[3]);
	$("#hidden_ds_unidad_medida").val(split_productos[4]);
	$("#hidden_id_marca_producto").val(split_productos[5]);
	$("#hidden_ds_marca_producto").val(split_productos[6]);
	$("#hidden_id_moneda").val(split_productos[7]);
	$("#tipo_moneda_origen").val(split_productos[8]);
	var simbolo_moneda = split_productos[8];
	if (simbolo_moneda == "SOLES") {
		$("#simbolo_moneda").val("S/");
	} else if (simbolo_moneda == "DOLARES") {
		$("#simbolo_moneda").val("$");
	}
	$("#precio_unitario").val(split_productos[9]);
	aplicar_tipo_cambio();
	calcular_monto();
	$("#opcion_target_producto").modal("hide");
});
$(document).on("click", ".js_seleccionar_modal_tablero", function () {
	limpiar_campos();
	tableros = $(this).val();
	split_tableros = tableros.split("*");
	$("#hidden_id_tablero").val(split_tableros[0]);
	$("#hidden_codigo_producto").val(split_tableros[1]);
	$("#descripcion_producto").val(split_tableros[2]);
	$("#hidden_id_marca_producto").val(split_tableros[3]);
	$("#hidden_ds_marca_producto").val(split_tableros[4]);
	$("#hidden_id_moneda").val(split_tableros[5]);
	$("#tipo_moneda_origen").val(split_tableros[6]);
	var simbolo_moneda = split_tableros[6];
	if (simbolo_moneda == "SOLES") {
		$("#simbolo_moneda").val("S/");
	} else if (simbolo_moneda == "DOLARES") {
		$("#simbolo_moneda").val("$");
	}
	$("#precio_unitario").val(split_tableros[7]);
	aplicar_tipo_cambio();
	calcular_monto();
	$("#opcion_target_tablero").modal("hide");
});
$(document).on("click", ".js_seleccionar_modal_comodin", function () {
	limpiar_campos();
	comodin = $(this).val();
	split_comodin = comodin.split("*");
	$("#hidden_id_comodin").val(split_comodin[0]);
	$("#hidden_codigo_producto").val(split_comodin[1]);
	$("#descripcion_producto").val(split_comodin[2]);
	$("#hidden_id_unidad_medida").val(split_comodin[3]);
	$("#hidden_ds_unidad_medida").val(split_comodin[4]);
	$("#hidden_id_marca_producto").val(split_comodin[5]);
	$("#hidden_ds_marca_producto").val(split_comodin[6]);
	$("#hidden_id_moneda").val(split_comodin[7]);
	$("#tipo_moneda_origen").val(split_comodin[8]);
	var simbolo_moneda = split_comodin[8];
	if (simbolo_moneda == "SOLES") {
		$("#simbolo_moneda").val("S/");
	} else if (simbolo_moneda == "DOLARES") {
		$("#simbolo_moneda").val("$");
	}
	$("#precio_unitario").val(split_comodin[9]);
	aplicar_tipo_cambio();
	calcular_monto();
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
/* Fin de Ventanas Modal Registrar*/



/*Evento */
$("#numero_dias_condicion_pago").on("keyup", function () {
	calcular_fecha_condicion_pago();
});
$("#tipo_moneda_cambio").on("change", function () {

	aplicar_tipo_cambio();
	calcular_monto();
});
$("#g").on("keyup", function () {
	calcular_precio_ganancia();
	calcular_monto();
});
$("#cantidad").on("keyup", function () {
	calcular_monto();
});
$("#d").on("keyup", function () {
	calcular_precio_descuento();
	calcular_monto();
});
$("#id_agregar_cotizacion").on("click", function (e) {

	validar_detalle_cotizacion();

	var id_producto = $("#hidden_id_producto").val();
	var id_tablero = $("#hidden_id_tablero").val();
	var id_comodin = $("#hidden_id_comodin").val();
	var codigo_producto = $("#hidden_codigo_producto").val();
	var descripcion_producto = $("#descripcion_producto").val();
	var id_unidad_medida = $("#hidden_id_unidad_medida").val();
	var ds_unidad_medida = $("#hidden_ds_unidad_medida").val();
	var id_marca_producto = $("#hidden_id_marca_producto").val();
	var ds_marca_producto = $("#hidden_ds_marca_producto").val();

	var precio_ganancia = $("#precio_ganancia").val();
	var cantidad = $("#cantidad").val();
	var precio_inicial = $("#precio_inicial").val();
	var g = $("#g").val();
	var g_unidad = $("#g_unidad").val();
	var g_cant_total = $("#g_cant_total").val();

	var d = $("#d").val();
	var precio_descuento = $("#precio_descuento").val();
	var d_unidad = $("#d_unidad").val();
	var d_cant_total = $("#d_cant_total").val();
	var valor_venta = $("#monto").val();

	if (resultado_campo == true) {
		html = "<tr>";
		html += "    <input type='hidden' name='id_producto[]' 				value='" + id_producto + "'>";
		html += "    <input type='hidden' name='id_tablero[]' 				value='" + id_tablero + "'>";
		html += "    <input type='hidden' name='id_comodin[]' 				value='" + id_comodin + "'>";
		html += "<td><input type='hidden' name='codigo_producto[]'			value='" + codigo_producto + "'>" + codigo_producto + "</td>";
		html += "<td><input type='hidden' name='descripcion_producto[]' 	value='" + descripcion_producto + "'>" + descripcion_producto + "</td>";
		html += "    <input type='hidden' name='id_unidad_medida[]' 		value='" + id_unidad_medida + "'>";
		html += "<td><input type='hidden' name='ds_unidad_medida[]' 		value='" + ds_unidad_medida + "'>" + ds_unidad_medida + "</td>";
		html += "    <input type='hidden' name='id_marca_producto[]' 		value='" + id_marca_producto + "'>";
		html += "<td><input type='hidden' name='ds_marca_producto[]'		value='" + ds_marca_producto + "'>" + ds_marca_producto + "</td>";
		html += "<td><input type='hidden' name='precio_ganancia[]' 			value='" + precio_ganancia + "'>" + precio_ganancia + "</td>";
		html += "<td><input type='hidden' name='cantidad[]' 				value='" + cantidad + "'>" + cantidad + "</td>";
		html += "    <input type='hidden' name='precio_inicial[]' 			value='" + precio_inicial + "'>";
		html += "    <input type='hidden' name='g[]' 						value='" + g + "'>";
		html += "    <input type='hidden' name='g_unidad[]' 				value='" + g_unidad + "'>";
		html += "    <input type='hidden' name='g_cant_total[]' 			value='" + g_cant_total + "'>";


		html += "<td><input type='hidden' name='d[]' 						value='" + d + "'>" + d + "</td>";
		html += "<td><input type='hidden' name='precio_descuento[]' 		value='" + precio_descuento + "'>" + precio_descuento + "</td>";
		html += "    <input type='hidden' name='d_unidad[]' 				value='" + d_unidad + "'>";
		html += "<td><input type='hidden' name='d_cant_total[]' 			value='" + d_cant_total + "'>" + d_cant_total + "</td>";
		html += "<td><input type='hidden' name='valor_venta[]' 				value='" + valor_venta + "'>" + valor_venta + "</td>";
		html += "<td style='width:10%'><input type='number' name='dias_entrega[]' class='form-control'></td>";
		html += "<td><button type='button' class='btn btn-outline-danger btn-sm eliminar_fila'><span class='fas fa-trash-alt'></span></button></td>";
		html += "</tr>";
		$("#id_table_detalle_cotizacion tbody").append(html);
		total();
		descuento_total();
		igv();
		precio_venta();
	}
});
$(document).on("click", ".eliminar_fila", function () {

	var id_detalle = $(this).closest("tr").find("#value_id_solicitud").val();
	html =
		"<input type='hidden' id='id_solicitud_to_remove' name ='id_solicitud_to_remove[]' value='" +
		id_detalle +
		"'>";

	$("#container_solicitud_id_remove").append(html);
	$(this).closest("tr").remove();

	// sumar_monto_item();
	// calcular_margen();
	limpiar_campos();
});
/* Fin Evento */




/* Funciones */
function total() {
	var acumulador = 0;
	$("#id_table_detalle_cotizacion tbody tr").each(function () {
		var posicion_valor_venta = $(this).find("td:eq(9)").text();
		// valor = Number(valorcito.replace(/,/g, ''));
		valor_venta = Number(posicion_valor_venta);
		acumulador = (acumulador + valor_venta)
		$("#total").val(acumulador.toFixed(2));

	});

}
function descuento_total() {
	var acumulador = 0;
	$("#id_table_detalle_cotizacion tbody tr").each(function () {
		var posicion_total_descuento = $(this).find("td:eq(8)").text();
		// valor = Number(valorcito.replace(/,/g, ''));
		total_descuento = Number(posicion_total_descuento);
		acumulador = (acumulador + total_descuento)

		$("#descuento_total").val(acumulador.toFixed(2));

	});

}
function igv() {
	var total = Number($("#total").val());
	var igv = (total * 0.18);
	$("#igv").val(igv.toFixed(2));
}
function precio_venta() {
	var total = Number($("#total").val());
	var igv = Number($("#igv").val());
	var precio_venta = total + igv;
	$("#precio_venta").val(precio_venta.toFixed(2));
}
function calcular_precio_ganancia() {
	var precio_inicial = Number($("#precio_inicial").val());
	var g = Number($("#g").val());
	var g_unidad = (precio_inicial * g / 100);
	var precio_ganancia = Number(g_unidad) + Number(precio_inicial);
	$("#g_unidad").val(g_unidad.toFixed(2));
	$("#precio_ganancia").val(precio_ganancia.toFixed(5));
	$("#precio_ganancia_visor").val(precio_ganancia.toFixed(5));

}
function calcular_precio_descuento() {

	var precio_ganancia = Number($("#precio_ganancia").val());
	var d = Number($("#d").val());
	var d_unidad = (precio_ganancia * d / 100);
	var hidden_precio_descuento = precio_ganancia - d_unidad;
	var precio_inicial = Number($("#precio_inicial").val());

	$("#d_unidad").val(d_unidad.toFixed(2));
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
		$("#precio_descuento").val(hidden_precio_descuento.toFixed(5));
	}
	else if (hidden_precio_descuento < precio_inicial) {
		$("#hidden_precio_descuento").val(hidden_precio_descuento);
		$("#precio_descuento").val("");
		$("#d_unidad").val("");
		$("#d").val("");
		alert("El precio con Descuento es: " + hidden_precio_descuento.toFixed(5) + ", y tiene que ser mayor o igual que el precio inicial de venta: " + precio_inicial.toFixed(5));
	}
}
function calcular_monto() {

	var cantidad = Number($("#cantidad").val());
	var g = Number($("#g").val());
	var d = Number($("#d").val());
	var precio_ganancia = Number($("#precio_ganancia").val());
	var precio_descuento = Number($("#precio_descuento").val());
	var g_unidad = Number($("#g_unidad").val());
	var d_unidad = Number($("#d_unidad").val());
	var monto = 0;
	var d_cant_total = d_unidad * cantidad;
	var g_cant_total = Number(cantidad) * Number(g_unidad)

	if (g == "" & d == "") {
		monto = precio_ganancia * cantidad;
	}
	else if (g != "" & d != "") {
		monto = precio_descuento * cantidad;
	} else if (d == "") {
		monto = precio_ganancia * cantidad;
	}

	if (g_cant_total == 0 & d_cant_total == 0) {
		g_cant_total = 0
		d_cant_total = 0
	}
	else if (d_cant_total == 0) {
		d_cant_total = 0
	} else if (g_cant_total == 0) {
		g_cant_total = 0
	}

	if (g == "") {
		$("#precio_ganancia_visor").val("");
		$("#precio_descuento").val("");
		$("#d_unidad").val("");
		$("#d").val("");
		$("#d_cant_total").val("");
		$("#g_unidad").val("");
	} else if (d == "") {
		$("#d_cant_total").val("");
	}

	if (monto == 0) {
		monto = 0;
	}

	$("#monto").val(monto.toFixed(2));
	$("#g_cant_total").val(g_cant_total.toFixed(2));
	$("#d_cant_total").val(d_cant_total.toFixed(2));

}
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
function aplicar_tipo_cambio() {
	debugger;

	var precio_unitario = $("#precio_unitario").val();
	var valor_cambio = $("#valor_cambio").val();
	var tipo_moneda_origen = $("#tipo_moneda_origen").val();
	var tipo_moneda_cambio = $('#tipo_moneda_cambio option:selected').text();

	if (tipo_moneda_cambio == "Seleccionar") {
		convertidor_unitario = 0;
	}
	else if (tipo_moneda_origen == tipo_moneda_cambio) {
		convertidor_unitario = Number(precio_unitario);
	}
	else if (tipo_moneda_origen == "SOLES") {
		convertidor_unitario = precio_unitario / valor_cambio;
	}
	else if (tipo_moneda_origen == "DOLARES") {
		convertidor_unitario = precio_unitario * valor_cambio;
	}

	$("#convertidor_unitario").val(convertidor_unitario.toFixed(5));
	$("#precio_inicial").val(convertidor_unitario.toFixed(5));
	$("#precio_ganancia").val(convertidor_unitario.toFixed(5));
}
function validar_detalle_cotizacion() {

	debugger;
	var cantidad = $("#cantidad").val();
	var tipo_moneda_cambio = $('#tipo_moneda_cambio option:selected').text();

	if (tipo_moneda_cambio == "Seleccionar") {
		alert("Selecione su tipo de cambio")
		resultado_campo = false;
	}
	else if (cantidad == "") {
		alert("Ingrese una Cantidad")
		resultado_campo = false;
	}
	else {
		resultado_campo = true;
		if (tipo_moneda_cambio != "") {
			$("#tipo_moneda_cambio").attr("disabled", true);
		} else {
			$("#tipo_moneda_cambio").attr("disabled", false);
		}
	}
};
function limpiar_campos() {

	var count = $('#id_table_detalle_cotizacion tr').length;


	$("#hidden_id_producto").val("");
	$("#hidden_id_tablero").val("");
	$("#hidden_id_comodin").val("");
	$("#hidden_codigo_producto").val("");
	$("#descripcion_producto").val("");
	$("#hidden_id_unidad_medida").val("");
	$("#hidden_ds_unidad_medida").val("");
	$("#hidden_id_marca_producto").val("");
	$("#hidden_ds_marca_producto").val("");
	$("#precio_unitario").val("");
	$("#tipo_moneda_origen").val("");
	$("#simbolo_moneda").val("");

	if (count == 1) {
		$("#tipo_moneda_cambio").attr("disabled", false);
	}
}
/* Fin Funciones */




/* Otros */
$(".select2").select2({
	theme: "bootstrap4"
});
/* Fin de Otros */