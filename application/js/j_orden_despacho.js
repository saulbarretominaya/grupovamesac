

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
$(document).on("click", ".js_lupa_cotizacion", function () {
	debugger;
	valor_id = $(this).val();
	$.ajax({
		url: base_url + "C_cotizacion/index_modal",
		type: "POST",
		dataType: "html",
		data: {
			id_cotizacion: valor_id
		},
		success: function (data) {
			$("#id_target_cotizacion .modal-content").html(data);
		}
	});
});
/*Fin CRUD*/



/*Evento */
$(".btn_aprobar_estado").on("click", function (e) {

	debugger;
	var id_orden_despacho = $(this).parents("tr").find("td")[2].innerText;
	var estado_orden_despacho = $(this).parents("tr").find("td")[8].innerText;

	if (estado_orden_despacho == "PENDIENTE") {
		alertify.confirm("This is a confirm dialog.",
			function () {
				$.ajax({
					async: false,
					url: base_url + "C_orden_despacho/aprobar_estado",
					type: "POST",
					dataType: "json",
					data: {
						id_orden_despacho: id_orden_despacho,
					},
					success: function (data) {
						window.location.href = base_url + "C_orden_despacho";
					},
				});
			},
			function () {
			});
	} else {
		alert("Ya fue aprobado bateria! :D ")
	}



});
/* Fin Evento */



