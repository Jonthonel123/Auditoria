<!-- PAGE CONTENT WRAPPER -->

<div class="panel panel-default tabs">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab1" data-toggle="tab">Portada</a></li>
    </ul>


    <div class="tab-content">
        <div class="tab-pane panel-body active" id="tab1">


            <form action="<?php echo site_url('/backend/Portada/editar/' . $portada->idportada) ?>" id="editar_portada"
                  class="form-horizontal" role="form" name="editar_portada" method="post"
                  enctype="multipart/form-data">


                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Foto Actual</label>
                                        <div class="col-md-10">
                                          <img src="<?php echo base_url().$portada->foto;?>" width="auto" height="150px"/>
                                          <input class="hidden" type="text" value="<?php echo $portada->foto?>" name="foto_antiguo"/>
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
                                        <label class="col-md-2 control-label">Nombre</label>
                                        <div class="col-md-10">
                                            <input type="text" maxlength="100"  class="form-control" value="<?php echo $portada->nombre;?>" name="nombre"  id="nombre" maxlength="100" required/>
                                        </div>
                                    </div>


                                  <div class="form-group">
                                      <label class="col-md-2 control-label">Enlace</label>
                                      <div class="col-md-10">
                                          <textarea class="form-control" maxlength="255"  name="enlace" id="enlace" rows="8" cols="80" required><?php echo $portada->enlace;?></textarea>
                                      </div>
                                  </div>


                                  <div class="form-group">
                                      <label class="col-md-2 control-label" >Abrir pestaña nueva</label>
                                      <div class="col-md-10">
                                          <select class="form-control select" name="target" id="target">
                                            <option value="">Seleccione</option>
                                              <option value="1" <?php if ($portada->target == "1") {
                                                  echo "selected";
                                              } ?> >Si
                                              </option>
                                              <option value="0" <?php if ($portada->target == "0") {
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
                                              <option value="1" <?php if ($portada->estado == 1) {
                                                  echo "selected";
                                              } ?> >Activo
                                              </option>
                                              <option value="0" <?php if ($portada->estado == 0) {
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

        <div class="tab-pane panel-body " id="tab2">
            <div class="page-content-wrap">

                <div class="panel panel-default">
                    <div class="panel-heading">

                        <a href="<?php echo site_url($this->config->item('path_backend') . '/Foto_Evento/agregar/' . $evento->id); ?>"
                           class="btn btn-default pull-right"><i class="fa fa-plus"></i> Agregar</a>

                    </div>
                    <div id="tabla_evento_foto"></div>

                </div>


            </div>
        </div>

    </div>
    </div>
    <!-- END PAGE CONTENT WRAPPER -->
    <script type="text/javascript">


        var jvalidate = $("#editar_portada").validate({
            ignore: [],
            rules: {

                nombre: {
                    required: true
                },

                enlace: {
                    required: false
                },
                target: {
                    required: false
                },
                estado: {
                    required: true
                }
            }
        });

    </script>
