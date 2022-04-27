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
		var id_almacen = $("#id_almacen").val();
		var id_unidad_medida = $("#id_unidad_medida").val();
		var precio_costo = $("#precio_costo").val();
		var precio_costo_replace = precio_costo.replaceAll(",", "");
		var porcentaje = $("#porcentaje").val();
		var precio_unitario = $("#precio_unitario").val();
		var precio_unitario_replace = precio_unitario.replaceAll(",", "");
		var rentabilidad = $("#rentabilidad").val();
		var id_moneda = $("#id_moneda").val();
		var ganancia_unidad = $("#ganancia_unidad").val();
		var ganancia_unidad_replace = ganancia_unidad.replaceAll(",", "");
		var id_grupo = $("#id_grupo").val();
		var id_familia = $("#id_familia").val();
		var id_clase = $("#id_clase").val();
		var id_sub_clase = $("#id_sub_clase").val();
		var id_sub_clase_dos = $("#id_sub_clase_dos").val();
		var id_marca_producto = $("#id_marca_producto").val();
		var id_cta_vta = $("#id_cta_vta").val();
		var id_cta_ent = $("#id_cta_ent").val();
		var id_sunat = $("#id_sunat").val();
		var id_trabajador = $("#id_trabajador").val();
		var ds_nombre_trabajador = $("#ds_nombre_trabajador").val();
		//Empresa
		var id_producto_empresa = $("#id_producto_empresa").val();
		var id_empresa = $("#id_empresa").val();

		validar_radio();

		$.ajax({
			async: false,
			url: base_url + "C_productos/registrar",
			type: "POST",
			dataType: "json",
			data: {
				codigo_producto: codigo_producto,
				descripcion_producto: descripcion_producto,
				id_almacen: id_almacen,
				id_unidad_medida: id_unidad_medida,
				precio_costo: precio_costo_replace,
				porcentaje: porcentaje,
				precio_unitario: precio_unitario_replace,
				rentabilidad: rentabilidad,
				id_moneda: id_moneda,
				ganancia_unidad: ganancia_unidad_replace,
				id_grupo: id_grupo,
				id_familia: id_familia,
				id_clase: id_clase,
				id_sub_clase: id_sub_clase,
				id_sub_clase_dos: id_sub_clase_dos,
				id_marca_producto: id_marca_producto,
				id_cta_vta: id_cta_vta,
				id_cta_ent: id_cta_ent,
				id_sunat: id_sunat,
				resultado_campo: resultado_campo,
				id_trabajador: id_trabajador,
				ds_nombre_trabajador: ds_nombre_trabajador,
				//empresa
				id_producto_empresa: id_producto_empresa,
				id_empresa: id_empresa
			},
			success: function (data) {
				debugger;
				window.location.href = base_url + "C_productos";
			},
		});
	}
});

