resultado_campo = true;
campo_vacio_tabla = true;

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
$(document).on("click", ".js_lupa_elaborar_pc_productos", function () {
	debugger;
	valor_id = $(this).val();
	$.ajax({
		url: base_url + "C_elaborar_pc/index_modal_productos",
		type: "POST",
		dataType: "html",
		data: {
			id_orden_despacho: valor_id
		},
		success: function (data) {
			$("#id_target_elaborar_pc_productos .modal-content").html(data);
		}
	});
});
$(document).on("click", ".js_lupa_elaborar_pc_tableros", function () {
	debugger;
	valor_id = $(this).val();
	$.ajax({
		url: base_url + "C_elaborar_pc/index_modal_tableros",
		type: "POST",
		dataType: "html",
		data: {
			id_orden_despacho: valor_id
		},
		success: function (data) {
			$("#id_target_elaborar_pc_tableros .modal-content").html(data);
		}
	});
});

$("#registrar").on("click", function () {

	validar_detalle_parciales_completas();

	if (resultado_campo == true) {
		//Cabecera
		var id_cotizacion = $("#id_cotizacion").val();
		var valor_venta_total_sin_d = $("#valor_venta_total_sin_d").val();
		var valor_venta_total_con_d = $("#valor_venta_total_con_d").val();
		var descuento_total = $("#descuento_total").val();
		var igv = $("#igv").val();
		var precio_venta = $("#precio_venta").val();
		var fecha_parcial_completa = $("#fecha_parcial_completa").val();


		//Detalle parciales y completas
		var id_dcotizacion = Array.prototype.slice.call(document.getElementsByName("id_dcotizacion[]")).map((o) => o.value);
		var salida_prod = Array.prototype.slice.call(document.getElementsByName("salida_prod[]")).map((o) => o.value);
		var pendiente_prod = Array.prototype.slice.call(document.getElementsByName("pendiente_prod[]")).map((o) => o.value);
		var d_cant_total = Array.prototype.slice.call(document.getElementsByName("d_cant_total[]")).map((o) => o.value);
		var valor_venta_sin_d = Array.prototype.slice.call(document.getElementsByName("valor_venta_sin_d[]")).map((o) => o.value);
		var valor_venta_con_d = Array.prototype.slice.call(document.getElementsByName("valor_venta_con_d[]")).map((o) => o.value);
		var estado_elaboracion_pc = Array.prototype.slice.call(document.getElementsByName("estado_elaboracion_pc[]")).map((o) => o.value);

		$.ajax({
			async: false,
			url: base_url + "C_elaborar_pc/registrar",
			type: "POST",
			dataType: "json",
			data: {
				//Cabecera
				id_cotizacion: id_cotizacion,
				valor_venta_total_sin_d: valor_venta_total_sin_d,
				valor_venta_total_con_d: valor_venta_total_con_d,
				descuento_total: descuento_total,
				igv: igv,
				precio_venta: precio_venta,
				fecha_parcial_completa: fecha_parcial_completa,

				//Detalle Update (estado_elaboracion_pc - Elaboracion PC)
				id_dcotizacion: id_dcotizacion,
				salida_prod: salida_prod,
				pendiente_prod: pendiente_prod,
				d_cant_total: d_cant_total,
				valor_venta_sin_d: valor_venta_sin_d,
				valor_venta_con_d: valor_venta_con_d,
				estado_elaboracion_pc: estado_elaboracion_pc
			},
			success: function (data) {
				debugger;
				window.location.href = base_url + "C_elaborar_pc";
				debugger;
			},
		});
	}
});
/*Fin CRUD*/

