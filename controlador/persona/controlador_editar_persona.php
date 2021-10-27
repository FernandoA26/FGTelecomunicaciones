<?php
    require '../../modelo/modelo_persona.php';

    $MP = new Modelo_Persona();

    $error="";
    $contador=0;
    $id = htmlspecialchars(mb_strtoupper($_POST['id']),ENT_QUOTES,'UTF-8');
    $nombre = htmlspecialchars(mb_strtoupper($_POST['n']),ENT_QUOTES,'UTF-8');
    $apepat = htmlspecialchars(mb_strtoupper($_POST['apt']),ENT_QUOTES,'UTF-8');
    $apemat = htmlspecialchars(mb_strtoupper($_POST['apm']),ENT_QUOTES,'UTF-8');
    $nrodocumentoactual = htmlspecialchars(mb_strtoupper($_POST['nroactual']),ENT_QUOTES,'UTF-8');
    $nrodocumentonuevo = htmlspecialchars(mb_strtoupper($_POST['nronuevo']),ENT_QUOTES,'UTF-8');
    $tipdocumento = htmlspecialchars(mb_strtoupper($_POST['tip']),ENT_QUOTES,'UTF-8');
    $sexo = htmlspecialchars(mb_strtoupper($_POST['sex']),ENT_QUOTES,'UTF-8');
    $telefono = htmlspecialchars(mb_strtoupper($_POST['tel']),ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars(mb_strtoupper($_POST['estatus']),ENT_QUOTES,'UTF-8');
    
    if (!preg_match("/^(?!-+)[a-zA-Z-ñáéíóúÁÉÍÓÚ\s]*$/",$nombre)) {
        $contador++;
        $error.="El nombre debe contener solo letras<br>"; 
    }
    if (!preg_match("/^(?!-+)[a-zA-Z-ñáéíóúÁÉÍÓÚ\s]*$/",$apepat)) {
        $contador++;
        $error.="El apellido paterno debe contener solo letras"; 
    }
    if (!preg_match("/^(?!-+)[a-zA-Z-ñáéíóúÁÉÍÓÚ\s]*$/",$apemat)) {
        $contador++;
        $error.="El apellido materno debe contener solo letras"; 
    }
    if (!preg_match("/^[[:digit:]\s]*$/",$nrodocumentonuevo)) {
        $contador++;
        $error.="El n&uacute;mero del documento debe contener solo n&uacute;meros.<br>"; 
    }
    if (!preg_match("/^[[:digit:]\s]*$/",$telefono)) {
        $contador++;
        $error.="El n&uacute;mero del telefono debe contener solo n&uacute;meros.<br>";  
    }
    if ($contador>0) {
        echo $error;
    }else{
        $consulta = $MP->Editar_Persona($id,$nombre,$apepat,$apemat,$nrodocumentoactual,$nrodocumentonuevo,$tipdocumento,$sexo,$telefono,$estatus);
        echo $consulta;
    }
