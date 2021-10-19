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

// $(document).ready(function () {
// 	$("#id_datatable_compras tfoot th").each(function () {
// 		var title = $(this).text();
// 		$(this).html('<input type="text" placeholder="Buscar ' + title + '" /> ');
// 	});

// 	var table = $("#id_datatable_compras").dataTable({
// 		//scrollY: true,
// 		scrollX: true,
// 		scrollCollapse: true,
// 		paging: true,
// 		searching: true,

// 		// /*------------------*/
// 		initComplete: function () {
// 			// Apply the search
// 			this.api()
// 				.columns()
// 				.every(function () {
// 					var that = this;

// 					$("input", this.footer()).on("keyup change clear", function () {
// 						if (that.search() !== this.value) {
// 							that.search(this.value).draw();
// 						}
// 					});
// 				});
// 		},

// 		/*------------------*/

// 		language: {
// 			lengthMenu: "Mostrar _MENU_ registros por pagina",
// 			zeroRecords: "No se encontraron resultados en su busqueda",
// 			searchPlaceholder: "Buscar registros",
// 			info: "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
// 			infoEmpty: "No existen registros",
// 			infoFiltered: "(filtrado de un total de _MAX_ registros)",
// 			search: "Buscar:",
// 			paginate: {
// 				first: "Primero",
// 				last: "Último",
// 				next: "Siguiente",
// 				previous: "Anterior",
// 			},
// 		},
// 	});
// });


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

$("#agregar_pago").on("click", function (e) {

	// debugger;
	var dt_voucher_pago = "P00-" + $("#voucher_pago").val();
	var transaccion = $("#transaccion").val();
	var dt_fecha_pago_voucher = $("#fecha_pago_voucher").val();
	var tipo_cambio = $("#tipo_cambio").val();
	var numero_deposito = $("#numero_deposito").val();
	var numero_letra_cheque = $("#numero_letra_cheque").val();
	var dt_banco = $("#banco").val();
	var dt_ds_banco = $('#banco option:selected').text();
	var dt_medio_pago_voucher = $("#medio_pago_voucher").val();
	var dt_ds_medio_pago_voucher = $('#medio_pago_voucher option:selected').text();
	var dt_estado_voucher = $("#estado_voucher").val();
	var dt_importe_pago = Number($("#importe_pago").val());

	html = "<tr>";
	// html += "<input type='hidden' name='voucher_pago[]'  value='" + voucher_pago + "'>";
	// html += "<td><input type='hidden' name='dt_voucher_pago[]'	 value='" + codigo_pago_voucher + "'>" + codigo_pago_voucher + "</td>";
	html += "<td><input type='hidden' name='dt_voucher_pago[]'	 value='" + dt_voucher_pago + "'>" + dt_voucher_pago + "</td>";
	html += "<td><input type='hidden' name='dt_fecha_pago_voucher[]' 	value='" + dt_fecha_pago_voucher + "'>" + dt_fecha_pago_voucher + "</td>";
	html += "<input type='hidden' name='dt_medio_pago_voucher[]' 	value='" + dt_medio_pago_voucher + "'>";
	html += "<td><input type='hidden' name='dt_ds_medio_pago_voucher[]' 	value='" + dt_ds_medio_pago_voucher + "'>" + dt_ds_medio_pago_voucher + "</td>";
	html += "<input type='hidden' name='dt_banco[]' 	value='" + dt_banco + "'>";
	html += "<td><input type='hidden' name='dt_ds_banco[]' 	value='" + dt_ds_banco + "'>" + dt_ds_banco + "</td>";
	html += "<td><input type='hidden' name='dt_importe_pago[]' 	value='" + dt_importe_pago + "'>" + dt_importe_pago + "</td>";
	html += "<td><input type='hidden' name='dt_estado_voucher[]' 	value='" + dt_estado_voucher + "'>" + dt_estado_voucher + "</td>";


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



});

// $("#subtotal_factura").on("Key")

$("#subtotal_factura").keyup(function () {

	var subtotal_factura = Number($("#subtotal_factura").val());
	// debugger;
	var igv = subtotal_factura * 0.18
	var total_factura = Number((subtotal_factura) + (igv));
	$("#igv_factura").val(igv);
	$("#total_factura").val(total_factura);
	$("#total_deuda_voucher").val(total_factura);

});



// INSERTAR

