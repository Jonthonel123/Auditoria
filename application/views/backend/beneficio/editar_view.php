<!-- PAGE CONTENT WRAPPER -->

<div class="panel panel-default tabs">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab1" data-toggle="tab">Beneficio</a></li>
        <li><a href="#tab2" data-toggle="tab" id="lista_beneficio_info">Información Adicional</a></li>
    </ul>


    <div class="tab-content">
        <div class="tab-pane panel-body active" id="tab1">


            <form action="<?php echo site_url('/backend/Beneficio/editar/' . $beneficio->id) ?>" id="editar_beneficio"
                  class="form-horizontal" role="form" name="editar_beneficio" method="post"
                  enctype="multipart/form-data">

                <div class="form-group">
                    <label class="col-md-2 control-label">Categoría</label>
                    <div class="col-md-10">
                        <select class="form-control select" name="categoria" id="categoria" >
                            <option value="">Seleccione</option>
                            <?php foreach ($categorias as $categoria) { ?>
                                <option
                                    value="<?php echo $categoria->id; ?>" <?php if ($beneficio->id_beneficio_categoria == $categoria->id) {
                                    echo "selected";
                                } ?> >
                                    <?php echo $categoria->nombre; ?>
                                </option>
                            <?php } ?>

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Establecimiento</label>
                    <div class="col-md-10">
                        <select class="form-control select" name="establecimiento" id="establecimiento" >
                            <option value="">Seleccione</option>
                            <?php foreach ($establecimientos as $establecimiento) { ?>
                                <option
                                    value="<?php echo $establecimiento->id; ?>" <?php if ($beneficio->id_establecimiento == $establecimiento->id) {
                                    echo "selected";
                                } ?> >
                                    <?php echo $establecimiento->nombre; ?>
                                </option>
                            <?php } ?>

                        </select>
                    </div>
                </div>
                <div class="form-group" style="display:none">
                    <label class="col-md-2 control-label">Empresa</label>
                    <div class="col-md-10">
                        <select class="form-control select" name="empresa" id="empresa" <?php if ($empresas !=null && sizeof($empresas) == 1) echo "disabled"?>>
                            <option value="">Seleccione</option>
                            <?php foreach ($empresas as $empresa) { ?>
                                <option
                                    value="<?php echo $empresa->id; ?>" <?php if ($beneficio->id_empresa == $empresa->id) {
                                    echo "selected";
                                } ?>>
                                    <?php echo $empresa->nombre; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <?php if ($empresas != null && sizeof($empresas) == 1){
                ?>
                <input type="hidden" name="empresa" value="<?php  echo $empresas[0]->id?>" />
                <?php }
                ?>

                <div class="form-group">
                    <label class="col-md-2 control-label">Nombre</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" value="<?php echo $beneficio->nombre; ?>" name="nombre"
                               id="nombre"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Foto Actual</label>
                    <div class="col-md-10">
                      <img src="<?php echo base_url().$beneficio->foto;?>" width="auto" height="150px"/>
                      <input class="hidden" type="text" value="<?php echo $beneficio->foto?>" name="foto_antiguo"/>
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
                    <label class="col-md-2 control-label">Descripción</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" value="<?php echo $beneficio->descripcion; ?>"
                               name="descripcion" id="descripcion"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Restricción</label>
                    <div class="col-md-10">

                        <textarea type="text" class="form-control" name="restriccion"
                                  id="restriccion"><?php echo $beneficio->restriccion; ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Dirección</label>
                    <div class="col-md-10">

                        <input type="text" class="form-control" value="<?php echo $beneficio->direccion?>" name="direccion" id="direccion" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Telefono</label>
                    <div class="col-md-10">
                        <input type="number" class="form-control" value="<?php echo $beneficio->telefono?>" name="telefono" id="telefono"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Correo</label>
                    <div class="col-md-10">
                        <input type="email" class="form-control" value="<?php echo $beneficio->correo?>" name="correo" id="correo"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Orden</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" value="<?php echo $beneficio->orden; ?>" name="orden"
                               id="orden"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Fecha de inicio</label>
                    <div class="col-md-10">

                        <input type="text" class="form-control"
                               value="<?php echo date('Y-m-d', strtotime($beneficio->fecha_inicio)); ?>"
                               name="fecha_inicio" id="fecha_inicio"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Fecha de finalización</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control"
                               value="<?php echo date('Y-m-d', strtotime($beneficio->fecha_fin)); ?>" name="fecha_fin"
                               id="fecha_fin"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label" >Estado</label>
                    <div class="col-md-10">
                        <select class="form-control select" name="estado" id="estado">
                            <option value="">Seleccione</option>
                            <option value="1" <?php if ($beneficio->estado == 1) {
                                echo "selected";
                            } ?> >Activo
                            </option>
                            <option value="0" <?php if ($beneficio->estado == 0) {
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

                        <a href="<?php echo site_url($this->config->item('path_backend') . '/Info_Adicional_Beneficio/agregar/' . $beneficio->id); ?>"
                           class="btn btn-default pull-right"><i class="fa fa-plus"></i> Agregar</a>

                    </div>
                    <div id="tabla_beneficio_info"></div>

                </div>


            </div>
        </div>

    </div>
    </div>
    <!-- END PAGE CONTENT WRAPPER -->
    <script type="text/javascript">


        var jvalidate = $("#editar_beneficio").validate({
            ignore: [],
            rules: {
                categoria: {
                    required: true
                },
                establecimiento: {
                    required: true
                },
                nombre: {
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

        $(document).ready(function () {
            $('#telefono').keypress(validateNumber);
            $('#orden').keypress(validateNumber);
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

        $("#lista_beneficio_foto").click(function () {

            $.post("<?php echo site_url('backend/Foto_beneficio/listar');?>",{id_beneficio : <?php echo $beneficio->id ;?>},
                function (result) {

                    $('#tabla_beneficio_foto').html(result);


                }, "html");

            return true;
        });

        $("#buscar_beneficio_foto").click(function () {


            $.post("<?php echo site_url('backend/Foto_beneficio/buscar');?>",
                {id_beneficio : <?php echo $beneficio->id;?> , estado : $("#estado_foto").val() , tipo : $("#tipo_foto").val(),plataforma : $("#plataforma_foto").val()},

                function (result) {
                    $('#tabla_beneficio_foto').html(result);

                }, "html");

            return true;
        });


        $("#lista_beneficio_info").click(function () {

            $.post("<?php echo site_url('backend/Info_adicional_beneficio/listar');?>",{id_beneficio : <?php echo $beneficio->id ;?>},
                function (result) {

                    $('#tabla_beneficio_info').html(result);


                }, "html");

            return true;
        });

        $("#buscar_beneficio_info").click(function () {


            $.post("<?php echo site_url('backend/Info_adicional_beneficio/buscar');?>",
                {id_beneficio : <?php echo $beneficio->id;?> , campo : $("#campo_info").val() , valor : $("#valor_info").val()
                    , estado : $("#estado_info").val()},
                function (result) {
                    $('#tabla_beneficio_info').html(result);

                }, "html");

            return true;
        });



        <?php
        switch($this->uri->segment(5)){
        case 'F' :
        ?>
        $(document).ready(function () {
            $('#lista_beneficio_foto').trigger('click');
        });
        <?php  break;
        case 'I' :
        ?>
        $(document).ready(function () {
            $('#lista_beneficio_info').trigger('click');
        });
        <?php
        break;
        }
        ?>


        $("#fecha_inicio").datetimepicker({
            format: 'YYYY-MM-DD',
            locale: 'es'
        });


        $("#fecha_fin").datetimepicker({
            format: 'YYYY-MM-DD',
            locale: 'es'
        });




    </script>
