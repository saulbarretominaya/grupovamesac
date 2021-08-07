//Declaracion de variables Globales
var resultado_campo = "";

$(document).ready(function () {
	var table = $("#id_datatable_productos").dataTable({
		//scrollY: true,
		scrollX: true,
		scrollCollapse: true,
		paging: true,
		searching: true,

		/*------------------*/
		/*initComplete: function () {
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
		}, */

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

		order: []
	});
});

$("#registrar_productos").on("click", function () {
	var codigo_producto = $("#codigo_producto").val();
	var descripcion_producto = $("#descripcion_producto").val();
	var id_almacen = $("#id_almacen").val();
	var id_unidad_medida = $("#id_unidad_medida").val();
	var precio_costo = $("#precio_costo").val();
	var porcentaje = $("#porcentaje").val();
	var precio_venta = $("#precio_venta").val();
	var rentabilidad = $("#rentabilidad").val();
	var id_moneda = $("#id_moneda").val();
	var ganancia_unidad = $("#ganancia_unidad").val();
	var id_grupo = $("#id_grupo").val();
	var id_familia = $("#id_familia").val();
	var id_clase = $("#id_clase").val();
	var id_sub_clase = $("#id_sub_clase").val();
	var id_sub_clase_dos = $("#id_sub_clase_dos").val();
	var id_marca = $("#id_marca").val();
	var id_cta_vta = $("#id_cta_vta").val();
	var id_cta_ent = $("#id_cta_ent").val();
	var id_sunat = $("#id_sunat").val();

	validar_radio();

	debugger;
	$.ajax({
		async: false,
		url: base_url + "C_productos/insertar",
		type: "POST",
		dataType: "json",
		data: {
			codigo_producto: codigo_producto,
			descripcion_producto: descripcion_producto,
			id_almacen: id_almacen,
			id_unidad_medida: id_unidad_medida,
			precio_costo: precio_costo,
			porcentaje: porcentaje,
			precio_venta: precio_venta,
			rentabilidad: rentabilidad,
			id_moneda: id_moneda,
			ganancia_unidad, ganancia_unidad,
			id_grupo: id_grupo,
			id_familia: id_familia,
			id_clase: id_clase,
			id_sub_clase: id_sub_clase,
			id_sub_clase_dos: id_sub_clase_dos,
			id_marca: id_marca,
			id_cta_vta: id_cta_vta,
			id_cta_ent: id_cta_ent,
			id_sunat: id_sunat,
			resultado_campo: resultado_campo
		},
		success: function (data) {
			debugger;
			window.location.href = base_url + "C_productos";
		},
	});
});

$("#actualizar_productos").on("click", function () {
	var id_producto = $("#id_producto").val();
	var codigo_producto = $("#codigo_producto").val();
	var descripcion_producto = $("#descripcion_producto").val();
	var id_almacen = $("#id_almacen").val();
	var id_unidad_medida = $("#id_unidad_medida").val();
	var precio_costo = $("#precio_costo").val();
	var porcentaje = $("#porcentaje").val();
	var precio_venta = $("#precio_venta").val();
	var rentabilidad = $("#rentabilidad").val();
	var id_moneda = $("#id_moneda").val();
	var ganancia_unidad = $("#ganancia_unidad").val();
	var id_grupo = $("#id_grupo").val();
	var id_familia = $("#id_familia").val();
	var id_clase = $("#id_clase").val();
	var id_sub_clase = $("#id_sub_clase").val();
	var id_sub_clase_dos = $("#id_sub_clase_dos").val();
	var id_marca = $("#id_marca").val();
	var id_cta_vta = $("#id_cta_vta").val();
	var id_cta_ent = $("#id_cta_ent").val();
	var id_sunat = $("#id_sunat").val();

	debugger;

	$.ajax({
		async: false,
		url: base_url + "C_productos/actualizar",
		type: "POST",
		dataType: "json",
		data: {
			id_producto:id_producto,
			codigo_producto: codigo_producto,
			descripcion_producto: descripcion_producto,
			id_almacen: id_almacen,
			id_unidad_medida: id_unidad_medida,
			precio_costo: precio_costo,
			porcentaje: porcentaje,
			precio_venta: precio_venta,
			rentabilidad: rentabilidad,
			id_moneda: id_moneda,
			ganancia_unidad, ganancia_unidad,
			id_grupo: id_grupo,
			id_familia: id_familia,
			id_clase: id_clase,
			id_sub_clase: id_sub_clase,
			id_sub_clase_dos: id_sub_clase_dos,
			id_marca: id_marca,
			id_cta_vta: id_cta_vta,
			id_cta_ent: id_cta_ent,
			id_sunat: id_sunat,
		},
		success: function (data) {
			debugger;
			window.location.href = base_url + "C_productos";
			debugger;
		},
	});
});

$(".select2").select2();

$("#porcentaje").on("keyup", function () {

	var precio_costo = Number($("#precio_costo").val());
	var porcentaje = $("#porcentaje").val();
	var ganancia_unidad = (precio_costo * porcentaje) / 100;
	var precio_venta = ganancia_unidad + precio_costo;
	var rentabilidad = (1 - precio_costo / precio_venta) * 100;
	$("input[name=ganancia_unidad]").val(ganancia_unidad.toFixed(2));
	$("input[name=precio_venta]").val(precio_venta);
	$("input[name=rentabilidad]").val(Math.round(rentabilidad));
});

$("#automatico").on("click", function () {

	resultado_campo = document.getElementById("manual").checked = false;
	document.getElementById("codigo_producto").readOnly = true;
	$.ajax({
		async: false,
		url: base_url + "C_productos/correlativo_producto",
		type: "POST",
		dataType: "json",
		data: {},
		success: function (data) {

			var correlativo_producto = data[0].correlativo_producto;
			$("input[name=codigo_producto]").val(correlativo_producto);

			//window.location.href = base_url + "C_productos";
		},
	});
});

$("#manual").on("click", function () {
	document.getElementById("automatico").checked = false;
	document.getElementById("codigo_producto").readOnly = false;
	document.getElementById("codigo_producto").value = "";
});


function validar_radio() {
	debugger;
	var automatico = document.getElementById("automatico").checked;

	if (automatico == true) {
		resultado_campo = "automatico";
	} else {
		resultado_campo = "manual";
	}
}
