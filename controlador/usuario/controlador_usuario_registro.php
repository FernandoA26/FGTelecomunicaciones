<?php
    require '../../modelo/modelo_usuario.php';

    $MU = new Modelo_Usuario();
    $usuario = htmlspecialchars($_POST['usuario'],ENT_QUOTES,'UTF-8');
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT,['cost'=>10]);
    $idtrabajador = htmlspecialchars($_POST['idtrabajador'],ENT_QUOTES,'UTF-8');
    $email = htmlspecialchars($_POST['email'],ENT_QUOTES,'UTF-8');
    $idrol = htmlspecialchars($_POST['idrol'],ENT_QUOTES,'UTF-8');
    $nombrearchivo = htmlspecialchars($_POST['nombrearchivo'],ENT_QUOTES,'UTF-8');

    $consulta = $MU->Registrar_Usuario($usuario,$password,$idtrabajador,$email,$idrol,$ruta);
            echo $consulta;

    // if (is_array($_FILES) && count($_FILES)>0) {
    //     if (move_uploaded_file($_FILES['foto']['tmp_name'],"img/".$nombrearchivo)) {
    //         $ruta= 'controlador/usuario/img/'.$nombrearchivo;
    //         $consulta = $MU->Registrar_Usuario($usuario,$password,$idtrabajador,$email,$idrol,$ruta);
    //         echo $consulta;
    //     }else{
    //         echo 0;
    //     }
    // }else{
    //     $ruta= 'controlador/usuario/img/user_default.png';
    //         $consulta = $MU->Registrar_Usuario($usuario,$password,$idtrabajador,$email,$idrol,$ruta);
    //         echo $consulta;
    // }
    
    
?>