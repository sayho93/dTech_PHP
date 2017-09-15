<?php
/**
 * Created by PhpStorm.
 * User: sayho
 * Date: 2017-09-14
 * Time: 오후 5:05
 */
?>

<? include $_SERVER["DOCUMENT_ROOT"] . "/mobile/php/header.php" ;?>
<? include $_SERVER["DOCUMENT_ROOT"] . "/mobile/php/sideMenu.php" ;?>

<script>
    $(document).ready(function(){
        $(".jPush").click(function(){
            $.ajax({
                url: "/action_front.php?cmd=WebUser.setPushOnOff",
                async: false,
                cache: false,
                dataType: 'json',
                success: function (data) {
                    if(data.data["pushEnabled"] == "Y"){
                        $(".jPush").find("img").attr("src", "image/btn_push_on.png");
                    }
                    else{
                        $(".jPush").find("img").attr("src", "image/btn_push_off.png");
                    }
                },
                error : function(req, res, err){
                    alert(req+res+err);
                }
            });
        });
    });
</script>

<div style="height:7.8vh; top:0; width: 100vh;"></div>

<div class="factory_list">
    <ul class="jFactoryList">
        <li class="list" no="***">
            <p class="factory_name">푸시 알림 받기</p>
            <?if($loginInfo["pushEnabled"] == "Y"){?>
                <a class="next_page jPush" id="pushStatus"><img src="image/btn_push_on.png" alt="다음 페이지" /></a>
            <?} else{?>
                <a class="next_page jPush" id="pushStatus"><img src="image/btn_push_off.png" alt="다음 페이지" /></a>
            <?}?>
        </li>
        <li class="list" no="***">
            <p class="factory_name">언어 설정</p>
            <a class="next_page"><img src="image/btn_arrow_right.png" alt="다음 페이지" /></a>
        </li>
        <li class="list" no="***">
            <p class="factory_name">버전 정보</p>

        </li>
    </ul>
</div>

<? include $_SERVER["DOCUMENT_ROOT"] . "/mobile/php/footer.php" ;?>
