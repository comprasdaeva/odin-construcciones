//alerta error de formuarlio de contacto 

$(document).ready(function(){
   $('#btnSend').click(function(){

    var errores ='';

    //validando nombre =================
    if( $('#nombre').val() == ''){
        errores += '<p> Escriba un nombre </p>';
        $('#nombre').css("border-bottom-color","#F14B4B")
    } else{
        $('#nombre').css("border-bottom-color","#f8b208")
    }

    //validando correo =================
    if ($('#email').val()==''){
        errores += '<p> Escriba un email </p>';
        $('#email').css("border-bottom-color","#F14B4B")
    } else{
        $('#email').css("border-bottom-color","#f8b208")
    }

    //validando mensaje =================
    if ($('#mensaje').val()==''){
        errores += '<p> Escriba un mensaje </p>';
        $('#mensaje').css("border-bottom-color","#F14B4B")
    } else{
        $('#mensaje').css("border-bottom-color","#f8b208")
    }

    //ENVIANDO MENSAJE======
    if( errores == '' == false){
        var mensajeModal = '<div class="modal_wrap">'+
                                '<div class="mensaje_modal">'+
                                    '<h3>Errores encontrados</h3>'+
                                    errores+
                                    '<span id="btnClose">Cerrar</span>'+
                                '</div>'+
                           '</div>'
        $('body').append(mensajeModal);                   
    }

    //CERRANDO MODAL==================
    $('#btnClose').click(function(){
        $('.modal_wrap'). remove();
    });
   });
});