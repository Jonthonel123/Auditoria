<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap" style="padding: 15px">
    <div class="container-fluid" style="padding-left: 0px !important;padding-right: 0px !important;">
        <div class="panel panel-default" style="border-top-color: #DAD4D4 ; border-top-width : 2px">
            <div class="panel-body">
                <div class="panel-body">


                    <form name="form_busqueda" id="form_busqueda" method="post"
                          action="<?php
                          echo site_url($this->config->item('path_backend') . '/productos/buscar');
                          ?>">

                        <div class="col-md-12 form-group">

                            <div class="col-md-6">
                                <label class="control-label"> Nombre</label>
                                <input id="nombre" class="form-control input" type="text" name="nombre" maxlength="255"
                                       placeholder="Nombre" value="<?php echo $nombre; ?>" class="input-small"/>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label"> SKU</label>
                                <input id="sku" class="form-control input" type="text" name="sku" maxlength="255"
                                       placeholder="SKU" value="<?php echo $sku; ?>" class="input-small"/>
                            </div>

                        </div>

                        <div class="col-md-12 form-group">

                            <div class="col-md-6">
                                <label class="control-label">Categoría</label>
                                <select class="form-control select" name="categoria" id="categoria">
                                    <option value="">Seleccione</option>
                                    <?php foreach ($categorias as $categoria)
                                    { ?>
                                        <option
                                            value="<?php echo $categoria->id; ?>" <?php if ($categoria->id == $categoria_select)
                                        {
                                            echo "selected";
                                        } ?>>
                                            <?php echo $categoria->nombre; ?>
                                        </option>
                                    <?php } ?>
                                </select>

                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Tipo</label>
                                <select class="form-control select" name="tipo" id="tipo">
                                    <option value="">Seleccione</option>
                                    <option value="1" <?php if ($tipoSeleccionado == "1") echo "selected"; ?>>Escolar</option>
                                    <option value="2" <?php if ($tipoSeleccionado == "2") echo "selected"; ?>>Oficina</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12 form-group">

                          <div class="col-md-6">
                              <label class="control-label">Nuevo</label>
                              <select class="form-control select" name="nuevo" id="nuevo">
                                  <option value="">Seleccione</option>
                                  <option value="1" <?php if ($productonuevo== "1") echo "selected"; ?>>Si</option>
                                  <option value="0" <?php if ($productonuevo == "0") echo "selected"; ?>>No</option>
                              </select>
                          </div>

                            <div class="col-md-6">
                                <label class="control-label">Estrella</label>
                                <select class="form-control select" name="estrella" id="estrella">
                                    <option value="">Seleccione</option>
                                    <option value="1" <?php if ($productoestrella== "1") echo "selected"; ?>>Si</option>
                                    <option value="0" <?php if ($productoestrella == "0") echo "selected"; ?>>No</option>
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
            <h3 class="panel-title">Listado</h3>
            <a id="export_beneficio" class="btn btn-danger dropdown-toggle pull-right" style="margin-left: 5px;">
              <img src="<?php echo base_url('assets/backend/'); ?>/img/icons/xls.png" width="16"/> Exportar</a>
            <a href="<?php echo site_url($this->config->item('path_backend') . '/productos/agregar'); ?>"
                 class="btn btn-default pull-right"><i class="fa fa-plus"></i> Agregar</a>

        </div>
        <div class="panel-body">
            <table class="table table-hover table-cms">
                <thead>
                <tr>
                    <td colspan="4" align="center" valign="top"></td>
                </tr>
                <tr>
                  <th>Foto</th>
                  <th>SKU</th>
                  <th>Nombre</th>
                  <th>Tipo</th>
                  <th>Categoría</th>
                  <th>Nuevo</th>
                  <th>Estrella</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>

                <?php
                if (isset($registros) && count($registros) > 0)
                {

                    foreach ($registros as $item)
                    {
                        ?>
                        <tr>
                          <td><img width="100" src="<?php echo ($item->foto != '')? base_url($item->foto) : base_url('assets/frontend/images/productos/default.png'); ?>" ></td>
                          <td><?php echo $item->sku; ?></td>
                          <td><?php echo $item->nombre; ?></td>
                          <td style="text-align:center;">
                              <?php
                              if ($item->tipo == 1) echo 'Escolar'; else echo 'Oficina'
                              ?>
                          </td>
                          <td><?php echo $item->categoria; ?></td>
                          <td style="text-align:center;">
                              <?php
                            if ($item->nuevo== null) echo '<span class="label label-success label-form" style="width:70px; font-weight:bolder;"></span>';elseif
                               ($item->nuevo == 1) echo '<span class="label label-success label-form" style="width:70px; font-weight:bolder;">Si</span>'; else
                              echo '<span class="label label-danger label-form" style="width:70px; font-weight:bolder;">No</span>'
                              ?>
                          </td>
                          <td style="text-align:center;">
                            <?php
                          if ($item->estrella== null) echo '<span class="label label-success label-form" style="width:70px; font-weight:bolder;"></span>';elseif
                             ($item->estrella == 1) echo '<span class="label label-success label-form" style="width:70px; font-weight:bolder;">Si</span>'; else
                            echo '<span class="label label-danger label-form" style="width:70px; font-weight:bolder;">No</span>'
                            ?>
                          </td>
                          <td style="text-align:center;">
                              <?php
                              if ($item->estado == 1) echo '<span class="label label-success label-form" style="width:70px; font-weight:bolder;">Activo</span>'; else
                                  echo '<span class="label label-danger label-form" style="width:70px; font-weight:bolder;">Inactivo</span>'
                              ?>
                          </td>

                          <td>
                            <a href="<?php echo site_url($this->config->item('path_backend') . '/productos/editar/' . $item->id); ?>"
                               class="btn btn-info btn-condensed" title="Editar"><i class="fa fa-edit"></i></a>

                            <a href="<?php echo site_url($this->config->item('path_backend') . '/productos/eliminar/' . $item->id); ?>"
                                  class="btn btn-danger btn-condensed" title="ELIMINAR"><i class="fa fa-minus-circle"></i></a>
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

<div class="message-box animated fadeIn" data-sound="alert" id="mb-delete">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-sign-out"></span> Cerrar <strong>sesión</strong> ?</div>
            <div class="mb-content">
                <p>¿Está seguro que desea salir del sistema?</p>
                <p>Presione "NO" si desea continuar trabajando, presione "SI" para cerrar su sesión.</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <a href="<?php echo site_url($this->config->item('path_backend').'/logout'); ?>" class="btn btn-success btn-lg">SI</a>
                    <button class="btn btn-default btn-lg mb-control-close">NO</button>
                </div>
            </div>
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

        var url = "<?php echo site_url($this->config->item('path_backend') . '/productos/export');?>";
        var nombre = $("#nombre").val();
        var sku = $("#sku").val();
        var tipo = $("#tipo").val();
        var categoria = $("#categoria").val();

        window.location.href = url + "?nombre=" + nombre + "&tipo=" + tipo + "&sku=" + sku + "&categoria=" + categoria;

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
