            <div class="login-box animated fadeInDown">
                <div style="margin-bottom: 10px;text-align: center;"><img src="<?php echo base_url('assets/backend/'); ?>/img/logo.png"></div>
                <div class="login-body">
                    <div class="login-title"><strong>Bienvenido</strong>, Por favor ingrese sus datos</div>
                    <form class="form-horizontal" method="post" id="frm-login">
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="txtUsuario" id="txtUsuario" class="form-control" placeholder="Email" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="password" name="txtPassword" id="txtPassword" class="form-control" placeholder="Contraseña" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <!-- <a href="#" class="btn btn-link btn-block">¿Olvido su contraseña?</a> -->
                            </div>
                            <div class="col-md-6">

                                <input type="submit" value="Ingresar" id="btnLogin" class="btn btn-info btn-block" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="login-footer">
                    <?php
                    if (isset($copyright) && $copyright != "") :
                        ?>
                        <!-- START COPYRIGHT -->
                        <div class="pull-left">&copy; <?php echo $copyright; ?></div>
                        <!-- END COPYRIGHT -->
                    <?php
                endif;
                ?>

                </div>
            </div>
            <script type="text/javascript">
                $("#frm-login").submit(
                    function() {
                        if ($("#txtUsuario").val() != "") {
                            if ($("#txtPassword").val() != "") {
                                $("#btnLogin").attr('disabled', true);
                                $.post("<?php echo site_url('backend/Inicio/login/'); ?>", $(this).serialize(),
                                    function(result) {

                                        switch (result.cod) {
                                            case 0:

                                                location.href = "<?php echo site_url('backend/Informe/listar'); ?>";
                                                break;
                                            case 1:
                                                $('#txtUsuario').val("").focus();
                                                fn_mostrarError(result.msg);
                                                break;
                                            case 2:
                                                $('#txtPassword').val("").focus();
                                                fn_mostrarError(result.msg);
                                                break;
                                            case 3:
                                                fn_mostrarError(result.msg);
                                                break;
                                        }
                                        $("#btnLogin").attr('disabled', false);

                                    }, "json");
                            } else {
                                $("#txtPassword").focus();
                            }
                            return false;
                        } else {
                            $("#txtUsuario").focus();
                        }
                        return false;

                    });

                function fn_mostrarError(mensaje) {
                    alert(mensaje);
                }
            </script>