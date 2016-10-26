$( document ).ready(function() {

   //** Handler 'Síguenos' botton

    $('#boton_siguenos').hover(
        function(){
            $('#siguenos_img').attr("src","./Public/img/btn_siguenos_activo.png");
            $('#boton_siguenos').css("bottom","-100%");
        },
        function(){ 
            $('#siguenos_img').attr("src","./Public/img/btn_siguenos.png");
            $('#boton_siguenos').css("bottom","0%");
        }
    );

   //** ** ** ** ** ** *** *** * 

   //** Handler 'Conócenos' botton

    $('#boton_conocenos').hover(
        function(){
            $('#conocenos_img').attr("src","./Public/img/btn_conocenos_activo.png");
            $('#boton_conocenos').css("bottom","-100%");
        },
        function(){ 
            $('#conocenos_img').attr("src","./Public/img/btn_conocenos.png");
            $('#boton_conocenos').css("bottom","0%");
        }
    );

   //** ** ** ** ** ** *** *** *    

   //** Handler 'deQuéSeTrata' botton

    $('.buttons').hover(
        function(){
            $('#deQueSeTrataButton').attr("src","./Public/img/btn_dequesetrata_activo.png");
        },
        function(){ 
            $('#deQueSeTrataButton').attr("src","./Public/img/btn_dequesetrata.png");

        }
    );

   //** ** ** ** ** ** *** *** * 

});


