<?php
     require '../../modelo/modelo_producto.php';

    $MP = new Modelo_Producto();
    $producto = htmlspecialchars($_POST['producto'],ENT_QUOTES,'UTF-8');
    $consulta = $MP->Registrar_Producto($producto);
    echo $consulta;
    
?>
