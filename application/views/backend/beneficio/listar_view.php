<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap" style="padding: 15px">
    <div class="container-fluid" style="padding-left: 0px !important;padding-right: 0px !important;">
        <div class="panel panel-default" style="border-top-color: #DAD4D4 ; border-top-width : 2px">
            <div class="panel-body">
                <div class="panel-body">


                    <form name="form_busqueda" id="form_busqueda" method="post"
                          action="<?php
                          echo site_url($this->config->item('path_backend') . '/Registrados/buscar');
                          ?>">


                        <div class="col-md-12 form-group">

                            <div class="col-md-6">
                                <label class="control-label"> Nombre</label>
                                <input id="nombre" class="form-control input" type="text" name="nombre"
                                       placeholder="Nombre" value="<?php echo $nombre; ?>" class="input-small"/>
                            </div>

                            <div class="col-md-6">
                                <label class="control-label">Categoría</label>

                                <select class="form-control select" name="departamento" id="departamento">
                                  <option value="">Seleccione</option>
                                  <?php foreach ($departamentosUbigeo as $ubigeo)
                                  { ?>
                                      <option
                                          value="<?php echo $ubigeo->departamento; ?>" <?php if ($ubigeo->departamento == $departamentoSeleccionado)
                                      {
                                          echo "selected";
                                      } ?>>
                                          <?php echo $ubigeo->departamento; ?>
                                      </option>
                                  <?php } ?>
                                </select>

                            </div>

                        </div>
                        <div class="col-md-12 form-group">
                            <div class="col-md-6">
                                <label class="control-label">Fecha de Inicio</label>
                                <input type="text" class="form-control" value="<?php echo $fecha_inicio?>" name="fecha_inicio" id="fecha_inicio" />

                            </div>

                            <div class="col-md-6">
                                <label class="control-label">Fecha de Finalización</label>
                                <input type="text" class="form-control" value="<?php echo $fecha_fin?>" name="fecha_fin" id="fecha_fin" />

                            </div>


                        </div>
                        <div class="col-md-12 form-group">
                            <input type="hidden" name="buscar" id="buscar"
                                   value=""/>

                        </div>
                        <div class="col-md-12 form-group">
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-primary pull-right" value="Buscar"/>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="panel panel-default" style="border-top-color: #DAD4D4 ; border-top-width : 2px">
        <div class="panel-heading">
            <h3 class="panel-title">Listado</h3>
            <a id="export_beneficio" class="btn btn-danger dropdown-toggle pull-right" style="margin-left: 5px;"><img
                    src="<?php echo base_url('assets/backend/'); ?>/img/icons/xls.png" width="16"/> Exportar</a>

        </div>
        <div class="panel-body">
            <table class="table table-hover table-cms">
                <thead>
                <tr>
                    <td colspan="4" align="center" valign="top"></td>
                </tr>
                <tr>
                    <th>Fecha</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Nacimiento</th>
                    <th>Dni</th>
                    <th>Departamento</th>
                    <th>Distrito</th>
                    <th>Héroe</th>
                    <th>Poderes</th>
                    <th>Foto</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>

                <?php
                if (isset($registrados) && count($registrados) > 0)
                {

                    foreach ($registrados as $registro)
                    {
                        ?>
                        <tr>
                            <td><?php echo $registro->registro; ?></td>
                            <td><?php echo $registro->nombre; ?></td>
                            <td><?php echo $registro->correo; ?></td>
                            <td><?php echo $registro->nacimiento; ?></td>
                            <td><?php echo $registro->dni; ?></td>
                            <td><?php echo $registro->departamento; ?></td>
                            <td><?php echo $registro->distrito; ?></td>
                            <td><?php echo $registro->quien; ?></td>
                            <td><?php echo $registro->poderes; ?></td>
                            <td> <a href="<?php echo base_url($registro->foto);?>" target="_blank"><img style="width: 80px;" src="<?php echo base_url($registro->foto);?>" alt=""></a> </td>

                            <td>
                              <?php if($registro->enviado == 0){?>
                                <a href="<?php echo site_url($this->config->item('path_backend') . '/registrados/send/' . $registro->id); ?>"
                                   class="btn btn-danger btn-condensed" title="Enviar"><i class="fa fa-envelope"></i></a>
                              <?php } else { ?>
                                <span class="btn  btn-condensed" title="Enviado"><i class="fa fa-check"></i></span>
                              <?php }  ?>

                            </td>

                        </tr>
                        <?php
                    }

                }
                ?>

                </tbody>
            </table>
            <?php


            if (isset($paginador)) echo $paginador;
            ?>

        </div>
    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery(document).on('click', '#paginador ul li a', function (c) {
            c.preventDefault();
            var inicio = jQuery(this).attr('href');
            jQuery("#form_busqueda").attr("action", inicio);
            jQuery("#form_busqueda").submit();
        });
    });


    $('#export_beneficio').click(function () {
        // e.preventDefault();

        var url = "<?php echo site_url($this->config->item('path_backend') . '/Registrados/export');?>";
        var nombre = $("#nombre").val();
        var departamento = $("#departamento").val();
        var fecha_inicio = $("#fecha_inicio").val();
        var fecha_fin = $("#fecha_fin").val();

        //console.log (url+"?nombre="+nombre+"&categoria="+categoria+"&empresa="+empresa+"&tipo="+tipo+"&estado="+estado );

        window.location.href = url + "?nombre=" + nombre + "&departamento=" + departamento + "&fecha_inicio=" + fecha_inicio + "&fecha_fin=" + fecha_fin;

        /*
         $.get(url+"?nombre="+nombre+"&categoria="+categoria+"&empresa="+empresa+"&tipo="+tipo+"&estado="+estado,null,
         function(resultado){
         window.open(resultado);
         },"html"
         );
         */
    });


    $("#fecha_inicio").datetimepicker({
        format: 'YYYY-MM-DD',
        locale: 'es'
    });

    $("#fecha_fin").datetimepicker({
        format: 'YYYY-MM-DD',
        locale: 'es'
    });

</script>


<!-- END PAGE CONTENT WRAPPER -->
