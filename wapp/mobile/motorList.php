<?php
/**
 * Created by PhpStorm.
 * User: sayho
 * Date: 2017-09-15
 * Time: 오전 11:28
 */
?>

<? include $_SERVER["DOCUMENT_ROOT"] . "/mobile/php/header.php" ;?>
<? include $_SERVER["DOCUMENT_ROOT"] . "/mobile/php/sideMenu.php" ;?>
<script>
    $(document).ready(function(){
        $(".jBack").show();
        var ID = "<?=$_REQUEST[no]?>";
        $.ajax({
            url: "/action_front.php?cmd=WebMain.getMotorList",
            async: false,
            cache: false,
            dataType: 'json',
            data : {
                groupNo : ID
            },
            success: function (data) {
                for(var i=0; i<data.data.length; i++){
                    var object = $("#motorEntity").html();
                    object = object.replace("###", data.data[i]["deviceName"]);
                    object = object.replace("***", data.data[i]["id"]);
                    $(".jMotorList").append(object);
                }
                $("#groupList").fadeOut({
                    complete : function(){
                        $("#motorList").fadeIn();
                    }
                }).delay(1000);
                $(".jToMotor").bind("click");
            }
        });

        $(".jToStep1").click(function(){
            var ID = $(this).attr("no");
            var motorName = $(this).children().html();
            location.href = "/mobile/Step1/motorInfo.php?no="+ID+"&motorName="+motorName;
        });


    });
</script>


<div style="height:7.8vh; top:0; width: 100vh;"></div>
<div class="view_route">
    <p>리치웨어시스템즈</p>
    <span>></span><!-- 경로(p태그)와 경로 사이에 좌측 span태그 추가 -->
</div>

<!--motor list template-->
<div id="motorEntity" class="clearfix" style="display:none">
    <li class="list @@@ jToStep1 f_l" no="***" style="cursor: pointer;"><p class="motor_name">###</p></li>
</div>
<!---->

<div class="motor_list" id="motorList">
    <ul class="jMotorList">
        <!-- 각 상태별 li에 대한 클래스 설명 >>> 정상상태 : bgG / 관심상태 : bgY / 주의상태 : bgO / 심각상태 : bgR -->
    </ul>
</div>

<? include $_SERVER["DOCUMENT_ROOT"] . "/mobile/php/footer.php" ;?>