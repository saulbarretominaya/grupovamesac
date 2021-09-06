$(document).ready(function () {
	$("#id_datatable_productos thead #dtable_ds_almacen").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="cell-border style="width:80px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_productos thead #dtable_codigo").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:150px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_productos thead #dtable_descripcion_producto").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:200px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_productos thead #dtable_ds_unidad_medida").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:100px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_productos thead #dtable_ds_marca_producto").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:100px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_productos thead #dtable_ds_grupo").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:100px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_productos thead #dtable_ds_moneda").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:100px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_productos thead #dtable_precio_venta").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:100px;" placeholder="' + title + '" /> ');
	});

});

$(".select2").select2({
	theme: "bootstrap4"
});


$(document).on("click", ".btn-check", function () {

	productos = $(this).val();
	split_productos = productos.split("*");
	$("#hidden_ds_almacen").val(split_productos[0]);
	$("#hidden_codigo_producto").val(split_productos[1]);
	$("#descripcion_producto").val(split_productos[2]);
	$("#hidden_ds_unidad_medida").val(split_productos[3]);
	$("#hidden_ds_marca_producto").val(split_productos[4]);
	$("#precio_venta").val(split_productos[5]);
	$("#hidden_id_producto").val(split_productos[6]);
	$("#id_target_producto").modal("hide");
});

$("#id_agregar_tablero").on("click", function (e) {

	debugger;
	var count = $('#id_table_detalle_tableros tr').length;

	var hidden_ds_almacen = $("#hidden_ds_almacen").val();
	var hidden_codigo_producto = $("#hidden_codigo_producto").val();
	var descripcion_producto = $("#descripcion_producto").val();
	var hidden_ds_unidad_medida = $("#hidden_ds_unidad_medida").val();
	var hidden_ds_marca_producto = $("#hidden_ds_marca_producto").val();
	var cantidad = $("#cantidad").val();
	var precio_venta = $("#precio_venta").val();
	var hidden_id_producto = $("#hidden_id_producto").val();


	html = "<tr>";
	html +=
		"<input type='hidden' name='id_producto[]' value='" + hidden_id_producto + "'>";
	html +=
		"<td>   <input type='hidden' name='' id='' value='" +
		+count +
		"'>" +
		+count +
		"</td>";
	html +=
		"<td>   <input type='hidden' name='' id='' value='" +
		hidden_ds_almacen +
		"'>" +
		hidden_ds_almacen +
		"</td>";
	html +=
		"<td>   <input type='hidden' name='' id='' value='" +
		hidden_codigo_producto +
		"'>" +
		hidden_codigo_producto +
		"</td>";
	html +=
		"<td>   <input type='hidden' name='' id='' value='" +
		descripcion_producto +
		"'>" +
		descripcion_producto +
		"</td>";
	html +=
		"<td>   <input type='hidden' name='' id='' value='" +
		hidden_ds_unidad_medida +
		"'>" +
		hidden_ds_unidad_medida +
		"</td>";
	html +=
		"<td>   <input type='hidden' name='' id='' value='" +
		hidden_ds_marca_producto +
		"'>" +
		hidden_ds_marca_producto +
		"</td>";
	html +=
		"<td>   <input type='hidden' name='' id='' value='" +
		cantidad +
		"'>" +
		cantidad +
		"</td>";
	html +=
		"<td>   <input type='hidden' name='' id='' value='" +
		precio_venta +
		"'>" +
		precio_venta +
		"</td>";
	html +=
		"<td><button type='button' class='btn btn-danger btn-xs eliminar_fila'><span class='fas fa-trash-alt'></span></button></td>";
	html += "</tr>";

	$("#id_table_detalle_tableros tbody").append(html);

});

$(document).on("click", ".eliminar_fila", function () {
	debugger;
	var id_detalle = $(this).closest("tr").find("#value_id_solicitud").val();
	html =
		"<input type='hidden' id='id_solicitud_to_remove' name ='id_solicitud_to_remove[]' value='" +
		id_detalle +
		"'>";


	$("#container_solicitud_id_remove").append(html);



	// if (count != "1") {
	// 	debugger;
	// 	let miArray = [Number($(this).find("td:eq(0)").text())];

	// 	miArray.forEach(function (valor, indice, array) {
	// 		console.log("En el índice " + indice + " hay este valor: " + valor);
	// 	});
	// 	miArray.sort(function (a, b) {
	// 		return a - b;
	// 	});
	// 	console.log(miArray);
	// }
	// });



	$(this).closest("tr").remove();
});

$("#registrar").on("click", function () {
	debugger;

	var codigo_tablero = $("#codigo_tablero").val();
	var id_sunat = $("#id_sunat").val();
	var descripcion_tablero = $("#descripcion_tablero").val();
	var id_marca_tablero = $("#id_marca_tablero").val();
	var id_modelo_tablero = $("#id_modelo_tablero").val();
	var id_moneda = $("#id_moneda").val();
	var id_almacen = $("#id_almacen").val();

	//Detalle
	var id_producto = Array.prototype.slice.call(document.getElementsByName("id_producto[]"));
	var id_producto = id_producto.map((o) => o.value);

	$.ajax({
		async: false,
		url: base_url + "C_tableros/insertar",
		type: "POST",
		dataType: "json",
		data: {
			codigo_tablero: codigo_tablero,
			id_sunat: id_sunat,
			descripcion_tablero: descripcion_tablero,
			id_marca_tablero: id_marca_tablero,
			id_modelo_tablero: id_modelo_tablero,
			id_moneda: id_moneda,
			id_almacen: id_almacen,
			id_producto: id_producto,
		},
		success: function (data) {
			debugger;
			window.location.href = base_url + "C_tableros";
			debugger;
		},
	});
});

$(document).on("click", ".js_modal_detalle_tablero", function () {
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
			$("#id_target_tablero .modal-content").html(data);
		}
	});
});


