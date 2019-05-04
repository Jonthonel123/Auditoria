<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap" style="padding: 15px">
    <div class="container-fluid" style="padding-left: 0px !important;padding-right: 0px !important;">
        <div class="panel panel-default" style="border-top-color: #DAD4D4 ; border-top-width : 2px">
            <div class="panel-body">
                <div class="panel-body">

                    <form name="form_busqueda" id="form_busqueda" method="post"
                          action="<?php
                          echo site_url($this->config->item('path_backend') . '/Portada/buscar');
                          ?>">

                        <div class="col-md-12 form-group">

                            <div class="col-md-4">
                                <label class="control-label"> Nombre</label>
                                <input id="nombre" class="form-control input" type="text" name="nombre" maxlength="100"
                                       placeholder="nombre" value="<?php echo $nombre; ?>" class="input-small"/>
                            </div>

                            <div class="col-md-4">
                                <label class="control-label">Abrir pestaña nueva</label>
                                <select class="form-control select" name="target" id="target">
                                    <option value="">Seleccione</option>
                                    <option value="1" <?php if ($target == "1") echo "selected"; ?>>Si</option>
                                    <option value="0" <?php if ($target == "0") echo "selected"; ?>>No</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="control-label">Estado</label>
                                <select class="form-control select" name="estado" id="estado">
                                    <option value="">Seleccione</option>
                                    <option value="1" <?php if ($estado == "1") echo "selected"; ?>>Activo</option>
                                    <option value="0" <?php if ($estado == "0") echo "selected"; ?>>Inactivo</option>
                                </select>
                            </div>
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
            <h3 class="panel-title">Portadas</h3>
            <a href="<?php echo site_url($this->config->item('path_backend') . '/Portada/agregar'); ?>"
               class="btn btn-default pull-right"><i class="fa fa-plus"></i> Agregar</a>
        </div>

        <div class="panel-body">
            <table class="table table-hover table-cms">
                <thead>
                <tr>
                    <td colspan="4" align="center" valign="top"></td>
                </tr>
                <tr>
                    <th>Nombre</th>
                    <th>Enlace</th>
                    <th style="text-align:center;">Abrir Pestaña Nueva</th>
                    <th style="text-align:center;">Estado</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>

                <?php
                if (isset($portadas) && count($portadas) > 0)
                {

                    foreach ($portadas as $portada)
                    {
                        ?>
                        <tr>
                            <td><?php echo $portada->nombre; ?></td>
                            <td><?php echo $portada->enlace; ?></td>
                            <td style="text-align:center;">
                                <?php
                              if ($portada->target== null) echo '<span class="label label-success label-form" style="width:70px; font-weight:bolder;"></span>';elseif
                                 ($portada->target == 1) echo '<span class="label label-success label-form" style="width:70px; font-weight:bolder;">Si</span>'; else
                                echo '<span class="label label-danger label-form" style="width:70px; font-weight:bolder;">No</span>'
                                ?>
                            </td>

                            <td style="text-align:center;">
                                <?php
                                if ($portada->estado == 1) echo '<span class="label label-success label-form" style="width:70px; font-weight:bolder;">Activo</span>'; else
                                    echo '<span class="label label-danger label-form" style="width:70px; font-weight:bolder;">Inactivo</span>'
                                ?>
                            </td>
                            <td>

                                <a href="<?php echo site_url($this->config->item('path_backend') . '/Portada/editar/' . $portada->idportada); ?>"
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
