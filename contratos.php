

<div class="panel panel-primary">
    <div class="panel-heading"><h4>Contratos</h4></div>
    <div class="panel-body">
     <table class="table table-striped">
          <thead>
            <th>#</th>
            <th>F. Alta</th>
            <th>F. Baja</th>
            <th>Empresa</th>
            <th>Folio</th>
            <th>Vigente</th>
            <th>Web</th>
            <th>Móvil</th>
            <th>Admon</th>
            <th>Nom. Contacto</th>
            <th>Correo</th>
            <th>Celular</th>
            <th>Telefono</th>
         </thead>
         <tbody>
         <?php

             include "controll/conex2.php";
             include "funciones.php";
             $contador = 0;
              $query = mysqli_query($conn," CALL sp_list_contrato");
             while($fila = mysqli_fetch_assoc($query)) {

                 ?>
                 <tr>
                     <td><?php echo ++$contador; ?></td>
                     <td><?php echo $fila['conFechaAlta']; ?></td>
                     <td><?php echo $fila['conFechaBaja']; ?></td>
                     <td><?php echo $fila['empNombre']; ?></td>
                     <td><a data-toggle="modal" data-target="#myModal<?php echo $fila['conFolio']; ?>"><?php echo $fila['conFolio']; ?></a></td>
                     <td><?php echo alta_baja($fila['conVigente']); ?></td>
                     <td><?php echo $fila['conLicenciasWeb'];?></td>
                     <td><?php echo $fila['conLicenciasMovil'];?></td>
                     <td><?php echo $fila['conLicenciasAdministrador'];?></td>
                     <td><?php echo $fila['conNombreContacto'];?></td>
                     <td><?php echo $fila['conCorreo'];?></td>
                     <td><?php echo $fila['conCelular'];?></td>
                     <td><?php echo $fila['conTelefono'];?></td>
                 </tr>
                <!-- MODAL-->
                 <div class="modal fade" id="myModal<?php echo $fila['conFolio']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $fila['conFolio'] ?>">
                   <div class="modal-dialog">
                       <div class="modal-content">
                           <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                               <h4 class="modal-title" id="myModalLabel<?php echo $fila['conFolio'];?>">Editar Contrato</h4>
                           </div>
                           <div class="modal-body">
                               <form>
                                   <div class="form-group">
                                       <label for="emp">Empresa</label>
                                       <input type="text" class="form-control" id="emp<?php echo $fila['conFolio']; ?>" placeholder="Nombre de la empresa" value="<?php echo $fila['empNombre']; ?>">
                                   </div>
                                   <div class="form-group">
                                       <label for="con">Contacto</label>
                                       <input type="text" class="form-control" id="con<?php echo $fila['conFolio']; ?>" placeholder="Nombre del contacto" value="<?php  echo $fila['conNombreContacto']; ?>">
                                   </div>
                                   <div class="form-group">
                                       <label for="email">Correo</label>
                                       <input type="email" class="form-control" id="email<?php echo $fila['conFolio']; ?>" placeholder="Correo electronico" value="<?php echo $fila['conCorreo'];?>">
                                   </div>
                                   <div class="form-group">
                                       <label for="cel">Celular</label>
                                       <input type="text" class="form-control" id="cel<?php echo $fila['conFolio']; ?>" placeholder="Celular" value="<?php  echo $fila['conCelular']; ?>">
                                   </div>
                                   <div class="form-group">
                                       <label for="tel">Telefono</label>
                                       <input type="text" class="form-control" id="tel<?php echo $fila['conFolio']; ?>" placeholder="Telefono" value="<?php echo $fila['conTelefono']; ?>">
                                   </div>
                                   <div class="form-group">
                                       <label class="col-sm-12">Licencias</label>
                                       <div class="col-sm-2"><input type="number" id="lweb<?php echo $fila['conFolio']; ?>" class="form-control" value="<?php echo $fila['conLicenciasWeb'];?>"><div class="help">Web</div></div>
                                       <div class="col-sm-2"><input type="number" id="lmovil<?php echo $fila['conFolio']; ?>" class="form-control" value="<?php echo $fila['conLicenciasMovil'];?>"><div class="help">Móvil</div></div>
                                       <div class="col-sm-2"><input type="number" id="ladmin<?php echo $fila['conFolio']; ?>" class="form-control" value="<?php echo $fila['conLicenciasAdministrador'];?>"><div class="help">Admon</div></div>
                                   </div>
                                   <div class="form-group">
                                       <label for="cel">Fecha Alta</label>
                                       <input type="date" class="form-control" id="fech_alta<?php echo $fila['conFolio']; ?>" placeholder="Celular" value="<?php echo $fila['conFechaAlta'];?>">
                                   </div>
                                   <div class="form-group">
                                       <label for="tel">Fecha Baja</label>
                                       <input type="date" class="form-control" id="fech_baja<?php echo $fila['conFolio']; ?>" placeholder="Telefono" value="<?php echo $fila['conFechaBaja'];?>">
                                   </div>
                               </form>
                           </div>
                       </div>

                   </div>
                 </div>
             <?php
             }
              mysqli_close($conn);

                 ?>
         </tbody>
     </table>
    </div>
</div>

