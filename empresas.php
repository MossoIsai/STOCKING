
 <div class="panel panel-primary">
  <div class="panel-heading"><h4>Empresas</h4></div>
  <div class="panel-body">
 <table class="table table-striped">
     <thead>
         <thead>
             <th>#</th>
             <th>Nombre</th>
             <th>Logo izquiero</th>
             <th>Logo derecho</th>
             <th>Telefono</th>
             <th>Celular</th>
             <th>Fecha de Alta</th>
             <th>Correo empresa</th>
             <th>Contacto</th>
             <th>Descripcion</th>
         </thead>
     </thead>
 <tbody>
<?php
  include ("controll/conex2.php");
   $contador = 0;
    $query = mysqli_query($conn,"CALL sp_list_empresa");
    while($fila = mysqli_fetch_row($query)){
        echo "<tr>
         <td>".++$cotador."</td><td>$fila[1]</td><td>$fila[2]</td>
         <td>$fila[3]</td><td>$fila[4]</td><td>$fila[5]</td>
         <td>$fila[6]</td><td>$fila[7]</td>
         <td>$fila[8]</td>
         <td>$fila[9]</td>
       </tr>";
    }
?>
  </tbody>
  </table>
</div>
</div>
