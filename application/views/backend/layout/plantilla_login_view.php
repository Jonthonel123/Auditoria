<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>
        <!-- META SECTION -->
        <?php
        if(isset($tituloPagina) && $tituloPagina!= ""):
        ?>
        <title><?php echo $tituloPagina; ?></title>
        <?php
        endif;
        ?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link href="<?php echo base_url('assets/backend/');?>/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <script type="text/javascript" src="<?php echo base_url('assets/backend/');?>/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/backend/');?>/js/plugins/jquery/jquery-ui.min.js"></script>
        <!-- END META SECTION -->

        <!-- CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url('assets/backend'); ?>/css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->
    </head>
    <body>
        <div class="login-container">
            <?php
                if(isset($vista) && $vista!="")
                    $this->load->view($vista);
            ?>
        </div>
    </body>
</html>
