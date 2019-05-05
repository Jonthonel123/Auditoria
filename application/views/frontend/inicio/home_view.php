<!-- Encabezado -->

<section class="banner">

   <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

       <ol class="carousel-indicators">
           <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
           <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
           <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
       </ol>
       <div class="carousel-inner">
           <div class="carousel-item active">
               <img class="d-block w-100" src="<?php echo base_url('assets/frontend/css/images/portada/banner-portada-pri.jpg');?>" alt="First slide">
               <div class="carousel-caption">
                <div class="animated fadeInDown text-carrusel">
                  <h1 class="h3-responsive" >AUDITORIA SGI</h1>
                  <p class="intro-text">!UN BALANCE AUDITADO, ES UN BALANCE FIABLE!</p>
                </div>
              </div>


           </div>
           <div class="carousel-item">
               <img class="d-block w-100" src="<?php echo base_url('assets/frontend/css/images/portada/banner-portada-2.jpg');?>" alt="Second slide">
           </div>
           <div class="carousel-item">
               <img class="d-block w-100" src="<?php echo base_url('assets/frontend/css/images/portada/banner-portada-3.jpg');?>" alt="Third slide">
           </div>
       </div>
       <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
           <span class="sr-only">Previous</span>
       </a>
       <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
           <span class="carousel-control-next-icon" aria-hidden="true"></span>
           <span class="sr-only">Next</span>
       </a>

   </div>
</section>


<!--Seccion Nosotros-->

<section class="nosotros bg-light " id="nosotros">
   <div class="container-fluid">

       <div class="row">

           <div class="col-md-6  equipo-img d-flex justify-content-center">
               <div class="shadow  foto-equipo " data-aos="zoom-in" data-aos-duration="2000">
                   <img  src="<?php echo base_url('assets/frontend/images/foto-equipo.jpg');?>" alt="foto-equipo" />
               </div>
           </div>

           <div class="col-md-5 justify-content-center ">
               <h2 class="" data-aos="fade-up"
                    data-aos-duration="2000">NOSOTROS</h2>
               <div class="linea" data-aos="fade-up"
                    data-aos-duration="2000">

               </div>

               <p data-aos="fade-up"
                    data-aos-duration="2000">
                   Somos un equipo dispuestos a ayudarte .Entre nuestras principales funciones destacan una amplia experiencia en desarrollo y diseños de paginas web.Proporcionamos a nuestros clientes el acceso a las tecnologías de la información permitiéndoles la generación de ventajas competitivas en su sector.!
               </p>

               <div class="leer">
                   <a href="#" class="btn btn-outline-info shadow-sm" data-aos="fade-up"
                        data-aos-duration="2000">Más información</a>
               </div>
           </div>
       </div>

   </div>
</section>


<section id="galeria" class="galeria mt-5 mb-5"  >

   <div class="container" >
       <div class="row">
           <div class="col">
               <h2 class="text-center" data-aos="fade-up"
                    data-aos-duration="2000">GALERIA</h2>
               <p class="page-description text-center" data-aos="fade-up"
                    data-aos-duration="2000" >Nuestras imagenes</p>
           </div>
       </div>

   </div>

   <div id="tabs">

       <div class="container-fluid">
           <div class="row justify-content-center">

               <ul class="d-flex list-unstyled">
                   <li>
                       <a class="" href="#tabs-1 ">
                           <button type="button" class="btntabimg btn btn-outline-dark btn-sm " data-aos="fade-up"
                                data-aos-duration="2000" name="button" style="font-weight:bold">Imagenes</button>
                       </a>
                   </li>
                   <li>
                       <a class="" href="#tabs-2">
                           <button type="button" class="btntabvideo btn btn-outline-dark btn-sm "  data-aos="fade-up"
                                data-aos-duration="2000" name="button" style="font-weight:bold">Videos</button>
                       </a>
                   </li>

               </ul>

           </div>
       </div>

