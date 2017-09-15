<?php
/**
 * Created by PhpStorm.
 * User: sayho
 * Date: 2017-09-04
 * Time: 오후 5:24
 */
?>

<div class="side_bg sideBar" style="z-index: 9999"></div>
<div class="side_menu" style="z-index: 9999">
    <h3><?=$loginInfo["userID"]?><span>님</span></h3>

    <ul>
        <li class="jMain"><a href="/mobile/main.php"><img src="/mobile/image/ic_side_home.png" alt="메인" />메인</a></li>
        <li><a href="/mobile/setting.php"><img src="/mobile/image/ic_side_add.png" alt="모터 추가" />모터 추가</a></li>
        <li><a href="/mobile/setting.php"><img src="/mobile/image/ic_side_setting.png" alt="설정" />설정</a></li>
    </ul>

    <div class="logout jLogout">
        <a>
            <img src="/mobile/image/ic_side_logout.png" alt="로그아웃" />
            로그아웃
        </a>
    </div>

    <a href="#" class="side_exit"><img src="/mobile/image/ic_side_exit.png" alt="닫기" /></a>
</div>