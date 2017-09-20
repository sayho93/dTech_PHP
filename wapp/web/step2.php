<?php
/**
 * Created by PhpStorm.
 * User: sayho
 * Date: 2017-09-20
 * Time: 오전 10:45
 */
?>

<? include $_SERVER["DOCUMENT_ROOT"] . "/web/php/header.php" ;?>
<? include $_SERVER["DOCUMENT_ROOT"] . "/common/classes/WebUser.php" ;?>
<? include $_SERVER["DOCUMENT_ROOT"] . "/web/php/sideMenu.php" ;?>

<script>
    $(function(){

    });
</script>

<div class="jPopSection" style="position: absolute; z-index:999; top: 12vh; left:10vh">

</div>

<div class="content_step">
    <div class="step2_view">
        <div class="view_title">
            <select>
                <option>모터 고정자 결함</option>
            </select>

            <h4><span class="bgP"></span>Trend View</h4>

            <div class="date_select">
                <span>트렌드 기간</span>
                <input type="button" name="" value="2017-01-01" />
                <span>~</span>
                <input type="button" name="" value="2017-01-15" />
            </div>

            <a href="#" class="full"><img src="image/ic_pop_full.png" alt="전체화면" /></a>
        </div>
        <div class="view_con">
            <div class="graph_area"><!-- 그래프영역 --></div>
        </div>
    </div>

    <div class="step2_view">
        <div class="view_title">
            <a href="#" class="set"><img src="image/ic_pop_setting.png" alt="셋팅" /></a>

            <h4><span class="bgLG"></span>Spectrum View</h4>

            <a href="#" class="full"><img src="image/ic_pop_full.png" alt="전체화면" /></a>
        </div>
        <div class="view_con">
            <div class="graph_area"><!-- 그래프영역 --></div>
        </div>
    </div>
</div>

</body>
</html>