<div class="container">

       <div id="tabs-1" >

           <div class="gallery tz-gallery">
               <div class="mdb-lightbox ">
                   <div class="row">
                       <div class="col-md-4">

                           <figure class="shadow " data-aos="fade-right"
     data-aos-offset="300"
     data-aos-easing="ease-in-sine" data-aos-duration="2000"
                                >
                               <a class="" href="<?php echo base_url('assets/frontend/images/portfolio/1.jpg');?>">
          <img alt="picture" src="<?php echo base_url('assets/frontend/images/portfolio/1.jpg');?>"
            class="img-fluid">
        </a>
                           </figure>
                       </div>

                       <div class="col-md-4">
                           <figure class="shadow" data-aos="fade-up"
                                data-aos-duration="2000">
                               <a href="<?php echo base_url('assets/frontend/images/portfolio/2.jpg');?>">
                 <img alt="picture" src="<?php echo base_url('assets/frontend/images/portfolio/2.jpg');?>"
                   class="img-fluid" />
               </a>
                           </figure>
                       </div>

                       <div class="col-md-4">
                           <figure class="shadow" data-aos="fade-left"
     data-aos-offset="300"
     data-aos-easing="ease-in-sine" data-aos-duration="2000">
                               <a href="<?php echo base_url('assets/frontend/images/portfolio/3.jpg');?>">
            <img alt="picture" src="<?php echo base_url('assets/frontend/images/portfolio/3.jpg');?>"
              class="img-fluid" />
          </a>
                           </figure>
                       </div>

                       <div class="col-md-4">
                           <figure class="shadow mdb-lightbox" data-aos="fade-up"
                                data-aos-duration="2000">
                               <a href="<?php echo base_url('assets/frontend/images/portfolio/4.jpg');?>">
                <img alt="picture" src="<?php echo base_url('assets/frontend/images/portfolio/4.jpg');?>"
                  class="img-fluid" />
              </a>
                           </figure>
                       </div>
                   </div>
               </div>
           </div>
       </div>

       <div id="tabs-2">
           <div class="gallery tz-gallery">
               <div class="row">
                   <div class="col-md-4">

                       <figure >
                           <iframe width="356" height="237" src="https://www.youtube.com/embed/5uBSQOn1Sx8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                       </figure>
                   </div>

               </div>
           </div>
       </div>
       </div>
</div>
</section>

<div class="container-fluid contacto  bg-light" >
   <section class="contactanos" id="contacto">

       <h2 class="title" data-aos="fade-up"
    data-aos-anchor-placement="top-bottom"
            >ESCRIBEME</h2>
       <form class="contact-form row-contact" id="formContacto" data-aos="fade-up"
    data-aos-anchor-placement="top-bottom">

           <div class="row">
               <div class="form-field col">
                   <input id="nombres" name="nombres" class="input-text " type="text" required>
                   <label class="label" for="name">Nombres</label>
               </div>
               <div class="form-field col">
                   <input id="email" name="email" class="input-text " type="email" required>
                   <label class="label" for="email">E-mail</label>
               </div>
           </div>

           <div class="row">
               <div class="form-field col">
                   <input id="mensaje" name="mensaje" class="input-text " type="text" required>
                   <label class="label" for="message">Mensaje</label>
               </div>
           </div>

           <div class="row  ">
               <div class="col-md-12 col-sm-12  col-xs-12 d-flex justify-content-center">
                   <button type="button" class="btn btn-primary submit-btn btnEnviar">ENVIAR MENSAJE </button>
               </div>
           </div>
</div>

</form>

</section>
</div>

<!-- Seccion carousel logos     -->
<div class="container">
   <h2 class="text-center pt-4 pb-4 " >NUESTROS CERTIFICADOS</h2>
   <section class="customer-logos pb-4">
       <div class="slide"><img src="https://www.solodev.com/assets/carousel/image1.png"></div>
       <div class="slide"><img src="https://www.solodev.com/assets/carousel/image2.png"></div>
       <div class="slide"><img src="https://www.solodev.com/assets/carousel/image3.png"></div>
       <div class="slide"><img src="https://www.solodev.com/assets/carousel/image4.png"></div>
       <div class="slide"><img src="https://www.solodev.com/assets/carousel/image5.png"></div>
       <div class="slide"><img src="https://www.solodev.com/assets/carousel/image6.png"></div>
       <div class="slide"><img src="https://www.solodev.com/assets/carousel/image7.png"></div>
       <div class="slide"><img src="https://www.solodev.com/assets/carousel/image8.png"></div>
   </section>

</div>
