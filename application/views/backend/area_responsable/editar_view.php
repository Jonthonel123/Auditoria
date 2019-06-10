<!-- PAGE CONTENT WRAPPER -->

<div class="panel panel-default">

    <div class="tab-content">
        <div class="tab-pane panel-body active" id="tab1">


            <form action="<?php echo site_url('/backend/Area_Responsable/editar/' . $area_responsable->id) ?>" id="editar_area" class="form-horizontal" role="form" name="editar_area" method="post" enctype="multipart/form-data">


                <div class="form-group">
                    <label class="col-md-2 control-label">Area</label>
                    <div class="col-md-10">
                        <select class="form-control select" name="id_area" id="id_area">
                            <option value="">Seleccione</option>
                            <?php foreach ($areas as $area) { ?>
                                <option value="<?php echo $area->id; ?>" <?php if ($area_responsable->id_area == $area->id) {
                                                                                echo "selected";
                                                                            } ?>>
                                    <?php echo $area->nombre; ?>
                                </option>
                            <?php } ?>

                        </select>
                    </div>
                </div>



                <div class="form-group">
                    <label class="col-md-2 control-label">Responsable</label>
                    <div class="col-md-10">
                        <select class="form-control select" name="id_persona" id="id_persona">
                            <option value="">Seleccione</option>
                            <?php foreach ($responsables as $responsable) { ?>
                                <option value="<?php echo $responsable->id; ?>" <?php if ($area_responsable->id_persona == $responsable->id) {
                                                                                    echo "selected";
                                                                                } ?>>
                                    <?php echo $responsable->nombre; ?>
                                </option>
                            <?php } ?>

                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-2 control-label">Estado</label>
                    <div class="col-md-10">
                        <select class="form-control select" name="estado" id="estado">
                            <option value="">Seleccione</option>
                            <option value="1" <?php if ($area_responsable->estado == 1) {
                                                    echo "selected";
                                                } ?>>Activo
                            </option>
                            <option value="0" <?php if ($area_responsable->estado == 0) {
                                                    echo "selected";
                                                } ?>>Inactivo
                            </option>
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
<!-- END PAGE CONTENT WRAPPER -->
<script type="text/javascript">
    var jvalidate = $("#editar_beneficio").validate({
        ignore: [],
        rules: {

            slug: {
                required: true
            },

            nombre: {
                required: true
            },

            tipo: {
                required: true
            },
            estado: {
                required: true
            }
        }
    });

    $(document).ready(function() {
        //$('#telefono').keypress(validateNumber);
        //$('#orden').keypress(validateNumber);
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
</script>