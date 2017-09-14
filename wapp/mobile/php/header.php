<? include $_SERVER["DOCUMENT_ROOT"] . "/common/classes/Web.php"; ?>
<?
	$headObj = new Web($_REQUEST);

	$loginInfo = $headObj->webUser;

    if($loginInfo[userNo] == -1)
    {
        echo "<script>alert('로그인 후 이용가능합니다.'); location.href = '/mobile'; </script>";
        return;
    }
?>
<? include $_SERVER["DOCUMENT_ROOT"] . "/common/classes/comm/Locale.php"; ?>
<? include $_SERVER["DOCUMENT_ROOT"] . "/web/php/metaData.php" ?>
<!DOCTYPE html>
<html lang="utf-8">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="title" content="DURATECH">
    <title><?=$locMap["web_title"]?></title>
    <script src="js/html5shiv.min.js"></script>




</head>

<!--css-->
<link rel="stylesheet" type="text/css" href="css/common.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<!---->


<!--page loading animation-->
<link rel="stylesheet" type="text/css" href="/web/js/animsition-master/dist/css/animsition.min.css">
<script src="/web/js/animsition-master/dist/js/animsition.min.js" charset="utf-8"></script>
<!---->

<script type="text/javascript" src="js/vis.js"></script>
<link href="css/vis.min.css" rel="stylesheet" type="text/css"/>



<script>
    $(document).ready(function(){
        //page loading effect
        $('body').animsition({
            inClass: 'fade-in-up-sm',
            outClass: 'fade-out-up-sm',
            inDuration: 1500,
            outDuration: 800,
            linkElement: '.animsition-link',
            loading: true,
            loadingParentElement: 'body', //animsition wrapper element
            loadingClass: 'animsition-loading',
            loadingInner: '',
            timeout: false,
            timeoutCountdown: 5000,
            onLoadEvent: true,
            browser: [ 'animation-duration', '-webkit-animation-duration'],
            overlay : false,
            overlayClass : 'animsition-overlay-slide',
            overlayParentElement : 'body',
            transition: function(url){ window.location.href = url; }
        });

        //header Menu handler ------------------------------------------------------------------------------------------
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

        //header popupManage Click handler
        $(".jPopManage").click2(function(){
            showPop("/web/popupCollection/popupManagePop.php");
        });

        $(".jFullForce").click2(function(){
            var flag = $(this).attr("flag");
            toggleFullScreen();
            $(".jFullForce").attr("flag", (flag=="0"?"1":"0"));
            $(".jFullForce").find("img").attr("src", (flag=="0"?"image/ic_title_small.png":"image/ic_title_full.png"));
        });
        //--------------------------------------------------------------------------------------------------------------


        //side Menu handler---------------------------------------------------------------------------------------------
        //메인 페이지
        $(document).on("click", ".jMain", function(){
            location.href = "/web/main.php";
        });

        //모터 추가 팝업
        $(document).on("click", ".jAddMotor", function(){
            showPop("/web/popupCollection/addMotorPop.php");
        });

        //점멸주기설정 팝업
        $(document).on("click", ".jEmitPeriod", function(){
            showPop("/web/popupCollection/emitPeriodPop.php");
        });

        //언어 설정 팝업
        $(document).on("click", ".jLangSetting", function(){
            showPop("/web/popupCollection/languageSettingPop.php");
        });

        //팝업 닫기 일괄 처리
        $(document).on("click", ".JClose", function(){
            var target = $(this).attr("target");
            $("."+target).fadeOut();
        });

        //사이드메뉴 잠금 토글
        $(function(){
            $(".sideBar").find('.menu_lock').toggle(function(){
                $('.menu_lock').find("img").attr("src", "image/ic_side_lock_off.png");
                $('.menu_lock').find("img").attr("flag", "1");
                $('.menu_lock').find("dura").html("<?=$locMap["side_lock_release"]?>");
            }, function(){
                $('.menu_lock').find("img").attr("src", "image/ic_side_lock.png");
                $('.menu_lock').find("img").attr("flag", "0");
                $('.menu_lock').find("dura").html("<?=$locMap["side_lock"]?>");
            });
        });
        //--------------------------------------------------------------------------------------------------------------

        //팝업 영역 설정 공통
//        function showPop(url){
//            $.ajax({
//                url: url,
//                async : false,
//                cache : false,
//                dataType : "html",
//                data:{},
//                success :function(data){
//                    $(".jPopSection").html(data);
//                    $(".jPopSection").draggable();
//                }
//            });
//        }


    });
</script>

<body>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/sehoMap.js"></script>
<script src="js/html5shiv.min.js"></script>

<div class="header">
    <h2>DURATECH</h2>

    <a href="#" class="title_btn back" style="display:none;"><img src="image/btn_title_back.png" alt="뒤로가기" /></a>
    <a href="#" class="title_btn menu"><img src="image/btn_title_menu.png" alt="메뉴" /></a>
</div>


	