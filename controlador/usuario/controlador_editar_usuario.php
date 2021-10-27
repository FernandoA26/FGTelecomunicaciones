<?php
    require '../../modelo/modelo_usuario.php';

    $MU = new Modelo_Usuario();
    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $trabajador = htmlspecialchars($_POST['idtrabajador'],ENT_QUOTES,'UTF-8');
    $email = htmlspecialchars($_POST['emailnuevo'],ENT_QUOTES,'UTF-8');
    $rol = htmlspecialchars($_POST['rol'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');
    $consulta = $MU->Modificar_Usuario($id,$trabajador,$email,$rol,$estatus);
    echo $consulta;
    
    
?>