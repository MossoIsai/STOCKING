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
<body onload="viewdata()" id="cuerpo">
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
                        <select class="form-control" id="elemento">
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
                        <select name="" class="form-control" id="model">
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
                        <input type="text" class="form-control" id="nserie" placeholder="Numero de Serie">
                    </div>
                    <div class="form-group">
                        <label>Fecha de Modificación</label>
                        <input type="date" class="form-control" id="fech_modi">
                    </div>
                    <div class="form-group">
                        <label>Factura</label>
                        <input type="file" class="form-control" id="fac">
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
<div id="info"></div>
<br/>
<div id="viewdata"></div>
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
</script>
</body>
</html> 
