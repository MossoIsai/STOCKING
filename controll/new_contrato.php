<?php

include ("conex2.php");

$empresa = $_POST['emp'];
$contacto = $_POST['con'];
$correo = $_POST['email'];
$cel = $_POST['cel'];
$tel = $_POST['tel'];
$licenciaW = $_POST['lweb'];
$licenciaM = $_POST['lmovil'];
$licenciaA= $_POST['ladmin'];
$fechaInicio = $_POST['fech_alta'];
$fechaBaja = $_POST['fech_baja'];


if($empresa != null && $contacto != null && $correo != null && $cel != null &&
     $tel != null && $licenciaW != null && $licenciaM != null && $licenciaA != null &&
      $fechaInicio != null && $fechaBaja != null) {

    $stmt = $conn->prepare("CALL sp_addContrato('$fechaInicio','$fechaBaja',
        $empresa,$licenciaW,$licenciaM,$licenciaA,'$contacto','$correo','$cel','$tel')");

    if ($stmt->execute()) {
        ?><br/>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>¡Exito!</strong>  El registro del contrato se realizo exitosamente.

        </div>
    <?php
    } else {
        ?>
       <br/>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>¡Error!</strong> No se pudo realizar la operacion:
            <strong>
            <?php
            echo $conn->error;
            ?></strong>
    <?php
      }
    }
    else{
      ?> <br/>
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>¡Warning! </strong>Un registro se encuentra nullo
                <strong><?php echo "  ".$conn->error; ?></strong>
    <?php
      }
    ?>

