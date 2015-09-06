
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
         echo "<tr class='warning'><td>" . ++$contador . "</td><td>$fila[1]</td><td>$fila[2]</td>
      <td>$fila[3]</td><td>$fila[4]</td>
      <td>$fila[5]</td><td id='clave'".$fila[0] ?><?php echo"><center>".baja($fila[6],$fila[0])."</center></td>
      <td>$fila[7]</td><td><center><a href='#'><span class='glyphicon glyphicon-plus'></a></span></td></tr>";

         include "controll/conex2.php";

         $contador2 = 0;
         $resultado2 = mysqli_query($conn, "CALL sp_conHobjeto($fila[9])");
         if ($resultado2 == false) {
             echo "Error";
         }
         while ($fila2 = mysqli_fetch_row($resultado2)) {
             echo "<tr class='info'><td></td><td>$fila2[1]</td><td>$fila2[2]</td>
        <td>$fila2[3]</td><td>$fila2[4]</td>
        <td>$fila2[5]</td><td>".baja($fila2[6],$fila2[0])."</td>
        <td>$fila2[7]</td></tr>";
     }
 }// fin de while de
mysqli_close($conn);
       ?>
     </tbody>
     </table>
 </div>
 </div>
