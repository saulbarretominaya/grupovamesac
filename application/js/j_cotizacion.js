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

$(document).on("click", ".js_lupa_cotizacion_productos", function () {
	valor_id = $(this).val();
	$.ajax({
		url: base_url + "C_cotizacion/index_modal_productos",
		type: "POST",
		dataType: "html",
		data: {
			id_cotizacion: valor_id
		},
		success: function (data) {
			$("#id_target_cotizacion_productos .modal-content").html(data);
		}
	});
});
$(document).on("click", ".js_lupa_cotizacion_tableros", function () {
	valor_id = $(this).val();
	$.ajax({
		url: base_url + "C_cotizacion/index_modal_tableros",
		type: "POST",
		dataType: "html",
		data: {
			id_cotizacion: valor_id
		},
		success: function (data) {
			$("#id_target_cotizacion_tableros .modal-content").html(data);
		}
	});
});
$(document).on("click", ".js_lupa_orden_despacho_productos", function () {
	debugger;
	valor_id = $(this).val();
	$.ajax({
		url: base_url + "C_orden_despacho/index_modal_productos",
		type: "POST",
		dataType: "html",
		data: {
			id_orden_despacho: valor_id
		},
		success: function (data) {
			$("#id_target_orden_despacho_productos .modal-content").html(data);
		}
	});
});
$(document).on("click", ".js_lupa_orden_despacho_tableros", function () {
	valor_id = $(this).val();
	$.ajax({
		url: base_url + "C_orden_despacho/index_modal_tableros",
		type: "POST",
		dataType: "html",
		data: {
			id_orden_despacho: valor_id
		},
		success: function (data) {
			$("#id_target_orden_despacho_tableros .modal-content").html(data);
		}
	});
});
$("#registrar").on("click", function () {

	validar_registrar();
	if (resultado_campo == true) {

		//Cabecera
		var serie_cotizacion = $("#serie_cotizacion").val();
		var categoria = $("#hidden_categoria").val();
		var id_trabajador = $("#id_trabajador").val();
		var ds_nombre_trabajador = $("#ds_nombre_trabajador").val();
		var fecha_cotizacion = $("#fecha_cotizacion").val();
		var validez_oferta_cotizacion = $("#validez_oferta_cotizacion").val();
		var fecha_vencimiento_validez_oferta = $("#fecha_vencimiento_validez_oferta").val();
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
		var numero_dias_condicion_pago = $("#dias").val();
		var fecha_condicion_pago = $("#fecha_condicion_pago").val();
		var valor_venta_total_sin_d = $("#valor_venta_total_sin_d").val();
		var valor_venta_total_con_d = $("#valor_venta_total_con_d").val();
		var descuento_total = $("#descuento_total").val();
		var igv = $("#igv").val();
		var precio_venta = $("#precio_venta").val();
		var valor_cambio = $("#valor_cambio").val();
		var id_moneda = $("#tipo_moneda_cambio").val();
		//Empresa
		var id_cotizacion_empresa = $("#id_cotizacion_empresa").val();
		var id_empresa = $("#id_empresa").val();


		//Detalle cotizacion
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

		var precio_descuento = Array.prototype.slice.call(document.getElementsByName("precio_descuento[]")).map((o) => o.value);
		var d = Array.prototype.slice.call(document.getElementsByName("d[]")).map((o) => o.value);
		var d_unidad = Array.prototype.slice.call(document.getElementsByName("d_unidad[]")).map((o) => o.value);
		var d_cant_total = Array.prototype.slice.call(document.getElementsByName("d_cant_total[]")).map((o) => o.value);

		var valor_venta_sin_d = Array.prototype.slice.call(document.getElementsByName("valor_venta_sin_d[]")).map((o) => o.value);
		var valor_venta_con_d = Array.prototype.slice.call(document.getElementsByName("valor_venta_con_d[]")).map((o) => o.value);

		var dias_entrega = Array.prototype.slice.call(document.getElementsByName("dias_entrega[]")).map((o) => o.value);
		var item = Array.prototype.slice.call(document.getElementsByName("item[]")).map((o) => o.value);
		//Detalle condicion_pago
		var fecha_cuota = Array.prototype.slice.call(document.getElementsByName("fecha_cuota[]")).map((o) => o.value);
		var monto_cuota = Array.prototype.slice.call(document.getElementsByName("monto_cuota[]")).map((o) => o.value);


		$.ajax({
			async: false,
			url: base_url + "C_cotizacion/registrar",
			type: "POST",
			dataType: "json",
			data: {
				//Cabecera
				serie_cotizacion: serie_cotizacion,
				categoria: categoria,
				id_trabajador: id_trabajador,
				ds_nombre_trabajador: ds_nombre_trabajador,
				fecha_cotizacion: fecha_cotizacion,
				validez_oferta_cotizacion: validez_oferta_cotizacion,
				fecha_vencimiento_validez_oferta: fecha_vencimiento_validez_oferta,
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
				valor_venta_total_sin_d: valor_venta_total_sin_d,
				valor_venta_total_con_d: valor_venta_total_con_d,
				descuento_total: descuento_total,
				igv: igv,
				precio_venta: precio_venta,
				valor_cambio: valor_cambio,
				id_moneda: id_moneda,
				//Empresa
				id_cotizacion_empresa: id_cotizacion_empresa,
				id_empresa: id_empresa,

				//Detalle cotizacion
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

				valor_venta_sin_d: valor_venta_sin_d,
				valor_venta_con_d: valor_venta_con_d,

				dias_entrega: dias_entrega,
				item: item,
				//Detalle condicion pago
				fecha_cuota: fecha_cuota,
				monto_cuota: monto_cuota
			},
			success: function (data) {
				debugger;
				window.location.href = base_url + "C_cotizacion";
			},
		});
	};
});
$(document).on("click", ".btn_aprobar_estado", function () {

	var id_cotizacion = $(this).closest('tr').find('#id_cotizacion').val();
	var estado_cotizacion = $(this).parents("tr").find("td")[7].innerText;
	var id_orden_despacho = $(this).parents("tr").find("td")[9].innerText;
	var estado_orden_despacho = $(this).parents("tr").find("td")[10].innerText;
	var id_orden_despacho_empresa = $(this).closest('tr').find('#id_orden_despacho_empresa').val();
	var id_empresa = $(this).closest('tr').find('#id_empresa').val();

	debugger;

	if (estado_cotizacion == "APROBADO" && estado_orden_despacho == "PENDIENTE") {

		alert("Ya fue aprobado por el vendedor, pendiente por OD");

	} else if (estado_cotizacion == "APROBADO" && estado_orden_despacho == "APROBADO") {

		alert("Ya fue aprobado por OD, llamar al area de TI para cualquier cambio, que tenga buen dia :D");

	} else if (id_orden_despacho == "") {
		$.ajax({
			async: false,
			url: base_url + "C_cotizacion/validar_existencia_comodin_registrar",
			type: "POST",
			dataType: "json",
			data: {
				id_cotizacion: id_cotizacion,
			},
			success: function (data) {
				debugger;
				cantidad_num_comodin = data["cantidad_num_comodin"]
				item = data["item"]
				if (Number(cantidad_num_comodin) == 0) {
					alertify.confirm("Esta seguro que desea aprobarlo",
						function () {
							$.ajax({
								async: false,
								url: base_url + "C_cotizacion/aprobar_estado",
								type: "POST",
								dataType: "json",
								data: {
									id_cotizacion: id_cotizacion,
									id_orden_despacho_empresa: id_orden_despacho_empresa,
									id_empresa: id_empresa

								},
								success: function (data) {
									window.location.href = base_url + "C_cotizacion";
								},
							});
						});
				} else if (Number(cantidad_num_comodin) >= 1) {
					alert("No puede ser aprobada esta cotizacion porque existe un Comodin.   Fila: #" + item);
				}
			},
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
	var estado_orden_despacho = $(this).parents("tr").find("td")[10].innerText;

	if (estado_orden_despacho == "APROBADO") {
		alert("Ya fue Aprobado por la OD, no puede Actualizar")
	}
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
	$("#hidden_id_general").val(split_productos[1]);
	$("#hidden_codigo_producto").val(split_productos[2]);
	$("#descripcion_producto").val(split_productos[3]);
	$("#hidden_id_unidad_medida").val(split_productos[4]);
	$("#hidden_ds_unidad_medida").val(split_productos[5]);
	$("#hidden_id_marca_producto").val(split_productos[6]);
	$("#hidden_ds_marca_producto").val(split_productos[7]);
	$("#hidden_id_moneda").val(split_productos[8]);
	$("#tipo_moneda_origen").val(split_productos[9]);
	var simbolo_moneda = split_productos[9];
	if (simbolo_moneda == "SOLES") {
		$("#simbolo_moneda").val("S/");
	} else if (simbolo_moneda == "DOLARES") {
		$("#simbolo_moneda").val("$");
	}
	$("#precio_unitario").val(split_productos[10]);
	$("#opcion_target_producto").modal("hide");
	aplicar_tipo_cambio();
});
$(document).on("click", ".js_seleccionar_modal_tablero", function () {
	limpiar_campos();
	tableros = $(this).val();
	split_tableros = tableros.split("*");
	$("#hidden_id_tablero").val(split_tableros[0]);
	$("#hidden_id_general").val(split_tableros[1]);
	$("#hidden_codigo_producto").val(split_tableros[2]);
	$("#descripcion_producto").val(split_tableros[3]);
	debugger;
	$("#cantidad").val(split_tableros[4]);
	$("#cantidad").attr("readonly", true);
	$("#hidden_id_marca_producto").val(split_tableros[5]);
	$("#hidden_ds_marca_producto").val(split_tableros[6]);
	$("#hidden_id_moneda").val(split_tableros[7]);
	$("#tipo_moneda_origen").val(split_tableros[8]);
	var simbolo_moneda = split_tableros[8];
	if (simbolo_moneda == "SOLES") {
		$("#simbolo_moneda").val("S/");
	} else if (simbolo_moneda == "DOLARES") {
		$("#simbolo_moneda").val("$");
	}
	$("#precio_unitario").val(split_tableros[9]);
	$("#opcion_target_tablero").modal("hide");
	aplicar_tipo_cambio();
});
$(document).on("click", ".js_seleccionar_modal_comodin", function () {
	limpiar_campos();
	comodin = $(this).val();
	split_comodin = comodin.split("*");
	$("#hidden_id_comodin").val(split_comodin[0]);
	$("#hidden_id_general").val(split_comodin[1]);
	$("#hidden_codigo_producto").val(split_comodin[2]);
	$("#descripcion_producto").val(split_comodin[3]);
	$("#hidden_id_unidad_medida").val(split_comodin[4]);
	$("#hidden_ds_unidad_medida").val(split_comodin[5]);
	$("#hidden_id_marca_producto").val(split_comodin[6]);
	$("#hidden_ds_marca_producto").val(split_comodin[7]);
	$("#hidden_id_moneda").val(split_comodin[8]);
	$("#tipo_moneda_origen").val(split_comodin[9]);
	var simbolo_moneda = split_comodin[9];
	if (simbolo_moneda == "SOLES") {
		$("#simbolo_moneda").val("S/");
	} else if (simbolo_moneda == "DOLARES") {
		$("#simbolo_moneda").val("$");
	}
	$("#precio_unitario").val(split_comodin[10]);
	$("#opcion_target_tablero").modal("hide");
	aplicar_tipo_cambio();
});
$(document).on("click", ".js_seleccionar_modal_detalle_tablero", function () {
	valor_id = $(this).val();
	$.ajax({
		url: base_url + "C_tableros/index_modal",
		type: "POST",
		dataType: "html",
		data: {
			id_tablero: valor_id
		},
		success: function (data) {
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
	$("#id_datatable_tableros thead #dtable_cantidad_tablero").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:100px;" placeholder="' + title + '" /> ');
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
$("#validez_oferta_cotizacion").on("keyup", function () {
	calcular_fecha_validez_oferta_cotizacion();
});
$("#dias").on("keyup", function () {
	calcular_fecha_condicion_pago();
});
$("#id_agregar_cotizacion").on("click", function (e) {

	debugger;
	validar_detalle_cotizacion();

	var resume_table = document.getElementById("id_table_detalle_cotizacion");
	for (var i = 0, row; row = resume_table.rows[i]; i++) {
		console.log(`Fila': ${i}`);
		$("#hidden_item").val(i + 1);
	}
	var item = $("#hidden_item").val();

	var id_general = $("#hidden_id_general").val();

	var id_producto = $("#hidden_id_producto").val();
	var id_tablero = $("#hidden_id_tablero").val();
	var id_comodin = $("#hidden_id_comodin").val();

	if (id_producto != "") {
		$("#hidden_categoria").val("PRODUCTOS"); //COMODIN O PRODUCTO
	} else if (id_comodin != "") {
		$("#hidden_categoria").val("PRODUCTOS"); //COMODIN O PRODUCTO
	} else {
		$("#hidden_categoria").val("TABLEROS"); // 
	}

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
	var valor_venta_sin_d = $("#valor_venta_sin_d").val();
	var valor_venta_con_d = $("#valor_venta_con_d").val();


	if (resultado_campo == true) {
		html = "<tr>";
		html += "<td width='70px'><input type='text'   name='item[]'		value='" + item + "'       id='item' class='form-control' readonly=''></td>";
		html += "    <input type='hidden' name='id_general[]' 				value='" + id_general + "' id='id_general' >";
		html += "    <input type='hidden' name='id_producto[]' 				value='" + id_producto + "' id='id_producto' >";
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
		html += "<td><input type='hidden' name='d_unidad[]' 				value='" + d_unidad + "'>" + d_unidad + "</td>";
		html += "<td><input type='hidden' name='d_cant_total[]' 			value='" + d_cant_total + "'>" + d_cant_total + "</td>";
		html += "<td><input type='hidden' name='valor_venta_sin_d[]' 		value='" + valor_venta_sin_d + "'>" + valor_venta_sin_d + "</td>";
		html += "<td><input type='hidden' name='valor_venta_con_d[]' 		value='" + valor_venta_con_d + "'>" + valor_venta_con_d + "</td>";
		html += "<td style='width:10%'><input type='number' name='dias_entrega[]' class='form-control'></td>";
		html += "<td><button type='button' class='btn btn-outline-danger btn-sm eliminar_fila_cotizacion'><span class='fas fa-trash-alt'></span></button></td>";
		html += "</tr>";
		$("#id_table_detalle_cotizacion tbody").append(html);
		valor_venta_total_sin_d();
		valor_venta_total_con_d();
		descuento_total();
		igv();
		precio_venta();
		limpiar_campos();

	}
});
$("#id_agregar_condicion_pago").on("click", function (e) {

	validar_detalle_condicion_pago();

	var fecha_cuota = $("#fecha_cuota").val();
	var fecha_split = fecha_cuota.split("-");
	var fecha_cuota = fecha_split[2] + '/' + fecha_split[1] + '/' + fecha_split[0];

	var monto_cuota = $("#monto_cuota").val();

	if (resultado_campo == true) {
		html = "<tr>";
		html += "<td><input type='hidden' name='fecha_cuota[]' value='" + fecha_cuota + "'>" + fecha_cuota + "</td>";
		html += "<td><input type='hidden' name='monto_cuota[]' value='" + monto_cuota + "'>" + monto_cuota + "</td>";
		html += "<td><button type='button' class='btn btn-outline-danger btn-sm eliminar_fila_condicion_pago'><span class='fas fa-trash-alt'></span></button></td>";
		html += "</tr>";
		$("#id_table_detalle_condicion_pago tbody").append(html);
		limpiar_campos_condicion_pago();

	}
});
$("#tipo_moneda_cambio").on("change", function () {

	var descripcion_producto = $("#descripcion_producto").val();
	var precio_unitario = $("#precio_unitario").val();
	var simbolo_moneda = $("#precio_unitario").val();
	var tipo_moneda_cambio = $('#tipo_moneda_cambio option:selected').text();
	var id_tablero = $("#hidden_id_tablero").val();

	debugger;

	if (descripcion_producto == "") {
		alert("Seleccione un producto, tablero o comodin");
		$("#tipo_moneda_cambio").val(0);
		$("#cantidad").val("");
		$("#g").val("");
	}
	else if (precio_unitario == "") {
		alert("Ingrese el precio unitario");
		$("#tipo_moneda_cambio").val(0);
		$("#cantidad").val("");
		$("#g").val("");
	}
	else if (simbolo_moneda == "") {
		alert("Ese producto no tiene asignado si es soles o dolar");
		$("#tipo_moneda_cambio").val(0);
		$("#cantidad").val("");
		$("#g").val("");
	}
	else if (tipo_moneda_cambio == "Seleccionar") {
		if (id_tablero == "") {
			$("#convertidor_unitario").val("");
			$("#cantidad").val("");
			$("#valor_venta_sin_d").val("");
			$("#valor_venta_con_d").val("");
			$("#precio_inicial").val("");
			$("#precio_ganancia").val("");
			$("#g").val("");
			$("#g_unidad").val("");
			$("#g_cant_total").val("");
			$("#precio_ganancia_visor").val("");
			$("#precio_descuento").val("");
			$("#d").val("");
			$("#d_unidad").val("");
			$("#d_cant_total").val("");
		} else {
			$("#convertidor_unitario").val("");
			// $("#cantidad").val("");
			$("#valor_venta_sin_d").val("");
			$("#valor_venta_con_d").val("");
			$("#precio_inicial").val("");
			$("#precio_ganancia").val("");
			$("#g").val("");
			$("#g_unidad").val("");
			$("#g_cant_total").val("");
			$("#precio_ganancia_visor").val("");
			$("#precio_descuento").val("");
			$("#d").val("");
			$("#d_unidad").val("");
			$("#d_cant_total").val("");
		}
	} else {
		aplicar_tipo_cambio();
	}
});
$("#cantidad").on("keyup", function () {

	var descripcion_producto = $("#descripcion_producto").val();
	var precio_unitario = $("#precio_unitario").val();
	var simbolo_moneda = $("#precio_unitario").val();
	var tipo_moneda_cambio = $('#tipo_moneda_cambio option:selected').text();
	var cantidad = $("#cantidad").val();

	if (descripcion_producto == "") {
		alert("Seleccione un producto, tablero o comodin");
		$("#cantidad").val("");
	}
	else if (precio_unitario == "") {
		alert("Ingrese el precio unitario");
		$("#cantidad").val("");
	}
	else if (simbolo_moneda == "") {
		alert("Ese producto no tiene asignado si es soles o dolar");
		$("#cantidad").val("");
	}
	else if (tipo_moneda_cambio == "Seleccionar") {
		alert("Selecione su tipo de cambio");
		$("#cantidad").val("");
	}
	else if (cantidad == "" || isNaN(cantidad)) {
		$("#cantidad").val("");
		$("#valor_venta_sin_d").val("");
		$("#valor_venta_con_d").val("");
		$("#precio_inicial").val("");
		$("#precio_ganancia").val("");
		$("#g").val("");
		$("#g_unidad").val("");
		$("#g_cant_total").val("");
		$("#precio_ganancia_visor").val("");
		$("#precio_descuento").val("");
		$("#d").val("");
		$("#d_unidad").val("");
		$("#d_cant_total").val("");
	}
	else {
		calcular_valor_venta();
		$("#g").val("");
		$("#g_unidad").val("");
		$("#g_cant_total").val("");
		$("#precio_ganancia_visor").val("");
		$("#precio_descuento").val("");
		$("#d").val("");
		$("#d_unidad").val("");
		$("#d_cant_total").val("");
	}
});
$("#g").on("keyup", function () {

	var descripcion_producto = $("#descripcion_producto").val();
	var precio_unitario = $("#precio_unitario").val();
	var simbolo_moneda = $("#precio_unitario").val();
	var tipo_moneda_cambio = $('#tipo_moneda_cambio option:selected').text();
	var cantidad = $("#cantidad").val();
	var g = $("#g").val();

	if (descripcion_producto == "") {
		alert("Seleccione un producto, tablero o comodin");
		$("#g").val("");
	}
	else if (precio_unitario == "") {
		alert("Ingrese el precio unitario");
		$("#g").val("");
	}
	else if (simbolo_moneda == "") {
		alert("Ese producto no tiene asignado si es soles o dolar");
		$("#g").val("");
	}
	else if (tipo_moneda_cambio == "Seleccionar") {
		alert("Selecione su tipo de cambio");
		$("#g").val("");
	}
	else if (cantidad == "") {
		alert("Debe ingresar una cantidad antes de Aplicar Ganancia");
		$("#g").val("");
	}
	else if (g == "" || isNaN(g)) {
		$("#g").val("");
		$("#g_unidad").val("");
		$("#g_cant_total").val("");
		$("#precio_ganancia_visor").val("");
		$("#precio_descuento").val("");
		$("#d").val("");
		$("#d_unidad").val("");
		$("#d_cant_total").val("");
		calcular_valor_venta();
	}
	else {
		calcular_precio_ganancia();
		$("#d").val("");
		$("#precio_descuento").val("");
		$("#d_unidad").val("");
		$("#d_cant_total").val("");
	}

});
$("#d").on("keyup", function () {

	var descripcion_producto = $("#descripcion_producto").val();
	var precio_unitario = $("#precio_unitario").val();
	var simbolo_moneda = $("#precio_unitario").val();
	var tipo_moneda_cambio = $('#tipo_moneda_cambio option:selected').text();
	var cantidad = $("#cantidad").val();
	var d = $("#d").val();

	if (descripcion_producto == "") {
		alert("Seleccione un producto, tablero o comodin");
		$("#d").val("");
	}
	else if (precio_unitario == "") {
		alert("Ingrese el precio unitario");
		$("#d").val("");
	}
	else if (simbolo_moneda == "") {
		alert("Ese producto no tiene asignado si es soles o dolar");
		$("#d").val("");
	}
	else if (tipo_moneda_cambio == "Seleccionar") {
		alert("Selecione su tipo de cambio");
		$("#d").val("");
	}

	else if (cantidad == "") {
		alert("Debe ingresar una cantidad antes de Aplicar Descuento");
		$("#d").val("");
	}
	else if (d == "" || isNaN(d)) {
		$("#d").val("");
		$("#precio_descuento").val("");
		$("#d_unidad").val("");
		$("#d_cant_total").val("");
		calcular_precio_ganancia();
	}
	else {
		calcular_precio_descuento();
	}
});
$(document).on("click", ".eliminar_fila_cotizacion", function () {

	var id_detalle = $(this).closest("tr").find("#value_id_solicitud").val();
	html = "<input type='hidden' id='id_solicitud_to_remove' name ='id_solicitud_to_remove[]' value='" + id_detalle + "'>";
	$("#container_solicitud_id_remove").append(html);
	$(this).closest("tr").remove();
	generar_item();
	valor_venta_total_sin_d();
	valor_venta_total_con_d();
	igv();
	precio_venta();
	limpiar_campos();
});
$(document).on("click", ".eliminar_fila_condicion_pago", function () {

	var id_detalle = $(this).closest("tr").find("#value_id_solicitud").val();
	html =
		"<input type='hidden' id='id_solicitud_to_remove' name ='id_solicitud_to_remove[]' value='" +
		id_detalle +
		"'>";

	$("#container_solicitud_id_remove").append(html);
	$(this).closest("tr").remove();
	calcular_sumatoria_cuotas_eliminar_detalle();

});
/* Fin Evento */

/* Replace */
$("#monto_cuota").on({

	"focus": function (event) {
		$(event.target).select();
	},
	"keyup": function (event) {
		$(event.target).val(function (index, value) {
			return value.replace(/[^0-9,.]/g, '').replace(/,/g, '.');
			// .replace(/([0-9])([0-9]{2})$/, '$1.$2')
			// .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
		});
	}
});
/* Fin Replace */


/* Funciones */
function valor_venta_total_sin_d() {
	var acumulador = 0;
	$("#id_table_detalle_cotizacion tbody tr").each(function () {
		var posicion_valor_venta = $(this).find("td:eq(11)").text();
		valor_venta = Number(posicion_valor_venta);
		acumulador = (acumulador + valor_venta)
		$("#valor_venta_total_sin_d").val(acumulador.toFixed(2));
	});
}
function valor_venta_total_con_d() {
	var acumulador = 0;
	$("#id_table_detalle_cotizacion tbody tr").each(function () {
		var posicion_valor_venta = $(this).find("td:eq(12)").text();
		valor_venta = Number(posicion_valor_venta);
		acumulador = (acumulador + valor_venta)
		$("#valor_venta_total_con_d").val(acumulador.toFixed(2));
	});
}
function descuento_total() {
	var acumulador = 0;
	$("#id_table_detalle_cotizacion tbody tr").each(function () {
		var posicion_total_descuento = $(this).find("td:eq(10)").text();
		// valor = Number(valorcito.replace(/,/g, ''));
		total_descuento = Number(posicion_total_descuento);
		acumulador = (acumulador + total_descuento)

		$("#descuento_total").val(acumulador.toFixed(2));

	});

}
function igv() {
	debugger;
	var valor_venta_total_sin_d = Number($("#valor_venta_total_sin_d").val());
	var valor_venta_total_con_d = Number($("#valor_venta_total_con_d").val());

	if (valor_venta_total_con_d == 0) {
		var valor_venta_total_sin_d = (valor_venta_total_sin_d * 0.18);
		$("#igv").val(valor_venta_total_sin_d.toFixed(2));
	} else {
		var valor_venta_total_con_d = (valor_venta_total_con_d * 0.18);
		$("#igv").val(valor_venta_total_con_d.toFixed(2));
	}
}
function precio_venta() {
	var valor_venta_total_con_d = Number($("#valor_venta_total_con_d").val());
	var igv = Number($("#igv").val());
	var precio_venta = valor_venta_total_con_d + igv;
	$("#precio_venta").val(precio_venta.toFixed(2));
}
function calcular_fecha_validez_oferta_cotizacion() {
	//let num = parseInt(frm.fechsa.value);
	var num = parseInt(document.getElementById("validez_oferta_cotizacion").value);

	// la fecha viene en formato yyyy-mm-dd
	var f = document.getElementById("fecha_cotizacion").value;

	var fecha = new Date(f);
	fecha.setDate(fecha.getDate() + num);

	var mes = fecha.getUTCMonth() + 1;
	if (mes <= 9) mes = '0' + mes;

	var dia = fecha.getUTCDate();
	if (dia <= 9) dia = '0' + dia;

	if (isNaN(num)) {
		$("#fecha_vencimiento_validez_oferta").val("");
	} else {
		document.getElementById("fecha_vencimiento_validez_oferta").value = (dia + '/' + mes + '/' + fecha.getUTCFullYear());
	}
}
function calcular_fecha_condicion_pago() {
	//let num = parseInt(frm.fechsa.value);
	var num = parseInt(document.getElementById("dias").value);

	// la fecha viene en formato yyyy-mm-dd
	var f = document.getElementById("fecha_cotizacion").value;

	var fecha = new Date(f);
	fecha.setDate(fecha.getDate() + num);

	var mes = fecha.getUTCMonth() + 1;
	if (mes <= 9) mes = '0' + mes;

	var dia = fecha.getUTCDate();
	if (dia <= 9) dia = '0' + dia;

	if (isNaN(num)) {
		$("#fecha_condicion_pago").val("");
	} else {
		document.getElementById("fecha_condicion_pago").value = (dia + '/' + mes + '/' + fecha.getUTCFullYear());
	}
}
function aplicar_tipo_cambio() {

	var precio_unitario = $("#precio_unitario").val();
	var valor_cambio = $("#valor_cambio").val();
	var tipo_moneda_origen = $("#tipo_moneda_origen").val();
	var tipo_moneda_cambio = $('#tipo_moneda_cambio option:selected').text();
	var convertidor_unitario = 0;
	var id_tablero = $("#hidden_id_tablero").val();

	//Si ambas monedas son iguales
	debugger;
	if (tipo_moneda_origen == tipo_moneda_cambio) {
		convertidor_unitario = Number(precio_unitario);
		$("#convertidor_unitario").val(convertidor_unitario.toFixed(5));
		if (id_tablero == "") {
		} else {
			calcular_valor_venta();
		}
	}

	else if (tipo_moneda_cambio == "Seleccionar") {
		if (id_tablero == "") {
			$("#tipo_moneda_cambio").val(0);
			$("#cantidad").val("");
			$("#convertidor_unitario").val("");
			$("#valor_venta_sin_d").val("");
			$("#valor_venta_con_d").val("");
			$("#precio_inicial").val("");
			$("#precio_ganancia").val("");
		} else {
			$("#tipo_moneda_cambio").val(0);
			// $("#cantidad").val("");
			$("#convertidor_unitario").val("");
			$("#valor_venta_sin_d").val("");
			$("#valor_venta_con_d").val("");
			$("#precio_inicial").val("");
			$("#precio_ganancia").val("");
		}
	}
	else if (tipo_moneda_origen == "SOLES") {
		if (id_tablero == "") {
			convertidor_unitario = precio_unitario / valor_cambio;
			$("#convertidor_unitario").val(convertidor_unitario.toFixed(5));
			$("#cantidad").val("");
			$("#valor_venta_sin_d").val("");
			$("#valor_venta_con_d").val("");
			$("#precio_inicial").val("");
			$("#precio_ganancia").val("");
			$("#g").val("");
			$("#g_unidad").val("");
			$("#g_cant_total").val("");
			$("#precio_ganancia_visor").val("");
			$("#precio_descuento").val("");
			$("#d").val("");
			$("#d_unidad").val("");
			$("#d_cant_total").val("");
		} else {
			convertidor_unitario = precio_unitario / valor_cambio;
			$("#convertidor_unitario").val(convertidor_unitario.toFixed(5));
			calcular_valor_venta();
			$("#g").val("");
			$("#g_unidad").val("");
			$("#g_cant_total").val("");
			$("#precio_ganancia_visor").val("");
			$("#precio_descuento").val("");
			$("#d").val("");
			$("#d_unidad").val("");
			$("#d_cant_total").val("");
		}
	}
	else if (tipo_moneda_origen == "DOLARES") {
		if (id_tablero == "") {
			convertidor_unitario = precio_unitario * valor_cambio;
			$("#convertidor_unitario").val(convertidor_unitario.toFixed(5));
			$("#cantidad").val("");
			$("#valor_venta_sin_d").val("");
			$("#valor_venta_con_d").val("");
			$("#precio_inicial").val("");
			$("#precio_ganancia").val("");
			$("#g").val("");
			$("#g_unidad").val("");
			$("#g_cant_total").val("");
			$("#precio_ganancia_visor").val("");
			$("#precio_descuento").val("");
			$("#d").val("");
			$("#d_unidad").val("");
			$("#d_cant_total").val("");
		} else {
			convertidor_unitario = precio_unitario * valor_cambio;
			$("#convertidor_unitario").val(convertidor_unitario.toFixed(5));
			calcular_valor_venta();
			$("#g").val("");
			$("#g_unidad").val("");
			$("#g_cant_total").val("");
			$("#precio_ganancia_visor").val("");
			$("#precio_descuento").val("");
			$("#d").val("");
			$("#d_unidad").val("");
			$("#d_cant_total").val("");
		}
	}

}
function calcular_valor_venta() {

	var cantidad = Number($("#cantidad").val());
	var convertidor_unitario = Number($("#convertidor_unitario").val());

	valor_venta_sin_d = cantidad * convertidor_unitario
	$("#valor_venta_sin_d").val(valor_venta_sin_d.toFixed(5));
	$("#valor_venta_con_d").val(valor_venta_sin_d.toFixed(5));
	$("#precio_inicial").val(convertidor_unitario.toFixed(5));
	$("#precio_ganancia").val(convertidor_unitario.toFixed(5));

}
function calcular_precio_ganancia() {

	var precio_inicial = Number($("#precio_inicial").val());
	var cantidad = Number($("#cantidad").val());
	var g = Number($("#g").val());
	var g_unidad = (precio_inicial * g / 100);
	var g_cant_total = g_unidad * cantidad;
	var precio_ganancia = Number(g_unidad) + Number(precio_inicial);
	var valor_venta_sin_d = precio_ganancia * cantidad;

	$("#g_unidad").val(g_unidad.toFixed(5));
	$("#g_cant_total").val(g_cant_total.toFixed(5));
	$("#precio_ganancia").val(precio_ganancia.toFixed(5));
	$("#precio_ganancia_visor").val(precio_ganancia.toFixed(5));
	$("#valor_venta_sin_d").val(valor_venta_sin_d.toFixed(5));
	$("#valor_venta_con_d").val(valor_venta_sin_d.toFixed(5));

}
function calcular_precio_descuento() {

	var precio_inicial = Number($("#precio_inicial").val());
	var cantidad = Number($("#cantidad").val());
	var precio_ganancia = Number($("#precio_ganancia").val());
	var d = Number($("#d").val());
	var d_unidad = (precio_ganancia * d / 100);
	var d_cant_total = Number(d_unidad) * cantidad;
	var precio_descuento = precio_ganancia - d_unidad;
	var valor_venta_con_d = precio_descuento * cantidad;

	debugger;
	if (precio_descuento < precio_inicial) {
		alert("El precio del descuento es: " + precio_descuento.toFixed(5) + ", y no puede ser menor que el precio Inicial: " + precio_inicial.toFixed(5));
		$("#d").val("");
		$("#precio_descuento").val("");
		$("#d_unidad").val("");
		$("#d_cant_total").val("");
		$("#valor_venta_con_d").val(precio_ganancia.toFixed(5));
	} else {
		$("#d_unidad").val(d_unidad.toFixed(5));
		$("#d_cant_total").val(d_cant_total.toFixed(5));
		$("#precio_descuento").val(precio_descuento.toFixed(5));
		$("#valor_venta_con_d").val(valor_venta_con_d.toFixed(5));
	}



}
function validar_detalle_cotizacion() {


	$("#id_table_detalle_cotizacion tbody tr").each(function () {

		id_general_table = $(this).find("#id_general").val();
		var id_general = $("#hidden_id_general").val();

		if (id_general_table == id_general) {
			codigo_producto_duplicado = false;
			return false;
		}

	});


	var descripcion_producto = $("#descripcion_producto").val();
	var precio_unitario = $("#precio_unitario").val();
	var tipo_moneda_cambio = $('#tipo_moneda_cambio option:selected').text();
	var cantidad = $("#cantidad").val();
	var id_producto = $("#hidden_id_producto").val();
	var id_tablero = $("#hidden_id_tablero").val();
	var id_comodin = $("#hidden_id_comodin").val();


	if (descripcion_producto == "") {
		alert("Seleccione un producto, tablero o comodin")
		resultado_campo = false;
	}
	else if (precio_unitario == "") {
		alert("Ingrese el precio unitario")
		resultado_campo = false;
	}
	else if (tipo_moneda_cambio == "Seleccionar") {
		alert("Selecione su tipo de cambio")
		resultado_campo = false;
	}
	else if (cantidad == "") {
		alert("Ingrese una Cantidad")
		resultado_campo = false;
	}

	else if (codigo_producto_duplicado == false) {
		alert("El producto: " + descripcion_producto + ", ya existe en la tabla detalle");
		resultado_campo = false;
		codigo_producto_duplicado = true;
	}
	else {
		resultado_campo = true;
		if (tipo_moneda_cambio != "") {
			$("#tipo_moneda_cambio").attr("disabled", true);
		} else {
			$("#tipo_moneda_cambio").attr("disabled", false);
		}

		if (id_producto != "") {
			$("#btn_id_tablero").attr("disabled", true);
		}

		if (id_tablero != "") {
			$("#btn_id_producto").attr("disabled", true);
			$("#btn_id_comodin").attr("disabled", true);
		}

		if (id_comodin != "") {
			$("#btn_id_tablero").attr("disabled", true);
		}

	}
};
function validar_detalle_condicion_pago() {
	var monto_cuota = Number($("#monto_cuota").val());
	var fecha_cuota = $("#fecha_cuota").val();


	if (isNaN(monto_cuota)) {
		alert("A ingresado un monto incorrecto");
		resultado_campo = false;
	}
	else if (fecha_cuota == "") {
		alert("Ingrese Fecha de Cuota");
		resultado_campo = false;
	}
	else if (monto_cuota == 0) {
		alert("Ingrese Monto de Cuota");
		resultado_campo = false;
	}
	else if (fecha_cuota == "") {
		alert("Seleccione una fecha en la condicion de pago");
		resultado_campo = false;
	}
	else {
		calcular_sumatoria_cuotas();
	}
}
function calcular_sumatoria_cuotas() {
	var acumulador = 0;
	var precio_venta = Number($("#precio_venta").val());
	var nuevo_monto_ingresante = Number($("#monto_cuota").val());

	$("#id_table_detalle_condicion_pago tbody tr").each(function () {
		var posicion_valor_tabla = Number($(this).find("td:eq(1)").text());
		acumulador = (acumulador + posicion_valor_tabla)
	});

	monto_total_sumatorio_cuotas = acumulador + nuevo_monto_ingresante;

	if (monto_total_sumatorio_cuotas > precio_venta) {
		alert("A superado la suma de cuotas");
		resultado_campo = false;
	} else {
		$("#precio_final_final").text(monto_total_sumatorio_cuotas);
		resultado_campo = true;
	}

}
function calcular_sumatoria_cuotas_eliminar_detalle() {
	var acumulador = 0;

	$("#id_table_detalle_condicion_pago tbody tr").each(function () {

		var posicion_valor_tabla = Number($(this).find("td:eq(1)").text());
		acumulador = (acumulador + posicion_valor_tabla)
	});


	$("#precio_final_final").text(acumulador);

}
function limpiar_campos() {

	var count = $('#id_table_detalle_cotizacion tr').length;


	$("#hidden_id_general").val("");
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
	$("#convertidor_unitario").val("");
	$("#cantidad").val("");
	$("#valor_venta_sin_d").val("");
	$("#valor_venta_con_d").val("");
	$("#precio_inicial").val("");
	$("#precio_ganancia").val("");
	$("#g").val("");
	$("#g_unidad").val("");
	$("#g_cant_total").val("");
	$("#precio_ganancia_visor").val("");
	$("#precio_descuento").val("");
	$("#d").val("");
	$("#d_unidad").val("");
	$("#d_cant_total").val("");
	$("#cantidad").attr("readonly", false);

	debugger;

	if (count == 1) {

		$("#tipo_moneda_cambio").val(0);
		$("#tipo_moneda_cambio").attr("disabled", false);
		$("#valor_venta_total_sin_d").val("");
		$("#valor_venta_total_con_d").val("");
		$("#descuento_total").val("");
		$("#igv").val("");
		$("#precio_venta").val("");
		$("#btn_id_producto").attr("disabled", false);
		$("#btn_id_tablero").attr("disabled", false);
		$("#btn_id_comodin").attr("disabled", false);
	}
}
function limpiar_campos_condicion_pago() {

	$("#fecha_cuota").val("");
	$("#monto_cuota").val("");

}
function validar_registrar() {

	var count_detalle_cotizacion = $('#id_table_detalle_cotizacion tr').length;
	var count_detalle_condicion_pago = $('#id_table_detalle_condicion_pago tr').length;
	var precio_venta_detalle_cotizacion = Number($("#precio_venta").val());
	var monto_total_detalle_condicion_pago = Number($("#precio_final_final").html());
	var id_condicion_pago = $("#id_condicion_pago").val();
	var validez_oferta_cotizacion = $("#validez_oferta_cotizacion").val();
	var ds_nombre_cliente_proveedor = $("#ds_nombre_cliente_proveedor").val();
	var ds_departamento_cliente_proveedor = $("#ds_departamento_cliente_proveedor").val();
	var ds_provincia_cliente_proveedor = $("#ds_provincia_cliente_proveedor").val();
	var ds_distrito_cliente_proveedor = $("#ds_distrito_cliente_proveedor").val();
	var direccion_fiscal_cliente_proveedor = $("#direccion_fiscal_cliente_proveedor").val();
	var lugar_entrega = $("#lugar_entrega").val();

	if (count_detalle_cotizacion == "1") {
		alertify.dialog('alert').set({ transition: 'zoom', message: 'Debe registrar al menos 1 producto en el detalle de cotizacion', title: 'COTIZACION' }).show();
		resultado_campo = false;
	}
	// else if (count_detalle_condicion_pago == "2") {
	// 	alertify.dialog('alert').set({ transition: 'zoom', message: 'Debe ingresar la condicion de pago', title: 'COTIZACION' }).show();
	// 	resultado_campo = false;
	// }
	// else if (precio_venta_detalle_cotizacion != monto_total_detalle_condicion_pago) {
	// 	alert("El precio total de la cotizacion no coincide con el monto final de la condicion de pago");
	// 	resultado_campo = false;
	// }
	else if (id_condicion_pago == "0") {
		alert("Selecione la condicion Pago")
		resultado_campo = false;
	}
	else if (validez_oferta_cotizacion == "") {
		alert("Registre su validez de oferta")
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
	else if (lugar_entrega == "") {
		alert("Registre su lugar de entrega")
		resultado_campo = false;
	}
	else {
		resultado_campo = true;
	}
}
function generar_item() {

	var acumulador = 0;
	$("#id_table_detalle_cotizacion tbody tr").each(function () {
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