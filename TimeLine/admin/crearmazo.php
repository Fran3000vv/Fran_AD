<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Mazo</title>
    <style>
        textarea {
            resize: none;
        }
        textarea:invalid {
            border: 2px dashed red;
        }

        textarea:valid {
            border: 2px solid gray;
        }
    </style>
    <script>
        function enviar(){
            if(document.querySelector("p").innerHTML!="")document.querySelector("#form1").submit()
        }
    </script>
</head>
<body>
    <?php
        require_once("../dbutils.php");
        if(isset($_POST["name"])&&crearMazo(conectarDB(),$_POST["name"],$_POST["desc"])!=0)echo "Mazo Creado Con Éxito";
    ?>
    <h1 align="center">Crear Mazo</h1>
    <form id="form1" method="POST" action="crearmazo.php">
        <p>NOMBRE:&nbsp;<input type="text" name="name" maxlength="20"/></p><br/>
        <p>DESCRIPCIÓN:&nbsp;<textarea form="form1" name="desc" maxlength="100" type="text" rows="4" cols="30"></textarea></p>
        <center><button type="button" id="crearBut" onclick="enviar()">CREAR</button></center>
    </form>
</body>
</html>