$("#registrar").on("click", function () {
	debugger;

	// Registro de Compras

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

	// Pagos Compras

	// var codigo_pago_voucher = $("#codigo_pago_voucher").val();
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

	// Detalle de Programacion de Pagos
	var dt_voucher_pago = Array.prototype.slice.call(document.getElementsByName("dt_voucher_pago[]")).map((e) => e.value);
	var dt_fecha_pago_voucher = Array.prototype.slice.call(document.getElementsByName("dt_fecha_pago_voucher[]")).map((e) => e.value);
	var dt_ds_medio_pago_voucher = Array.prototype.slice.call(document.getElementsByName("dt_ds_medio_pago_voucher[]")).map((e) => e.value);
	var dt_medio_pago_voucher = Array.prototype.slice.call(document.getElementsByName("dt_medio_pago_voucher[]")).map((e) => e.value);
	var dt_ds_banco = Array.prototype.slice.call(document.getElementsByName("dt_ds_banco[]")).map((e) => e.value);
	var dt_banco = Array.prototype.slice.call(document.getElementsByName("dt_banco[]")).map((e) => e.value);
	var dt_importe_pago = Array.prototype.slice.call(document.getElementsByName("dt_importe_pago[]")).map((e) => e.value);
	var dt_estado_voucher = Array.prototype.slice.call(document.getElementsByName("dt_estado_voucher[]")).map((e) => e.value);

	// Suma de Precios

	var total_deuda_voucher = $("#total_deuda_voucher").val();
	var monto_pagado_voucher = $("#monto_pagado_voucher").val();
	var monto_pendiente_voucher = $("#monto_pendiente_voucher").val();

	// var beneficiario_pago = $("#beneficiario_pago").val();
	// var moneda_voucher = $("#moneda_voucher").val();

	// if (
	// 	// // id_trabajador === "" ||
	// 	origen === "0" ||
	// 	condicion === "0" ||
	// 	tipo_persona === "0" ||
	// 	tipo_persona_sunat === "0" ||
	// 	tipo_documento === "0" ||
	// 	num_documento === "" ||
	// 	nombres === "" ||
	// 	ape_paterno === "" ||
	// 	ape_materno === "" ||
	// 	razon_social === "" ||
	// 	direccion_fiscal === "" ||
	// 	direccion_alm1 === "" ||
	// 	direccion_alm2 === "" ||
	// 	departamento === "0" ||
	// 	provincia === "0" ||
	// 	distrito === "0" ||
	// 	telefono === "" ||
	// 	celular === "" ||
	// 	tipo_giro === "0" ||
	// 	condicion_pago === "0" ||
	// 	// vendedor === "0" ||
	// 	linea_credito_soles === "" ||
	// 	credito_unitario_soles === "" ||
	// 	disponible_soles === "" ||
	// 	linea_credito_dolares === "" ||
	// 	credito_unitario_dolares === "" ||
	// 	disponible_dolares === "" ||
	// 	email === "" ||
	// 	contacto_registro === "" ||
	// 	// estado === "0" ||
	// 	email_cobranza === "" ||
	// 	contacto_cobranza === "" ||
	// 	tipo_cliente_pago === "0"
	// ) {
	// 	//alert('NO PUEDE DEJARLO VACIO');
	// 	alertify
	// 		.dialog("alert")
	// 		.set({
	// 			transition: "zoom",
	// 			message: "SEÑOR UD NO ENTIENDE QUE NO PUEDE QUEDAR VACIO",
	// 			title: "TRABAJADORES",
	// 		})
	// 		.show();
	// } else {
	$.ajax({
		async: false,
		url: base_url + "C_compras/insertar",
		type: "POST",
		dataType: "json",
		data: {
			id_compras: id_compras,
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

			dt_voucher_pago: dt_voucher_pago,
			dt_fecha_pago_voucher: dt_fecha_pago_voucher,
			dt_ds_medio_pago_voucher: dt_ds_medio_pago_voucher,
			dt_medio_pago_voucher: dt_medio_pago_voucher,
			dt_banco: dt_banco,
			dt_ds_banco: dt_ds_banco,
			dt_importe_pago: dt_importe_pago,
			dt_estado_voucher: dt_estado_voucher,


			// Suma de Precios

			total_deuda_voucher: total_deuda_voucher,
			monto_pagado_voucher: monto_pagado_voucher,
			monto_pendiente_voucher: monto_pendiente_voucher,
			// moneda_voucher: moneda_voucher,
			// beneficiario_pago: beneficiario_pago,
		},
		success: function (data) {
			debugger;
			window.location.href = base_url + "C_compras";
			debugger;
		},
	});
	// }
});

