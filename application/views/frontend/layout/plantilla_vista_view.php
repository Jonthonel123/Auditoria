<!doctype html>
<html lang="es">
  <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AUDITORIA SGI</title>

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta content="AUDITORIA SGI" name="description" />
  <meta property="og:title" content="AUDITORIA"/>
  <meta property="og:description" content="Descripción AUDITORIASGI"/>
  <meta property="og:url" content="https://www.teccyber.com/" />
  <meta property="og:image" content="https://www.url.com/images/compartir.jpg" />


  <!-- CSS PARA LA GALERIA BOOSTRAP INICIO-->
<link rel="stylesheet" href="https://rawgit.com/LeshikJanz/libraries/master/Bootstrap/baguetteBox.min.css">

<link href="<?php echo base_url('assets/frontend');?>/css/bootstrap/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/frontend');?>/css/compiled.css" rel="stylesheet" type="text/css">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link href="<?php echo base_url('assets/frontend');?>/slick/slick.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/frontend');?>/css/estilos.css" rel="stylesheet" type="text/css">
<!-- boostrap-social-> este link es para poner el hover al icono -->
<link href="<?php echo base_url('assets/frontend');?>/css/bootstrap/bootstrap-social.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <!-- CSS PARA EL SWAL ALERT !-->
<link href="<?php echo base_url('assets/frontend');?>/css/sweetalert2.css" rel="stylesheet" type="text/css">

  <script type="text/javascript">
    PATH_GATEWAY = '<?php echo site_url();?>';
    var PATH_BASE = '<?php echo site_url(); ?>';
    <?php
        echo "var SECTION ='".$this->uri->segment(1)."',";
        echo " SUBSECTION ='".$this->uri->segment(2)."';";
    ?>

  </script>

  </head>
  <body>

  <?php
      $this->load->view('frontend/layout/menu_top_view',TRUE);
  ?>
  <div class="main">
  <?php
      if(isset($vista) && $vista !="")
          $this->load->view($vista);
  ?>

  <?php
      $this->load->view('frontend/layout/footer_view',TRUE);
  ?>
  </div>


<script src="<?php echo base_url('assets/frontend');?>/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url('assets/frontend');?>/js/bootstrap/bootstrap.bundle.min.js"></script>
  <!-- Plugin JavaScript -->
<script src="<?php echo base_url('assets/frontend');?>/js/jquery-easing/jquery.easing.min.js"></script>
<script src="<?php echo base_url('assets/frontend');?>/js/scrolltop.js"></script>
<!-- SCRIPT BOOSTRAPT -->
<script src="<?php echo base_url('assets/frontend');?>/js/popper.min.js"></script>
<script src="<?php echo base_url('assets/frontend');?>/js/bootstrap/bootstrap.min.js"></script>

<script src="<?php echo base_url('assets/frontend');?>/slick/slick.js"></script>
<script src="<?php echo base_url('assets/frontend');?>/js/sweetalert2.min.js?v=<?php echo rand(100,999);?>"></script>
<script src="<?php echo base_url('assets/frontend');?>/js/app.js?v=<?php echo rand(100,999);?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/');?>/js/utilCDS.js"></script>
<!-- script para galeria boostrapt -->
<script src="<?php echo base_url('assets/frontend');?>/js/baguetteBox.js"></script>
<!-- script para animacion carrusel logos -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- script para animaciones en texto -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- SCRIPT PARA LA GALERIA BOOSTRAP INICIO-->


      <script type="text/javascript">
      $(document).ready(function() {
// funcion para el tab de galeria
    $( "#tabs" ).tabs();
// funcion para el carrusel de logos
        $('.customer-logos').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: false,
            dots: false,
            pauseOnHover: false,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 4
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 3
                }
            }]
        });
        // metodo para ejecutar left y rigth de galeria
            baguetteBox.run('.tz-gallery');

            //metodo para ejecutar animacion texto
            AOS.init();
      });

      </script>



  </body>
</html>
