<?
/**
 * Created by PhpStorm.
 * User: p
 * Date: 2017-09-04
 * Time: 오후 1:37
 */
?>
<? include $_SERVER["DOCUMENT_ROOT"] . "/web/php/header.php" ;?>
<? include $_SERVER["DOCUMENT_ROOT"] . "/common/classes/WebUser.php" ;?>
<? include $_SERVER["DOCUMENT_ROOT"] . "/web/php/sideMenu.php" ;?>
<?
$obj = new WebUser($_REQUEST);

$webUser = $obj->webUser["userNo"];
?>
<script type="text/javascript" src="js/main.js"></script>
<script src="js/html5shiv.min.js"></script>
<script>
    $(document).ready(function () {
        $(".jEmitPeriod").click(function () {
            alert();
        });
    });
</script>

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


<!-- #####팝업관리 POPUP START##### -->
<div class="motor_pop jEmitElement" style="position:fixed; top:20%; left:30%; width:40%">
    <div class="pop_title" style="padding-left: 0.9vw;">
        <h3>점멸 주기 설정</h3>
        <a href="jClosePop" _type="jEmitElement"><img src="image/ic_pop_title_exit.png" alt="닫기" /></a>
    </div>

    <div class="pop_content" style="height:40%">
        <ul>
            <li>
                <p>관심(노랑)</p>
                <select style="width: 30%">
                    <option>정적편심</option>
                </select>
                <select style="width: 30%">
                    <option>정적편심</option>
                </select>
                <select style="width: 30%">
                    <option>정적편심</option>
                </select>
                <label for="chk1"><span>모터 정보</span></label>
            </li>
            <li>
                <input type="checkbox" name="chk" id="chk2" />
                <label for="chk2"><span>에너지 효율</span></label>
            </li>
            <li>
                <input type="checkbox" name="chk" id="chk3" />
                <label for="chk3"><span>모터 상태</span></label>
            </li>
            <li>
                <input type="checkbox" name="chk" id="chk4" />
                <label for="chk4"><span>Trend View</span></label>
            </li>
            <li>
                <input type="checkbox" name="chk" id="chk5" />
                <label for="chk5"><span>기계 상태</span></label>
            </li>
        </ul>
    </div>

    <div class="pop_footer clearfix">
        <div class="f_r">
            <input type="button" name="" value="취소" />
            <input type="button" name="" value="확인" />
        </div>
    </div>
</div>
<!-- #####팝업관리 POPUP END##### -->


</html>