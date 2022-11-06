<?php
require_once "../setting/connection.php";
require_once "../controller/controllerQueryUsers.php";
$tipo_consulta = $_POST['tipo_operacion'];
switch ($tipo_consulta) {

    case 'select':
        $querys = new query();
        $execution = $querys->select_user();
        echo json_encode($execution);
        break;
    case 'save':
        $user = $_POST['user'];
        $password = $_POST['password'];
        if ($user != "" && $password != "") {
            $querys = new query();
            $execution = $querys->insert_user($user,$password);
            echo json_encode($execution);
        } else {
            echo json_encode(0);
        }
        
        break;
    case 'edit':
        $id = $_POST['id'];
        $querys = new query();
        $execution = $querys->get_user($id);
        echo json_encode($execution);
        break;
    case 'update':
        $id = $_POST['idu'];
        $user = $_POST['useru'];
        $password = $_POST['passwordu'];
        $querys = new query();
        $execution = $querys->update_user($id,$user,$password);
        echo json_encode($execution);
        break;
    case 'delete':
        $id = $_POST['id'];
        $querys = new query();
        $execution = $querys->delete_user($id);
        echo json_encode($execution);
        break;
    case 'login':
        $user = $_POST['user'];
        $password = $_POST['password'];
        $consultas = new query();
        $execution = $consultas->get_credentials($user, $password);
        if ($execution > 0) {
            echo json_encode(1);
        } else {
            echo json_encode(0);
        }
        break;
    
    default:
        # code...
        break;
}
?>