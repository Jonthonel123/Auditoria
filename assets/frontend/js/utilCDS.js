var Services = {
  init: function () {

  },
  getToken: function () {
    var token = "";
    if(localStorage.getItem('token')){
        token = localStorage.getItem('token')
    }
    return token;
  },
  setToken:function (token) {
    if(localStorage.getItem('token')){
        localStorage.removeItem('token');
    }
    localStorage.setItem('token',token);
  },

  deleteToken:function () {
    if(localStorage.getItem('token')){
        localStorage.removeItem('token');
    }
  },

  getUser:function () {

    var self = this;

    var token = self.getToken();

    if(!(token == '')){
      var arrayUser = token.split('|');

      var user = { "nombre" : arrayUser[0], "documento" : arrayUser[1], "correo" : arrayUser[2]};

      return user;

    }

    return null;

  }

};


function show_message(type,message) {

    swal({
        title: "",
        text: message,
        type: type,
        showCancelButton: false,
        confirmButtonColor: '#0CB7F2',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
        allowOutsideClick: false

    })
}




function show_message_title(type,title,message) {
    swal({
        title: title,
        text: message, 
        showCancelButton: false,
        confirmButtonColor: '#21A053',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
        allowOutsideClick: false,
    });
}

function show_message_callback(type,message,callback) {

    swal({
        title: "",
        text: message,
        type: type,
        showCancelButton: false,
        confirmButtonColor: '#fff',
        cancelButtonColor: '#000',
        confirmButtonText: 'Aceptar',
        allowOutsideClick: false,
    }).then(function () {
        if (type == "success"){
          window.location.href = "https://www.google.com.pe/";
          return callback();
        }
    })
}
function show_message_title_callback(type,title,message,callback) {

    swal({
        title: title,
        text: message,
        type: type,
        showCancelButton: false,
        confirmButtonColor: '#21A053',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
        allowOutsideClick: false,
    }).then(function () {
        if (type == "success"){
            return callback();
        }
    })
}




function isAlpha(e) {
    var onkeypress  = (document.all) ? e.keyCode : e.which;
    if(onkeypress == 8 || onkeypress == 46)
        return true;
    var pattern = /[Ã¡Ã©Ã­Ã³ÃºÃÃ‰ÃÃ“ÃšÃ¼ÃœabcdefghijklmnÃ±opqrstuvwxyzABCDEFGHIJKLMNÃ‘OPQRSTUVWXYZ ]/
    var key = String.fromCharCode(onkeypress);
    return pattern.test(key);
}

function isAplhaNumeric(e) {
    var onkeypress  = (document.all) ? e.keyCode : e.which;
    if(onkeypress == 8 || onkeypress == 46)
        return true;
    var pattern = /[Ã¡Ã©Ã­Ã³ÃºÃÃ‰ÃÃ“ÃšÃ¼ÃœabcdefghijklmnÃ±opqrstuvwxyzABCDEFGHIJKLMNÃ‘OPQRSTUVWXYZ 0123456789#_+,.;Â°()/-]/
    var key = String.fromCharCode(onkeypress);
    return pattern.test(key);
}

function isNumeric(e) {
    var onkeypress  = (document.all) ? e.keyCode : e.which;
    if(onkeypress == 8 || onkeypress == 46)
        return true;
    var pattern = /[0123456789]/
    var key = String.fromCharCode(onkeypress);
    return pattern.test(key);
}
