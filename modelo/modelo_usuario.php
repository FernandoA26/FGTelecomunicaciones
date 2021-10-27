<?php
    class Modelo_Usuario{
        private $conexion;
        function __construct()
        {
            require_once 'modelo_conexion.php';
            $this->conexion = new conexion();
            $this->conexion->conectar();
        }

        function Verificar_Usuario($usuario,$password){
            $sql = "call SP_VERIFICAR_USUARIO('$usuario')";
            $arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
					if(password_verify($password, $consulta_VU["usuario_password"]))
                    {
                        $arreglo[] = $consulta_VU;
                    }
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }

        function Listar_Ususario(){
            $sql = "call SP_LISTAR_USUARIO()";
            $arreglo = array();
    
            if ($consulta = $this->conexion->conexion->query($sql)) {
                while ($consulta_VU = mysqli_fetch_assoc($consulta)){
    
                    $arreglo["data"][]=$consulta_VU;
                    
                }
                return $arreglo;
    
                $this->conexion->cerrar() ;
            }
        }

        function listar_combo_persona(){
            $sql = "call SP_LISTAR_COMBO_PERSONA()";
            $arreglo = array();
    
            if ($consulta = $this->conexion->conexion->query($sql)) {
                while ($consulta_VU = mysqli_fetch_array($consulta))
                        $arreglo[] = $consulta_VU;
                    
                }
                return $arreglo;
    
                $this->conexion->cerrar() ;
            }

            function listar_combo_rol(){
                $sql = "call SP_LISTAR_COMBO_ROL()";
                $arreglo = array();
        
                if ($consulta = $this->conexion->conexion->query($sql)) {
                    while ($consulta_VU = mysqli_fetch_array($consulta))
                            $arreglo[] = $consulta_VU;
                        
                    }
                    return $arreglo;
        
                    $this->conexion->cerrar() ;
            }

            function Registrar_Usuario($usuario,$password,$idtrabajador,$email,$idrol){
                $sql = "call SP_REGISTRAR_USUARIO('$usuario','$password','$idtrabajador','$email','$idrol')";
                if ($consulta = $this->conexion->conexion->query($sql)) {
				
                    if ($row = mysqli_fetch_array($consulta)) {
                        return $respuesta = trim($row[0]);
                    }
                    
                    $this->conexion->cerrar();
                }
            }

            function Modificar_Usuario($id,$trabajador,$email,$rol,$estatus){
                $sql = "call SP_EDITAR_USUARIO('$id','$trabajador','$email','$rol','$estatus')";
                if ($consulta = $this->conexion->conexion->query($sql)) {
                    
                    if ($row = mysqli_fetch_array($consulta)) {
                        return $respuesta = trim($row[0]);
                    }
                    
                    $this->conexion->cerrar();
                }
            }

            
        
    }
?>