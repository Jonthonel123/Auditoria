<!-- PAGE CONTENT WRAPPER -->

<div class="panel panel-default">

    <div class="tab-content">
        <div class="tab-pane panel-body active" id="tab1">


            <form action="<?php echo site_url('/backend/Productos/editar/' . $registro->id) ?>" id="editar_registro"
                  class="form-horizontal" role="form" name="editar_beneficio" method="post"
                  enctype="multipart/form-data">

                  <div class="form-group">
                      <label class="col-md-2 control-label">Foto Actual</label>
                      <div class="col-md-10">
                        <?php if($registro->foto != '') {?>
                        <img src="<?php echo base_url().$registro->foto;?>" width="auto" height="150px"/>
                        <?php } else { echo 'no tiene foto';}?>

                        <input class="hidden" type="text" value="<?php echo $registro->foto?>" name="foto_antiguo" />
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-md-2 control-label">Foto</label>
                      <div class="col-md-10">

                          <input type="file" class="fileinput  btn-success"
                                 name="foto" id="foto" data-filename-placement="inside" title="Seleccione una Imagen"
                                 accept=".jpg,.png,.jpeg"/>
                          <label id="error_img" style="visibility: hidden ; color: #b64645 ; font-weight : normal">La imagen es necesaria. </label>
                      </div>

                  </div>

                  <div class="form-group">
                      <label class="col-md-2 control-label">Categoría</label>
                      <div class="col-md-10">
                          <select class="form-control select" name="categoria" id="categoria">
                              <option value="">Seleccione</option>
                              <?php foreach ($categorias as $categoria) { ?>
                                  <option
                                      value="<?php echo $categoria->id; ?>" <?php if ($registro->categoria_id == $categoria->id) {
                                      echo "selected";
                                  } ?> >
                                      <?php echo (($categoria->tipo == 1)? 'Escolar - ' . $categoria->nombre : 'Oficina - ' . $categoria->nombre); ?>

                                  </option>
                              <?php } ?>

                          </select>
                      </div>
                  </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">SKU</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" value="<?php echo $registro->sku; ?>" name="sku"
                               id="sku"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Nombre</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" value="<?php echo $registro->nombre; ?>" name="nombre"
                               id="nombre"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label" >Nuevo</label>
                    <div class="col-md-10">
                        <select class="form-control select" name="nuevo" id="nuevo">
                          <option value="">Seleccione</option>
                            <option value="1" <?php if ($registro->nuevo == "1") {
                                echo "selected";
                            } ?> >Si
                            </option>
                            <option value="0" <?php if ($registro->nuevo == "0") {
                                echo "selected";
                            } ?>>No
                            </option>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-2 control-label" >Estrella</label>
                    <div class="col-md-10">
                        <select class="form-control select" name="estrella" id="estrella">
                          <option value="">Seleccione</option>
                            <option value="1" <?php if ($registro->estrella == "1") {
                                echo "selected";
                            } ?> >Si
                            </option>
                            <option value="0" <?php if ($registro->estrella == "0") {
                                echo "selected";
                            } ?>>No
                            </option>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-2 control-label" >Estado</label>
                    <div class="col-md-10">
                        <select class="form-control select" name="estado" id="estado">
                            <option value="">Seleccione</option>
                            <option value="1" <?php if ($registro->estado == 1) {
                                echo "selected";
                            } ?> >Activo
                            </option>
                            <option value="0" <?php if ($registro->estado == 0) {
                                echo "selected";
                            } ?>>Inactivo
                            </option>
                        </select>
                    </div>
                </div>


                <div class="btn-group pull-right">
                    <a type="button" class="btn btn-primary" style="margin-right: .5em;"
                       href="<?php echo site_url($this->config->item('path_backend') . '/productos'); ?>">Cancelar</a>
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
