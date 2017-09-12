<? include $_SERVER["DOCUMENT_ROOT"] . "/common/classes/Web.php"; ?>
<?
	$headObj = new Web($_REQUEST);

	$loginInfo = $headObj->webUser;

    if($loginInfo[userNo] == -1)
    {
        echo "<script>alert('로그인 후 이용가능합니다.'); location.href = '/web'; </script>";
        return;
    }
?>
<? include $_SERVER["DOCUMENT_ROOT"] . "/common/classes/comm/Locale.php"; ?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="title" content="DURATECH">
    <title><?=$locMap["web_title"]?></title>
    <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
    <script src="js/html5shiv.min.js"></script>
</head>

<!--css-->
<link rel="stylesheet" type="text/css" href="css/common.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<!---->

<!--alert js-->
<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
<script type="text/javascript" src="js/sweetalert.min.js"></script>
<!---->

<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/main.js"></script>

<script>


    $(document).ready(function(){
        
        //로그아웃 처리
        $("#jLoginCtrl").change(function(){
            if($("#jLoginCtrl").val() == "로그아웃" || $("#jLoginCtrl").val() == "Logout"){
                $.ajax({
                    url: "/action_front.php?cmd=WebBase.doWebLogout",
                    async: false,
                    cache: false,
                    dataType: 'json',
                    data: {
                    },
                    success: function (data) {
                        alert("<?=$locMap[alerts][logout]?>");
                        location.href = "/web";
                    }
                });
            }
        });

        $(".jFullForce").click2(function(){
            var flag = $(this).attr("flag");
            toggleFullScreen();
            $(".jFullForce").attr("flag", (flag=="0"?"1":"0"));
            $(".jFullForce").find("img").attr("src", (flag=="0"?"image/ic_title_small.png":"image/ic_title_full.png"));
        });

    });
</script>

<body>

<?if(strpos($_SERVER['REQUEST_URI'], "/web/login.php") !== false){?>

<?}else{?>
    <div class="header clearfix">
        <ul class="left_icon f_l">
            <li class="menu"><img src="image/ic_title_menu.png" alt="menu" /></li>
            <li><img src="image/ic_title_refresh.png" alt="refresh" /></li>
        </ul>

        <div class="user_info">
            <select id="jLoginCtrl">
                <option><?=$loginInfo["userID"]?></option>
                <option class="jLogout"><?=$locMap["statics"]["logout"]?></option>
            </select>
        </div>

        <ul class="right_icon f_r">
            <!-- <li><img src="image/ic_title_data.png" alt="data" /></li> -->
            <!-- <li><img src="image/ic_title_setting.png" alt="setting" /></li> -->
            <li class="jFullForce" flag="0"><img src="image/ic_title_full.png" alt="full" /></li><!-- 전체화면 해제 이미지 ic_title_small.png -->
        </ul>
    </div>
<?}?>
<? include $_SERVER["DOCUMENT_ROOT"] . "/web/php/metaData.php" ?>

	