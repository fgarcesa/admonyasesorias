$(document).ready(function(){	
	
	$("#boton-agregar").click(function(){
		
		var nit = $("#inputnit").val()
		var nombre = $("#inputnombre").val()
		var direccion = $("#inputdireccion").val()
		var telefono = $("#inputtelefono").val()
		var ciudad = $("#inputciudad").val()
		var fecha = $("#inputfecha").val()

		$.ajax({
                url: `./php/archive.php` + `?nit="` + nit + `"&nombre="` + nombre + `"&direccion="` + direccion + `"&telefono="` + telefono + `"&ciudad="` + ciudad + `"&fecha="` + fecha + `"`,                
                success: function(e){console.log(e);},
                timeout: 4000,
                error: function(){console.log("han habido problemas");}
              });
	})
})