
<!-- PAGE CONTENT WRAPPER -->

<div class="page-content-wrap">

    <div class="container-fluid">
        <div class="col-md-12 panel-body">
            <div class="block" style="background-color:#EEEEEE;margin-bottom: 0px;padding-bottom:20px;">
                <form action="<?php echo site_url($this->config->item('path_backend').'/Beneficio/agregar');?>" id="agregar_beneficio" class="form-horizontal" role="form" name="agregar_beneficio" method="post"
                      enctype="multipart/form-data" action="">

                    <div class="form-group">
                        <label class="col-md-2 control-label">Categoría</label>
                        <div class="col-md-10">
                            <select class="form-control select" name="categoria" id="categoria" required>
                                <option value="">Seleccione</option>
                                <?php foreach ($categorias as $categoria) { ?>
                                    <option value="<?php echo $categoria->id;?>">
                                        <?php echo $categoria->nombre; ?>
                                    </option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Establecimiento</label>
                        <div class="col-md-10">
                            <select class="form-control select" name="establecimiento" id="establecimiento" required>
                                <option value="">Seleccione</option>
                                <?php foreach ($establecimientos as $establecimiento) { ?>
                                    <option value="<?php echo $establecimiento->id;?>">
                                        <?php echo $establecimiento->nombre; ?>
                                    </option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-2 control-label">Nombre</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" value="" name="nombre"  id="nombre" required/>
                        </div>
                    </div>

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
                        <label class="col-md-2 control-label">Descripción</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" value="" name="descripcion"  id="descripcion" required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Restricción</label>
                        <div class="col-md-10">

                            <textarea type="text" class="form-control" value="" name="restriccion" id="restriccion"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Dirección</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" value="" name="direccion" id="direccion" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Telefono</label>
                        <div class="col-md-10">
                            <input type="number" class="form-control" value="" name="telefono" id="telefono"/>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-2 control-label">Correo</label>
                        <div class="col-md-10">
                            <input type="email" class="form-control" value="" name="correo" id="correo"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Orden</label>
                        <div class="col-md-10">
                            <input type="number" class="form-control spinner_default" min="0" value="0" name="orden" id="orden" readonly/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Fecha de inicio</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" value="" name="fecha_inicio" id="fecha_inicio" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Fecha de finalización</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" value="" name="fecha_fin" id="fecha_fin" />
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

   $(document).ready(function(){
       $('#telefono').keypress(validateNumber);
       $('#puntos').keypress(validateNumber);
       $('#orden').keypress(validateNumber);

   });

   function validateNumber(event) {
       var key = window.event ? event.keyCode : event.which;

       if (event.keyCode === 8 || event.keyCode === 46
           || event.keyCode === 37 || event.keyCode === 39) {
           return true;
       }
       else if ( key < 48 || key > 57 ) {
           return false;
       }
       else return true;
   }

   function validateNumberDouble(event) {
       var code = (event.which) ? event.which : event.keyCode;
       if(code==8 || code ==45 || code == 46)
       {
           //backspace
           return true;
       }
       else if(code>=48 && code<=57)
       {
           //is a number
           return true;
       }
       else
       {
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
