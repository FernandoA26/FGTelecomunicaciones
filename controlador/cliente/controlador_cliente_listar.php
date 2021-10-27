<?php
    require '../../modelo/modelo_cliente.php';

    $MP = new Modelo_Cliente();
    $consulta = $MP->Listar_Cliente();
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