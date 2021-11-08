
$("#id_datatable_comodin").dataTable({

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

	order: []
});

$("#registrar").on("click", function () {
	debugger;
	var codigo_producto = $("#codigo_producto").val();
	var descripcion_producto = $("#descripcion_producto").val();
	var id_unidad_medida = $("#id_unidad_medida").val();
	var id_marca_producto = $("#id_marca_producto").val();
	var precio_unitario = $("#precio_unitario").val();
	var id_moneda = $("#id_moneda").val();
	var nombre_proveedor = $("#nombre_proveedor").val();

	$.ajax({
		async: false,
		url: base_url + "C_comodin/insertar",
		type: "POST",
		dataType: "json",
		data: {
			codigo_producto: codigo_producto,
			descripcion_producto: descripcion_producto,
			id_unidad_medida: id_unidad_medida,
			id_marca_producto: id_marca_producto,
			precio_unitario: precio_unitario,
			id_moneda: id_moneda,
			nombre_proveedor: nombre_proveedor,

		},
		success: function (data) {
			debugger;
			window.location.href = base_url + "C_comodin";
		},
	});
});
$("#actualizar").on("click", function () {
	debugger;
	var codigo_producto = $("#codigo_producto").val();
	var descripcion_producto = $("#descripcion_producto").val();
	var id_unidad_medida = $("#id_unidad_medida").val();
	var id_marca_producto = $("#id_marca_producto").val();
	var precio_unitario = $("#precio_unitario").val();
	var id_moneda = $("#id_moneda").val();
	var nombre_proveedor = $("#nombre_proveedor").val();

	$.ajax({
		async: false,
		url: base_url + "C_comodin/insertar",
		type: "POST",
		dataType: "json",
		data: {
			codigo_producto: codigo_producto,
			descripcion_producto: descripcion_producto,
			id_unidad_medida: id_unidad_medida,
			id_marca_producto: id_marca_producto,
			precio_unitario: precio_unitario,
			id_moneda: id_moneda,
			nombre_proveedor: nombre_proveedor,

		},
		success: function (data) {
			debugger;
			window.location.href = base_url + "C_comodin";
		},
	});
});

/* Otros */
$(".select2").select2({
	theme: "bootstrap4"
});
/* Fin de Otros */






