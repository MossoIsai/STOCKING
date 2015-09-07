<?php

 include "conex2.php";

 $dispositivo = $_POST['dispositivo'];
 $marca = $_POST['marca'];
 $modelo = $_POST['modelo'];
 $numero_serie = $_POST['numeroserie'];
 $fecha_modificacion = $_POST['fechamodificacion'];
 $factura = $_POST['factura'];

if($factura == null){
    $factura = "PENDIENTE";
}
//echo $dispositivo."  ".$marca."  ".$modelo." ".$numero_serie." ".$fecha_modificacion;
  if($dispositivo != null &&  $marca != null &&  $modelo != null
      && $numero_serie != null && $fecha_modificacion != null ){

      $stmt = $conn->prepare("CALL sp_addDispositivo(
         $marca,$modelo,'$numero_serie',$dispositivo,'$fecha_modificacion','$factura')");
      if($stmt->execute()){
          ?>
          <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              <strong>!Exito! </strong>.....Empresa  <?php   echo $dispositivo = $_POST['dispositivo']; ?>  Registrada.
          </div>
          <?php
      }else {
          ?>
          <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              <strong>!Error! </strong>.....Ocurrio un problema al registar el dispositivo.<?php
              echo " " . $conn->error; ?>
          </div>
      <?php
      }

  }else{ ?>
      <div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          <strong>!Warning! </strong>.....Algun  ó algunos registros son nulos (NULL).
      </div>
     <?php
  }
?>