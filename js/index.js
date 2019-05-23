$(document).ready(function(){

    // ********** USUARIOS ********** //
    $("#recargar").click(function(event){

        event.preventDefault();
        $.ajax({
            url: "usuarios_info.php",
            data: {},
            dataType: 'json',
            success: function(data)
            {
                var str = "";

                $.each(data, function(i, item){
                    str += '<div class="table-wrapper" role="alert">'+
                              item.user_name + '&nbsp <a href="usuarios_editar.php?nombre=' + encodeURIComponent(item.user_name) + ' &id='+ item.users_id + ' &password='+encodeURIComponent(item.passwords)+'"><i class="fas fa-pencil-alt"></i></a>' +
                              '&nbsp <a href="#" id="'+ item.users_id + '" class="alert-link delete-link"><i class="fas fa-trash-alt"></i></a>' +  
                        '</div>';
                });
                $("#obtenertodo").html(str);
            }
        });
    });


    $(function(){
        $(document).on('click', '.delete-link',function(){
            var id=$(this).attr('id');
            $.ajax({
                type: "POST",
                url: "usuarios_info.php",
                data: {'id':id},
                success: function(data)
                {
                    $("#respuesta").show(3000).html(data).delay(2000).fadeOut(1000);
                    $("#recargar").trigger("click");
                }
            });

        });
    });

    $("#formulario").submit(function(event){
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "usuarios_info.php",
            data: $("#formulario").serialize(),
            success: function(data)
            {
                $("#respuesta").show(3000).html(data).delay(2000).fadeOut(1000);
                $("#recargar").trigger("click");
            }
        });
    });

    $("#editarnombre").submit(function(event){
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "usuarios_info.php",
            data: $("#editarnombre").serialize(),
            success: function(data)
            {
                $("#respuesta").show(3000).html(data).delay(2000).fadeOut(1000);
            }
        });
    });

    // ********** ADMINISTRADORES ********** //
    $("#recargar2").click(function(event){

        event.preventDefault();
        $.ajax({
            url: "admins_info.php",
            data: {},
            dataType: 'json',
            success: function(data)
            {
                var str = "";

                $.each(data, function(i, item){
                    str += '<div class="table-wrapper" role="alert">'+
                              item.admin_name + '&nbsp <a href="admins_editar.php?nombre=' + encodeURIComponent(item.admin_name) + ' &id='+ item.admins_id + ' &password='+encodeURIComponent(item.passwords)+'"><i class="fas fa-pencil-alt"></i></a>' +
                              '&nbsp <a href="#" id="'+ item.admins_id + '" class="alert-link delete-link2"><i class="fas fa-trash-alt"></i></a>' +  
                        '</div>';
                });
                $("#obtenertodo2").html(str);
            }
        });
    });


    $(function(){
        $(document).on('click', '.delete-link2',function(){
            var id=$(this).attr('id');
            $.ajax({
                type: "POST",
                url: "admins_info.php",
                data: {'id':id},
                success: function(data)
                {
                    $("#respuesta2").show(3000).html(data).delay(2000).fadeOut(1000);
                    $("#recargar2").trigger("click");
                }
            });

        });
    });

    $("#formulario2").submit(function(event){
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "admins_info.php",
            data: $("#formulario2").serialize(),
            success: function(data)
            {
                $("#respuesta2").show(3000).html(data).delay(2000).fadeOut(1000);
                $("#recargar2").trigger("click");
            }
        });
    });

    $("#editarnombre2").submit(function(event){
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "admins_info.php",
            data: $("#editarnombre2").serialize(),
            success: function(data)
            {
                $("#respuesta2").show(3000).html(data).delay(2000).fadeOut(1000);
            }
        });
    });

    // ********** ARTISTAS ********** //
    $("#recargar5").click(function(event){

        event.preventDefault();
        $.ajax({
            url: "artistas_info.php",
            data: {},
            dataType: 'json',
            success: function(data)
            {
                var str = "";

                $.each(data, function(i, item){
                    str += '<div class="table-wrapper" role="alert">'+
                              item.descr + '&nbsp <a href="artistas_editar.php?nombre=' + encodeURIComponent(item.descr) + ' &id='+ item.artist_id + '"><i class="fas fa-pencil-alt"></i></a>' +
                              '&nbsp <a href="#" id="'+ item.artist_id + '" class="alert-link delete-link5"><i class="fas fa-trash-alt"></i></a>' +  
                        '</div>';
                });
                $("#obtenertodo5").html(str);
            }
        });
    });


    $(function(){
        $(document).on('click', '.delete-link5',function(){
            var id=$(this).attr('id');
            $.ajax({
                type: "POST",
                url: "artistas_info.php",
                data: {'id':id},
                success: function(data)
                {
                    $("#respuesta5").show(3000).html(data).delay(2000).fadeOut(1000);
                    $("#recargar5").trigger("click");
                }
            });

        });
    });

    $("#formulario5").submit(function(event){
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "artistas_info.php",
            data: $("#formulario5").serialize(),
            success: function(data)
            {
                $("#respuesta5").show(3000).html(data).delay(2000).fadeOut(1000);
                $("#recargar5").trigger("click");
            }
        });
    });

    $("#editarnombre5").submit(function(event){
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "artistas_info.php",
            data: $("#editarnombre5").serialize(),
            success: function(data)
            {
                $("#respuesta5").show(3000).html(data).delay(2000).fadeOut(1000);
            }
        });
    });
    
    // ********** EVENTOS ********** //
    $("#recargar3").click(function(event){

        event.preventDefault();
        $.ajax({
            url: "eventos_info.php",
            data: {},
            dataType: 'json',
            success: function(data)
            {
                var str = "";

                $.each(data, function(i, item){
                    str += '<div class="table-wrapper" role="alert">'+item.Famoso +' --- '+item.Escenario +' --- '+item.Dia +
                        '</div>';
                });
                $("#obtenertodo3").html(str);
            }
        });
    });


    $(function(){
        $(document).on('click', '.delete-link3',function(){
            var id=$(this).attr('id');
            $.ajax({
                type: "POST",
                url: "eventos_info.php",
                data: {'id':id},
                success: function(data)
                {
                    $("#respuesta3").show(3000).html(data).delay(2000).fadeOut(1000);
                    $("#recargar3").trigger("click");
                }
            });

        });
    });

    $("#formulario3").submit(function(event){
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "eventos_info.php",
            data: $("#formulario2").serialize(),
            success: function(data)
            {
                $("#respuesta3").show(3000).html(data).delay(2000).fadeOut(1000);
                $("#recargar3").trigger("click");
            }
        });
    });

    $("#editarnombre3").submit(function(event){
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "eventos_info.php",
            data: $("#editarnombre3").serialize(),
            success: function(data)
            {
                $("#respuesta3").show(3000).html(data).delay(2000).fadeOut(1000);
            }
        });
    });

        // ********** ESCENARIOS ********** //
        $("#recargar7").click(function(event){

            event.preventDefault();
            $.ajax({
                url: "escenarios_info.php",
                data: {},
                dataType: 'json',
                success: function(data)
                {
                    var str = "";
    
                    $.each(data, function(i, item){
                        str += '<div class="table-wrapper" role="alert">'+
                                  item.stage_name + '&nbsp <a href="escenarios_editar.php?nombre=' + encodeURIComponent(item.stage_name) + ' &id='+ item.stage_id + '"><i class="fas fa-pencil-alt"></i></a>' +
                                  '&nbsp <a href="#" id="'+ item.stage_id + '" class="alert-link delete-link7"><i class="fas fa-trash-alt"></i></a>' +  
                            '</div>';
                    });
                    $("#obtenertodo7").html(str);
                }
            });
        });
    
    
        $(function(){
            $(document).on('click', '.delete-link7',function(){
                var id=$(this).attr('id');
                $.ajax({
                    type: "POST",
                    url: "escenarios_info.php",
                    data: {'id':id},
                    success: function(data)
                    {
                        $("#respuesta7").show(3000).html(data).delay(2000).fadeOut(1000);
                        $("#recargar7").trigger("click");
                    }
                });
    
            });
        });
    
        $("#formulario7").submit(function(event){
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: "escenarios_info.php",
                data: $("#formulario7").serialize(),
                success: function(data)
                {
                    $("#respuesta7").show(3000).html(data).delay(2000).fadeOut(1000);
                    $("#recargar7").trigger("click");
                }
            });
        });
    
        $("#editarnombre7").submit(function(event){
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: "escenarios_info.php",
                data: $("#editarnombre7").serialize(),
                success: function(data)
                {
                    $("#respuesta7").show(3000).html(data).delay(2000).fadeOut(1000);
                }
            });
        });


});