<? include $_SERVER["DOCUMENT_ROOT"] . "/common/classes/Web.php"; ?>
<?
	$headObj = new Web($_REQUEST);

	$loginInfo = $headObj->webUser;
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<meta name="title" content="DURATECH"><!-- 홈페이지 타이틀 -->
	<title>DURATECH</title>
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	<!--[if lt IE 9]>
	<script src="js/html5shiv.min.js"></script>
	<![endif]-->
</head>
<link rel="stylesheet" type="text/css" href="css/common.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
<script type="text/javascript" src="js/sweetalert.min.js">


</script>

<body>

<!-- #####HEADER START#####-->
<div class="header clearfix">
    <ul class="left_icon f_l">
        <li class="menu"><img src="image/ic_title_menu.png" alt="menu" /></li>
        <li><img src="image/ic_title_refresh.png" alt="refresh" /></li>
    </ul>

    <div class="user_info">
        <select>
            <option>슈퍼관리자</option>
            <option>로그아웃</option>
        </select>
    </div>

    <ul class="right_icon f_r">
        <!-- <li><img src="image/ic_title_data.png" alt="data" /></li> -->
        <!-- <li><img src="image/ic_title_setting.png" alt="setting" /></li> -->
        <li><img src="image/ic_title_full.png" alt="full" /></li><!-- 전체화면 해제 이미지 ic_title_small.png -->
    </ul>
</div>
<!-- #####HEADER END#####-->


<? include $_SERVER["DOCUMENT_ROOT"] . "/web/php/metaData.php" ?>

	