<?php
class Persona {
        //atribitos
        public $conexion;
        // metodos del construtor
        public function __construct($conexion){
            $this->conexion = $conexion;
        }
        //metodos
        public function consulta(){
            $con = "SELECT * FROM persona";
            $res = mysqli_query($this->conexion,$con);
            $vec= [];

            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }
            return $vec;
        }

       public function insertar ($params){
            $ins ="INSERT INTO persona(nombre, apellido, rol, telefono, correo) 
                        VALUES ($params-> nombre, $params-> apellido, $params-> rol, $params-> telefono, $params-> correo";
            mysqli_query( $this->conexion, $ins);
            $vec =[];
            $vec ['resultado'] = "OK";
            $vec ['mensaje'] = "La persona ha sido agregada correctamente";
            return $vec;
        }

        public function eliminar ($id){
            $del = "DELETE FROM persona WHERE id_persona = $id";
            mysqli_query( $this->conexion, $del);
            $vec =[];
            $vec ['resultado'] = "OK";
            $vec ['mensaje'] = "La persona ha sido elimimnada";
            return $vec;
        }

        public function editar ($id,$params){
            $editar = "UPDATE persona SET nombre = '$params-> nombre',  WHERE id_persona = $id";
            mysqli_query($this->conexion, $editar);
            $vec =[];
            $vec ['resultado'] = "OK";
            $vec ['mensaje'] = "Los datos han sido editada";
            return $vec;
        }
  
        public function filtro ($valor){
            $filtro = "SELECT * FROM persona WHERE nombre like'%$valor%'";
            $res = mysqli_query($this->conexion, $filtro);
            $vec =[];
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }
            return $vec;
        }
    }
?>