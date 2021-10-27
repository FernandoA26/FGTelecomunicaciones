<?php
    $IDUSUARIO = $_POST['idusuario'];
    $USER = $_POST['usuario'];
    $TRABAJADOR = $_POST['persona'];
    $ROL = $_POST['rol'];
    session_start();
    $_SESSION['S_IDUSUARIO']=$IDUSUARIO;
    $_SESSION['S_USER']=$USER;
    $_SESSION['S_PERSONA']=$TRABAJADOR;
    $_SESSION['S_ROL']=$ROL;
?>