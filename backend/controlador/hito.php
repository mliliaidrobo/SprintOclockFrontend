<?php 
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Origin, X-Requested-with, Content-Type, Accept');

    require_once ("../conexion.php");
    require_once ("../modelos/hito.php");

    $control = $_GET ['control'];

    $hit = new Hito ($conexion);

    switch ($control) {
        case 'consultar': 
            $vec= $hit->consulta();
        break;

       case 'insertar': 
            //$json = file_get_contents('php://input');
            $json = "{'nombre':'CEO','fo_id_proyecto':1}";
            $params = json_decode($json);
            $vec = $hit->insertar($params);
        break;

        case 'eliminar':
            $id = $_GET["id"]; 
            $vec= $hit->eliminar($id);
        break;

        case 'editar':
            //$json = file_get_contents('php://input');
            $json = '{"nombre":"Claro" }';
            $params = json_decode($json);
            $id = $_GET['id'];
            $vec = $hit->editar ($id, $params);
        break;

        case 'filtro':
            $dato = $_GET['dato'];
            $vec = $hit->filtro($dato);
        break;

    }
    
    $datosj = json_encode($vec);
    echo $datosj;
    header ('Content-Type: application/json');

?>