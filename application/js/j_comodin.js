/* Variables Globales */
resultado_campo = true;
/*Fin de Variables Globales */

$(document).ready(function () {
	debugger;

	var accion = $('#id_actualizar').val();
	var ds_categoria_comodin = $('#id_categoria_comodin option:selected').text();

	if (accion == "ACTUALIZAR") {
		if (ds_categoria_comodin == "OTROS CONCEPTOS") {
			$("#nombre_proveedor").attr("readonly", true);
			$("#id_marca_producto").attr("disabled", true);
			$("#id_unidad_medida").attr("disabled", true);
		} else if (ds_categoria_comodin == "PRODUCTOS") {
			$("#nombre_proveedor").attr("readonly", false);
			$("#id_marca_producto").attr("disabled", false);
			$("#id_unidad_medida").attr("disabled", false);
		} else {
			$("#nombre_proveedor").attr("readonly", false);
			$("#id_marca_producto").attr("disabled", false);
			$("#id_unidad_medida").attr("disabled", false);
		}
	}
});

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

$("#id_categoria_comodin").on("change", function () {

	var ds_categoria_comodin = $('#id_categoria_comodin option:selected').text();

	debugger;

	if (ds_categoria_comodin == "OTROS CONCEPTOS") {
		$("#nombre_proveedor").attr("readonly", true);
		$("#id_marca_producto").attr("disabled", true);
		$("#id_unidad_medida").attr("disabled", true);
		$("#nombre_proveedor").val("");
		$("#codigo_producto").val("");
		$("#descripcion_producto").val("");
		$("#id_marca_producto").select2("val", "0");
		$("#id_unidad_medida").select2("val", "0");
		$("#id_moneda").select2("val", "0");
		$("#precio_unitario").val("");

	} else if (ds_categoria_comodin == "PRODUCTOS") {
		$("#codigo_producto").val("");
		$("#descripcion_producto").val("");
		$("#nombre_proveedor").val("");
		$("#nombre_proveedor").attr("readonly", false);
		$("#id_marca_producto").attr("disabled", false);
		$("#id_unidad_medida").attr("disabled", false);
		$("#id_marca_producto").select2("val", "0");
		$("#id_unidad_medida").select2("val", "0");
		$("#id_moneda").select2("val", "0");
		$("#precio_unitario").val("");

	} else {
		$("#nombre_proveedor").attr("readonly", false);
		$("#id_marca_producto").attr("disabled", false);
		$("#id_unidad_medida").attr("disabled", false);
	}
});

$("#registrar").on("click", function () {

	validar_registrar();

	if (resultado_campo == true) {

		var id_categoria_comodin = $("#id_categoria_comodin").val();
		var codigo_producto = $("#codigo_producto").val();
		var descripcion_producto = $("#descripcion_producto").val();
		var id_unidad_medida = $("#id_unidad_medida").val();
		var id_marca_producto = $("#id_marca_producto").val();
		var precio_unitario = $("#precio_unitario").val();
		var id_moneda = $("#id_moneda").val();
		var nombre_proveedor = $("#nombre_proveedor").val();
		var id_trabajador = $("#id_trabajador").val();
		var ds_nombre_trabajador = $("#ds_nombre_trabajador").val();
		//Empresa
		var id_comodin_empresa = $("#id_comodin_empresa").val();
		var id_empresa = $("#id_empresa").val();


		$.ajax({
			async: false,
			url: base_url + "C_comodin/registrar",
			type: "POST",
			dataType: "json",
			data: {
				id_categoria_comodin: id_categoria_comodin,
				codigo_producto: codigo_producto,
				descripcion_producto: descripcion_producto,
				id_unidad_medida: id_unidad_medida,
				id_marca_producto: id_marca_producto,
				precio_unitario: precio_unitario,
				id_moneda: id_moneda,
				nombre_proveedor: nombre_proveedor,
				id_trabajador: id_trabajador,
				ds_nombre_trabajador: ds_nombre_trabajador,
				id_comodin_empresa: id_comodin_empresa,
				id_empresa: id_empresa
			},
			success: function (data) {
				window.location.href = base_url + "C_comodin";
			},
		});
	}
});

