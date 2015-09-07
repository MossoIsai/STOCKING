
<div class="panel panel-primary">
    <div class="panel-heading"><h2>Inventario</h2></div>
    <div class="panel-body">
 <table class="table">
     <thead>
        <th>#</th>
        <th>Dispositivo</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Numero de Serie</th>
        <th>Fecha de Modificacion</th>
        <th>Operabilidad</th>
        <th>Factura</th>
        <th>Add</th>
     </thead>
     <tbody>
<?php
   include "controll/conex2.php";
    include "funciones.php";

   $contador = 0;
   $resultado =  mysqli_query($conn, "CALL sp_conPobjeto");

     //$resultado =  mysqli_query($conn, "CALL sp_conPobjeto");
     while($fila = mysqli_fetch_row($resultado)) {
         ?>

      <tr class='warning'><td><?php  echo  ++$contador; ?></td>
          <td><?php echo $fila[1];?></td>
          <td><?php echo $fila[2];?></td>
          <td><?php echo $fila[3];?></td>
          <td><?php echo $fila[4];?></td>
          <td><?php echo $fila[5];?></td>
          <td id='clave'<?php echo $fila[0]; ?>><center><?php echo baja($fila[6],$fila[0]); ?></center></td>
          <td><?php echo $fila[7]; ?></td>
          <td><center><a data-toggle="modal" data-target="#myModalT"><span class='glyphicon glyphicon-plus'></a></span></center></td>
      </tr>
      <div class="modal fade" id="myModalT<?php  echo $fila[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModal<?php echo $fila[0]; ?>">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                   <button type="button" data-dismiss="modal" class="close" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                       <h4 class="modal-title" id="myModalLabelT<?php echo $fila[0]; ?>">Editar dispositivo</h4>
                   </button>
                  </div>
                  <div class="modal-body">
                      <form>
                          <div class="form-group">
                              <label>Componente</label>
                              <select id="component" class="form-control">
                                  <?php
                                  include "controll/conex2.php";
                                  $stmt  = mysqli_query($conn," CALL sp_list_elemento");
                                  while($fila = mysqli_fetch_array($stmt)) {

                                      echo "<option value='$fila[0]'>$fila[1]</option>";
                                  }
                                  ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label>Marca</label>
                              <select class="form-control" id="mark<?php echo $fila[0]; ?>">
                                  <?php
                                  include "controll/conex2.php";
                                  $marcas = mysqli_query($conn,"CALL sp_marcas");
                                  while($filas = mysqli_fetch_row($marcas)){

                                      echo "<option value='$filas[0]'>$filas[1]</option>";
                                  }
                                  ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label>Modelo</label>
                              <select id="model<?php echo $fila[0]; ?>" class="form-control">
                                  <?php
                                  include "controll/conex2.php";
                                  $modelo = mysqli_query($conn,"CALL sp_modelos ");
                                  while($modelos = mysqli_fetch_row($modelo)){

                                      echo "<option value='$modelos[0]'>$modelos[1]</option>";
                                  }
                                  ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label>Numero de Serie</label>
                              <input type="text" class="form-control" placeholder="Numero de Serie" id="n_serie<?php echo $fila[0]; ?>"/>
                          </div>
                          <div class="form-group">
                              <label>Fecha de modificación</label>
                              <input type="date" class="form-control" id="fecha_mod<?php echo $fila[0]; ?>"/>
                          </div>
                          <div class="form-group">
                              <label>Factura</label>
                              <input type="file" class="form-control" id="facture<?php $fila[0]?>"/>
                          </div>
                      </form>

                  </div>
              </div>
          </div>
      </div>
         <?php
         include "controll/conex2.php";
         $contador2 = 0;
         $resultado2 = mysqli_query($conn, "CALL sp_conHobjeto($fila[9])");
         if ($resultado2 == false) {
             echo "Error";
         }
         while ($fila2 = mysqli_fetch_row($resultado2)) {
             ?>
             <tr class='info'><td></td>
                 <td><?php echo $fila2[1];?></td>
                 <td><?php echo $fila2[2];?></td>
                 <td><?php echo $fila2[3];?></td>
                 <td><?php echo $fila2[4];?></td>
                 <td><?php echo $fila2[5];?></td>
                 <td><?php echo baja($fila2[6],$fila2[0]); ?></td>
                 <td><?php echo $fila2[7];?></td>
             </tr>
  <?php
     }
 }// fin de while de
mysqli_close($conn);
       ?>
     </tbody>
     </table>
 </div>
 </div>
