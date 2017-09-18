$(function(){
	$('.header').find('.menu').click(function(){
        $('html, body').css({'overflow-y': 'hidden'}).on('scroll touchmove mousewheel', function(e) { return false; });
		$('.side_bg').show();
		$('.side_menu').animate({right:'0px'},300);
	});
	$('.side_menu').find('.side_exit').click(function(){
        $('html, body').css({'overflow-y': 'scroll'}).on('scroll touchmove mousewheel', function(e) { return false; });
		$('.side_bg').hide();
		$('.side_menu').animate({right:'-80.54vw'},300);
	});
});

function showPop(url){
    $.ajax({
        url: url,
        async : false,
        cache : false,
        dataType : "html",
        data:{},
        success :function(data){
            $(".jPopSection").html(data);
            $(".jPopSection").fadeIn();
        }
    });
}