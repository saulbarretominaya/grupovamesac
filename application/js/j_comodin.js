/* Variables Globales */
resultado_campo = true;
/*Fin de Variables Globales */

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

$("#registrar").on("click", function () {

	validar_registrar();

	if (resultado_campo == true) {

		var codigo_producto = $("#codigo_producto").val();
		var descripcion_producto = $("#descripcion_producto").val();
		var id_unidad_medida = $("#id_unidad_medida").val();
		var id_marca_producto = $("#id_marca_producto").val();
		var precio_unitario = $("#precio_unitario").val();
		var id_moneda = $("#id_moneda").val();
		var nombre_proveedor = $("#nombre_proveedor").val();

		$.ajax({
			async: false,
			url: base_url + "C_comodin/insertar",
			type: "POST",
			dataType: "json",
			data: {
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

$("#actualizar").on("click", function () {

	validar_registrar();

	if (resultado_campo == true) {

		var id_comodin = $("#id_comodin").val();
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
	var descripcion_producto = $("#descripcion_producto").val();
	var id_unidad_medida = $("#id_unidad_medida").val();
	var id_marca_producto = $("#id_marca_producto").val();
	var precio_unitario = $("#precio_unitario").val();
	var id_moneda = $("#id_moneda").val();
	var nombre_proveedor = $("#nombre_proveedor").val();



	if (codigo_producto == "") {
		alert("Debe Ingresar Codigo Producto")
		resultado_campo = false;
	}
	else if (descripcion_producto == "") {
		alert("Debe Ingresar Nombre Producto")
		resultado_campo = false;
	}
	else if (nombre_proveedor == "") {
		alert("Debe Ingresar Nombre Proveedor")
		resultado_campo = false;
	}
	else if (id_marca_producto == 0) {
		alert("Debe seleccionar Marca Producto")
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






