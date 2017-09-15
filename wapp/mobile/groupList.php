<?php
/**
 * Created by PhpStorm.
 * User: sayho
 * Date: 2017-09-15
 * Time: 오전 11:19
 */
?>

<? include $_SERVER["DOCUMENT_ROOT"] . "/mobile/php/header.php" ;?>
<? include $_SERVER["DOCUMENT_ROOT"] . "/mobile/php/sideMenu.php" ;?>

<script>
    $(document).ready(function(){
        $(".jBack").show();
        var ID = "<?=$_REQUEST[no]?>";

        $.ajax({
            url: "/action_front.php?cmd=WebMain.getGroupList",
            async: false,
            cache: false,
            dataType: 'json',
            data : {
                factoryNo : ID
            },
            success: function (data) {
                for(var i=0; i<data.data.length; i++){
                    var object = $("#groupEntity").html();1
                    object = object.replace("###", data.data[i]["groupName"]);
                    object = object.replace("***", data.data[i]["id"]);
                    $(".jGroupList").append(object);
                }
                $("#groupList").fadeIn();
                $(".jToGroup").bind("click");
            }
        });

        $(document).on("click", ".jToMotor", function(){
            var ID = $(this).attr("no");
            location.href = "/mobile/motorList.php?no="+ID;
        });

    });
</script>

<div class="view_route">
    <p>리치웨어시스템즈</p>
    <span>></span><!-- 경로(p태그)와 경로 사이에 좌측 span태그 추가 -->
</div>

<!--group list template-->
<div id="groupEntity" style="display:none">
    <li class="list jToMotor" no="***"><p class="group_name">###</p></li>
</div>
<!---->

<div class="group_list" id="groupList">
    <ul class="jGroupList">

    </ul>
</div>

<? include $_SERVER["DOCUMENT_ROOT"] . "/mobile/php/footer.php" ;?>