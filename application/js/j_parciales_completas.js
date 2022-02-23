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

$(document).on("click", ".js_lupa_parciales_completas_productos", function () {
	debugger;
	valor_id = $(this).val();
	$.ajax({
		url: base_url + "C_parciales_completas/index_modal_productos",
		type: "POST",
		dataType: "html",
		data: {
			id_parcial_completa: valor_id
		},
		success: function (data) {
			$("#id_target_parciales_completas_productos .modal-content").html(data);
		}
	});
});
$(document).on("click", ".js_lupa_parciales_completas_tableros", function () {
	debugger;
	valor_id = $(this).val();
	$.ajax({
		url: base_url + "C_parciales_completas/index_modal_tableros",
		type: "POST",
		dataType: "html",
		data: {
			id_parcial_completa: valor_id
		},
		success: function (data) {
			$("#id_target_parciales_completas_tableros .modal-content").html(data);
		}
	});
});

$("#registrar").on("click", function () {

	//Cabecera
	var id_cotizacion = $("#id_cotizacion").val();
	var total = $("#total").val();
	var igv = $("#igv").val();
	var precio_venta = $("#precio_venta").val();
	var fecha_parcial_completa = $("#fecha_parcial_completa").val();
	var id_tipo_orden = $("#id_tipo_orden").val();

	debugger;

	//Detalle parciales y completas
	var salida_prod = Array.prototype.slice.call(document.getElementsByName("salida_prod[]")).map((o) => o.value);
	var pendiente_prod = Array.prototype.slice.call(document.getElementsByName("pendiente_prod[]")).map((o) => o.value);
	var valor_venta = Array.prototype.slice.call(document.getElementsByName("valor_venta[]")).map((o) => o.value);


	$.ajax({
		async: false,
		url: base_url + "C_parciales_completas/registrar",
		type: "POST",
		dataType: "json",
		data: {
			//Cabecera
			id_cotizacion: id_cotizacion,
			total: total,
			igv: igv,
			precio_venta: precio_venta,
			fecha_parcial_completa: fecha_parcial_completa,
			id_tipo_orden: id_tipo_orden,

			//Detalle cotizacion
			salida_prod: salida_prod,
			pendiente_prod: pendiente_prod,
			valor_venta: valor_venta
		},
		success: function (data) {
			debugger;
			window.location.href = base_url + "C_parciales_completas";
			debugger;
		},
	});
});
/*Fin CRUD*/

$(document).on("keyup", "#salida_prod", function () {

	var cant = Number($(this).parents("tr").find("td")[5].innerText);
	var precio_u = Number($(this).parents("tr").find("td")[4].innerText);
	var salida_prod = Number($(this).closest('tr').find('#salida_prod').val());

	if (salida_prod == 0) {
		console.log("No puede ingresar datos Vacios");
		$(this).closest('tr').find('#pendiente_prod').val("");
		$(this).closest('tr').find('#valor_venta').val("");
		$(this).closest('tr').find('#salida_prod').val("");
		total();
		igv();
		precio_venta();
	}
	else if (isNaN(salida_prod)) {
		console.log("No puede ingresar datos isNaN");
		$(this).closest('tr').find('#pendiente_prod').val("");
		$(this).closest('tr').find('#valor_venta').val("");
		$(this).closest('tr').find('#salida_prod').val("");
		total();
		igv();
		precio_venta();
	}
	else if (salida_prod > cant) {
		alert("La salida de productos es mayor que la cantidad que se registro");
		$(this).closest('tr').find('#pendiente_prod').val("");
		$(this).closest('tr').find('#valor_venta').val("");
		$(this).closest('tr').find('#salida_prod').val("");
		total();
		igv();
		precio_venta();
	} else {
		pendiente_prod = cant - salida_prod;
		valor_venta = precio_u * salida_prod;
		$(this).closest('tr').find('#pendiente_prod').val(pendiente_prod);
		$(this).closest('tr').find('#valor_venta').val(valor_venta.toFixed(2));
		total();
		igv();
		precio_venta();
	}

});

$("#salida_prod").on({
	"focus": function (event) {
		$(event.target).select();
	},
	"keyup": function (event) {
		$(event.target).val(function (index, value) {
			return value.replace(/\D/g, "")
				.replace(/^0*/, '');
			// .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
		});
	}
});

function total() {

	var acumulador = 0;
	$("#id_table_detalle_parciales_completas tbody tr").each(function () {
		var posicion_valor_venta = $(this).closest('tr').find('#valor_venta').val();

		valor_venta = Number(posicion_valor_venta);
		acumulador = (acumulador + valor_venta)
		$("#total").val(acumulador.toFixed(2));
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