<?php 
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Origin, X-Requested-with, Content-Type, Accept');

    require_once ("../conexion.php");
    require_once ("../modelos/persona.php");

    $control = $_GET ['control'];

    $perso = new Persona ($conexion);

    switch ($control) {
        case 'consultar': 
            $vec= $perso->consulta();
        break;

       case 'insertar': 
            //$json = file_get_contents('php://input');
            $json = "{'nombre':'Yuri','apellido':'Lopez','rol':'DEV','telefono':111222333,'correo':'lopezyuri123@gmail.com'}";
            $params = json_decode($json);
            $vec = $perso->insertar($params);
        break;

        case 'eliminar':
            $id = $_GET["id"]; 
            $vec= $perso->eliminar($id);
        break;

        case 'editar':
            //$json = file_get_contents('php://input');
            $json = '{"nombre":"Maria" }';
            $params = json_decode($json);
            $id = $_GET['id'];
            $vec = $perso->editar ($id, $params);
        break;

        case 'filtro':
            $dato = $_GET['dato'];
            $vec = $perso->filtro($dato);
        break;

    }
    
    $datosj = json_encode($vec);
    echo $datosj;
    header ('Content-Type: application/json');

?>