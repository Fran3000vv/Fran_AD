<!--




        Diseñado Para un csv ordenado por fechas(Que pensé que ya estaba ordenado🙄🤦🏽‍♂️)
        Adaptado para implementar un móntón de estetica fácilmente en un futuro a nivel lógico(Las Imágenes se pueden
        convertir a divs facilmente creando unos divvs y cambiando su clase metiendo y quitando un opacidad 0 dependiendo
        de su src es el de fondo.png o otro, y con un buen csv se puede matizar ya bien las demas cosas teniendo arrays
        de los años y de los títulos, incluso linkedlist si se pueden, aunque sino varias arrays normales y ya)





-->
<html>
<head>
        <link rel = "StyleSheet" href = "estilos/juego.css" type = "text/css">
        <link rel = "StyleSheet" href = "estilos/estilos.css" type = "text/css">
        <?php
            $cartas_sin_fecha = array("imagenes/1_1.png","imagenes/2_1.png","imagenes/3_1.png","imagenes/4_1.png","imagenes/5_1.png",
                                    "imagenes/6_1.png","imagenes/7_1.png","imagenes/8_1.png","imagenes/9_1.png","imagenes/10_1.png",
                                    "imagenes/11_1.png","imagenes/12_1.png","imagenes/13_1.png","imagenes/14_1.png","imagenes/15_1.png",
                                    "imagenes/16_1.png","imagenes/17_1.png","imagenes/18_1.png","imagenes/19_1.png","imagenes/20_1.png",
                                    "imagenes/21_1.png","imagenes/22_1.png","imagenes/23_1.png","imagenes/24_1.png","imagenes/25_1.png",
                                    "imagenes/26_1.png","imagenes/27_1.png","imagenes/28_1.png","imagenes/29_1.png","imagenes/30_1.png",
                                    "imagenes/31_1.png","imagenes/32_1.png","imagenes/33_1.png","imagenes/34_1.png","imagenes/35_1.png",
                                    "imagenes/36_1.png","imagenes/37_1.png","imagenes/38_1.png","imagenes/39_1.png","imagenes/40_1.png",
                                    "imagenes/41_1.png","imagenes/42_1.png","imagenes/43_1.png","imagenes/44_1.png","imagenes/45_1.png",
                                    "imagenes/46_1.png","imagenes/47_1.png","imagenes/48_1.png","imagenes/49_1.png","imagenes/50_1.png");
            if(isset($_POST["vidas"])){
                $vidas=$_POST["vidas"];
            }else{
                $vidas = 3;
            }
            if(isset($_POST["correcto"])){
                if($_POST["correcto"]=="true"){
                    $vidas-=1;
                }
            }
            $select=0;
            if(isset($_POST["seleccion"])){
                $select=$_POST["seleccion"];

            }
            $cartas_mesa = array();
            if(isset($_POST["mesa"])){
                $cartas_mesa=$_POST["mesa"];
            }else{
                array_push($cartas_mesa,rand(0,49));
            }
            $cartas_actuales = array();
            if(isset($_POST["mano"])){
                $cartas_actuales=$_POST["mano"];
                if($select>0&&$select<=count($_POST["mano"])){
                    array_push($cartas_mesa, $cartas_actuales[$select-1]);
                    unset($cartas_actuales[$select-1]);
                }
                if($_POST["correcto"]=="false"){
                    while(count($cartas_actuales)<$vidas) { 
                        $carta = rand(0,49);
                        if (!in_array($carta, $cartas_actuales)&&!in_array($carta, $cartas_mesa)) {
                            array_push($cartas_actuales, $carta);
                        }
                    }
                }
            }else{
                while(count($cartas_actuales)<$vidas) { 
                    $carta = rand(0,49);
                    if (!in_array($carta, $cartas_actuales)&&!in_array($carta, $cartas_mesa)) {
                        array_push($cartas_actuales, $carta);
                    }
                }
            }
            natcasesort($cartas_mesa);
            $cartas_actuales=array_values($cartas_actuales);
        ?>
        <script>
            const prueba=<?php echo json_encode($cartas_mesa)?>;
            console.log(prueba)
            let fotos_total=[ <?php 
                foreach($cartas_mesa as $val){
                    echo "'$cartas_sin_fecha[$val]', ";
                }
            ?> ];
            let fotos=[null,null,null,null,null,null];
            if(fotos_total.length<=2){
                fotos[2]=fotos_total[0];
                fotos[3]=fotos_total[1];
            }else if(fotos_total.length<=4){
                fotos[1]=fotos_total[0];
                fotos[2]=fotos_total[1];
                fotos[3]=fotos_total[2];
                fotos[4]=fotos_total[3];
            }else{
                fotos[0]=fotos_total[0];
                fotos[1]=fotos_total[1];
                fotos[2]=fotos_total[2];
                fotos[3]=fotos_total[3];
                fotos[4]=fotos_total[4];
                fotos[5]=fotos_total[5];
            }
            function sumar(){ 
                console.log(fotos_total)
                console.log(fotos);
                console.log(fotos.length);
                if(fotos[2]!=null){
                    for (let i = fotos.length-1; i >=0 ; i--) {
                        if(fotos_total.indexOf(fotos[i])==0||fotos_total.indexOf(fotos[i])<0&&fotos_total.indexOf(fotos[i-1])==-1){
                            fotos[i]=null;
                            continue;
                        }
                        fotos[i]=fotos_total[(fotos_total.indexOf(fotos[i])==-1?fotos_total.length:fotos_total.indexOf(fotos[i]))-1]
                    }
                    colocar()
                }
            }
            function restar(){ 
                console.log(fotos_total);
                console.log(fotos);
                console.log(fotos.length);
                if(fotos[3]!=null){
                    for (let i = 0; i <fotos.length; i++) {
                        if(fotos_total.indexOf(fotos[i])==fotos_total.length-1||fotos_total.indexOf(fotos[i])<0&&fotos_total.indexOf(fotos[i+1])==-1){
                            fotos[i]=null;
                            continue;
                        }
                        fotos[i]=fotos_total[(fotos_total.indexOf(fotos[i])==-1?-1:fotos_total.indexOf(fotos[i]))+1]
                    }
                    colocar()
                }
            }
            function colocar(){
                //console.log(prueba);
                document.getElementById("posicion0").src=fotos[0]==null?"imagenes/fondo.png":fotos[0]
                document.getElementById("posicion1").src=fotos[1]==null?"imagenes/fondo.png":fotos[1]
                document.getElementById("posicion2").src=fotos[2]==null?"imagenes/fondo.png":fotos[2]
                document.getElementById("posicion3").src=fotos[3]==null?"imagenes/fondo.png":fotos[3]
                document.getElementById("posicion4").src=fotos[4]==null?"imagenes/fondo.png":fotos[4]
                document.getElementById("posicion5").src=fotos[5]==null?"imagenes/fondo.png":fotos[5]
            }
            function validar_sub(){
                if(document.getElementById("seleccion").value>document.getElementById("vidas").value||parseInt(document.getElementById("seleccion").value)<=0){
                    console.log("NO");
                }else{
                    console.log("SI");
                    let aux=document.getElementById("sel"+(parseInt(document.getElementById("seleccion").value)-1)).src;
                    if((fotos[2]!=null?parseInt(fotos[2].substring(9,11).replace("_","")):null)<parseInt(aux.substring(aux.lastIndexOf("/")+1,aux.lastIndexOf("/")+3).replace("_",""))&&(fotos[3]!=null?(parseInt(aux.substring(aux.lastIndexOf("/")+1,aux.lastIndexOf("/")+3).replace("_",""))<parseInt(fotos[3].substring(9,11).replace("_",""))):true)){
                        document.getElementById("correcto").value=true;
                    }else{
                        document.getElementById("correcto").value=false;
                    }
                    if(document.getElementById("correcto").value=="true"&&document.getElementById("vidas").value=="1"){
                        document.getElementById("texto_top").innerHTML="Has Ganado "+document.getElementById("nombre").value;
                    }else{
                        console.log(document.getElementById("correcto").value=="true"+", "+document.getElementById("vidas").value=="1")
                        document.getElementById("form1").submit();
                    }
                }
            }
            </script>
    </head>
    <center>
        <body onload="colocar()" background="imagenes/fondoPagina.jpg">
            <form action="juego.php" method="POST" id="form1">
                <?php
                    if(isset($_POST["nombre"])) echo '<input type="hidden" name="nombre" id="nombre" value="'.$_POST["nombre"].'"/>';
                    echo '<input type="hidden" name="seleccion" id="seleccion" value="0"/>';
                    echo "<input type='hidden' name='correcto' id='correcto' value=''/>";
                    echo "<input type='hidden' name='vidas' id='vidas' value='$vidas'/>";
                    if(isset($cartas_mesa)){
                        foreach($cartas_mesa as $val){
                            echo "<input type='hidden' name='mesa[]' value='$val'/>";
                        }
                    }else{
                        echo "<input type='hidden' name='mesa[]' value='$cartas_mesa[0]'/>";
                    }
                    foreach($cartas_actuales as $val){
                        echo "<input type='hidden' name='mano[]' value='$val'/>";
                    }
                ?>
                <!-- Contenedor -->
                <div class = "contenedor">

                <!-- Contenedor cabecera y cuerpo -->
                <div class = "contenedor1">

                    <!-- Cabecera -->
                    <div class = "cabecera">
                        <button onclick="validar_sub()" type="button">COLOCAR</button><br/><br/><br/>
                        <h1 id="texto_top">Bienvenido <?php if(isset($_POST["nombre"])) echo $_POST["nombre"];?></h1>
                    </div>

                    <!-- Cuerpo -->
                    <div class = "cuerpo">

                        <!-- Flecha izquierda -->
                        <div class="izquierda">
                            <input type="button" onclick="restar()" value="<"/>
                        </div>

                        <!-- Contenedor tablero y flecha derecha -->
                        <div class="contenedor2">

                            <!-- Tablero -->
                            <div class="tablero">
                                <table>
                                    <tr>
                                        <td width= "11.25%"><img id="posicion0" src=""/></td>
                                        <td width= "11.25%"><img id="posicion1" src=""/></td>
                                        <td width= "20%"><img id="posicion2" src=""/></td>
                                        <td width= "15%">Aquí su Carta</td> <!-- Puntero -->
                                        <td width= "20%"><img id="posicion3" src=""/></td>
                                        <td width= "11.25%"><img id="posicion4" src=""/></td>
                                        <td width= "11.25%"><img id="posicion5" src=""/></td>
                                    </tr>
                                </table>
                            </div>

                            <!-- Flecha derecha -->
                            <div class="derecha">
                                <input type="button" onclick="sumar()" value=">"/>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Pie -->
                <div class = "pie">

                    

                    <!-- Cartas -->
                    <div class="container-box">
                    <?php
                        foreach($cartas_actuales as $ind => $val){
                            $fp = fopen ("contenido/cartas.csv","r");
                            $tit;
                            $ano;
                            while ($data = fgetcsv ($fp, 1000, ",")) {
                                if($val+1==$data[0]){
                                    $ano=$data[1];
                                    $tit=$data[2];
                                }
                            }
                            fclose ($fp);
                            echo    "<div class='box box".($ind+1)."'>
                                        <img id='sel$ind' src='".$cartas_sin_fecha[$val]."' alt=''>
                                        <div class='container-p'>
                                            <h2>".ucfirst(str_replace("_"," ",$tit))."</h2>
                                            <p>$ano</p>
                                        </div>
                                    </div>";
                        }

                    ?>
                    </div>
                    <script src="js/script.js"></script>
                </div>
            </div>
            </form>
            
        </body>
    </center>
</html>