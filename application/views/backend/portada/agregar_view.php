
<!-- PAGE CONTENT WRAPPER -->

<div class="page-content-wrap">

    <div class="container-fluid">
        <div class="col-md-12 panel-body">
            <div class="block" style="background-color:#EEEEEE;margin-bottom: 0px;padding-bottom:20px;">
                <form action="<?php echo site_url($this->config->item('path_backend').'/Portada/agregar');?>" id="agregar_portada" class="form-horizontal" role="form" name="agregar_portada" method="post"
                      enctype="multipart/form-data" action="">

             <div class="form-group">
                        <label class="col-md-2 control-label">Foto</label>
                        <div class="col-md-10">
                            <input type="file" class="fileinput  btn-success"
                                       name="foto" id="foto" data-filename-placement="inside" title="Seleccione una Imagen"
                                       accept=".jpg,.png,.jpeg"/>

                                <span class="file-input-name "></span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-2 control-label">Nombre</label>
                        <div class="col-md-10">
                            <input type="text" maxlength="100"  class="form-control" value="" name="nombre"  id="nombre" maxlength="100" required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Enlace</label>
                        <div class="col-md-10">
                            <textarea class="form-control" maxlength="255"  name="enlace" id="enlace" rows="8" cols="80"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Abrir pestaña nueva</label>
                        <div class="col-md-10">
                            <select class="form-control select" name="target" id="target" required>
                                <option  value="">Seleccione</option>
                                <option  value="1">Si</option>
                                <option  value="0">No</option>
                            </select>
                        </div>
                    </div>

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
                        <a type="button" class="btn btn-primary"  style="margin-right: .5em;" href="<?php echo site_url($this->config->item('path_backend').'/inicio');?>">Cancelar</a>
                        <input type="submit" class="btn btn-primary" value="Guardar" name="agregar" id="agregar" />
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT WRAPPER -->
<script type="text/javascript">

   var jvalidate = $("#agregar_portada").validate({
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
