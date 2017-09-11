$(function(){
	$('.header').find('.menu').toggle(function(){
		$('.sideBar').animate({left:'0px'},300);
	}, function(){
		$('.sideBar').animate({left:'-251px'},300);
	});
});

$(function(){
    $(".sideBar").find('.menu_lock').toggle(function(){
        $('.menu_lock').find("img").attr("src", "image/ic_side_lock_off.png");
        $('.menu_lock').find("img").attr("flag", "1");
        $('.menu_lock').find("dura").html("사이드 메뉴 잠금 해제");
    }, function(){
        $('.menu_lock').find("img").attr("src", "image/ic_side_lock.png");
        $('.menu_lock').find("img").attr("flag", "0");
        $('.menu_lock').find("dura").html("사이드 메뉴 잠금");
    });
});

//클릭 이벤트 핸들러
$("body").click(function(){
    if($(".sideBar").css("left") != "-251px" && $(".menu_lock").find("img").attr("flag") != "1")
        $(".menu").trigger("click");
});