<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invetario</title>
    <!-- Bootstrap -->
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/stilo.css"/>
</head>
<body onload="viewdata()" id="cuerpo" onload="ventanaComponente()">
<p><br/></p>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Agrega Dispositivo
</button>
<br/>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Agrega Dispositivo</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label >Dispositivo</label>
                        <select class="form-control" id="dispositivo">
                            <?php
                              include "controll/conex2.php";
                              $consulta =  mysqli_query($conn,"CALL sp_elementos");
                              while($opcion = mysqli_fetch_row($consulta)){

                                echo "<option value='$opcion[0]'> $opcion[1]</option>";
                              }
                               mysqli_close($conn);
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="con">Marca</label>
                        <select name="" class="form-control" id="marca">
                            <?php
                            include "controll/conex2.php";
                            $consulta =  mysqli_query($conn,"CALL sp_marcas");
                            while($opcion = mysqli_fetch_row($consulta)){

                                echo "<option value='$opcion[0]'> $opcion[1]</option>";
                            }
                            mysqli_close($conn);
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Modelo</label>
                        <select name="" class="form-control" id="modelo">
                            <?php
                            include "controll/conex2.php";
                            $consulta =  mysqli_query($conn,"CALL sp_modelos");
                            while($opcion = mysqli_fetch_row($consulta)){
                                echo "<option value='$opcion[0]'> $opcion[1]</option>";
                            }
                            mysqli_close($conn);
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cel">Numero de Serie</label>
                        <input type="text" class="form-control" id="numeroserie" placeholder="Numero de Serie">
                    </div>
                    <div class="form-group">
                        <label>Fecha de Modificación</label>
                        <input type="date" class="form-control" id="fechamodificacion">
                    </div>
                    <div class="form-group">
                        <label>Factura</label>
                        <input type="file" class="form-control" id="factura">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" id="save" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
<!-- [FIN MODELO] --->

<!-- INICIO MODAL 2 -->
<div class="modal fade" id="myModalT" tabindex="-1" role="dialog" aria-labelledby="myModalLabelT">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabelT">Agrega Componente</h4>
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
                            <select class="form-control" id="mark">
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
                            <select id="model" class="form-control">
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
                            <input type="text" class="form-control" placeholder="Numero de Serie" id="n_serie"/>
                        </div>
                        <div class="form-group">
                            <label>Fecha de modificación</label>
                            <input type="date" class="form-control" id="fecha_mod"/>
                        </div>
                       <div class="form-group">
                           <label>Factura</label>
                           <input type="file" class="form-control" id="facture"/>
                       </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" id="guardar" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
<!-- [FIN MODAL 2]-->

<div id="info"></div>
<div id="informacion"></div>
<br/>
<div id="viewdata"></div>
<div id="ventanaDatos"></div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script>
    function viewdata(){
        $.ajax({
            type: "GET",
            url: "inventario.php"
        }).done(function( data ) {
            $('#viewdata').html(data);
        });
    }
    function ventanaComponente(){
        $.ajax({
            type:"GET",
            url : "inventario.php"
        }).done(function(data){
            $('#ventanaDatos').html(data);
        });
    }

    $('#save').click(function () {
        var dispo = $('#dispositivo').val();
        var marc = $('#marca').val();
        var modeloo = $('#modelo').val();
        var numSer = $('#numeroserie').val();
        var fecha_modificacion = $('#fechamodificacion').val();
        var factura = $('#factura').val();

        var datos = "dispositivo="+dispo+"&marca="+marc+"&modelo="+modeloo+
            "&numeroserie="+numSer+"&fechamodificacion="+fecha_modificacion+"&factura="+factura;

        $.ajax({
            type : "POST",
            url :  "controll/new_dispositivo.php",
            data: datos
        }).done(function( data){
            $('#viewdata').html(data);
            viewdata();
        });
    });

    $('#guardar').click(function () {
        var componente =  $('#component').val();
        var marca_c = $('#mark').val();
        var model_c = $('#model').val();
        var num_serie_c = $('#n_serie').val();
        var fecha_mod_c = $('#fecha_mod').val();
        var factura_c = $('#facture').val();


        var datas = "component="+componente+"&mark="+marca_c+"&model="+model_c+
                "&n_serie="+num_serie_c+"&fecha_mod="+fecha_mod_c+"&facture="+factura_c;

        $.ajax({
            type : "POST",
            url :  "controll/new_componente.php",
            data: datas
        }).done(function( data){

            $('#info').html(data);
            ventanaComponente();

        });
    });
</script>
</body>
</html> 
