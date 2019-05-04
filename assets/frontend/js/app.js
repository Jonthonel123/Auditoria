var menuDisplay = false;

$(document).ready(function(){

    $(window).on('scroll', function(){

      var offset = $('#nuevos-productos').offset();

      if($(window).scrollTop() >= 70 && $(window).outerWidth() >= 1150) {
        $('header').addClass('fixed');
        $('.bloque__categoria__productos').addClass('fixed');
      }else{
        $('header').removeClass('fixed');
        $('.bloque__categoria__productos').removeClass('fixed');
      }

    });


    $('#formContacto .btnEnviar').click(function(event){
      event.preventDefault();
  $('.btnEnviar').attr("disabled", true);
    //  var tipousuario = $('#formContacto  #tipousuario').val();
      var nombres = $('#formContacto #nombres').val();
      var email = $('#formContacto #email').val();
      var mensaje = $('#formContacto #mensaje').val();
      var expresion = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;

      if(nombres != ''){
        if(email != ''){
            if(expresion.test(email)){
              if(mensaje != ''){
          $.post(PATH_GATEWAY + "home/contacto",{nombres:nombres,email:email,mensaje:mensaje},

              function(result){


                // console.log(result); para testear
                if(result == 1){

                  show_message_callback('success','Se envio correctamente el mensaje',function(){
                    $('.md-modal .md-close').trigger('click');
                    // $('#formContacto #tipousuario').val('');
                    $('#formContacto #nombres').val('');
                    $('#formContacto #email').val('');
                    $('#formContacto #mensaje').val('');

                  } );
                }else{
                  show_message_callback('error','No se envio correctamente el mensaje',function(){
                    $('.md-modal .md-close').trigger('click');
                  });
                }
              },"json");

        }else {
          $('.btnEnviar').attr("disabled", false);
          show_message('error','Estimado usuario, seleccione el motivo de su mensaje.');
        }
      }else{
        $('.btnEnviar').attr("disabled", false);
        show_message('error','Estimado usuario, ingrese un email valido.');
      }
    }else{
        $('.btnEnviar').attr("disabled", false);
      show_message('error','Estimado usuario, ingrese el email que desea enviar.');
    }

    }else{
      $('.btnEnviar').attr("disabled", false);
      show_message('error','Estimado usuario, ingrese el nombre que desea enviar.');
    }
  });


    // $('#formContacto .btnEnviar').click(function(event){
    //   event.preventDefault();
    //   if(validate.contacto()){
    //     $('#formContacto').submit();
    //   }
    // });
    //
    // var validate = {
    //     contacto: function () {
    //         var Valid = {
    //             tipousuario: true,
    //             nombres: true,
    //             email: true,
    //             mensaje: true
    //         };
    //
    //         var tipousuario = $('#tipousuario'),
    //             nombres = $('#nombres'),
    //             email = $('#email'),
    //             mensaje = $('#mensaje');
    //
    //             if (tipousuario.val() == undefined || tipousuario.val() == '') {
    //                 tipousuario.next().html('Debe seleccionar un tipo de usuario');
    //                 tipousuario.addClass('validInput');
    //                 Valid.tipousuario = false;
    //             } else {
    //               tipousuario.next().html('');
    //               tipousuario.removeClass('validInput');
    //             } if (nombres.val() == undefined || nombres.val() == '') {
    //                 nombres.next().html('Debe ingresar su nombre.');
    //                 nombres.addClass('validInput');
    //                 Valid.nombres = false;
    //             } else {
    //                 nombres.next().html('');
    //                 nombres.removeClass('validInput');
    //             }
    //
    //             if (email.val() == undefined || email.val() == '') {
    //                 email.next().html('Debe ingresar su correo electr贸nico.');
    //                 email.addClass('validInput');
    //                 Valid.email = false;
    //
    //             } else {
    //                 var expression = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
    //
    //                 if (expression.test(email.val())) {
    //                   email.next().html('');
    //                   email.removeClass('validInput');
    //                 }
    //                 else {
    //                   email.next().html('Ingrese un correo electr贸nico v谩lido.');
    //                   email.addClass('validInput');
    //                   Valid.email = false;
    //                 }
    //             }
    //
    //             if (mensaje.val() == undefined || mensaje.val() == '') {
    //             mensaje.next().html('Debe ingresar su mensaje.');
    //             mensaje.addClass('validInput');
    //             Valid.mensaje = false;
    //             } else {
    //             mensaje.next().html('');
    //             mensaje.removeClass('validInput');
    //             }
    //
    //         return (Valid.nombres && Valid.email && Valid.mensaje);
    //     }
    // };
    //
    //
    // $('.bh-navbar-toggle').click(function(){
    //   if(!menuDisplay){
    //     $('header nav').css('left','0');
    //     //$('header nav').addClass('menuLeft');
    //     $('.bh-navbar-toggle').addClass('active');
    //     menuDisplay = true;
    //   }else{
    //     $('header nav').css('left','-300px');
    //     //$('header nav').removeClass('menuLeft');
    //     $('.bh-navbar-toggle').removeClass('active');
    //     menuDisplay = false;
    //   }
    // });
    //
    // $('.submenu li a').click(function(e){
    //   $('header nav').css('left','-300px');
    //   $('.bh-navbar-toggle').removeClass('active');
    //   menuDisplay = false;
    // });

    // $('.categoria__producto, .submenu li a').click(function(e){
    //
    //   e.preventDefault();
    //
    //   var diffHeader = 310 ;
    //   // if($(window).outerWidth()<=900) {
    //   //   $('header nav').fadeOut();
    //   //   diffHeader = 65;
    //   //   menuDisplay = false;
    //   // }
    //
    //   if(SECTION == 'productos-escolar' || SECTION == 'productos-oficina'){
    //     console.log('==>'+$(this.hash));
    //     if($(this.hash).top != undefined){
    //
    //       $("html,body").animate({scrollTop: $(this.hash).offset().top - 100}, 500);
    //     }else{
    //       window.location.href = this.href;
    //     }
    //   }else
    //     window.location.href = this.href;
    //
    //   // $("html,body").animate({scrollTop: $(this.hash).offset().top}, 500, function(){ });
    //
    // });

    //slider
    // $('#sliderHome').slick({
    //   slidesToShow: 1,
    //   dots: false,
    //   autoplay: true,
    //   prevArrow: '.arrowPrev',
    //   nextArrow: '.arrowNext',
    //   pauseOnFocus: false
    // });
    //
    // $('.bloque__home__listado').slick({
    //   slidesToShow: 4,
    //   slidesToScroll: 4,
    //   dots: false,
    //   autoplay: true,
    //   pauseOnFocus: false,
    //   responsive: [
    //   {
    //     breakpoint: 1025,
    //     settings: {
    //       slidesToShow: 3,
    //       slidesToScroll: 3
    //     }
    //   },
    //   {
    //     breakpoint: 768,
    //     settings: {
    //       slidesToShow: 2,
    //       slidesToScroll: 2
    //     }
    //   },
    //   {
    //     breakpoint: 520,
    //     settings: {
    //       slidesToShow: 1,
    //       slidesToScroll: 1
    //     }
    //   }]
    // });


});

// function isNumeric(e) {
//     var onkeypress  = (document.all) ? e.keyCode : e.which;
//     if(onkeypress == 8 || onkeypress == 46)
//         return true;
//     var pattern = /[0123456789]/
//     var key = String.fromCharCode(onkeypress);
//     return pattern.test(key);
// }
