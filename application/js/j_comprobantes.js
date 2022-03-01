/* Variables Globales */
resultado_campo = true;
/*Fin de Variables Globales */

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
$("#registrar").on("click", function () {

	//validar_registrar();
	if (resultado_campo == true) {

		//Cabecera
		var id_tipo_comprobante = $("#id_tipo_comprobante").val();
		var ds_tipo_comprobante = $('#id_tipo_comprobante option:selected').text();
		var fecha_emision = $("#fecha_emision").val();
		var dias = $("#dias").val();
		var fecha_vencimiento = $("#fecha_vencimiento").val();
		var orden_compra = $("#orden_compra").val();
		var id_condicion_pago = $("#id_condicion_pago").val();
		var ds_condicion_pago = $('#id_condicion_pago option:selected').text();
		var monto_total_condicion_pago = $("#monto_total_condicion_pago").val();
		var observacion = $("#observacion").val();
		var id_guia_remision = $("#id_guia_remision").val();

		//Detalle condicion_pago
		var fecha_cuota = Array.prototype.slice.call(document.getElementsByName("fecha_cuota[]")).map((o) => o.value);
		var monto_cuota = Array.prototype.slice.call(document.getElementsByName("monto_cuota[]")).map((o) => o.value);

		$.ajax({
			async: false,
			url: base_url + "C_comprobantes/registrar",
			type: "POST",
			dataType: "json",
			data: {
				//Cabecera
				id_tipo_comprobante: id_tipo_comprobante,
				ds_tipo_comprobante: ds_tipo_comprobante,
				fecha_emision: fecha_emision,
				dias: dias,
				fecha_vencimiento: fecha_vencimiento,
				orden_compra: orden_compra,
				id_condicion_pago: id_condicion_pago,
				ds_condicion_pago: ds_condicion_pago,
				monto_total_condicion_pago: monto_total_condicion_pago,
				observacion: observacion,
				id_guia_remision: id_guia_remision,

				//Detalle condicion pago
				fecha_cuota: fecha_cuota,
				monto_cuota: monto_cuota
			},
			success: function (data) {
				debugger;
				window.location.href = base_url + "C_comprobantes";
			},
		});
	};
});
/*Fin CRUD*/



/*Evento */

$("#dias").on("keyup", function () {
	calcular_fecha_condicion_pago();
});
$("#id_agregar_condicion_pago").on("click", function (e) {

	validar_detalle_condicion_pago();

	var fecha_cuota = $("#fecha_cuota").val();
	var fecha_split = fecha_cuota.split("-");
	var fecha_cuota = fecha_split[2] + '/' + fecha_split[1] + '/' + fecha_split[0];

	var monto_cuota = $("#monto_cuota").val();

	if (resultado_campo == true) {
		html = "<tr>";
		html += "<td><input type='hidden' name='fecha_cuota[]' value='" + fecha_cuota + "'>" + fecha_cuota + "</td>";
		html += "<td><input type='hidden' name='monto_cuota[]' value='" + monto_cuota + "'>" + monto_cuota + "</td>";
		html += "<td><button type='button' class='btn btn-outline-danger btn-sm eliminar_fila_condicion_pago'><span class='fas fa-trash-alt'></span></button></td>";
		html += "</tr>";
		$("#id_table_detalle_condicion_pago tbody").append(html);
		limpiar_campos_condicion_pago();

	}
});
$(document).on("click", ".eliminar_fila_condicion_pago", function () {

	var id_detalle = $(this).closest("tr").find("#value_id_solicitud").val();
	html =
		"<input type='hidden' id='id_solicitud_to_remove' name ='id_solicitud_to_remove[]' value='" +
		id_detalle +
		"'>";

	$("#container_solicitud_id_remove").append(html);
	$(this).closest("tr").remove();
	calcular_sumatoria_cuotas_eliminar_detalle();

});
/* Fin Evento */



