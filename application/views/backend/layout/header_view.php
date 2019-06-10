<?php
if (isset($tituloPagina) && $tituloPagina != "") :
  ?>
  <title><?php echo $tituloPagina; ?></title>
<?php
endif;
?>
<!-- START META SECTION -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<link rel="shortcut icon" href="<?php echo base_url('assets/backend/'); ?>/img/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo base_url('assets/backend/'); ?>/img/favicon.ico" type="image/x-icon">

<!-- END META SECTION -->

<!-- CSS INCLUDE -->
<link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url('assets/backend/'); ?>/css/theme-default.css" />
<link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url('assets/backend/'); ?>/css/pop-up.css" />
<link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>/css/club_de_beneficios/style.css">


<!-- GLOBAL CONSTANTS -->
<script>
  var base_url = "<?php echo base_url(); ?>";
</script>
<script>
  var site_url = "<?php echo site_url(); ?>";
</script>
<!-- END GLOBAL CONSTANTS -->

<!-- START PLUGINS -->
<audio id="audio-alert" src="<?php echo base_url('assets/backend/'); ?>/audio/alert.mp3" preload="auto"></audio>
<audio id="audio-fail" src="<?php echo base_url('assets/backend/'); ?>/audio/fail.mp3" loop="loop" preload="auto"></audio>

<script type="text/javascript" src="<?php echo base_url('assets/backend/'); ?>/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/'); ?>/js/plugins/jquery/jquery-ui.min.js"></script>
<script src="<?php echo base_url('assets/frontend'); ?>/js/popper.min.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url('assets/backend/'); ?>/js/plugins/bootstrap/bootstrap.min.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- END PLUGINS -->

<!-- THIS PAGE PLUGINS -->

<script type='text/javascript' src='<?php echo base_url('assets/backend/'); ?>/js/plugins/icheck/icheck.min.js'></script>
<script type='text/javascript' src='<?php echo base_url('assets/backend/'); ?>/js/pop-up.js'></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/'); ?>/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

<script type="text/javascript" src="<?php echo base_url('assets/backend/'); ?>/js/plugins/bootstrap/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/'); ?>/js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/'); ?>/js/plugins/bootstrap/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/'); ?>/js/plugins/bootstrap/bootstrap-file-input.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/'); ?>/js/plugins/bootstrap/bootstrap-select.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/'); ?>/js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
<script type='text/javascript' src='<?php echo base_url('assets/backend/'); ?>/js/plugins/validationengine/languages/jquery.validationEngine-es.js'></script>
<script type='text/javascript' src='<?php echo base_url('assets/backend/'); ?>/js/plugins/validationengine/jquery.validationEngine.js'></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/'); ?>/js/plugins/knob/jquery.knob.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/'); ?>/js/plugins/bootstrap/bootstrap-select.js"></script>

<script type="text/javascript" src="<?php echo base_url('assets/backend/'); ?>/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script type='text/javascript' src='<?php echo base_url('assets/backend/'); ?>/js/plugins/jquery-validation/jquery.validate.js'></script>
<script type='text/javascript' src='<?php echo base_url('assets/backend/'); ?>/js/plugins/noty/jquery.noty.js'></script>
<script type='text/javascript' src='<?php echo base_url('assets/backend/'); ?>/js/plugins/noty/layouts/topCenter.js'></script>
<script type='text/javascript' src='<?php echo base_url('assets/backend/'); ?>/js/plugins/noty/layouts/topLeft.js'></script>
<script type='text/javascript' src='<?php echo base_url('assets/backend/'); ?>/js/plugins/noty/layouts/topRight.js'></script>
<script type='text/javascript' src='<?php echo base_url('assets/backend/'); ?>/js/plugins/noty/layouts/bottomRight.js'></script>
<script type='text/javascript' src='<?php echo base_url('assets/backend/'); ?>/js/plugins/noty/themes/default.js'></script>
<script type='text/javascript' src='<?php echo base_url('assets/backend/'); ?>/js/plugins/icheck/icheck.min.js'></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/'); ?>/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

<script type="text/javascript" src="<?php echo base_url('assets/backend/'); ?>/js/plugins/daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/'); ?>/js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>

<script type="text/javascript" src="<?php echo base_url('assets/backend/'); ?>/js/plugins/moment.min.js"></script>

<script type="text/javascript" src="<?php echo base_url('assets/backend/'); ?>/js/extra/moment.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/'); ?>/js/extra/es.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/'); ?>/js/extra/datepicker/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


<!-- END PAGE PLUGINS -->

<!-- START CUSTOM PLUGINS -->
<?php
if (isset($arrayScripts)) {
  foreach ($arrayScripts as $script) {
    echo "<script type=\"text/javascript\" src=\"" . $script . "\"></script> \n";
  }
}

?>



<script>
  $(document).ready(function() {



    $('#desc_criterios').hide();
    $('#desc_correctivas').hide();
    $('#desc_conformidad').hide();
    $('#desc_descripcion').hide();




    $('#normas').on('change', function() {

      var normas = $('#normas').val();



      if (normas != '') {

        $('#desc_criterios').show();

      } else {
        $('#desc_criterios').hide();
        $('#desc_correctivas').hide();
        $('#desc_conformidad').hide();
        $('#desc_descripcion').hide();
      }

    });


    $('#criterios').on('change', function() {

      var criterios = $('#criterios').val();

      if (criterios != '') {
        $('#desc_conformidad').show();
      } else {
        $('#desc_conformidad').hide();
        $('#desc_descripcion').hide();

      }



    });


    $('#conformidad').on('change', function() {

      var conformidad = $('#conformidad').val();

      if (conformidad != '') {
        $('#desc_descripcion').show();
      } else {
        $('#desc_descripcion').hide();
      }

    });




  });



  $('#agregar_informe #nombre').change(function() {
    var nombre = $(this).val();
    console.log("most" + " " + nombre);

    $.get(PATH_BASE + '/informes/responsables/' + encodeURI(nombre), function(data) {
      $('#agregar_informe #responsable').html(data);
    });
  });
</script>



<script type="text/javascript">
  var PATH_BASE = '<?php echo base_url('assets/backend/'); ?>';
</script>