<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contratos</title>
    <!-- Bootstrap -->
   <!-- <link href="css/bootstrap.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/stilo.css"/>
</head>
<body onload="viewdata()" id="cuerpo">
<p><br/></p>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Registra Contrato
    </button>
    <br/>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Registra Contrato</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label >Empresa</label>
                            <select  id="emp" class="form-control">
                                <?php
                              include "controll/conex2.php";
                              $consulta =  mysqli_query($conn,"CALL sp_list_empresa ");
                                while($opcion = mysqli_fetch_row($consulta)){
                                   echo "<option value='$opcion[0]'> $opcion[1]</option>";
                               }
                                mysqli_close($conn);
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Contacto</label>
                            <input type="text" class="form-control" id="con" placeholder="Nombre del contacto" >
                        </div>
                        <div class="form-group">
                            <label >Correo</label>
                            <input type="email" class="form-control" id="email" placeholder="Correo electronico">
                        </div>
                        <div class="form-group">
                            <label >Celular</label>
                            <input type="text" class="form-control" id="cel" placeholder="Celular">
                        </div>
                        <div class="form-group">
                            <label >Telefono</label>
                            <input type="text" class="form-control" id="tel" placeholder="Telefono">
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Licencias</label>
                            <div class="col-sm-2"><input type="number" id="lweb" class="form-control" value="0" ><div class="help">Web</div></div>
                            <div class="col-sm-2"><input type="number" id="lmovil" class="form-control" value="0"><div class="help">Móvil</div></div>
                            <div class="col-sm-2"><input type="number" id="ladmin" class="form-control" value="1"><div class="help">Admon</div></div>
                        </div>
                        <div class="form-group">
                            <label>Fecha Alta</label>
                            <input type="date" class="form-control" id="fech_alta">
                        </div>
                        <div class="form-group">
                            <label >Fecha Baja</label>
                            <input type="date" class="form-control" id="fech_baja">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="save"  class="btn btn-primary">Guardar</button>
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
            url: "contratos.php"// url para la peticion
        }).done(function( data ) {
            $('#viewdata').html(data);
        });
    }
    //salvando los datos del formulario
    $('#save').click(function(){
        var empresa = $('#emp').val();
        var contacto = $('#con').val();
        var correo = $('#email').val();
        var celular = $('#cel').val();
        var telefono = $('#tel').val();
        var licenciaW = $('#lweb').val();
        var licenciaM = $('#lmovil').val();
        var admin = $('#ladmin').val();
        var fechaA = $('#fech_alta').val();
        var fechaB = $('#fech_baja').val();

          alert(empresa +" " +contacto +" "+correo+" "+celular+" "+ telefono+" "+
            licenciaW+" "+licenciaM+ " "+admin +" "+fechaA+" "+fechaB);

        var datas = "con="+contacto+"&emp="+empresa+"&email="+correo+"&cel="+celular+
               "&tel="+telefono+"&lweb="+licenciaW+"&lmovil="+licenciaM+"&ladmin="+admin+
                "&fech_alta="+fechaA+"&fech_baja="+fechaB;

        $.ajax({
          type: "POST",
          url: "controll/new_contrato.php",
          data: datas
        }).done(function(data){
           $('#info').html(data);
            viewdata();
        });
    });
</script>
</body>
</html> 
