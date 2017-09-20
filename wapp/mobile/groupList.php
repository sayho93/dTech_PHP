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
<? include $_SERVER["DOCUMENT_ROOT"] . "/common/classes/WebMain.php" ;?>
<?
$mainObj = new WebMain($_REQUEST);

$companyInfo = json_decode($mainObj->getCompanyInfo())->data;
$plantInfo = json_decode($mainObj->getFactoryInfo())->data;

?>
<script>
    $(document).ready(function(){
        $(".jBack").show();
        var ID = "<?=$_REQUEST[pKey]?>";
        var cKey = "<?=$_REQUEST[cKey]?>";

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
            var gKey = $(this).attr("no");
            location.href = "/mobile/motorList.php?gKey="+gKey+"&cKey="+cKey+"&pKey="+ID;
        });

    });
</script>

<div style="height:7.8vh; top:0; width: 100vh;"></div>
    <div class="view_route">
        <p><?=$companyInfo->companyName?></p>
        <span>></span>
        <p><?=$plantInfo->plantName?></p>
    </div>

<!--group list template-->
<div id="groupEntity" style="display:none;">
    <li class="list jToMotor" no="***" style="cursor: pointer;"><p class="group_name">###</p></li>
</div>
<!---->

<div class="group_list" id="groupList">
    <ul class="jGroupList">

    </ul>
</div>

<? include $_SERVER["DOCUMENT_ROOT"] . "/mobile/php/footer.php" ;?>