/* Funciones */
function calcular_fecha_condicion_pago() {
	//let num = parseInt(frm.fechsa.value);
	var num = parseInt(document.getElementById("dias").value);

	// la fecha viene en formato yyyy-mm-dd
	var f = document.getElementById("fecha_emision").value;

	var fecha = new Date(f);
	fecha.setDate(fecha.getDate() + num);

	var mes = fecha.getUTCMonth() + 1;
	if (mes <= 9) mes = '0' + mes;

	var dia = fecha.getUTCDate();
	if (dia <= 9) dia = '0' + dia;

	if (isNaN(num)) {
		$("#fecha_vencimiento").val("");
	} else {
		document.getElementById("fecha_vencimiento").value = (dia + '/' + mes + '/' + fecha.getUTCFullYear());
	}
}
function validar_detalle_condicion_pago() {

	var monto_cuota = $("#monto_cuota").val();
	var fecha_cuota = $("#fecha_cuota").val();


	if (isNaN(monto_cuota)) {
		alert("A ingresado un monto incorrecto");
		$("#monto_cuota").val("");
		resultado_campo = false;
	}
	else if (fecha_cuota == "") {
		alert("Ingrese Fecha de Condicion Pago");
		resultado_campo = false;
	}
	else if (monto_cuota == "") {
		alert("Ingrese Monto de Condicion Pago");
		resultado_campo = false;
	}
	else {
		calcular_sumatoria_cuotas();
	}
}
function validar_registrar() {

	var id_tipo_comprobante = $("#id_tipo_comprobante").val();
	var dias = $("#dias").val();
	var orden_compra = $("#orden_compra").val();
	var id_condicion_pago = $("#id_condicion_pago").val();
	var count_detalle_condicion_pago = $('#id_table_detalle_condicion_pago tr').length;
	var precio_venta_detalle_comprobante = Number($("#precio_venta").val());
	var monto_total_detalle_condicion_pago = Number($("#precio_final_final").html());


	if (id_tipo_comprobante == 0) {
		alert("Seleccione Tipo Comprobante")
		resultado_campo = false;
	}
	else if (dias == "") {
		alert("Registre # Dias")
		resultado_campo = false;
	}
	else if (orden_compra == "") {
		alert("Registre Orden Compra")
		resultado_campo = false;
	}
	else if (id_condicion_pago == 0) {
		alert("Seleccione Condicion Pago")
		resultado_campo = false;
	}
	else if (count_detalle_condicion_pago == "2") {
		alertify.dialog('alert').set({ transition: 'zoom', message: 'Debe ingresar Condicion de Pago', title: 'CONDICION DE PAGOS' }).show();
		resultado_campo = false;
	}
	else if (precio_venta_detalle_comprobante != monto_total_detalle_condicion_pago) {
		alert("El Monto Total de la Condicion de Pago, no coincide con el Precio Venta del Detalle Comprobante");
		resultado_campo = false;
	}
	else {
		resultado_campo = true;
	}
}
function calcular_sumatoria_cuotas() {
	var acumulador = 0;
	var precio_venta = Number($("#precio_venta").val());
	var nuevo_monto_ingresante = Number($("#monto_cuota").val());

	$("#id_table_detalle_condicion_pago tbody tr").each(function () {
		var posicion_valor_tabla = Number($(this).find("td:eq(1)").text());
		acumulador = (acumulador + posicion_valor_tabla)
	});

	monto_total_sumatorio_cuotas = acumulador + nuevo_monto_ingresante;

	if (monto_total_sumatorio_cuotas > precio_venta) {
		alert("A superado la suma de cuotas");
		resultado_campo = false;
	} else {
		$("#precio_final_final").text(monto_total_sumatorio_cuotas);
		resultado_campo = true;
	}

}
function calcular_sumatoria_cuotas_eliminar_detalle() {
	var acumulador = 0;

	$("#id_table_detalle_condicion_pago tbody tr").each(function () {

		var posicion_valor_tabla = Number($(this).find("td:eq(1)").text());
		acumulador = (acumulador + posicion_valor_tabla)
	});


	$("#precio_final_final").text(acumulador);

}
function limpiar_campos_condicion_pago() {

	$("#fecha_cuota").val("");
	$("#monto_cuota").val("");

}
/* Fin Funciones */


/* Otros */
$(".select2").select2({
	theme: "bootstrap4"
});
/* Fin de Otros */