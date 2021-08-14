//Declaracion de variables Globales
var resultado_campo = "";

$(document).ready(function () {
	$("#id_datatable_cotizacion thead #ds_almacen").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:60px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_cotizacion thead #codigo").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:100px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_cotizacion thead #descripcion_producto").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:230px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_cotizacion thead #ds_unidad_medida").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:70px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_cotizacion thead #ds_marca").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:80px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_cotizacion thead #ds_grupo").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:100px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_cotizacion thead #ds_moneda").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:70px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_cotizacion thead #pe_venta").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:100px;" placeholder="' + title + '" /> ');
	});

	$("#id_datatable_cotizacion").dataTable({

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

	});
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



$(document).on("click", ".btn-check", function () {
	debugger;
	usuarios = $(this).val();
	infousuarios = usuarios.split("*");
	$("#descripcion_producto").val(infousuarios[0]);
	$("#precio_venta").val(infousuarios[1]);
	//$("#ruc").val(infousuarios[2]);
	$("#id_target_producto").modal("hide");
});