<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap" style="padding: 15px">
    <div class="container-fluid" style="padding-left: 0px !important;padding-right: 0px !important;">
        <div class="panel panel-default" style="border-top-color: #DAD4D4 ; border-top-width : 2px">
            <div class="panel-body">
                <div class="panel-body">

                    <form name="form_busqueda" id="form_busqueda" method="post"
                          action="<?php
                          echo site_url($this->config->item('path_backend') . '/Asistencia/buscar');
                          ?>">

                        <div class="col-md-12 form-group">

                            <div class="col-md-6">
                                <label class="control-label"> Nombre</label>
                                <input id="nombre" maxlength="255" class="form-control input" type="text" name="nombre"
                                       placeholder="Nombre" value="<?php echo $nombre; ?>" class="input-small"/>
                            </div>

                            <!-- <div class="col-md-6">
                                <label class="control-label">Tipo</label>
                                <select class="form-control select" name="tipo" id="tipo">
                                    <option value="">Seleccione</option>
                                    <option value="1" <?php if ($tipoSeleccionado == "1") echo "selected"; ?>>Escolar</option>
                                    <option value="2" <?php if ($tipoSeleccionado == "2") echo "selected"; ?>>Oficina</option>
                                </select>
                            </div> -->

                        </div>

                        <div class="col-md-12 form-group">
                            <input type="hidden" name="buscar" id="buscar" value=""/>
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
            <a id="export_beneficio" class="btn btn-danger dropdown-toggle pull-right" style="margin-left: 5px;">
              <img src="<?php echo base_url('assets/backend/'); ?>/img/icons/xls.png" width="16"/> Exportar</a>
            <a href="<?php echo site_url($this->config->item('path_backend') . '/Asistencia/agregar'); ?>"
                 class="btn btn-default pull-right"><i class="fa fa-plus"></i> Agregar</a>

        </div>
        <div class="panel-body">
            <table class="table table-hover table-cms">
                <thead>
                <tr>
                    <td colspan="4" align="center" valign="top"></td>
                </tr>
                <tr>
                    <th>Nombres</th>
                    <th>Asistios</th>
                    <th>NoAsitio</th>
                    <th>Justifico</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>

                <?php
                if (isset($asistencias) && count($asistencias) > 0)
                {

                    foreach ($asistencias as $asistencia)
                    {
                        ?>
                        <tr>
                          <td><?php echo $asistencia->idalumno; ?></td>

                            <td style="text-align:center;">
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

                            <td>
                              <a href="<?php echo site_url($this->config->item('path_backend') . '/Asistencia/editar/' . $item->id); ?>"
                                 class="btn btn-info btn-condensed" title="Editar"><i class="fa fa-edit"></i></a>
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


    $('#export_beneficio').click(function (e) {
        e.preventDefault();

        var url = "<?php echo site_url($this->config->item('path_backend') . '/Categoria/export');?>";
        var nombre = $("#nombre").val();
        var tipo = $("#tipo").val();

        window.location.href = url + "?nombre=" + nombre + "&tipo=" + tipo;

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
