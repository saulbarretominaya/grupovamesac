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

$("#id_agregar_multitabla").on("click", function (e) {
	debugger;
	var id_multitabla = document.getElementById("id_multitabla").value;
	var abreviatura = document.getElementById("abreviatura_tabla").value;
	var descripcion = document.getElementById("descripcion_tabla").value;

	html = "<tr>";
	html += "<input type='hidden' name='id_multitabla' value='" + id_multitabla + "'>";
	html += "<td><input type='text' class='form-control' name='abreviatura[]' id='abreviatura' value='" + abreviatura + "'></td>";
	html += "<td><input type='text' class='form-control' name='descripcion[]' id='descripcion' value='" + descripcion + "'></td>";
	html += "<td><button type='button' class='btn btn-danger btn-xs eliminar_fila'><span class='fas fa-trash-alt'></span></button></td>";
	html += "</tr>";

	$("#id_table_detalle_multitablas tbody").append(html);
});

$(document).on("click", ".js_lupa_multitabla", function () {
	valor_id = $(this).val();
	$.ajax({
		url: base_url + "C_multitablas/index_modal",
		type: "POST",
		dataType: "html",
		data: { id_multitabla: valor_id },
		success: function (data) {
			$("#id_target_multitablas .modal-content").html(data);
		},
	});
});

$(document).on("click", ".eliminar_fila", function () {
	debugger;
	var id_detalle = $(this).closest("tr").find("#value_id_solicitud").val();
	html =
		"<input type='hidden' id='id_solicitud_to_remove' name ='id_solicitud_to_remove[]' value='" +
		id_detalle +
		"'>";
	$("#container_solicitud_id_remove").append(html);
	$(this).closest("tr").remove();
});

$("#registrar").on("click", function () {
	debugger;

	var nombre_tabla = $("#nombre_tabla").val();
	var abreviatura = Array.prototype.slice.call(document.getElementsByName("abreviatura[]")).map((o) => o.value);
	var descripcion = Array.prototype.slice.call(document.getElementsByName("descripcion[]")).map((o) => o.value);

	$.ajax({
		async: false,
		url: base_url + "C_multitablas/insertar",
		type: "POST",
		dataType: "json",
		data: {
			nombre_tabla: nombre_tabla,
			abreviatura: abreviatura,
			descripcion: descripcion,
		},
		success: function (data) {
			debugger;
			window.location.href = base_url + "C_multitablas";
			debugger;
		},
	});
});

$("#actualizar").on("click", function () {
	debugger;

	//Cabecera
	var id_multitabla = $("#id_multitabla").val();
	var nombre_tabla = $("#nombre_tabla").val();

	//Detalle
	var id_dmultitabla = Array.prototype.slice.call(document.getElementsByName("id_solicitud_to_remove[]")).map((o) => o.value);
	var abreviatura = Array.prototype.slice.call(document.getElementsByName("abreviatura[]")).map((o) => o.value);
	var descripcion = Array.prototype.slice.call(document.getElementsByName("descripcion[]")).map((o) => o.value);

	debugger;

	$.ajax({
		async: false,
		url: base_url + "C_multitablas/actualizar",
		type: "POST",
		dataType: "json",
		data: {
			id_multitabla: id_multitabla,
			nombre_tabla: nombre_tabla,
			id_dmultitabla: id_dmultitabla,
			abreviatura: abreviatura,
			descripcion: descripcion,
		},
		success: function (data) {
			debugger;
			window.location.href = base_url + "C_multitablas";
			debugger;
		},
	});
});

