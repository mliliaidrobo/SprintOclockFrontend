<?php
class Proyecto {
        //atribitos
        public $conexion;
        // metodos del construtor
        public function __construct($conexion){
            $this->conexion = $conexion;
        }
        //metodos
        public function consulta(){
            $con = "SELECT * FROM proyecto";
            $res = mysqli_query($this->conexion,$con);
            $vec= [];

            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }
            return $vec;
        }

       public function insertar ($params){
            $ins ="INSERT INTO proyecto(nombre, duracion) 
                        VALUES ($params-> nombre, $params-> duracion)";
            mysqli_query( $this->conexion, $ins);
            $vec =[];
            $vec ['resultado'] = "OK";
            $vec ['mensaje'] = "El proyecto ha sido agregado correctamente";
            return $vec;
        }

        public function eliminar ($id){
            $del = "DELETE FROM proyecto WHERE id_proyecto = $id";
            mysqli_query( $this->conexion, $del);
            $vec =[];
            $vec ['resultado'] = "OK";
            $vec ['mensaje'] = "El proyecto ha sido elimimnado";
            return $vec;
        }

        public function editar ($id,$params){
            $editar = "UPDATE proyecto SET duracion = '$params-> duracion',  WHERE id_proyecto = $id";
            mysqli_query($this->conexion, $editar);
            $vec =[];
            $vec ['resultado'] = "OK";
            $vec ['mensaje'] = "Los datos han sido editados";
            return $vec;
        }
  
        public function filtro ($valor){
            $filtro = "SELECT * FROM proyecto WHERE nombre like'%$valor%'";
            $res = mysqli_query($this->conexion, $filtro);
            $vec =[];
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }
            return $vec;
        }
    }
?>