// $("#actualizar_clientes_proveedores").on("click", function () {
// 	debugger;

// 	var id_cliente_proveedor = $("#id_cliente_proveedor").val();
// 	var origen = $("#origen").val();
// 	var condicion = $("#condicion").val();
// 	var tipo_persona = $("#tipo_persona").val();
// 	var tipo_persona_sunat = $("#tipo_persona_sunat").val();
// 	var tipo_documento = $("#tipo_documento").val();
// 	var num_documento = $("#num_documento").val();
// 	var nombres = $("#nombres").val();
// 	var ape_paterno = $("#ape_paterno").val();
// 	var ape_materno = $("#ape_materno").val();
// 	var razon_social = $("#razon_social").val();
// 	var direccion_fiscal = $("#direccion_fiscal").val();
// 	var direccion_alm1 = $("#direccion_alm1").val();
// 	var direccion_alm2 = $("#direccion_alm2").val();
// 	var departamento = $("#departamento").val();
// 	var provincia = $("#provincia").val();
// 	var distrito = $("#distrito").val();
// 	var telefono = $("#telefono").val();
// 	var celular = $("#celular").val();
// 	var tipo_giro = $("#tipo_giro").val();
// 	var condicion_pago = $("#condicion_pago").val();
// 	var linea_credito_soles = $("#linea_credito_soles").val();
// 	var credito_unitario_soles = $("#credito_unitario_soles").val();
// 	var disponible_soles = $("#disponible_soles").val();
// 	var linea_credito_dolares = $("#linea_credito_dolares").val();
// 	var credito_unitario_dolares = $("#credito_unitario_dolares").val();
// 	var disponible_dolares = $("#disponible_dolares ").val();
// 	var linea_opcional = $("#linea_opcional").val();
// 	var linea_opcional_unitaria = $("#linea_opcional_unitaria").val();
// 	var linea_disponible = $("#linea_disponible ").val();
// 	var email = $("#email").val();
// 	var contacto_registro = $("#contacto_registro").val();
// 	var estado_cliente = $("#estado_cliente").val();
// 	var email_cobranza = $("#email_cobranza").val();
// 	var contacto_cobranza = $("#contacto_cobranza").val();
// 	var tipo_cliente_pago = $("#tipo_cliente_pago").val();

	// 	if (
	// 		origen === "0" ||
	// 		condicion === "0" ||
	// 		tipo_persona === "0" ||
	// 		tipo_persona_sunat === "0" ||
	// 		tipo_documento === "0" ||
	// 		num_documento === "" ||
	// 		nombres === "" ||
	// 		ape_paterno === "" ||
	// 		ape_materno === "" ||
	// 		razon_social === "" ||
	// 		direccion_fiscal === "" ||
	// 		direccion_alm1 === "" ||
	// 		direccion_alm2 === "" ||
	// 		departamento === "0" ||
	// 		provincia === "0" ||
	// 		distrito === "0" ||
	// 		telefono === "" ||
	// 		celular === "" ||
	// 		tipo_giro === "0" ||
	// 		condicion_pago === "0" ||
	// 		// vendedor === "0" ||
	// 		linea_credito_soles === "" ||
	// 		credito_unitario_soles === "" ||
	// 		disponible_soles === "" ||
	// 		linea_credito_dolares === "" ||
	// 		credito_unitario_dolares === "" ||
	// 		disponible_dolares === "" ||
	// 		email === "" ||
	// 		contacto_registro === "" ||
	// 		// estado === "0" ||
	// 		email_cobranza === "" ||
	// 		contacto_cobranza === "" ||
	// 		tipo_cliente_pago === "0"
	// 	) {
	// 		//alert('NO PUEDE DEJARLO VACIO');
	// 		alertify
	// 			.dialog("alert")
	// 			.set({
	// 				transition: "zoom",
	// 				message: "SEÑOR UD NO ENTIENDE QUE NO PUEDE QUEDAR VACIO",
	// 				title: "TRABAJADORES",
	// 			})
	// 			.show();
	// 	} else {
	// $.ajax({
	// 	async: false,
	// 	url: base_url + "C_clientes_proveedores/verificar_cliente_proveedor",
	// 	type: "POST",
	// 	dataType: "json",

	// 	data: {
	// 		id_cliente_proveedor: id_cliente_proveedor,
	// 		origen: origen,
	// 		condicion: condicion,
	// 		tipo_persona: tipo_persona,
	// 		tipo_persona_sunat: tipo_persona_sunat,
	// 		tipo_documento: tipo_documento,
	// 		num_documento: num_documento,
	// 		nombres: nombres,
	// 		ape_paterno: ape_paterno,
	// 		ape_materno: ape_materno,
	// 		razon_social: razon_social,
	// 		direccion_fiscal: direccion_fiscal,
	// 		direccion_alm1: direccion_alm1,
	// 		direccion_alm2: direccion_alm2,
	// 		departamento: departamento,
	// 		provincia: provincia,
	// 		distrito: distrito,
	// 		telefono: telefono,
	// 		celular: celular,
	// 		tipo_giro: tipo_giro,
	// 		condicion_pago: condicion_pago,
	// 		linea_credito_soles: linea_credito_soles,
	// 		credito_unitario_soles: credito_unitario_soles,
	// 		disponible_soles: disponible_soles,
	// 		linea_credito_dolares: linea_credito_dolares,
	// 		credito_unitario_dolares: credito_unitario_dolares,
	// 		disponible_dolares: disponible_dolares,
	// 		linea_opcional: linea_opcional,
	// 		linea_opcional_unitaria: linea_opcional_unitaria,
	// 		linea_disponible: linea_disponible,
	// 		email: email,
	// 		contacto_registro: contacto_registro,
	// 		estado_cliente: estado_cliente,
	// 		email_cobranza: email_cobranza,
	// 		contacto_cobranza: contacto_cobranza,
	// 		tipo_cliente_pago: tipo_cliente_pago,
	// 	},

	// 	success: function (data) {
	// 		console.log(data);
	// 		debugger;
	// 		// if (data == null) {
	// 		// 	//ESA VALIDACION NULL REPRESENTA QUE ESE REGISTRO NO SE ENCUENTRA EN LA BD, X LO TANTO EJECUTA UN METODO INSERTAR
	// 		// 	resultado = data;
	// 		// 	alert("PUEDE INGRESAR EL REGISTRO");
	// 		$.ajax({
	// 			async: false,
	// 			url: base_url + "C_clientes_proveedores/actualizar",
	// 			type: "POST",
	// 			dataType: "json",
	// 			data: {
	// 				id_cliente_proveedor: id_cliente_proveedor,
	// 				origen: origen,
	// 				condicion: condicion,
	// 				tipo_persona: tipo_persona,
	// 				tipo_persona_sunat: tipo_persona_sunat,
	// 				tipo_documento: tipo_documento,
	// 				num_documento: num_documento,
	// 				nombres: nombres,
	// 				ape_paterno: ape_paterno,
	// 				ape_materno: ape_materno,
	// 				razon_social: razon_social,
	// 				direccion_fiscal: direccion_fiscal,
	// 				direccion_alm1: direccion_alm1,
	// 				direccion_alm2: direccion_alm2,
	// 				departamento: departamento,
	// 				provincia: provincia,
	// 				distrito: distrito,
	// 				telefono: telefono,
	// 				celular: celular,
	// 				tipo_giro: tipo_giro,
	// 				condicion_pago: condicion_pago,
	// 				linea_credito_soles: linea_credito_soles,
	// 				credito_unitario_soles: credito_unitario_soles,
	// 				disponible_soles: disponible_soles,
	// 				linea_credito_dolares: linea_credito_dolares,
	// 				credito_unitario_dolares: credito_unitario_dolares,
	// 				disponible_dolares: disponible_dolares,
	// 				linea_opcional: linea_opcional,
	// 				linea_opcional_unitaria: linea_opcional_unitaria,
	// 				linea_disponible: linea_disponible,
	// 				email: email,
	// 				contacto_registro: contacto_registro,
	// 				estado_cliente: estado_cliente,
	// 				email_cobranza: email_cobranza,
	// 				contacto_cobranza: contacto_cobranza,
	// 				tipo_cliente_pago: tipo_cliente_pago,
	// 			},
	// 			success: function (data) {
	// 				window.location.href = base_url + "C_clientes_proveedores";
	// 				debugger;
	// 			},
	// 		});
			// } else {
			// 	resultado = data;
			// 	//alert('YA SE ENCUENTRA REGISTRADO');
			// 	alertify.error("ESTO ES EL COLMO SEÑORES");
			// }

			//window.location.href = base_url+"Recursos_humanos/Controller_cargos/enlace_insertar";
			//echo json_encode($data);
	// 	},
	// });

	// debugger;

	// var myJSON = JSON.stringify(resultado);
	//alert(myJSON);
	// }
// });
