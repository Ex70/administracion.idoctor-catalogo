<?php echo form_open('clases/guardar'); ?>
<div style="height:50px"></div>
<div class="row" style="height:80px">
  <div class="six columns">Clave de equipo:</div>
  <div class="six columns">
    <?php
      if ($clase!="")
        echo $clase;
      else
        echo form_input("clase",$clase); ?></div>
  </div>
  <div class="row" style="height:80px">
    <div class="six columns">Descripci&oacute;n:</div>
    <div>
      <?php //echo form_input("estatus",(isset($estatus) ? $estatus : ""));
        echo form_input("descripcion",$descripcion);
        if ($clase!="") {
          echo form_hidden("accion", "u");
          echo form_hidden("clase",$clase);
        } else {
          echo form_hidden("accion", "i");
        }
      ?>
    </div>
  </div>
  <div class="row" align="center">
    <div align="center"><?php echo form_submit("submit","Enviar","class='button button-primary'"); ?></div>
  </div>
  <div class="row" align="center">
    <a href="/index.php/clases" ?>Regresar a los equipos</a>
  </div>
<?php echo form_close(); ?>