<?php
 include "conex2.php";

  $nom_emp = $_POST['emp'];
  $log_izq = $_POST['log1'];
  $log_der = $_POST['log2'];
  $tel_emp = $_POST['tel'];
  $cel_emp = $_POST['cel'];
  $fechareg_emp = $_POST['f_alta'];
  $correo_emp = $_POST['email'];
  $contacto_emp = $_POST['con'];
  $descripcion_emp = $_POST['descripcion'];

   if($log_der != null && $log_der != null){
       $log_der = "S/IMG";
       $log_izq = "S/IMG";
   }

  echo $nom_emp." ".$log_izq." ".$log_der." ".$tel_emp." ".$cel_emp." ".$fechareg_emp." ".$correo_emp." ".$contacto_emp." ".$descripcion_emp;
   /* NUNGUN registro es nullo*/
  if($nom_emp != null  && $tel_emp != null && $cel_emp != null && $fechareg_emp != null &&
      $contacto_emp != null && $descripcion_emp != null && $correo_emp != null  ) {


      $stmt = $conn->prepare("CALL sp_addEmpresa('$nom_emp','$log_izq','$log_der',
                                '$tel_emp','$cel_emp','$fechareg_emp','$correo_emp','$contacto_emp','$descripcion_emp')");
      // SI SE EJECUTA
      if ( $stmt->execute() ) {
          ?>
          <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              <strong>!Exito! </strong>.....Empresa Registrada.
          </div>

          <?php
          // Erro no se ejecuta el Query
      }else {
          ?>
          <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              <strong>!Error! </strong>.....Ocurrio un problema al registar la empresa.<?php
               echo " ".$conn->error; ?>
          </div>

      <?php
      }
      /*ERRO si existe algun o algunos registros nullos*/
       }else{
      ?>
     <div class="alert alert-warning alert-dismissible" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
         <strong>!Warning! </strong>.....Algun  ó algunos registros son nulos (NULL).
     </div>

<?php
  }
?>