$(document).on("keyup", "#salida_prod", function () {

	var cant = Number($(this).parents("tr").find("td")[9].innerText);
	var precio_u = Number($(this).parents("tr").find("td")[5].innerText);
	var precio_u_d = Number($(this).parents("tr").find("td")[6].innerText);
	var d_unidad = Number($(this).parents("tr").find("td")[7].innerText);
	var salida_prod = $(this).closest('tr').find('#salida_prod').val();
	debugger;
	if (isNaN(salida_prod)) {
		console.log("No puede ingresar datos isNaN");
		$(this).closest('tr').find('#pendiente_prod').val("");
		$(this).closest('tr').find('#d_cant_total').val("");
		$(this).closest('tr').find('#valor_venta_sin_d').val("");
		$(this).closest('tr').find('#valor_venta_con_d').val("");
		$(this).closest('tr').find('#salida_prod').val("");
		descuento_total();
		valor_venta_total_sin_d();
		valor_venta_total_con_d();
		igv();
		precio_venta();
	}
	else if (salida_prod > cant) {
		alert("La salida de productos es mayor que la cantidad que se registro");
		$(this).closest('tr').find('#salida_prod').val("");
		$(this).closest('tr').find('#pendiente_prod').val("");
		$(this).closest('tr').find('#d_cant_total').val("");
		$(this).closest('tr').find('#valor_venta_sin_d').val("");
		$(this).closest('tr').find('#valor_venta_con_d').val("");
		descuento_total();
		valor_venta_total_sin_d();
		valor_venta_total_con_d();
		igv();
		precio_venta();
	} else if (salida_prod == "0") {
		pendiente_prod = cant - salida_prod;
		d_cant_total = d_unidad * salida_prod;
		valor_venta_sin_d = precio_u * salida_prod;
		valor_venta_con_d = precio_u_d * salida_prod;
		$(this).closest('tr').find('#pendiente_prod').val(pendiente_prod);
		$(this).closest('tr').find('#d_cant_total').val(d_cant_total.toFixed(2));
		$(this).closest('tr').find('#valor_venta_sin_d').val(valor_venta_sin_d.toFixed(5));
		$(this).closest('tr').find('#valor_venta_con_d').val(valor_venta_con_d.toFixed(5));
		$(this).closest('tr').find('#salida_prod').val(0);
		descuento_total();
		valor_venta_total_sin_d();
		valor_venta_total_con_d();
		igv();
		precio_venta();
	}
	else if (salida_prod == "") {
		$(this).closest('tr').find('#salida_prod').val("");
		$(this).closest('tr').find('#pendiente_prod').val("");
		$(this).closest('tr').find('#d_cant_total').val("");
		$(this).closest('tr').find('#valor_venta_sin_d').val("");
		$(this).closest('tr').find('#valor_venta_con_d').val("");
		descuento_total();
		valor_venta_total_sin_d();
		valor_venta_total_con_d();
		igv();
		precio_venta();
	}
	else {
		pendiente_prod = cant - salida_prod;
		d_cant_total = d_unidad * salida_prod;
		valor_venta_sin_d = precio_u * salida_prod;
		valor_venta_con_d = precio_u_d * salida_prod;
		$(this).closest('tr').find('#pendiente_prod').val(pendiente_prod);
		$(this).closest('tr').find('#d_cant_total').val(d_cant_total.toFixed(2));
		$(this).closest('tr').find('#valor_venta_sin_d').val(valor_venta_sin_d.toFixed(5));
		$(this).closest('tr').find('#valor_venta_con_d').val(valor_venta_con_d.toFixed(5));
		descuento_total();
		valor_venta_total_sin_d();
		valor_venta_total_con_d();
		igv();
		precio_venta();
		if (pendiente_prod == 0) {
			$(this).closest('tr').find('#estado_elaboracion_pc').val("completado");
		} else {
			$(this).closest('tr').find('#estado_elaboracion_pc').val("pendiente");
		}
	}



});

function descuento_total() {

	var acumulador = 0;
	$("#id_table_detalle_parciales_completas tbody tr").each(function () {
		var posicion_valor_d_cant_total = $(this).closest('tr').find('#d_cant_total').val();
		d_cant_total = Number(posicion_valor_d_cant_total);
		acumulador = (acumulador + d_cant_total)
		$("#descuento_total").val(acumulador.toFixed(2));
	});
}
function valor_venta_total_sin_d() {

	var acumulador = 0;
	$("#id_table_detalle_parciales_completas tbody tr").each(function () {
		var posicion_valor_venta = $(this).closest('tr').find('#valor_venta_sin_d').val();
		valor_venta = Number(posicion_valor_venta);
		acumulador = (acumulador + valor_venta)
		$("#valor_venta_total_sin_d").val(acumulador.toFixed(2));
	});
}
function valor_venta_total_con_d() {

	var acumulador = 0;
	$("#id_table_detalle_parciales_completas tbody tr").each(function () {
		var posicion_valor_venta = $(this).closest('tr').find('#valor_venta_con_d').val();
		valor_venta = Number(posicion_valor_venta);
		acumulador = (acumulador + valor_venta)
		$("#valor_venta_total_con_d").val(acumulador.toFixed(2));
	});
}
function igv() {
	var valor_venta_total_con_d = Number($("#valor_venta_total_con_d").val());
	var igv = (valor_venta_total_con_d * 0.18);
	$("#igv").val(igv.toFixed(2));
}
function precio_venta() {
	var valor_venta_total_con_d = Number($("#valor_venta_total_con_d").val());
	var igv = Number($("#igv").val());
	var precio_venta = valor_venta_total_con_d + igv;
	$("#precio_venta").val(precio_venta.toFixed(2));
}
function validar_detalle_parciales_completas() {

	$("#id_table_detalle_parciales_completas tbody tr").each(function () {

		salida_prod = $(this).find("#salida_prod").val();
		numero_fila = $(this).closest('tr').index() + 1;

		if (salida_prod == "") {
			campo_vacio_tabla = false;
			return false;
		}
	});

	var precio_venta = $("#precio_venta").val();


	if (campo_vacio_tabla == false) {
		alert("No puede dejar el campo Salida Prod vacio, Fila #" + numero_fila);
		resultado_campo = false;
		campo_vacio_tabla = true;
	}
	else if (precio_venta == "0.00") {
		alert("Todos los campos Salida Prod no pueden estar en 0");
		resultado_campo = false;
	}
	else {
		resultado_campo = true;
	}

}