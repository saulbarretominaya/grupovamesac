//Declaracion de variables Globales
var resultado_campo = "";

$("#id_datatable_cotizacion").dataTable({
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


$("#registrar_cotizacion").on("click", function () {
	var validez_oferta = $("#validez_oferta").val();
	var direccion = $("#direccion").val();
	var lugar_entrega = $("#lugar_entrega").val();
	var clausula = $("#clausula").val();
	var correo_electronico = $("#correo_electronico").val();


	debugger;
	$.ajax({
		async: false,
		url: base_url + "C_cotizacion/insertar",
		type: "POST",
		dataType: "json",
		data: {
			validez_oferta: validez_oferta,
			direccion: direccion,
			lugar_entrega: lugar_entrega,
			clausula: clausula,
			correo_electronico: correo_electronico

		},
		success: function (data) {
			debugger;
			window.location.href = base_url + "C_cotizacion";
		},
	});
});


$(".select2").select2();
