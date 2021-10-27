<?php
    require '../../modelo/modelo_ubigeo.php';
    $MU = new Modelo_Ubigeo();
    $consulta = $MU->Listar_Venta();
    if($consulta){
        echo json_encode($consulta);
    }else{
        echo '{
		    "sEcho": 1,
		    "iTotalRecords": "0",
		    "iTotalDisplayRecords": "0",
		    "aaData": []
		}';
    }
?>