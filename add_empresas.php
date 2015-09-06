<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Empresas</title>
    <!-- Bootstrap -->
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/stilo.css"/>
</head>
<body onload="viewdata()" id="cuerpo">
<p><br/></p>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Agregar Empresa
</button>
<br/>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Agregar Empresa</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="emp">Empresa</label>
                        <input type="text" class="form-control" id="emp" placeholder="Nombre de la empresa">
                    </div>
                    <div class="form-group">
                        <label for="con">Logo izq</label>
                        <input type="file" class="form-control" id="log1" placeholder="Nombre del contacto">
                    </div>
                    <div class="form-group">
                        <label for="email">Logo der</label>
                        <input type="file" class="form-control" id="log2" placeholder="Correo electronico">
                    </div>
                    <div class="form-group">
                        <label for="cel">Telefono</label>
                        <input type="text" class="form-control" id="tel" placeholder="telefono">
                    </div>
                    <div class="form-group">
                        <label for="tel">Celular</label>
                        <input type="text" class="form-control" id="cel" placeholder="celular">
                    </div>
                    <div class="form-group">
                        <label for="tel">Fecha Alta</label>
                        <input type="date" class="form-control" id="f_alta" placeholder="alta">
                    </div>
                    <div class="form-group">
                        <label for="tel">Correo</label>
                        <input type="text" class="form-control" id="email" placeholder="correo">
                    </div>
                    <div class="form-group">
                        <label for="tel">Contacto</label>
                        <input type="text" class="form-control" id="con" placeholder="contacto">
                    </div>
                    <div class="form-group">
                        <label for="tel">Descripción</label>
                        <textarea id="descripcion" class="form-control" heigth="300px"></textarea>
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
            url: "empresas.php"
        }).done(function( data ) {
            $('#viewdata').html(data);
        });
    }
    $('#save').click(function () {

        var nom_emp = $('#emp').val();
        var logoizq_emp = $('#log1').val();
        var logoder_emp = $('#log2').val();
        var tel_emp = $('#tel').val();
        var cel_emp = $('#cel').val();
        var fechareg_emp = $('#f_alta').val();
        var email_emp = $('#email').val();
        var contacto_emp = $('#con').val();
        var descricion_emp = $('#descripcion').val();


        var datos = "emp="+nom_emp+"&log1="+logoizq_emp+"&log2"+logoder_emp+
            "&tel="+tel_emp+"&cel="+cel_emp+"&f_alta="+fechareg_emp+"&email="+email_emp+
                "&con="+contacto_emp+"&descripcion="+descricion_emp;

        $.ajax({
           type : "POST",
           url : "controll/new_empresa.php",
           data: datos
        }).done(function (data){
            $('#info').html(data);
            viewdata();
        });
    });

</script>
</body>
</html>
