
$("#id_datatable_tipo_cambio").dataTable({

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
	var compra = $("#compra").val();
	var venta = $("#venta").val();
	debugger;
	$.ajax({
		async: false,
		url: base_url + "C_tipo_cambio/insertar",
		type: "POST",
		dataType: "json",
		data: {
			compra: compra,
			venta: venta,
		},
		success: function (data) {
			debugger;
			window.location.href = base_url + "C_tipo_cambio";
		},
	});
});

$("#actualizar").on("click", function () {
	var id_tipo_cambio = $("#id_tipo_cambio").val();
	var compra = $("#compra").val();
	var venta = $("#venta").val();
	debugger;
	$.ajax({
		async: false,
		url: base_url + "C_tipo_cambio/actualizar",
		type: "POST",
		dataType: "json",
		data: {
			id_tipo_cambio: id_tipo_cambio,
			compra: compra,
			venta: venta,
		},
		success: function (data) {
			debugger;
			window.location.href = base_url + "C_tipo_cambio";
			debugger;
		},
	});
});
