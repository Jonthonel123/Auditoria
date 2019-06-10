<!-- PAGE CONTENT WRAPPER -->

<div class="page-content-wrap">

    <div class="container-fluid">
        <div class="col-md-12 panel-body">
            <div class="block" style="background-color:#EEEEEE;margin-bottom: 0px;padding-bottom:20px;">
                <form action="<?php echo site_url($this->config->item('path_backend') . '/Area/agregar'); ?>" id="agregar_beneficio" class="form-horizontal" role="form" name="agregar_beneficio" method="post" enctype="multipart/form-data" action="">



                    <div class="form-group">
                        <label class="col-md-2 control-label">Nombre</label>
                        <div class="col-md-10">
                            <input type="text" maxlength="255" class="form-control" value="" name="nombre" id="nombre" required />
                        </div>
                    </div>


                    <!-- 

                    <div class="form-group">
                        <label class="col-md-2 control-label">Responsable Area</label>
                        <div class="col-md-10">
                            <select class="form-control select" name="id_persona" id="id_persona" required  >
                                <option value="">Seleccione</option>
                                <?php foreach ($responsables as $responsable) { ?>
                                        <option value="<?php echo $responsable->id; ?>">
                                            <?php echo $responsable->nombre; ?>
                                        </option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>
 -->



                    <div class="form-group">
                        <label class="col-md-2 control-label">Estado</label>
                        <div class="col-md-10">
                            <select class="form-control select" name="estado" id="estado" required>
                                <option value="">Seleccione</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                    </div>


                    <div class="btn-group pull-right">
                        <a type="button" class="btn btn-primary" style="margin-right: .5em;" href="<?php echo site_url($this->config->item('path_backend') . '/inicio'); ?>">Cancelar</a>
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

    $(document).ready(function() {
        $('#telefono').keypress(validateNumber);
        $('#puntos').keypress(validateNumber);
        $('#orden').keypress(validateNumber);

    });

    function validateNumber(event) {
        var key = window.event ? event.keyCode : event.which;

        if (event.keyCode === 8 || event.keyCode === 46 ||
            event.keyCode === 37 || event.keyCode === 39) {
            return true;
        } else if (key < 48 || key > 57) {
            return false;
        } else return true;
    }

    function validateNumberDouble(event) {
        var code = (event.which) ? event.which : event.keyCode;
        if (code == 8 || code == 45 || code == 46) {
            //backspace
            return true;
        } else if (code >= 48 && code <= 57) {
            //is a number
            return true;
        } else {
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