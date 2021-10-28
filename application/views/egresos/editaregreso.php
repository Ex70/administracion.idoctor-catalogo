<style>
    .ocultar {};
    .imagentipo {};
</style>
<?php
    $att = array('id' => 'formequipos','name' =>'form_equipos');
    echo form_open('egresos/modificaregreso',$att);
?>
<div id="tabs">
    <div id="tabs-cliente">
        <div class="row" style="border-bottom:1px solid #666;height:40px"><h5><b>Egresos - Registro</b></h5></div>
        <br>
        <div class="row">
            <div class="six columns" align="right"><b>Fecha</b></div>
            <div class="six columns"><?php
                $dat = array(
                'name'        => 'fecha',
                'id'          => 'fecharecibido',
                'value'       => $fecha_recibido,
                'maxlength'   => '20',
                'size'        => '12',
                'style'       => 'color:#660000;font-weight:bold;font-size:1.4em;width:200px'
                );
                $dat['readonly'] = 'readonly';
                echo form_input($dat);
            ?></div>
        </div>
    </div>
    <div id="tabs-producto">
        <div class="row">
            <div class="six columns" align="right"><b>Sucursal Egreso</b></div>
            <div class="six columns">
                <select class="form-control" id="sub_category3" name="sucursal_id_egreso" required>
                <?php foreach($sucursalEgreso as $row):?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['nombre'];?></option>
                <?php endforeach;?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="six columns" align="right"><b>Sucursal Aplicación</b></div>
            <div class="six columns">
                <select class="form-control" id="sub_category3" name="sucursal_id_aplicacion" required>
                <?php foreach($sucursalAplicacion as $row):?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['nombre'];?></option>
                <?php endforeach;?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="six columns" align="right"><b>Tipo de egreso a realizar</b></div>
            <div class="six columns">
                <select class="form-control" name="tipoegreso_id" id="category" required>
                <?php foreach($tipos as $row):?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['nombre'];?></option>
                <?php endforeach;?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="six columns" align="right"><b>Categoría del egreso</b></div>
            <div class="six columns">
                <select class="form-control" id="sub_category" name="categoriaegreso_id" required>
                    <?php foreach($categorias as $row):?>
                        <option value="<?php echo $row['id'];?>"><?php echo $row['nombre'];?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="six columns" align="right"><b>Seleccione egreso</b></div>
            <div class="six columns">
                <select class="form-control" id="sub_category2" name="subcategoriaegreso_id" required>
                <?php foreach($subcategorias as $row):?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['nombre'];?></option>
                <?php endforeach;?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="six columns" align="right"><b>Concepto</b></div>
            <div class="six columns"><?php echo form_input("concepto",$concepto," required "); ?></div>
        </div>
        <div class="row">
            <div class="six columns" align="right"><b>Observaciones</b></div>
            <div class="six columns"><?php echo form_input("observaciones",$observaciones); ?></div>
        </div>
        <div class="row">
        <div class="six columns" align="right"><b>Forma de pago</b></div>
            <div class="six columns">
            <?php
                $opciones = array("DEPOSITOS"=>"Depósito",
                "EFECTIVO"=>"Efectivo",
                "TARJETA"=>"Tarjeta de crédito/débito",
                "TRANSFERENCIA"=>"Transferencia bancaria"
                );
            echo form_dropdown("forma_pago",$opciones,"NOESP","id='forma'");
            ?>
            </div>
        </div>
        <div class="row">
            <div class="six columns" align="right"><b>Importe</b></div>
            <div class="six columns"><?php $importeArray = array('name'=>'importe', 'value'=>$importe,'id'=>'importe','required'=>'required'); echo form_input($importeArray); ?> <p style="color: red;" id="error"></p></div>
        </div>
        <!-- <div class="row">
            <div class="six columns" align="right"><b>Usuario que ingresa</b></div>
            <div class="six columns" disabled><?php $usuarioArray = array('name'=>'usuario_id_ingreso','id'=>'usuario_id_ingreso', 'value' => $this->session->usuario,'disabled'=>'disabled'); echo form_input($usuarioArray); ?></div>
            <?php echo form_hidden('usuario_id_ingreso', $this->session->usuario); ?>
        </div> -->
        <?php echo form_hidden('usuario_id_ingreso', $usuario_id_ingreso); ?>
        <div class="row">
            <div class="six columns" align="right"><b>Quién solicita</b></div>
            <div class="six columns">
                <select class="form-control" id="usuarioSolicita" name="usuario_id_solicita" required>
                <?php foreach($usuario_id_solicita as $row):?>
                    <option value="<?php echo $row['usuario'];?>"><?php echo $row['nombre'];?></option>
                <?php endforeach;?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="six columns" align="right"><b>Quién autoriza</b></div>
            <div class="six columns">
                <select class="form-control" id="usuarioAutoriza" name="usuario_id_autoriza" required>
                <?php foreach($usuario_id_autoriza as $row):?>
                    <option value="<?php echo $row['usuario'];?>"><?php echo $row['nombre'];?></option>
                <?php endforeach;?>
                </select>
            </div>
        </div>
    </div><!-- tab ---------------------------------------------------------------------------- -->
</div><!-- tabs ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<?php echo form_hidden('id', $id); ?>
    <div class="row" style="margin-top:60px">
        <div align="center"><input style="font-size:1.3em" class="button button-primary" type='button' value='Enviar' name='botonenviar' id='botonenviar'></div>
    </div>
    <?php echo form_close();
