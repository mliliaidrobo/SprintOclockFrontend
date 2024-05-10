<?php 
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Origin, X-Requested-with, Content-Type, Accept');

    require_once ("../conexion.php");
    require_once ("../modelos/tarea.php");

    $control = $_GET ['control'];

    $tar = new Tarea ($conexion);

    switch ($control) {
        case 'consultar': 
            $vec= $tar->consulta();
        break;

       case 'insertar': 
            //$json = file_get_contents('php://input');
            $json = "{'nombre':'crear casos de prueba','detalle':'encargados team DEV','fo_id_hito':1,'fo_id_persona':1}";
            $params = json_decode($json);
            $vec = $tar->insertar($params);
        break;

        case 'eliminar':
            $id = $_GET["id"]; 
            $vec= $tar->eliminar($id);
        break;

        case 'editar':
            //$json = file_get_contents('php://input');
            $json = '{"nombre":"Modificar casos de prueba" }';
            $params = json_decode($json);
            $id = $_GET['id'];
            $vec = $tar->editar ($id, $params);
        break;

        case 'filtro':
            $dato = $_GET['dato'];
            $vec = $tar->filtro($dato);
        break;

    }
    
    $datosj = json_encode($vec);
    echo $datosj;
    header ('Content-Type: application/json');

?>