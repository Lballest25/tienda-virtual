<?php
class query extends dbconnection{
    public function select_user(){
        $sql = dbconnection::connection()->prepare("SELECT * FROM usuarios");
        $sql->execute();
        return $array = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_user($user,$pass){
        $sql = dbconnection::connection()->prepare("INSERT INTO usuarios(usuario,password)VALUES('$user','$pass')");
        if ($sql->execute()) {
            $resultado = self::select_user();
            return $resultado;
        }
    }

    public function get_user($id){
        $sql = dbconnection::connection()->prepare("SELECT * FROM usuarios WHERE id='".$id."'");
        if($sql->execute()){
            return $array = $sql->fetchAll(PDO::FETCH_ASSOC);
        }else {
            return "error";
        }
    }

    public function update_user($id,$user,$pass){
    $sql = dbconnection::connection()->prepare("UPDATE usuarios SET usuario ='".$user."',password='".$pass."' WHERE id='".$id."'");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $resultado = self::select_user();
            return $resultado;
        }else{
            return "Ocurrio un problema!";
       }
    }

    public function delete_user($id){
        $sql=dbconnection::connection()->prepare("DELETE FROM usuarios WHERE id='".$id."'");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $resultado = self::select_user();
            return $resultado;
        }else{
            return "Ocurrio un problema";
        }
    }
    
    public function get_credentials($user, $password){
        $sql=dbconnection::connection()->prepare("SELECT COUNT(*) FROM usuarios WHERE usuario = '".$user."' AND password= '".$password."'");
        $sql->execute();
        $array = $sql->num_rows;
        return $array;   
    }
}
?>