?>
<!-- SCRIPTS -------------------------------------------------------------------------------------------- -->
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        fechas = $("#fecharecibido").val();
        $('#category').change(function(){
            var ID=$(this).val();
            $.ajax({
                url : "<?php echo site_url('egresos/obtenerCategorias');?>",
                method : "POST",
                data : {ID: ID},
                async : true,
                dataType : 'json',
                success: function(data){
                var html = '';
                var i;
                html += '<option>Seleccionar</option>';
                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].ID+'>'+data[i].NOMBRE+'</option>';
                }
                $('#sub_category').html(html);
                $('#sub_category2').html(html);
                }
            });
        return false;
        });
        $('#sub_category').change(function(){
            var ID=$(this).val();
            $.ajax({
                url : "<?php echo site_url('egresos/obtenerSubCategorias');?>",
                method : "POST",
                data : {ID: ID},
                async : true,
                dataType : 'json',
                success: function(data){
                var html = '';
                var i;
                html += '<option>Seleccionar</option>';
                for(i=0; i<data.length; i++){
                    html += "<option value='"+data[i].ID+"'>"+data[i].NOMBRE+"</option>";
                }
                $('#sub_category2').html(html);
                }
            });
            return false;
        });
    });
</script>

<script language="javascript">
    document.getElementById('importe').onchange = function() {
        let x = document.getElementById("importe").value;
        let text;
        if (isNaN(x) || x < 1 || x > 10000000) {
            text = "Ingrese un importe correcto";
            document.getElementById("error").innerHTML = text;
        } else {
            text = "";
            document.getElementById("error").innerHTML = text;
        }
    };
    var yaseleccionofechaentrega = false;
    $(document).ready(function () {
        $( "#fecharecibido" ).datepicker({ dateFormat: 'yy-mm-dd' });
        $( "#fechaentrega" ).datepicker({ dateFormat: 'yy-mm-dd' });
        $( "#fechadediagnostico" ).datepicker({ dateFormat: 'yy-mm-dd' });
        $( "#fechaentrega").change(function() {
            yaseleccionofechaentrega = true;
        });
        $('#tel1').bind('keyup', function() {
        var fvalue = document.getElementById('tel1').value;
        var r = /(\D+)/g,
            npa = '',
            nxx = '',
            last4 = '';
        fvalue = fvalue.replace(r, '');
        npa = fvalue.substr(0, 3);
        nxx = fvalue.substr(3, 3);
        last4 = fvalue.substr(6, 4);
        fvalue = npa + '-' + nxx + '-' + last4;
        document.getElementById('tel1').value = fvalue;
        });
        $('#tel2').bind('keyup', function() {
        var fvalue = document.getElementById('tel2').value;
        var r = /(\D+)/g,
            npa = '',
            nxx = '',
            last4 = '';
        fvalue = fvalue.replace(r, '');
        npa = fvalue.substr(0, 3);
        nxx = fvalue.substr(3, 3);
        last4 = fvalue.substr(6, 4);
        fvalue = npa + '-' + nxx + '-' + last4;
        document.getElementById('tel2').value = fvalue;
        });
        $('#botonenviar').click(function() {
        <?php if (FALSE) {  ?>
            if ($('#nombrecliente').val()=="") {
            $("#tabs").tabs( "option", "active", 0 );
            alert('Por favor escribe el nombre del cliente o selecciona uno ya capturado.');
            }
            else
            if ($('#tipo').val()=="") {
                $("#tabs").tabs( "option", "active", 1 );
                alert('Por favor especifica el tipo.');
            }
            else
                if ($('#descproblema').val()=="") {
                $("#tabs").tabs( "option", "active", 2 );
                alert('Por favor especifica la descripción del problema.');
                }
                else
                if ($('#condreceq').val()=="") {
                    $("#tabs").tabs( "option", "active", 2 );
                    alert('Por favor especifica las condiciones de recepción del equipo.');
                }
                else
        <?php } ?>
        {
            if ($('#fecharecibido').val()>fechas) {
                alert('No podemos viajar en el tiempo para descifrar ese ingreso. Ingresa una fecha correcta por favor');
            }else{
                if ($('#sub_category').val()=="Seleccionar") {
                    alert('Por favor selecciona una categoría del egreso.');
                }else{
                    if ($('#sub_category2').val()=="Seleccionar") {
                        alert('Por favor selecciona un egreso.');
                    }else{
                        $('#formequipos').submit();
                    }
                }
            }
        }
        });
        // SELECT TIPO
        $("#tipo").change(function() {
            var t = $("#tipo").val();
            var clase = "";
            $.get( "/index.php/tipos/verclasedetipo/" + t, function( data ) {
                clase = data;
                $("#framepaquetes").load("/index.php/paquetes/verpaquetesclase/" + clase);
            });
            if (t.substring(0,5)=="iPhon") {
                $('#ipop').show();
                $('#ipimei').show();
                $('#ipfirmware').show();
            }else {
                $('#ipop').hide();
                $('#ipimei').hide();
                $('#ipfirmware').hide();
            }
            $.getJSON('/index.php/tipos/subtiposjson/' + t, null, function(data) {
            var options = '';
            $.each(data, function(key, val) {
                options += '<option value="' + key + '">' + val + '</option>';
            });
            $('#capacidad').html(options);
            $("#capacidad option[value='']").remove();
        });
        if (t!="") {
            $("#imgtipo").attr("src", "/images/tipos/" + t + ".png");
        }
    });
});

    function seleccionarcliente(id,nombre,correo) {
        $("#clienteid").val(id);
        $("#nombrecliente").val(nombre);
        $("#correo").val(correo);
        $(".ocultar").hide();
    }
</script>