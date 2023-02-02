<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        setTimeout(() => {
            let boton=document.querySelector("button")
            console.log(boton);
            boton.addEventListener("click",(e)=>{
            if(confirm("Seguro que quieres eliminar el Mazo?")){
                let foa=document.querySelector("#form3");
                foa.innerHTML+='<input type="hidden" name="mod" value="true"/>'
                foa.submit()
            }
            })
        }, 1000);
    </script>
    <h1 align="center">Modificar Mazo</h1>
    <form id="form3" method="POST" action="modmazo.php">
        <?php require_once("../dbutils.php");
            if(!isset($_POST["mazo"])||isset($_POST["mod"])){
                $con = conectarDB();
                if(isset($_POST["id"])){
                    updateMazo($con, $_POST["id"], $_POST["names"], $_POST["desc"]);
                    echo "Actualización Exitosa";
                }else if(isset($_POST["mod"])){
                    deleteMazo($con, $_POST["mazo"]);
                }
                echo '<center>ELIGE MAZO:&nbsp;<select name="mazo" id="mazo">';
                foreach (getAllMazos($con) as $it) {
                    echo "<option value='$it'>$it</option>";
                }
                echo '</select></center><br/><br/><br/><br/><center><button type="button" id="delBut">ELIMINAR</button><button type="submit">CARGAR DATOS</button></center>';
            }else{
                $mazo = getMazoName(conectarDB(), $_POST["mazo"]);
                echo '<input type="hidden" name="id" value="'.$mazo["ID"].'"/><p>NOMBRE:&nbsp;<input type="text" name="names" value="'.$mazo["NOMBRE"].'" maxlength="20"/></p><br/>
                <p>DESCRIPCIÓN:&nbsp;<textarea name="desc" maxlength="100" type="text" rows="4" cols="30">'.$mazo["DESCRIPCION"].'</textarea></p>
                <br/><br/><br/><br/><center><button type="submit">MODIFICAR</button></center>';
            }
        ?>
    </form>
</body>
</html>