<?
/**
 * Created by PhpStorm.
 * User: sayho
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

        //메인 페이지
        $(document).on("click", ".jMain", function(){
            location.href = "/web/main.php";
        });

        //점멸주기설정
        $(document).on("click", ".jEmitPeriod", function(){
            showPop("/web/popupCollection/emitPeriodPop.php");
        });

        //언어 설정
        $(document).on("click", ".jLangSetting", function(){
            showPop("/web/popupCollection/languageSettingPop.php");
        });

        $(document).on("click", ".JClose", function(){
            var target = $(this).attr("target");
            $("."+target).hide();
        });

        $(".jCancel").click(function(){
            alert();
        });

        function showPop(url){
            $.ajax({
                url: url,
                async : false,
                cache : false,
                dataType : "html",
                data:{

                },
                success :function(data){
                    $(".jPopSection").html(data);
                    $(".jPopSection").draggable();
                }
            });
        }
    });
</script>

</head>

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
<!-- #####화면위치 END#####-->\

<div class="jPopSection" style="position: relative">

</div>


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