<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Carta</title>
</head>
<body>
    <?php var_export($_POST)?>
    <h1 align="center">Crear Carta</h1>
    <h3 id="err"></h3>
    <form id="form2" method="POST" action="crearcarta.php">
        <p>NOMBRE:&nbsp;<input type="text" name="name" maxlength="20"/></p>
        <p>AÑO:&nbsp;<input type="text" name="anio" maxlength="11"/></p>
        <p>IMAGEN:&nbsp;<input type="file" id="img" name="img" accept="image/png, image/jpeg"></p><br/>
        <center><button type="button" id="crearBut">CREAR</button></center>
    </form>
</body>
</html>