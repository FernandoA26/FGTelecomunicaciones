<?php
    class Modelo_Producto{
        private $conexion;
        function __construct()
        {
            require_once 'modelo_conexion.php';
            $this->conexion = new conexion();
            $this->conexion->conectar();
        }
        function Listar_Producto(){
            $sql = "call SP_LISTAR_PRODUCTO()";
            $arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
					
                        $arreglo["data"][] = $consulta_VU;
                    
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }

        

        function Registrar_Producto($producto){
            $sql = "call SP_REGISTRAR_PRODUCTO('$producto')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				
                if ($row = mysqli_fetch_array($consulta)) {
                    return $respuesta = trim($row[0]);
                }
				
				$this->conexion->cerrar();
			}
        }

        function Modificar_Rol($id,$rolactual,$rolnuevo,$estatus){
            $sql = "call SP_EDITAR_ROL('$id','$rolactual','$rolnuevo','$estatus')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				
                if ($row = mysqli_fetch_array($consulta)) {
                    return $respuesta = trim($row[0]);
                }
				
				$this->conexion->cerrar();
			}
        }
        
    }
?>