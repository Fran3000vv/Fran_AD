<?php
    function conectarDB(){
        try{
            $db=new PDO("mysql:host=localhost;dbname=DB_TIMELINE;charset=utf8mb4","root","");
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $db;
        }catch(PDOException $ex){
            var_export($ex->errorInfo);
            echo $ex->getMessage();
        }
    }
    function getAllMazos($conDB){
        $all = array();
        try{
            $sql="SELECT nombre FROM mazos";
            $stm = $conDB->query($sql);
        while ($fila = $stm->fetch(PDO::FETCH_ASSOC)) {
            $all[] = $fila["nombre"];
        }
        }catch(PDOException $ex){
            echo $ex->getMessage();
        }
        return $all;
    }

    function getMazoName($conDB,$nam){
        try{
            $sql="SELECT * FROM mazos WHERE nombre=:namAux";
            $stm = $conDB->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $stm->execute(array(":namAux"=>$nam));
            $fila = $stm->fetch(PDO::FETCH_ASSOC);
            var_export($fila);
        }catch(PDOException $ex){
            echo $ex->getMessage();
        }
        return $fila;
    }
    function crearMazo($conDB,$nom,$des){
        $res = 0;
        try{
            $sql="INSERT INTO mazos (ID,NOMBRE,DESCRIPCION) VALUES (NULL, :nom, :desi)";
            $stm = $conDB->prepare($sql);
            $stm->bindParam(":nom",$nom);
            $stm->bindParam(":desi",$des);
            $stm->execute();
            $res = $stm->rowCount();
        }catch(PDOException $ex){
            echo "Error en la Creación del Mazo ".$ex->getMessage();
        }
        return $res;
    }

    function deleteMazo($conDB,$nom){
        $res = 0;
        try{
            $sql="DELETE FROM mazos WHERE NOMBRE=:nom";
            $stm = $conDB->prepare($sql);
            $stm->bindParam(":nom",$nom);
            $stm->execute();
            $res = $stm->rowCount();
        }catch(PDOException $ex){
            echo "Error en la Creación del Mazo ".$ex->getMessage();
        }
        return $res;
    }

    function updateMazo($conDB,$id,$nom,$des){
        $res = 0;
        try{
            $sql="UPDATE mazos SET NOMBRE=:nomAux, DESCRIPCION=:descAux WHERE ID=:idAux";
            $stm = $conDB->prepare($sql);
            $stm->bindParam(":nomAux",$nom);
            $stm->bindParam(":descAux",$des);
            $stm->bindParam(":idAux",$id);
            $stm->execute();
            $res = $stm->rowCount();
        }catch(PDOException $ex){
            echo "Error en la Creación del Mazo ".$ex->getMessage();
        }
        return $res;
    }
    //Método no Dedicado
    /*function crearMazo($conDB,$nom,$des){
        try{
            $sql="INSERT INTO mazos ('ID','NOMBRE','DESCRIPCION') VALUES (NULL, :nomAux, :desAux)";
            $stm = $conDB->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $stm->execute(array(":nomAux"=>$nom,":desAux"=>$des));
            $stm->fetch(PDO::FETCH_ASSOC);
        }catch(PDOException $ex){
            echo $ex->getMessage();
        }
    }*/
?>