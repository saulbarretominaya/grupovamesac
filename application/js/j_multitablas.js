$("#id_datatable_multitablas").dataTable({
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

$("#id_agregar_multitabla").on("click", function (e) {
	debugger;

	var id_multitabla = document.getElementById("id_multitabla").value;
	var abreviatura = document.getElementById("abreviatura").value;
	var descripcion = document.getElementById("descripcion").value;

	html = "<tr>";
	html +=
		"<input type='hidden' name='id_multitabla[]' value='" +
		id_multitabla +
		"'>";
	html +=
		"<td>   <input type='hidden' name='cantidad[]' value='" +
		abreviatura +
		"'>" +
		abreviatura +
		"</td>";
	html +=
		"<td>   <input type='hidden' name='importe[]' value='" +
		descripcion +
		"'>" +
		descripcion +
		"</td>";
	html +=
		"<td><button type='button' class='btn btn-danger btn-xs eliminar_fila'><span class='fas fa-trash-alt'></span></button></td>";
	html += "</tr>";

	$("#id_table_detalle_multitablas tbody").append(html);
});

$(document).on("click", ".eliminar_fila", function () {
	debugger;
	$(this).closest("tr").remove();
});

$("#registrar").on("click", function () {
	debugger;

	var nombre_tabla = $("#nombre_tabla").val();
	var abreviatura = $("#abreviatura").val();
	var descripcion = $("#descripcion").val();

	debugger;
	validar_campos();

	var resultado = "";

	if (resultado_campo == true && validacion_enlaces == "1") {
		$.ajax({
			async: false,
			url: base_url + "Recursos_humanos/Controller_personal/verificar_personal",
			type: "POST",
			dataType: "json",
			data: {
				num_documento: num_documento,
			},
			success: function (data) {
				if (data == null) {
					//ESA VALIDACION NULL REPRESENTA QUE ESE REGISTRO NO SE ENCUENTRA EN LA BD, X LO TANTO EJECUTA UN METODO INSERTAR
					resultado = data;
					alert("PUEDE INGRESAR EL REGISTRO");
					$.ajax({
						async: false,
						url: base_url + "Recursos_humanos/Controller_personal/insertar",
						type: "POST",
						dataType: "json",
						data: {
							nombre: nombre,
							apepaterno: apepaterno,
							apematerno: apematerno,
							telefono: telefono,
							email: email,
							direccion: direccion,
							id_tdocumento: id_tdocumento,
							num_documento: num_documento,
							id_cargo: id_cargo,
						},
						success: function (data) {
							window.location.href =
								base_url + "Recursos_humanos/Controller_personal";
							debugger;
						},
					});
				} else {
					resultado = data;
					//alert('YA SE ENCUENTRA REGISTRADO');
					alertify.error("YA SE EXISTE ESE DNI");
				}

				//window.location.href = base_url+"Recursos_humanos/Controller_cargos/enlace_insertar";
				//echo json_encode($data);
			},
		});
		var myJSON = JSON.stringify(resultado);
		//alert(myJSON);
		debugger;
	}
});

function validar_campos() {
	var nombre_tabla = $("#nombre_tabla").val();
	var abreviatura = $("#abreviatura").val();
	var descripcion = $("#descripcion").val();

	if (nombre_tabla == "") {
		$("#nombre").attr({
			placeholder: " INGRESE NOMBRE GENERAL",
		});
		$("#nombre").focus();
		resultado_campo = false;
	} else if (apepaterno == "") {
		$("#apepaterno").attr({
			placeholder: "INGRESE APE. PATERNO",
		});
		$("#apepaterno").focus();
		resultado_campo = false;
	} else if (apematerno == "") {
		$("#apematerno").attr({
			placeholder: "INGRESE APE. MATERNO",
		});
		$("#apematerno").focus();
		resultado_campo = false;
	} else if (num_documento == "") {
		$("#num_documento").attr({
			placeholder: "INGRESE DNI",
		});
		$("#num_documento").focus();
		resultado_campo = false;
	} else {
		resultado_campo = true;
	}
}
