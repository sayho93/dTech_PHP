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
<script type="text/javascript" src="js/sweetalert.min.js"></script>
<? include $_SERVER["DOCUMENT_ROOT"] . "/web/php/metaData.php" ?>

	