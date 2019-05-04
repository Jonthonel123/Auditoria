
<!-- PAGE CONTENT WRAPPER -->

<div class="page-content-wrap">

    <div class="container-fluid">
        <div class="col-md-12 panel-body">
            <div class="block" style="background-color:#EEEEEE;margin-bottom: 0px;padding-bottom:20px;">
                <form action="<?php echo site_url($this->config->item('path_backend').'/Asistencia/agregar');?>" id="agregar_beneficio" class="form-horizontal" role="form" name="agregar_beneficio" method="post"
                      enctype="multipart/form-data" action="">
                      <div class="panel-body">
                          <table class="table table-hover table-cms">
                              <thead>
                              <tr>
                                  <td colspan="4" align="center" valign="top"></td>
                              </tr>
                              <tr>
                                  <th>Nombres</th>
                                  <th>Asistio</th>
                                  <th>NoAsitio</th>
                                  <th>Justifico</th>
                              </tr>
                              </thead>
                              <tbody>


                              <?php


                                for ($i=0; $i < 2; $i++) {

                                      ?>

                                      <tr>

                                        <td>
                                          <div class="form-group">
                                              <div class="col-md-10">
                                                  <input type="text" maxlength="255" class="form-control" value="" name="idalumno"  id="idalumno" required/>
                                              </div>
                                          </div>
                                        </td>

                                      <!-- <td><?php echo '<input type="text" value="'.$alumno->idalumno.'" name="idalumno"  id="idalumno"/>' ?> </td>
                                        <td> -->

                                        <td>
                                        <div class="form-group">
                                            <div class="col-md-5">
                                                <select class="form-control select" name="asistio" id="asistio" required>
                                                    <option value="">Seleccione</option>
                                                    <option value="1">Asistio</option>
                                                    <option value="2">No asistio</option>
                                                </select>
                                            </div>
                                        </div></td>

                                        <td>
                                        <div class="form-group">
                                            <div class="col-md-5">
                                                <select class="form-control select" name="noasistio" id="noasistio" required>
                                                    <option value="">Seleccione</option>
                                                    <option value="1">Asistio</option>
                                                    <option value="2">No asistio</option>
                                                </select>
                                            </div>
                                        </div></td>

                                        <td>
                                          <div class="form-group">

                                              <div class="col-md-10">
                                                  <input type="text" maxlength="255" class="form-control" value="" name="justificacion"  id="justificacion" required/>
                                              </div>
                                          </div>
                                        </td>

                                          <!-- <td style="text-align:center;">
                                              <?php
                                              if ($asistencia->asistio == 1) echo '<span class="label label-success label-form" style="width:70px; font-weight:bolder;">Asistio</span>'; else
                                                  echo '<span class="label label-danger label-form" style="width:70px; font-weight:bolder;">No existe</span>'
                                              ?>
                                          </td>
                                          <td style="text-align:center;">
                                              <?php
                                              if ($asistencia->noasistio == 2) echo '<span class="label label-success label-form" style="width:70px; font-weight:bolder;">noActivo</span>'; else
                                                  echo '<span class="label label-danger label-form" style="width:70px; font-weight:bolder;">Inactivo</span>'
                                              ?>
                                          </td>

                                            <td><?php echo $asistencia->justificacion; ?></td>
                                            -->
                                      </tr>


                                      <?php
                                  }


                              ?>

                              </tbody>
                          </table>

                          <?php
                          if (isset($paginador)) echo $paginador;
                          ?>

                      </div>
<!--
                    <div class="form-group">
                        <label class="col-md-2 control-label">Nombres</label>
                        <div class="col-md-10">
                            <input type="text" maxlength="255" class="form-control" value="" name="nombres"  id="nombres" required/>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-2 control-label">Asistio</label>
                        <div class="col-md-10">
                            <select class="form-control select" name="asistio" id="asistio">
                                <option value="">Seleccione</option>
                                <option value="1">Si</option>
                                <option value="2">No</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-2 control-label">No asistio</label>
                        <div class="col-md-10">
                            <select class="form-control select" name="noasistio" id="noasistio">
                                <option value="">Seleccione</option>
                                <option value="1">Si</option>
                                <option value="2">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">justificacion</label>
                        <div class="col-md-10">
                            <input type="text" maxlength="255" class="form-control" value="" name="justificacion"  id="justificacion" required/>
                        </div>
                    </div> -->


                    <div class="btn-group pull-right">
                        <a type="button" class="btn btn-primary"  style="margin-right: .5em;" href="<?php echo site_url($this->config->item('path_backend').'/inicio');?>">Cancelar</a>
                        <input type="submit" class="btn btn-primary" value="Guardar" name="agregar" id="agregar" />
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT WRAPPER -->



<script type="text/javascript">


        function placeMarker(location) {
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });

            $('#latitud').val(marker.getPosition().lat());
            $('#longitud').val(marker.getPosition().lng());

            markes.push(marker);
        }


    $(".spinner_default").spinner();
    $("#div_delivery").hide();
    $("#div_some_locals").hide();


   var jvalidate = $("#agregar_beneficio").validate({
       ignore: [],
       rules: {
           categoria: {
               required: true
           },

           nombre: {
               required: true
           },

           puntos: {
               required: true
           },

           fecha_inicio: {
               required: true
           },
           fecha_fin: {
               required: true
           },
           estado: {
               required: true
           }
       }
   });

   $(document).ready(function(){
       $('#telefono').keypress(validateNumber);
       $('#puntos').keypress(validateNumber);
       $('#orden').keypress(validateNumber);

   });

   function validateNumber(event) {
       var key = window.event ? event.keyCode : event.which;

       if (event.keyCode === 8 || event.keyCode === 46
           || event.keyCode === 37 || event.keyCode === 39) {
           return true;
       }
       else if ( key < 48 || key > 57 ) {
           return false;
       }
       else return true;
   }

   function validateNumberDouble(event) {
       var code = (event.which) ? event.which : event.keyCode;
       if(code==8 || code ==45 || code == 46)
       {
           //backspace
           return true;
       }
       else if(code>=48 && code<=57)
       {
           //is a number
           return true;
       }
       else
       {
           return false;
       }
   }


    $("#fecha_inicio").datetimepicker({

        format: 'YYYY-MM-DD',
        locale: 'es'
    });

    $("#fecha_fin").datetimepicker({
        format: 'YYYY-MM-DD',
        locale: 'es'
    });

</script>
