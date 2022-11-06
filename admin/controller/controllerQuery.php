<?php
class query extends dbconnection{
    public function select_juego(){
        $sqlp = dbconnection::connection()->prepare("SELECT * FROM juegos_disponibles");
        $sqlp->execute();
        return $array = $sqlp->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_juego($nombre,$imagen,$precio,$cantidad){
        $sql = dbconnection::connection()->prepare("INSERT INTO juegos_disponibles(nombre,imagen,precio,cantidad)VALUES('$nombre','$imagen','$precio','$cantidad')");
        if ($sql->execute()) {
            $resultado = self::select_juego();
            return $resultado;
        }
    }
    
    public function obtener_juego($id){
        $sql = dbconnection::connection()->prepare("SELECT * FROM juegos_disponibles WHERE id='".$id."'");
        if($sql->execute()){
            return $array = $sql->fetchAll(PDO::FETCH_ASSOC);
        }else {
            return "error";
        }
    }

    public function obtener_imagen($id){
        $sql = dbconnection::connection()->prepare("SELECT imagen FROM juegos_disponibles WHERE id='".$id."'");
        $sql->execute();
        return $array = $sql->fetch(PDO::FETCH_LAZY);
    }
    
    public function update_juego($id,$nombre,$imagen,$precio,$cantidad){
        $sql = dbconnection::connection()->prepare("UPDATE juegos_disponibles SET nombre='".$nombre."', imagen='".$imagen."', precio='".$precio."', cantidad='".$cantidad."'  WHERE id='".$id."'");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $resultado = self::select_juego();
            return $resultado;
        }else{
            return "error";
       }
    }
    
    public function eliminar_juego($id){
        $sql=dbconnection::connection()->prepare("DELETE FROM juegos_disponibles WHERE id='".$id."'");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $resultado = self::select_juego();
            return $resultado;
            // return "Se elimino correctamente el registro";
        }else{
            return "Ocurrio un problema";
        }
    }
}
?>