$("#actualizar").on("click", function () {

	validar_registrar();

	if (resultado_campo == true) {

		var id_comodin = $("#id_comodin").val();
		var id_categoria_comodin = $("#id_categoria_comodin").val();
		var codigo_producto = $("#codigo_producto").val();
		var descripcion_producto = $("#descripcion_producto").val();
		var id_unidad_medida = $("#id_unidad_medida").val();
		var id_marca_producto = $("#id_marca_producto").val();
		var precio_unitario = $("#precio_unitario").val();
		var id_moneda = $("#id_moneda").val();
		var nombre_proveedor = $("#nombre_proveedor").val();

		$.ajax({
			async: false,
			url: base_url + "C_comodin/actualizar",
			type: "POST",
			dataType: "json",
			data: {
				id_comodin: id_comodin,
				id_categoria_comodin: id_categoria_comodin,
				codigo_producto: codigo_producto,
				descripcion_producto: descripcion_producto,
				id_unidad_medida: id_unidad_medida,
				id_marca_producto: id_marca_producto,
				precio_unitario: precio_unitario,
				id_moneda: id_moneda,
				nombre_proveedor: nombre_proveedor,

			},
			success: function (data) {
				window.location.href = base_url + "C_comodin";
			},
		});
	}
});

function validar_registrar() {

	var codigo_producto = $("#codigo_producto").val();
	var id_categoria_comodin = $("#id_categoria_comodin").val();
	var descripcion_producto = $("#descripcion_producto").val();
	var id_unidad_medida = $("#id_unidad_medida").val();
	var id_marca_producto = $("#id_marca_producto").val();
	var precio_unitario = $("#precio_unitario").val();
	var id_moneda = $("#id_moneda").val();
	var nombre_proveedor = $("#nombre_proveedor").val();
	var ds_categoria_comodin = $('#id_categoria_comodin option:selected').text();


	if (ds_categoria_comodin == "PRODUCTOS") {

		if (id_categoria_comodin == 0) {
			alert("Debe seleccionar Categoria")
			resultado_campo = false;
		}
		else if (codigo_producto == "") {
			alert("Debe Ingresar Codigo")
			resultado_campo = false;
		}
		else if (descripcion_producto == "") {
			alert("Debe Ingresar Descripcion")
			resultado_campo = false;
		}
		else if (nombre_proveedor == "") {
			alert("Debe Ingresar Nombre Proveedor")
			resultado_campo = false;
		}
		else if (id_marca_producto == 0) {
			alert("Debe seleccionar Marca")
			resultado_campo = false;
		}
		else if (id_unidad_medida == 0) {
			alert("Debe seleccionar Unidad Medida")
			resultado_campo = false;
		}
		else if (id_moneda == 0) {
			alert("Debe seleccionar Moneda")
			resultado_campo = false;
		}
		else if (precio_unitario == 0) {
			alert("Debe ingresar Precio")
			resultado_campo = false;
		}
		else {
			resultado_campo = true;
		}
	} else if (ds_categoria_comodin == "OTROS CONCEPTOS") {
		if (id_categoria_comodin == 0) {
			alert("Debe seleccionar Categoria")
			resultado_campo = false;
		}
		else if (codigo_producto == "") {
			alert("Debe Ingresar Codigo")
			resultado_campo = false;
		}
		else if (descripcion_producto == "") {
			alert("Debe Ingresar Descripcion")
			resultado_campo = false;
		}
		else if (id_moneda == 0) {
			alert("Debe seleccionar Moneda")
			resultado_campo = false;
		}
		else if (precio_unitario == 0) {
			alert("Debe ingresar Precio")
			resultado_campo = false;
		}
		else {
			resultado_campo = true;
		}
	} else {
		alert("Debe seleccionar Categoria")
		resultado_campo = false;
	}

}

$("#precio_unitario").on({

	"focus": function (event) {
		$(event.target).select();
	},
	"keyup": function (event) {
		$(event.target).val(function (index, value) {
			return value.replace(/[^0-9,.]/g, '').replace(/,/g, '.');
			// .replace(/([0-9])([0-9]{2})$/, '$1.$2')
			// .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
		});
	}
});


/* Otros */
$(".select2").select2({
	theme: "bootstrap4"
});
/* Fin de Otros */






