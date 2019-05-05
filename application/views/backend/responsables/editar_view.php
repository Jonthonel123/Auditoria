<!-- PAGE CONTENT WRAPPER -->

<div class="panel panel-default">

    <div class="tab-content">
        <div class="tab-pane panel-body active" id="tab1">


            <form action="<?php echo site_url('/backend/Responsable/editar/' . $responsable->id) ?>" id="editar_responsable"
                  class="form-horizontal" role="form" name="editar_responsable" method="post"
                  enctype="multipart/form-data">



                <div class="form-group">
                    <label class="col-md-2 control-label">Nombre</label>
                    <div class="col-md-10">
                        <input type="text" maxlength="255" class="form-control" value="<?php echo $responsable->nombre; ?>" name="nombre"
                               id="nombre"/>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-2 control-label">Apellido</label>
                    <div class="col-md-10">
                        <input type="text" maxlength="255" class="form-control" value="<?php echo $responsable->apellido; ?>" name="apellido"
                               id="apellido"/>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-2 control-label">Email</label>
                    <div class="col-md-10">
                        <input type="text" maxlength="255" class="form-control" value="<?php echo $responsable->email; ?>" name="email"
                               id="email"/>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-2 control-label" >Estado</label>
                    <div class="col-md-10">
                        <select class="form-control select" name="estado" id="estado">
                            <option value="">Seleccione</option>
                            <option value="1" <?php if ($responsable->estado == 1) {
                                echo "selected";
                            } ?> >Activo
                            </option>
                            <option value="0" <?php if ($responsable->estado == 0) {
                                echo "selected";
                            } ?>>Inactivo
                            </option>
                        </select>
                    </div>
                </div>


                <div class="btn-group pull-right">
                    <a type="button" class="btn btn-primary" style="margin-right: .5em;"
                       href="<?php echo site_url($this->config->item('path_backend') . '/inicio'); ?>">Cancelar</a>
                    <input type="submit" class="btn btn-primary" value="Guardar" name="agregar" id="agregar"/>
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

        $(document).ready(function () {
            //$('#telefono').keypress(validateNumber);
            //$('#orden').keypress(validateNumber);
        });

        function validateNumber(event) {
            var key = window.event ? event.keyCode : event.which;

            if (event.keyCode === 8 || event.keyCode === 46
                || event.keyCode === 37 || event.keyCode === 39) {
                return true;
            }
            else if (key < 48 || key > 57) {
                return false;
            }
            else return true;
        }

        function validateNumberDouble(event) {
            var code = (event.which) ? event.which : event.keyCode;
            if (code == 8 || code == 45 || code == 46) {
                //backspace
                return true;
            }
            else if (code >= 48 && code <= 57) {
                //is a number
                return true;
            }
            else {
                return false;
            }
        }


    </script>
