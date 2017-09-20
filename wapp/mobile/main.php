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
<? include $_SERVER["DOCUMENT_ROOT"] . "/common/classes/WebMain.php" ;?>
<?
$mainObj = new WebMain($_REQUEST);

$companyInfo = json_decode($mainObj->getCompanyInfo())->data;
?>

<script>
    $(document).ready(function(){
        //factory listing
        $.ajax({
            url: "/action_front.php?cmd=WebMain.getFactoryList",
            async: false,
            cache: false,
            dataType: 'json',
            success: function (data) {
                for(var i=0; i<data.data.length; i++){
                    var object = $("#listEntity").html();
                    object = object.replace("###", data.data[i]["plantName"]);
                    object = object.replace("***", data.data[i]["id"]);
                    $(".jFactoryList").append(object);
                }
            }
        });

        $(document).on("click", ".jToGroup", function(){
            var ID = $(this).attr("no");

           location.href = "/mobile/groupList.php?pKey="+ID+"&cKey="+"<?=$loginInfo["companyNo"]?>";
        });

    });
</script>

<div style="height:7.8vh; top:0; width: 100vh;"></div>

<div class="view_route">
    <p><?=$companyInfo->companyName?></p>
</div>


<!--factory list template-->
<div id="listEntity" style="display:none;">
    <li class="list jToGroup" no="***">
        <p class="factory_name">###</p>
        <a class="next_page"><img src="image/btn_arrow_right.png" alt="다음 페이지" /></a>
    </li>
</div>
<!---->


<div class="factory_list" id="factoryList">
    <ul class="jFactoryList">

    </ul>
</div>


<? include $_SERVER["DOCUMENT_ROOT"] . "/mobile/php/footer.php" ;?>
