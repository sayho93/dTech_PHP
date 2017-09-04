<?
/**
 * Created by PhpStorm.
 * User: p
 * Date: 2017-09-04
 * Time: 오후 1:37
 */
?>


<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<meta name="title" content="DURATECH"><!-- 홈페이지 타이틀 -->
	<meta name="author" content="Choi Bong Su"><!-- 제작자 -->
	<title>DURATECH</title>
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<!--[if lt IE 9]>
	<script src="js/html5shiv.min.js"></script>
	<![endif]-->
</head>
<body>

<!-- #####HEADER START#####-->
<div class="header clearfix">
	<ul class="left_icon f_l">
		<li class="menu"><img src="image/ic_title_menu.png" alt="menu" /></li>
		<li><img src="image/ic_title_refresh.png" alt="refresh" /></li>
		<!-- <li><img src="image/ic_title_add.png" alt="add" /></li> -->
		<!-- <li><img src="image/ic_title_pop.png" alt="pop" /></li> -->
		<!-- <li><img src="image/ic_title_lock.png" alt="lock" /></li>잠금해제 상태 이미지 ic_title_lock_open.png -->
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


<!-- #####SIDE MENU START -->
<div class="sideBar">
	<h2>DURATECH</h2>

	<ul class="menu_list">
		<li><a href="#"><img src="image/ic_side_home.png" alt="메인" />메인</a></li>
		<li><a href="#"><img src="image/ic_side_add.png" alt="모터 추가" />모터 추가</a></li>
		<li><a href="#"><img src="image/ic_side_timer.png" alt="점멸 주기 설정" />점멸 주기 설정</a></li>
		<li><a href="#"><img src="image/ic_side_language.png" alt="언어 설정" />언어 설정</a></li>
	</ul>

	<div class="menu_lock">
		<a href="#">
			<img src="image/ic_side_lock.png" alt="사이드 메뉴 잠금" /><!-- 잠금 해제아이콘 > ic_side_lock_off.png -->
			사이드 메뉴 잠금
</a>
	</div>
</div>
<!-- #####SIDE MENU END -->

<!-- #####화면위치 START#####-->
<div class="route">
	<p>
회사명
		<span>></span>
공장1
		<span>></span>
그룹1
	</p>
</div>
<!-- #####화면위치 END#####-->


<!-- #####마인드맵 START#####-->
<div class="content_map">
	<a href="#" class="prev"><img src="image/ic_main_prev.png" alt="prev" /></a>
	<a href="#" class="next"><img src="image/ic_main_next.png" alt="next" /></a>

	<div class="area"></div>
</div>
<!-- #####마인드맵 END#####-->

<!-- #####화면정보 START#####-->
<div class="view_info">
	<dl>
		<dt>위치 정보</dt>
		<dd>
			<p>
회사명
				<span>></span>
공장1
				<span>></span>
그룹1
				<span>></span>
그룹2
			</p>
		</dd>
		<dt>설비 명</dt>
		<dd><p>47CH902-CM1M</p></dd>
	</dl>

	<div class="view_select">
		<select>
			<option>그룹 1까지 보기</option>
		</select>
	</div>
</div>

<!-- #####화면정보 END#####-->

</body>
</html>