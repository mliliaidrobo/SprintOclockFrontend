<?php 
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Origin, X-Requested-with, Content-Type, Accept');

    require_once ("../conexion.php");
    require_once ("../modelos/proyecto.php");

    $control = $_GET ['control'];

    $proyect = new proyecto ($conexion);

    switch ($control) {
        case 'consultar': 
            $vec= $proyect->consulta();
        break;

       case 'insertar': 
            //$json = file_get_contents('php://input');
            $json = "{'nombre':'CEO','duracion':100}";
            $params = json_decode($json);
            $vec = $proyect->insertar($params);
        break;

        case 'eliminar':
            $id = $_GET["id"]; 
            $vec= $proyect->eliminar($id);
        break;

        case 'editar':
            //$json = file_get_contents('php://input');
            $json = '{"nombre":"Claro" }';
            $params = json_decode($json);
            $id = $_GET['id'];
            $vec = $proyect->editar ($id, $params);
        break;

        case 'filtro':
            $dato = $_GET['dato'];
            $vec = $proyect->filtro($dato);
        break;

    }
    
    $datosj = json_encode($vec);
    echo $datosj;
    header ('Content-Type: application/json');

?>