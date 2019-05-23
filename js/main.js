$(function() {
    "use strict";
    document.addEventListener('DOMContentLoaded', function(){
        
        //FORMULARIO
        var name=document.getElementById('name');
        var password=document.getElementById('password');

        //PASES
        var pase_dia=document.getElementById('pase_dia');
        var pase_vip=document.getElementById('pase_vip');

        //Boton
        var errorDiv=document.getElementById('error');

        //Ocultar mostrar dias en compra
        pase_dia.addEventListener('blur', mostrarDias);
        pase_vip.addEventListener('blur', mostrarDias);

        function mostrarDias(){
            var boletosDia=parseInt(pase_dia.Value, 10)||0,
                boletosVip=parseInt(pase_vip.Value, 10)||0;
            
            var diasElegidos = [];

            if(boletosDia > 0){
                diasElegidos.push('pasepordia');
            }

            if(boletosVip > 0){
                diasElegidos.push('vippordia');
            }

            for(var i=0; i<diasElegidos.length; i++) {
                document.getElementById(diasElegidos[i]).style.display='block';
            }
        }
        

    });

    //Barra fija
    var windowHeight = $(window).height();
    var barraAltura = $('.barra').innerHeight();

    $(window).scroll(function(){
        var scroll = $(window).scrollTop();
        if(scroll > windowHeight) {
            $('.barra').addClass('fixed');
            $('body').css({'margin-top': barraAltura+'px'});
        } else {
            $('.barra').removeClass('fixed');
            $('body').css({'margin-top':'0px'});
        }
    });

    //Hamburguesa
    $('.menu-movil').on('click',function(){
        $('.navegacion-principal').slideToggle();
    });

    //Programa
    $('.programa-evento .info-conci:first').show();
    $('.menu-programa a:first').addClass('activo');

    $('.menu-programa a').on('click', function(){
        $('.menu-programa a').removeClass('activo');
        $(this).addClass('activo');
        $('.ocultar').hide();
        var enlace=$(this).attr('href');
        $(enlace).fadeIn(1000);
        return false;
    });

    //Animacion para info NO ME GUSTÓ
    //$('.resumen-evento li:nth-child(1) p').animateNumber({number: 12}, 1200);
    //$('.resumen-evento li:nth-child(2) p').animateNumber({number: 2}, 1000);
    //$('.resumen-evento li:nth-child(3) p').animateNumber({number: 3}, 1000);
    //$('.resumen-evento li:nth-child(4) p').animateNumber({number: 8}, 1200);

    //Cuenta regresiva
    $('.cuenta-regresiva').countdown('2020/03/19 16:00:00', function(event){
        $('#dias').html(event.strftime('%D'));
        $('#horas').html(event.strftime('%H'));
        $('#minutos').html(event.strftime('%M'));
        $('#segundos').html(event.strftime('%S'));
    });

    //Letras TITULO

    //MAPA
    var map = L.map('mapa').setView([20.582492, -101.197944], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([20.582492, -101.197944]).addTo(map)
    .bindPopup('Aquí esta Majo.<br> LATINLIVE')
    .openPopup()
    .bindTooltip('Un Tooltip')
    .openTooltip();
    

});