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
                        window.location = "aplicativo.php?tabla=copropiedades"
                    },2000)
                    }
            },
            timeout: 4000,
            error: function(){console.log("han habido problemas");}
          });
    })
})