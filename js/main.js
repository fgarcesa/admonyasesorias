// FUNCION PARA AGREGAR EDIFICIOS A BASE SQL
$(document).ready(function(){	
	
	$("#boton-agregar").click(function(){
		
		var nit = $("#inputnit").val()
		var nombre = $("#inputnombre").val()
		var direccion = $("#inputdireccion").val()
		var telefono = $("#inputtelefono").val()
		var ciudad = $("#inputciudad").val()
		var fecha = $("#inputfecha").val()

		$.ajax({
                url: `./php/insertabase.php` + `?nit="` + nit + `"&nombre="` + nombre + `"&direccion="` + direccion + `"&telefono="` + telefono + `"&ciudad="` + ciudad + `"&fecha="` + fecha + `"`,                
                success: function(e){console.log(e);},
                timeout: 4000,
                error: function(){console.log("han habido problemas");}
              });
	})
})

// FUNCION PARA LOGIN
$(document).ready(function(){
    $("#enviar").click(function(){
        var usuario = $("#usuario").val();        
        var contrasena = $("#contrasena").val();
        
        // CARGA EN EL DIV RESULTADO LA CONSULTA DEL ARCHIVO LOGIN.PHP
        $("#resultado").load("php/login.php?usuario="+usuario+"&contrasena="+contrasena);
        
        // SE ENVIA POR AJAX USUARIO Y CONTRASEÑA SE HACE LA CONSULTA EN MYSQL, OK, LLEVA A PAGINA NUEVA
        // ERROR MUESTRA USUARIO INCORRECTO     
        $.ajax({
            url: "php/login.php?usuario="+usuario+"&contrasena="+contrasena,            
            success: function(e){
                if(e == "Redirigiendo"){
                    setTimeout(function(){
                        window.location = "aplicativo.php"
                    },2000)
                    }
            },
            timeout: 4000,
            error: function(){console.log("han habido problemas");}
          });
    })
})