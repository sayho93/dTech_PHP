<? include $_SERVER["DOCUMENT_ROOT"] . "/common/classes/Web.php"; ?>
<?
	$headObj = new Web($_REQUEST);
	$loginInfo = $headObj->webUser;
    if($loginInfo[userNo] == -1){
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
    <script src="/mobile/js/html5shiv.min.js"></script>
</head>

<!--css-->
<link rel="stylesheet" type="text/css" href="/mobile/css/common.css">
<link rel="stylesheet" type="text/css" href="/mobile/css/style.css">
<!---->

<!--page loading animation-->
<link rel="stylesheet" type="text/css" href="/web/js/animsition-master/dist/css/animsition.min.css">
<script src="/web/js/animsition-master/dist/js/animsition.min.js" charset="utf-8"></script>
<!---->

<script type="text/javascript" src="/mobile/js/vis.js"></script>
<link href="/mobile/css/vis.min.css" rel="stylesheet" type="text/css"/>

<script>
    $(document).ready(function(){
        //page loading effect
        $('div :not(.header)').animsition({
            inClass: 'fade-in-right-sm',
            outClass: 'fade-out-right-sm',
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

        $(".jBack").click(function(){
            history.go(-1);
        });
        //--------------------------------------------------------------------------------------------------------------
    });
</script>

<body>
<script type="text/javascript" src="/mobile/js/main.js"></script>
<script type="text/javascript" src="/mobile/js/sehoMap.js"></script>
<script src="/mobile/js/html5shiv.min.js"></script>

<link href="/mobile/css/swiper.min.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="/mobile/js/swiper.min.js"></script>
<script type="text/javascript" src="/mobile/js/swiper.jquery.min.js"></script>
<div class="header">
    <h2>DURATECH</h2>

    <a class="title_btn back jBack" style="display:none; cursor:pointer"><img src="/mobile/image/btn_title_back.png" alt="뒤로가기" /></a>
    <a class="title_btn menu"><img src="/mobile/image/btn_title_menu.png" alt="메뉴" /></a>
</div>


	