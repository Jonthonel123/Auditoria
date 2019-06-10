<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $this->load->view('backend/layout/header_view', TRUE);
    ?>
</head>

<body>
    <div class="page-container">
        <?php
        $this->load->view('backend/layout/menu_lateral_view', TRUE);
        ?>
        <div class="page-content">
            <!-- START NAVIGATION TOP -->
            <?php
            // if(isset($mostrarBarraTop) && $mostrarBarraTop === TRUE)
            $this->load->view('backend/layout/barra_navegacion_top_view');
            ?>
            <!-- END NAVIGATION TOP -->

            <?php

            if (isset($arrayMigaPan) && is_array($arrayMigaPan) && (count($arrayMigaPan) > 0)) :
                ?>
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <?php

                    foreach ($arrayMigaPan as $itemMigaPan) :
                        if ($itemMigaPan[active]) :
                            ?>
                            <li class="active"><?php echo $itemMigaPan[nombre]; ?></li>
                        <?php
                    else :
                        if ($itemMigaPan[url]) :
                            ?>

                                <li><a href="<?php echo $itemMigaPan[url]; ?>"><?php echo $itemMigaPan[nombre]; ?></a></li>
                            <?php
                        else :
                            ?>
                                <li><a href="#"><?php echo $itemMigaPan[nombre]; ?></a></li>
                            <?php
                        endif;
                    endif;
                endforeach;
                ?>
                </ul>
                <!-- END BREADCRUMB -->

            <?php
        endif;
        ?>

            <?php
            if (isset($tituloPagina)) {
                ?>
                <!-- PAGE TITLE -->
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> <?php echo $tituloPagina; ?></h2>
                </div>
                <!-- END PAGE TITLE -->
            <?php
        }
        ?>


            <?php
            if (isset($vista) && $vista != "")
                $this->load->view($vista);
            ?>


        </div>
    </div>

    <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
        <div class="mb-container">
            <div class="mb-middle">
                <div class="mb-title"><span class="fa fa-sign-out"></span> Cerrar <strong>sesión</strong> ?</div>
                <div class="mb-content">
                    <p>¿Está seguro que desea salir del sistema?</p>
                    <p>Presione "NO" si desea continuar trabajando, presione "SI" para cerrar su sesión.</p>
                </div>
                <div class="mb-footer">
                    <div class="pull-right">
                        <a href="<?php echo site_url($this->config->item('path_backend') . '/logout'); ?>" class="btn btn-success btn-lg">SI</a>
                        <button class="btn btn-default btn-lg mb-control-close">NO</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    $this->load->view('backend/layout/footer_view', TRUE);
    ?>
</body>

</html>