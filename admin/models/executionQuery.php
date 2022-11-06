<?php
    require_once "../setting/connection.php";
    require_once "../controller/controllerQuery.php";
    $tipo_consulta = $_POST['tipo_operacion'];
    switch ($tipo_consulta) {
        case 'select':
            $consultas = new query();
            $ejecutar = $consultas->select_juego();
            echo json_encode($ejecutar);
            break;
        case 'guardar':
            $nombre = $_POST['nombre'];
            $fecha = new DateTime();
            $imagen_nombre = $fecha->getTimestamp()."_".$_FILES['imagen']['name'];
            $ruta = $_FILES['imagen']['tmp_name'];
            $precio =$_POST['precio'];
            $cantidad =$_POST['cantidad'];
            $consultas = new query();
            if ($nombre != "" && $imagen_nombre != "" && $ruta != "" && $precio != "" && $cantidad != "") {
                if (move_uploaded_file($ruta, "../img/".$imagen_nombre)) {
                    $ejecutar = $consultas->insert_juego($nombre,$imagen_nombre,$precio,$cantidad);
                    echo json_encode($ejecutar);
                }
            } else {
                echo json_encode(0);
            }
            
        break;
        case 'editar':
            $id = $_POST['id'];
            $consultas = new query();
            $ejecutar = $consultas->obtener_juego($id);
            echo json_encode($ejecutar);
            break;
        case 'update':
                $id = $_POST["idu"];
                $nombre = $_POST["nombreu"];
                $imagen = $_FILES['imagenu'];
                $fecha = new DateTime();
                $imagen_nombre = $fecha->getTimestamp()."_".$_FILES['imagenu']['name'];
                $ruta = $_FILES['imagenu']['tmp_name'];
                $precio =$_POST['preciou'];
                $cantidad =$_POST['cantidadu'];
                $consultas = new query();
                if (move_uploaded_file($ruta, "../img/".$imagen_nombre)) {
                    $ejecutar = $consultas->update_juego($id,$nombre,$imagen_nombre,$precio,$cantidad);
                    echo json_encode($ejecutar);
                }
            break;    
        case 'eliminar':
            $id = $_POST['id'];
            $imagen_nombre = $_FILES['imagen']['name'];
            $ruta = $_FILES['imagen']['tmp_name'];
            if (file_exists("../img/".$imagen_nombre)) {
                unlink("../img/".$imagen_nombre);
                $consultas = new query();
                $ejecutar = $consultas->eliminar_juego($id);
                echo json_encode($ejecutar);
            }
            break;    
        default:
            # code...
            break;
    }

?>