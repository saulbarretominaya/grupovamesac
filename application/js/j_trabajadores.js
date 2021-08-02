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

$(document).ready(function () {
	$("#example tfoot th").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" placeholder="Buscar ' + title + '" /> ');
	});

	var table = $("#example").dataTable({
		//scrollY: true,
		scrollX: true,
		scrollCollapse: true,
		paging: true,
		searching: true,

		/*------------------*/
		initComplete: function () {
			// Apply the search
			this.api()
				.columns()
				.every(function () {
					var that = this;

					$("input", this.footer()).on("keyup change clear", function () {
						if (that.search() !== this.value) {
							that.search(this.value).draw();
						}
					});
				});
		},

		/*------------------*/

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

// INSERTAR

$("#registrar").on("click", function () {
	debugger;

	var num_documento = $("#num_documento").val();
	var nombres = $("#nombres").val();
	var ape_paterno = $("#ape_paterno").val();
	var ape_materno = $("#ape_materno").val();
	var email = $("#email").val();
	var fecha_nacimiento = $("#fecha_nacimiento").val();
	var lugar_nacimiento = $("#lugar_nacimiento").val();
	var domicilio = $("#domicilio").val();
	var referencia = $("#referencia").val();
	var telefono = $("#telefono").val();
	var celular = $("#celular").val();
	var tipo_trabajador = $("#tipo_trabajador").val();
	var local = $("#local").val();
	var cargo = $("#cargo").val();
	var sexo = $("#sexo").val();
	var tipo_documento = $("#tipo_documento").val();
	var nacionalidad = $("#nacionalidad").val();
	var est_civil = $("#est_civil").val();
	var grado_instruccion = $("#grado_instruccion").val();
	var departamento = $("#departamento").val();
	var provincia = $("#provincia").val();
	var distrito = $("#distrito").val();

	$.ajax({
		async: false,
		url: base_url + "C_trabajadores/insertar",
		type: "POST",
		dataType: "json",
		data: {
			num_documento: num_documento,
			nombres: nombres,
			ape_paterno: ape_paterno,
			ape_materno: ape_materno,
			email: email,
			fecha_nacimiento: fecha_nacimiento,
			lugar_nacimiento: lugar_nacimiento,
			domicilio: domicilio,
			referencia: referencia,
			telefono: telefono,
			celular: celular,
			tipo_trabajador: tipo_trabajador,
			local: local,
			cargo: cargo,
			sexo: sexo,
			tipo_documento: tipo_documento,
			nacionalidad: nacionalidad,
			est_civil: est_civil,
			grado_instruccion: grado_instruccion,
			departamento: departamento,
			provincia: provincia,
			distrito: distrito,
		},
		success: function (data) {
			debugger;
			window.location.href = base_url + "C_trabajadores";
			debugger;
		},
	});
});
