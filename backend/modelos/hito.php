<?php

class Hito {
        //atribitos
        public $conexion;
        // metodos del construtor
        public function __construct($conexion){
            $this->conexion = $conexion;
        }
        //metodos
        public function consulta(){
            $con = "SELECT * FROM hito ORDER BY nombre";
            $res = mysqli_query($this->conexion,$con);
            $vec= [];

            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }
            return $vec;
        }
        public function eliminar ($el){
            $del = "DELETE FROM hito WHERE id_hito = $el";
            mysqli_query( $this->conexion, $del);
            $vec =[];
            $vec ['resultado'] = "OK";
            $vec ['mensaje'] = "El hito ha sido elimimnado";
            return $vec;
        }

        public function insertar ($params){
            $ins = "INSERT INTO hito(nombre, fo_id_proyecto) VALUES ('$params-> nombre', $params-> id_proyecto)";
            mysqli_query( $this->conexion, $ins);
            $vec =[];
            $vec ['resultado'] = "OK";
            $vec ['mensaje'] = "El hito ha sido guardado";
            return $vec;
        }

        public function editar ($id,$params){
            $editar = "UPDATE hito SET nombre = '$params-> nombre',  WHERE id_hito = $id";
            mysqli_query($this->conexion, $editar);
            $vec =[];
            $vec ['resultado'] = "OK";
            $vec ['mensaje'] = "El hito ha sido editado";
            return $vec;
        }

        public function filtro ($valor){
            $filtro = "SELECT * FROM hito WHERE nombre like'%$valor%'";
            $res = mysqli_query($this->conexion, $filtro);
            $vec =[];
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }
            return $vec;
        }
    }
?>