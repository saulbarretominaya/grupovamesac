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

$(document).on("click", ".btn_aprobar_estado", function () {

	debugger;

	var id_parcial_completa = $(this).closest('tr').find('#id_parcial_completa').val();
	var estado_orden = $(this).parents("tr").find("td")[9].innerText;


	if (estado_orden == "PENDIENTE") {
		alertify.confirm("Esta seguro que desea aprobarlo",
			function () {
				$.ajax({
					async: false,
					url: base_url + "C_parciales_completas/aprobar_estado",
					type: "POST",
					dataType: "json",
					data: {
						id_parcial_completa: id_parcial_completa,
					},
					success: function (data) {
						window.location.href = base_url + "C_parciales_completas";
					},
				});
			});
	} else if (estado_orden == "APROBADO") {
		alert("Ya fue Aprobado");
	} else if (estado_orden == "ANULADO") {
		alert("Ya fue Anulado");
	}

});
$(document).on("click", ".btn_anular_estado", function () {

	debugger;

	var id_parcial_completa = $(this).closest('tr').find('#id_parcial_completa').val();
	var estado_orden = $(this).parents("tr").find("td")[9].innerText;


	if (estado_orden == "PENDIENTE") {
		alertify.confirm("Esta seguro que desea anularlo",
			function () {
				$.ajax({
					async: false,
					url: base_url + "C_parciales_completas/anular_estado",
					type: "POST",
					dataType: "json",
					data: {
						id_parcial_completa: id_parcial_completa,
					},
					success: function (data) {
						window.location.href = base_url + "C_parciales_completas";
					},
				});
			});
	} else if (estado_orden == "APROBADO") {
		alert("Ya fue Aprobado");
	} else if (estado_orden == "ANULADO") {
		alert("Ya fue Anulado");
	}

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

