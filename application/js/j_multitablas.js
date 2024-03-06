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

	var id_multitabla = document.getElementById("id_multitabla").value;
	var abreviatura = document.getElementById("abreviatura").value;
	var descripcion = document.getElementById("descripcion").value;

	html = "<tr>";
	html += "<input type='hidden' name='id_multitabla' value='" + id_multitabla + "'>";
	html += "<td><input type='text' class='form-control' name='abreviatura[]' id='abreviatura' value='" + abreviatura + "'></td>";
	html += "<td><input type='text' class='form-control' name='descripcion[]' id='descripcion' value='" + descripcion + "'></td>";
	html += "<td></td>";
	html += "<td><button type='button' class='btn btn-danger btn-xs eliminar_fila'><span class='fas fa-trash-alt'></span></button></td>";
	html += "</tr>";
	$("#id_table_detalle_multitablas tbody").append(html);
	$("#abreviatura").val("");
	$("#descripcion").val("");
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
	var id_dmultitabla_eliminar = $(this).closest("tr").find("#id_dmultitabla_eliminar").val();
	html = "<tr><input type='hidden' id='id_dmultitabla_eliminar' name ='id_dmultitabla_eliminar[]' value='" + id_dmultitabla_eliminar + "'></tr>";
	$("#container_id_dmultitabla_eliminar tbody").append(html);
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

	//REGISTRAR NUEVOS ID DETALLE
	var id_multitabla = $("#id_multitabla").val();
	var abreviatura = Array.prototype.slice.call(document.getElementsByName("abreviatura[]")).map((o) => o.value);
	var descripcion = Array.prototype.slice.call(document.getElementsByName("descripcion[]")).map((o) => o.value);

	//ACTUALIZAR POR ID DETALLE
	var id_dmultitabla_actualizar = Array.prototype.slice.call(document.getElementsByName("id_dmultitabla_actualizar[]")).map((o) => o.value);
	var abreviatura_actualizar = Array.prototype.slice.call(document.getElementsByName("abreviatura_actualizar[]")).map((o) => o.value);
	var descripcion_actualizar = Array.prototype.slice.call(document.getElementsByName("descripcion_actualizar[]")).map((o) => o.value);

	//ELIMINAR POR ID DETALLE
	var id_dmultitabla_eliminar = Array.prototype.slice.call(document.getElementsByName("id_dmultitabla_eliminar[]")).map((o) => o.value);

	$.ajax({
		async: false,
		url: base_url + "C_multitablas/actualizar",
		type: "POST",
		dataType: "json",
		data: {
			id_multitabla: id_multitabla,
			abreviatura: abreviatura,
			descripcion: descripcion,
			id_dmultitabla_actualizar: id_dmultitabla_actualizar,
			abreviatura_actualizar: abreviatura_actualizar,
			descripcion_actualizar: descripcion_actualizar,
			id_dmultitabla_eliminar: id_dmultitabla_eliminar

		},
		success: function (data) {
			debugger;
			window.location.href = base_url + "C_multitablas";
			debugger;
		},
	});
});

$(document).on("click", ".button_actualizar_fila", function () {

	$(this).closest('tr').find('#abreviatura').attr("readonly", false);
	$(this).closest('tr').find('#descripcion').attr("readonly", false);
	$(this).removeClass('btn btn-outline-warning button_actualizar_fila').addClass('btn btn-outline-primary button_guardar_fila').find('span').removeClass('far fa-edit').addClass('far fa-save');

});

$(document).on("click", ".button_guardar_fila", function () {

	$(this).closest('tr').find('#abreviatura').attr("readonly", true);
	$(this).closest('tr').find('#descripcion').attr("readonly", true);
	$(this).removeClass('btn btn-outline-primary button_guardar_fila').addClass('btn btn-outline-warning button_actualizar_fila').find('span').removeClass('far fa-save').addClass('far fa-edit');

	var id_dmultitabla_actualizar = $(this).closest("tr").find("#id_dmultitabla_actualizar").val();
	var abreviatura_actualizar = $(this).closest("tr").find("#abreviatura").val();
	var descripcion_actualizar = $(this).closest("tr").find("#descripcion").val();

	$("#container_id_dmultitabla_actualizar tbody tr").each(function () {
		id_general_container = $(this).find("#id_dmultitabla_actualizar").val();
		if (id_general_container == id_dmultitabla_actualizar) {
			$(this).closest("tr").remove();
		}
	});

	html = "<tr>";
	html += "<input type='hidden' id='id_dmultitabla_actualizar' name ='id_dmultitabla_actualizar[]' value='" + id_dmultitabla_actualizar + "'>";
	html += "<input type='hidden' id='abreviatura_actualizar' name ='abreviatura_actualizar[]' value='" + abreviatura_actualizar + "'>";
	html += "<input type='hidden' id='descripcion_actualizar' name ='descripcion_actualizar[]' value='" + descripcion_actualizar + "'>";
	html += "</tr>";
	$("#container_id_dmultitabla_actualizar tbody").append(html);
});