$("#actualizar").on("click", function () {

	validar_registrar();

	if (resultado_campo == true) {

		var id_producto = $("#id_producto").val();
		var codigo_producto = $("#codigo_producto").val();
		var descripcion_producto = $("#descripcion_producto").val();
		var id_almacen = $("#id_almacen").val();
		var id_unidad_medida = $("#id_unidad_medida").val();
		var precio_costo = $("#precio_costo").val();
		var porcentaje = $("#porcentaje").val();
		var precio_unitario = $("#precio_unitario").val();
		var rentabilidad = $("#rentabilidad").val();
		var id_moneda = $("#id_moneda").val();
		var ganancia_unidad = $("#ganancia_unidad").val();
		var id_grupo = $("#id_grupo").val();
		var id_familia = $("#id_familia").val();
		var id_clase = $("#id_clase").val();
		var id_sub_clase = $("#id_sub_clase").val();
		var id_sub_clase_dos = $("#id_sub_clase_dos").val();
		var id_marca_producto = $("#id_marca_producto").val();
		var id_cta_vta = $("#id_cta_vta").val();
		var id_cta_ent = $("#id_cta_ent").val();
		var id_sunat = $("#id_sunat").val();


		$.ajax({
			async: false,
			url: base_url + "C_productos/actualizar",
			type: "POST",
			dataType: "json",
			data: {
				id_producto: id_producto,
				codigo_producto: codigo_producto,
				descripcion_producto: descripcion_producto,
				id_almacen: id_almacen,
				id_unidad_medida: id_unidad_medida,
				precio_costo: precio_costo,
				porcentaje: porcentaje,
				precio_unitario: precio_unitario,
				rentabilidad: rentabilidad,
				id_moneda: id_moneda,
				ganancia_unidad, ganancia_unidad,
				id_grupo: id_grupo,
				id_familia: id_familia,
				id_clase: id_clase,
				id_sub_clase: id_sub_clase,
				id_sub_clase_dos: id_sub_clase_dos,
				id_marca_producto: id_marca_producto,
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
	}
});

$(".select2").select2({
	theme: "bootstrap4"
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

	var automatico = document.getElementById("automatico").checked;

	if (automatico == true) {
		resultado_campo = "automatico";
	} else {
		resultado_campo = "manual";
	}
}

$("#precio_costo").on({

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

$("#porcentaje").on({
	"focus": function (event) {
		$(event.target).select();
	},
	"keyup": function (event) {
		$(event.target).val(function (index, value) {
			return value.replace(/\D/g, "")
			// .replace(/([0-9])([0-9]{2})$/, '$1.$2');
			// .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
		});
	}
});

$("#descripcion_producto").on({
	"focus": function (event) {
		$(event.target).select();
	},
	"keyup": function (event) {
		$(event.target).val(function (index, value) {
			return value.replace(/'/g, '')
				.replace(/"/g, '');
			// .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
		});
	}
});

$("#precio_costo").on("keyup", function () {

	debugger;
	var precio_costo = $("#precio_costo").val();

	if (precio_costo == "") {
		debugger;
		$("input[name=precio_unitario]").val("");
		$("input[name=ganancia_unidad]").val("");
		$("input[name=rentabilidad]").val("");
		$("input[name=porcentaje]").val("");

	}

	valor = Number(precio_costo.replace(/,/g, ''));

	var porcentaje = Number($("#porcentaje").val());
	var ganancia_unidad = Number((valor * porcentaje) / 100);
	var precio_unitario = Number(ganancia_unidad + valor);
	var rentabilidad = (1 - valor / precio_unitario) * 100;

	if (isNaN(ganancia_unidad)) {
		console.log("Is Nan Rentabilidad")
	} else if (isNaN(precio_unitario)) {
		console.log("Is Nan Precio Venta")
	} else if (isNaN(rentabilidad)) {
		console.log("Is Nan Rentabilidad")
	} else {

		/* Precio Venta */
		let inputNum = precio_unitario;
		inputNum = inputNum.toString()
		inputNum = inputNum.split('.')
		if (!inputNum[1]) {
			inputNum[1] = '00'
		}
		let separados
		if (inputNum[0].length > 3) {
			let uno = inputNum[0].length % 3
			if (uno === 0) {
				separados = []
			} else {
				separados = [inputNum[0].substring(0, uno)]
			}
			let posiciones = parseInt(inputNum[0].length / 3)
			for (let i = 0; i < posiciones; i++) {
				let pos = ((i * 3) + uno)
				console.log(uno, pos)
				separados.push(inputNum[0].substring(pos, (pos + 3)))
			}
		} else {
			separados = [inputNum[0]]
		}
		precio_unitario_final = separados.join(',') + '.' + inputNum[1];
		/* Fin de precio venta */

		/* Ganancia Unidad */
		let inputNum1 = ganancia_unidad;
		inputNum1 = inputNum1.toString()
		inputNum1 = inputNum1.split('.')
		if (!inputNum1[1]) {
			inputNum1[1] = '00'
		}
		let separados1
		if (inputNum1[0].length > 3) {
			let uno = inputNum1[0].length % 3
			if (uno === 0) {
				separados1 = []
			} else {
				separados1 = [inputNum1[0].substring(0, uno)]
			}
			let posiciones1 = parseInt(inputNum1[0].length / 3)
			for (let i = 0; i < posiciones1; i++) {
				let pos = ((i * 3) + uno)
				console.log(uno, pos)
				separados1.push(inputNum1[0].substring(pos, (pos + 3)))
			}
		} else {
			separados1 = [inputNum1[0]]
		}

		ganancia_unidad_final = separados1.join(',') + '.' + inputNum1[1];

		/* Fin de precio venta */

		$("input[name=ganancia_unidad]").val(ganancia_unidad_final);
		$("input[name=precio_unitario]").val(precio_unitario_final);
		$("input[name=rentabilidad]").val(Math.round(rentabilidad));
	}

});

$("#porcentaje").on("keyup", function () {

	var precio_costo = $("#precio_costo").val();

	valor = Number(precio_costo.replace(/,/g, ''));

	var porcentaje = Number($("#porcentaje").val());
	var ganancia_unidad = Number((valor * porcentaje) / 100);
	var precio_unitario = Number(ganancia_unidad + valor);
	var rentabilidad = (1 - valor / precio_unitario) * 100;

	if (isNaN(ganancia_unidad)) {
		console.log("Is Nan Rentabilidad")
	} else if (isNaN(precio_unitario)) {
		console.log("Is Nan Precio Venta")
	} else if (isNaN(rentabilidad)) {
		console.log("Is Nan Rentabilidad")
	} else {

		/* Precio Venta */
		let inputNum = precio_unitario;
		inputNum = inputNum.toString()
		inputNum = inputNum.split('.')
		if (!inputNum[1]) {
			inputNum[1] = '00'
		}
		let separados
		if (inputNum[0].length > 3) {
			let uno = inputNum[0].length % 3
			if (uno === 0) {
				separados = []
			} else {
				separados = [inputNum[0].substring(0, uno)]
			}
			let posiciones = parseInt(inputNum[0].length / 3)
			for (let i = 0; i < posiciones; i++) {
				let pos = ((i * 3) + uno)
				console.log(uno, pos)
				separados.push(inputNum[0].substring(pos, (pos + 3)))
			}
		} else {
			separados = [inputNum[0]]
		}
		precio_unitario_final = separados.join(',') + '.' + inputNum[1];
		/* Fin de precio venta */

		/* Ganancia Unidad */
		let inputNum1 = ganancia_unidad;
		inputNum1 = inputNum1.toString()
		inputNum1 = inputNum1.split('.')
		if (!inputNum1[1]) {
			inputNum1[1] = '00'
		}
		let separados1
		if (inputNum1[0].length > 3) {
			let uno = inputNum1[0].length % 3
			if (uno === 0) {
				separados1 = []
			} else {
				separados1 = [inputNum1[0].substring(0, uno)]
			}
			let posiciones1 = parseInt(inputNum1[0].length / 3)
			for (let i = 0; i < posiciones1; i++) {
				let pos = ((i * 3) + uno)
				console.log(uno, pos)
				separados1.push(inputNum1[0].substring(pos, (pos + 3)))
			}
		} else {
			separados1 = [inputNum1[0]]
		}

		ganancia_unidad_final = separados1.join(',') + '.' + inputNum1[1];

		/* Fin de precio venta */

		$("input[name=ganancia_unidad]").val(ganancia_unidad_final);
		$("input[name=precio_unitario]").val(precio_unitario_final);
		$("input[name=rentabilidad]").val(Math.round(rentabilidad));
	}

});

function validar_registrar() {

	var codigo_producto = $('#codigo_producto').val();
	var id_almacen = $('#id_almacen').val();
	var id_unidad_medida = $('#id_unidad_medida').val();
	var id_sunat = $('#id_sunat').val();
	var descripcion_producto = $('#descripcion_producto').val();
	var id_moneda = $('#id_moneda').val();
	var precio_costo = $('#precio_costo').val();
	var id_marca_producto = $('#id_marca_producto').val();


	if (codigo_producto == "") {
		alert("Debe ingresar Codigo Producto")
		resultado_campo = false;
	}
	else if (id_almacen == 0) {
		alert("Debe seleccionar Almacen")
		resultado_campo = false;
	}
	else if (id_unidad_medida == 0) {
		alert("Debe seleccionar Unidad Medida")
		resultado_campo = false;
	}
	else if (id_sunat == 0) {
		alert("Debe seleccionar Codigo Sunat")
		resultado_campo = false;
	}
	else if (descripcion_producto == "") {
		alert("Debe ingresar Nombre Producto")
		resultado_campo = false;
	}
	else if (id_moneda == 0) {
		alert("Debe seleccionar Moneda")
		resultado_campo = false;
	}
	else if (precio_costo == 0) {
		alert("Debe ingresar Precio Costo")
		resultado_campo = false;
	}
	else if (id_marca_producto == 0) {
		alert("Debe seleccionar Marca Producto")
		resultado_campo = false;
	}
	else {
		resultado_campo = true;
	}
}