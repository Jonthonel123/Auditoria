
<!-- PAGE CONTENT WRAPPER -->

<div class="page-content-wrap">

    <div class="container-fluid">
        <div class="col-md-12 panel-body">
            <div class="block" style="background-color:#EEEEEE;margin-bottom: 0px;padding-bottom:20px;">
                <form action="<?php echo site_url($this->config->item('path_backend').'/Beneficio/carga_masiva');?>" id="carga_masiva" class="form-horizontal" role="form" name="carga_masiva" method="post"
                      enctype="multipart/form-data" >


                    <div class="form-group">
                        <label class="col-md-1 control-label">Plantilla</label>
                        <a class="btn btn-primary" type="button" href="<?php echo base_url('/assets/backend/plantilla_excel/beneficios_plantilla.xlsx')?>" download="Plantilla_Beneficios.xlsx" style="margin-left: 10px;">Descargar Plantilla</a>
                    </div>

                    <div class="form-group">
                        <label class="col-md-1 control-label">Empresa</label>
                        <div class="col-md-11">
                            <select class="form-control select" name="empresa" id="empresa" >
                                <option value="">Seleccione</option>
                                <?php foreach ($empresas as $empresa) { ?>
                                    <option value="<?php echo $empresa->id;?>">
                                        <?php echo $empresa->nombre; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-1 control-label">Excel (.xlsx)</label>
                        <div class="col-md-11">

                            <input type="file" class="fileinput  btn-success"
                                   name="excel" id="excel" data-filename-placement="inside" title="Seleccione un archivo "
                                   accept=".xlsx,.xls"/>
                           </br>
                            <label id="error_excel" style="visibility: hidden ; color: #b64645 ; font-weight : normal">El archivo es necesario. </label>
                        </div>

                    </div>


                    <div class="btn-group pull-right">
                        <a type="button" class="btn btn-primary"  style="margin-right: .5em;" href="<?php echo site_url($this->config->item('path_backend').'/inicio');?>">Cancelar</a>
                        <input type="submit" class="btn btn-primary" value="Guardar" name="agregar" id="agregar" />
                    </div>


                </form>


                <form action="<?php echo site_url($this->config->item('path_backend').'/Beneficio/carga_imagenes');?>" id="carga_zip" class="form-horizontal" role="form" name="carga_zip" method="post"
                      enctype="multipart/form-data" style="padding-top: 100px">



                    <div class="form-group">
                        <label class="col-md-1 control-label">Imagenes (.zip)</label>
                        <div class="col-md-11">

                            <input type="file" class="fileinput  btn-success"
                                   name="img" id="img" data-filename-placement="inside" title="Seleccione un archivo "
                                   accept=".zip"/>
                            </br>
                            <label id="error_img" style="visibility: hidden ; color: #b64645 ; font-weight : normal">El archivo es necesario. </label>
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


    var jvalidate = $("#carga_masiva").validate({
        ignore: [],
        rules: {
            empresa: {
                required: true
            }
        }
    });


    $("#carga_masiva").submit(function () {

        var excel = $("#excel").val();
        extensiones_permitidas = new Array(".xls", ".xlsx");
        if(excel == "") {
            error_excel.style.visibility='visible';
            return false;
        }else {
            error_excel.style.visibility='hidden';
            extension = (excel.substring(excel.lastIndexOf("."))).toLowerCase();
            permitida = false;
            for (var i = 0; i < extensiones_permitidas.length; i++) {
                if (extensiones_permitidas[i] == extension) {
                    permitida = true;
                    break;
                }
            }
            if (!permitida) {
                mierror = "Comprueba la extensión del archivo excel a subir. \nSólo se pueden subir archivos con extensiones: " + extensiones_permitidas.join();
           alert(mierror);
                return false;
            }
            return true;
        }
        });

        $("#carga_zip").submit(function () {

            var img = $("#img").val();
            extensiones_permitidas = new Array(".zip");
            if (img == "") {
                error_img.style.visibility = 'visible';
                return false;
            } else {
                error_img.style.visibility = 'hidden';
                extension = (img.substring(img.lastIndexOf("."))).toLowerCase();
                permitida = false;
                for (var i = 0; i < extensiones_permitidas.length; i++) {
                    if (extensiones_permitidas[i] == extension) {
                        permitida = true;
                        break;
                    }
                }
                if (!permitida) {
                    mierror = "Comprueba la extensión del archivo de imagenes a subir. \nSólo se pueden subir archivo con extension: " + extensiones_permitidas.join();
                    alert(mierror);
                    return false;
                }
                return true;
            }
        });





</script>
