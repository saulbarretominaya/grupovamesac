

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

	var id_orden_despacho = $(this).parents("tr").find("td")[2].innerText;
	var estado_orden_despacho = $(this).parents("tr").find("td")[8].innerText;

	var id_cliente_proveedor = $(this).parents("tr").find(document.getElementsByName("id_cliente_proveedor")).val();
	var linea_credito_dolares = $(this).parents("tr").find(document.getElementsByName("linea_credito_dolares")).val();
	var credito_unitario_dolares = $(this).parents("tr").find(document.getElementsByName("credito_unitario_dolares")).val();
	var disponible_dolares = $(this).parents("tr").find("td")[5].innerText;
	var monto_cotizacion = $(this).parents("tr").find("td")[7].innerText;

	var nueva_linea_credito = Number(disponible_dolares) - Number(monto_cotizacion)

	debugger;


	if (estado_orden_despacho == "PENDIENTE") {
		alertify.confirm("Esta seguro de aprobar la linea de credito",
			function () {
				$.ajax({
					async: false,
					url: base_url + "C_orden_despacho/aprobar_estado",
					type: "POST",
					dataType: "json",
					data: {
						id_orden_despacho: id_orden_despacho,
						id_cliente_proveedor: id_cliente_proveedor,
						nueva_linea_credito: nueva_linea_credito,
						monto_cotizacion: monto_cotizacion
					},
					success: function (data) {
						window.location.href = base_url + "C_orden_despacho";
					},
				});
			},
			function () {
			});
	} else if (estado_orden_despacho == "APROBADO") {
		alert("Ya fue Aprobado")
	} else if (estado_orden_despacho == "DESAPROBADO") {
		alert("Ya fue Desaprobado")
	} else if (estado_orden_despacho == "DESAPROBADO") {
		alert("Ya fue Desaprobado")
	}
});

$(".btn_desaprobar_estado").on("click", function (e) {

	debugger;
	var id_orden_despacho = $(this).parents("tr").find("td")[2].innerText;
	var id_cotizacion = $(this).parents("tr").find("td")[0].innerText;

	var estado_orden_despacho = $(this).parents("tr").find("td")[8].innerText;

	if (estado_orden_despacho == "PENDIENTE") {
		alertify.confirm("Seguro que desea desaprobarlo?",
			function () {
				$.ajax({
					async: false,
					url: base_url + "C_orden_despacho/desaprobar_estado",
					type: "POST",
					dataType: "json",
					data: {
						id_orden_despacho: id_orden_despacho,
						id_cotizacion: id_cotizacion
					},
					success: function (data) {
						window.location.href = base_url + "C_orden_despacho";
					},
				});
			},
			function () {
			});
	} else if (estado_orden_despacho == "APROBADO") {
		alert("Ya fue Aprobado")
	} else if (estado_orden_despacho == "DESAPROBADO") {
		alert("Ya fue Desaprobado")
	}
});

/* Fin Evento */



