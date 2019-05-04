! function(t) {
    "use strict";
    t('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
            var o = t(this.hash);
            if ((o = o.length ? o : t("[name=" + this.hash.slice(1) + "]")).length) return t("html, body").animate({
                scrollTop: o.offset().top - 70
            }, 1e3, "easeInOutExpo"), !1
        }
    }), t(document).scroll(function() {
        100 < t(this).scrollTop() ? t(".scroll-to-top").fadeIn() : t(".scroll-to-top").fadeOut()
    }), t(".js-scroll-trigger").click(function() {
        t(".navbar-collapse").collapse("hide")
    }), t("body").scrollspy({
        target: "#mainNav1",
        offset: 80
    });
    // var o = function() {
    //     100 < t("#mainNav").offset().top ? t("#mainNav").addClass("navbar-shrink") : t("#mainNav").removeClass("navbar-shrink")
    // };
    // o(), t(window).scroll(o), t(".portfolio-item").magnificPopup({
    //     type: "inline",
    //     preloader: !1,
    //     focus: "#username",
    //     modal: !0
    // }), t(document).on("click", ".portfolio-modal-dismiss", function(o) {
    //     o.preventDefault(), t.magnificPopup.close()
    // })
     t(function() {
        t("body").on("input propertychange", ".floating-label-form-group", function(o) {
            t(this).toggleClass("floating-label-form-group-with-value", !!t(o.target).val())
        }).on("focus", ".floating-label-form-group", function() {
            t(this).addClass("floating-label-form-group-with-focus")
        }).on("blur", ".floating-label-form-group", function() {
            t(this).removeClass("floating-label-form-group-with-focus")
        })
    })
}(jQuery);

$(document).ready(function(){

$(window).scroll(function(){
    if($(this).scrollTop() >900){ //condicion cuando el usuario haya bajado mas de 900px
        // $('#js_up').fadeIn();
        $("#js_up").slideDown(300); //se muestra el botón en 300 mili segundos
    }else{
        $("#js_up").slideUp(300); //se oculta el botón en 300 mili segundos
        // $('#js_up').fadeOut();
    }
});

    $("#js_up").click(function(){
        $('html ,body').animate({scrollTop: 0},800);
    });




});
