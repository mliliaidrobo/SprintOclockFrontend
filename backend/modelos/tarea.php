<?php
class Tarea {
        //atribitos
        public $conexion;
        // metodos del construtor
        public function __construct($conexion){
            $this->conexion = $conexion;
        }
        //metodos
        public function consulta(){
            $con = "SELECT * FROM tarea";
            $res = mysqli_query($this->conexion,$con);
            $vec= [];

            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }
            return $vec;
        }

       public function insertar ($params){
            $ins ="INSERT INTO tarea (nombre, detalle, fo_id_hito,  fo_id_persona ) 
                        VALUES ($params-> nombre, $params-> detalle, $params-> fo_id_hito, $params-> fo_id_persona";
            mysqli_query( $this->conexion, $ins);
            $vec =[];
            $vec ['resultado'] = "OK";
            $vec ['mensaje'] = "La tarea ha sido agregada correctamente";
            return $vec;
        }

        public function eliminar ($id){
            $del = "DELETE FROM tarea WHERE id_tarea = $id";
            mysqli_query( $this->conexion, $del);
            $vec =[];
            $vec ['resultado'] = "OK";
            $vec ['mensaje'] = "La tarea ha sido elimimnada";
            return $vec;
        }

        public function editar ($id,$params){
            $editar = "UPDATE tarea SET nombre = '$params-> nombre', detalle = '$params-> detalle',  WHERE id_tarea = $id";
            mysqli_query($this->conexion, $editar);
            $vec =[];
            $vec ['resultado'] = "OK";
            $vec ['mensaje'] = "Los datos han sido editada";
            return $vec;
        }
  
        public function filtro ($valor){
            $filtro = "SELECT * FROM tarea WHERE nombre like'%$valor%'";
            $res = mysqli_query($this->conexion, $filtro);
            $vec =[];
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }
            return $vec;
        }
    }
?>