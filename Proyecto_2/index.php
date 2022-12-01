<html>
    <head>
        <title>Time-Line inicio</title>
        <script>
            function validacion_envio(){
   	            //valido el nombre
   	            if (document.user.nombre.value.length==0){
      		        alert("Tiene que escribir su nombre")
      		        document.user.nombre.focus()
      		        return 0;
   	            }
                alert("Muchas gracias por enviar el formulario");
   	            document.user.submit();
            }
        </script>
        <style>

        </style>
    </head>
    <center>
        <body>
            <h1>Time Line</h1>
            <br>
            <p style="font-size: 20px;">Introduce tu nombre</p>
            <form action="juego.php" method="POST" name="user">
                <input type="text" size="20px" name="nombre"/>
                <input type="button" onclick="validacion_envio()" value="Aceptar"/>

            </form>
        </body>
    </center>
</html>