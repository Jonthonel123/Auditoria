<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap" style="padding: 15px">
    <div class="container-fluid" style="padding-left: 0px !important;padding-right: 0px !important;">
        <div class="panel panel-default" style="border-top-color: #DAD4D4 ; border-top-width : 2px">
            <div class="panel-body">
                <div class="panel-body">

                    <form name="form_busqueda" id="form_busqueda" method="post" action="<?php
                                                                                        echo site_url($this->config->item('path_backend') . '/Informe/buscar');
                                                                                        ?>">

                        <div class="col-md-12 form-group">

                            <div class="col-md-6">
                                <label class="control-label"> Informes</label>
                                <input id="nombre" maxlength="255" class="form-control input" type="text" name="nombre" placeholder="Nombre" value="<?php echo $informes; ?>" class="input-small" />
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
                            <input type="hidden" name="buscar" id="buscar" value="" />
                        </div>

                        <div class="col-md-12 form-group">
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-primary pull-right" value="Buscar" />
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
            <a href="<?php echo site_url($this->config->item('path_backend') . '/Informe/agregar'); ?>" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Agregar</a>

        </div>
        <div class="panel-body">
            <table class="table table-hover table-cms">
                <thead>
                    <tr>
                        <td colspan="4" align="center" valign="top"></td>
                    </tr>
                    <tr>
                        <th>Informe</th>
                        <th>Area</th>
                        <th>Responsable</th>
                        <th>Email</th>
                        <th>Lugar</th>
                        <th>Documento</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $url = 'http://localhost/auditoria/';
                    ?>

                    <?php
                    if (isset($informes) && count($informes) > 0) {

                        foreach ($informes as $item) {
                            ?>
                            <tr>
                                <td><?php echo $item->nombreinforme; ?></td>
                                <td><?php echo $item->area; ?></td>
                                <td><?php echo $item->nombrepersona; ?></td>
                                <td><?php echo $item->email; ?></td>
                                <td><?php echo $item->lugar; ?></td>
                              
                                <td><a href="<?php echo $url . $item->documento; ?>" target="_blank">Ver Documento</a></td>
                                <td style="text-align:center;">
                                    <?php
                                    if ($item->estado == 1) echo '<span class="label label-success label-form" style="width:70px; font-weight:bolder;">Activo</span>';
                                    else
                                        echo '<span class="label label-danger label-form" style="width:70px; font-weight:bolder;">Inactivo</span>'
                                        ?>
                                </td>

                                <td>
                                    <a id="restore_password" href="javascript:enviarcorreo('<?php echo $item->id; ?>')" class="btn btn-warning btn-condensed" title="View"><i class="fas fa fa-envelope"></i></a>
                                    <a href="<?php echo site_url($this->config->item('path_backend') . '/Categoria/editar/' . $item->id); ?>" class="btn btn-info btn-condensed" title="Editar"><i class="fa fa-edit"></i></a>
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
    function enviarcorreo(id) {

        var url = "<?php echo site_url($this->config->item('path_backend') . '/Informe/contact'); ?>";

        Swal.fire({
            title: 'Desea enviar su mensaje ahora?',
            text: "Eliga una opcion!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Enviar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.value) {

                $.post(url, {
                    id: id
                });

                Swal.fire(
                    'Enviado!',
                    'Se envio el mensaje',
                    'success'
                )
            }
        })


    }
</script>


<script type="text/javascript">
    $(function () {
        var fileName = "Mudassar_Khan.pdf";
        $("#btnShow").click(function () {
            $("#dialog").dialog({
                modal: true,
                title: fileName,
                width: 540,
                height: 450,
                buttons: {
                    Close: function () {
                        $(this).dialog('close');
                    }
                },
                open: function () {
                    var object = "<object data=\"{FileName}\" type=\"application/pdf\" width=\"500px\" height=\"300px\">";
                    object += "If you are unable to view file, you can download from <a href=\"{FileName}\">here</a>";
                    object += " or download <a target = \"_blank\" href = \"http://get.adobe.com/reader/\">Adobe PDF Reader</a> to view the file.";
                    object += "</object>";
                    object = object.replace(/{FileName}/g, "Files/" + fileName);
                    $("#dialog").html(object);
                }
            });
        });
    });
</script>


<!--
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery(document).on('click', '#paginador ul li a', function(c) {
            c.preventDefault();
            var inicio = jQuery(this).attr('href');
            jQuery("#form_busqueda").attr("action", inicio);
            jQuery("#form_busqueda").submit();
        });
    });


    $('#export_beneficio').click(function(e) {
        e.preventDefault();

        var url = "<?php echo site_url($this->config->item('path_backend') . '/Categoria/export'); ?>";
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
</script> -->


<!-- END PAGE CONTENT WRAPPER -->
