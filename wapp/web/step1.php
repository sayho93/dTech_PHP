<?php
/**
 * Created by PhpStorm.
 * User: p
 * Date: 2017-09-12
 * Time: 오후 4:44
 */
?>
<? include $_SERVER["DOCUMENT_ROOT"] . "/web/php/header.php" ;?>
<? include $_SERVER["DOCUMENT_ROOT"] . "/common/classes/WebUser.php" ;?>
<? include $_SERVER["DOCUMENT_ROOT"] . "/web/php/sideMenu.php" ;?>


<div class="jPopSection" style="position: absolute; z-index:999; top: 12vh; left:10vh">

</div>

<div class="content_step clearfix">
    <div class="step_view">
        <div class="view_title">
            <h4><span class="bgP"></span>모터상태</h4>

            <a href="#" class="full"><img src="image/ic_pop_full.png" alt="전체화면" /></a>
        </div>
        <div class="view_con">
            <div>
                <ul>
                    <li>
                        <p>모터 고정자 결함</p>
                        <span class="bgR">심각</span>
                    </li>
                    <li>
                        <p>모터 정적 편심</p>
                        <span class="bgG">정상</span>
                    </li>
                    <li>
                        <p>모터 동적 편심</p>
                        <span class="bgG">정상</span>
                    </li>
                    <li>
                        <p>모터 회전자</p>
                        <span class="bgO">주의</span>
                    </li>
                    <li>
                        <p>모터 부하측 베어링</p>
                        <span class="bgY">관심</span>
                    </li>
                    <li>
                        <p>모터 반부하측 베어링</p>
                        <span class="bgG">정상</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="step_view">
        <div class="view_title">
            <h4><span class="bgM"></span>에너지 효율</h4>

            <a href="#" class="full"><img src="image/ic_pop_full.png" alt="전체화면" /></a>
        </div>
        <div class="view_con02">
            <div>
                <table class="tbl">
                    <colgroup>
                        <col width="25%">
                        <col width="8%">
                        <col width="17%">
                        <col width="8%">
                        <col width="17%">
                        <col width="8%">
                        <col width="17%">
                    </colgroup>

                    <tbody>
                    <tr>
                        <th scope="row">전압(V)</th>
                        <th class="align_C paddingN">R</th>
                        <td>372.01</td>
                        <th class="align_C paddingN">R</th>
                        <td>372.20</td>
                        <th class="align_C paddingN">R</th>
                        <td>371.16</td>
                    </tr>
                    <tr>
                        <th scope="row">전류(A)</th>
                        <th class="align_C paddingN">R</th>
                        <td>0.60</td>
                        <th class="align_C paddingN">R</th>
                        <td>0.62</td>
                        <th class="align_C paddingN">R</th>
                        <td>0.60</td>
                    </tr>
                    <tr>
                        <th scope="row">역률</th>
                        <td colspan="6">0.22</td>
                    </tr>
                    <tr>
                        <th scope="row">유효전력(KW)</th>
                        <td colspan="6">0.08</td>
                    </tr>
                    <tr>
                        <th scope="row">무효전력(KVAR)</th>
                        <td colspan="6">0.38</td>
                    </tr>
                    <tr>
                        <th scope="row">피상전력(KVA)</th>
                        <td colspan="6">0.39</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="step_view">
        <div class="view_title">
            <h4><span class="bgLG"></span>기계 상태</h4>

            <a href="#" class="full"><img src="image/ic_pop_full.png" alt="전체화면" /></a>
        </div>
        <div class="view_con view_con03">
            <div>
                <ul class="clearfix">
                    <li>
                        <p>축정렬</p>
                        <span class="bgR">심각</span>
                    </li>
                    <li class="bgDG">
                        <p>소프트풋</p>
                        <span class="bgG">정상</span>
                    </li>
                    <li class="bgDG">
                        <p>X 설비 상태</p>
                        <span class="bgG">정상</span>
                    </li>
                    <li>
                        <p>X설비 베어링</p>
                        <span class="bgO">주의</span>
                    </li>
                    <li>
                        <p>X2 설비 상태</p>
                        <span class="bgY">관심</span>
                    </li>
                    <li class="bgDG">
                        <p>X2 설비 베어링</p>
                        <span class="bgG">정상</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="step_view">
        <div class="view_title">
            <h4><span class="bgLY"></span>모터 정보</h4>

            <a href="#" class="full"><img src="image/ic_pop_full.png" alt="전체화면" /></a>
        </div>
        <div class="tab">
            <ul class="clearfix">
                <li class="on"><a href="#">기본 정보</a></li>
                <li><a href="#">명판 정보</a></li>
                <li><a href="#">베어링 정보</a></li>
                <li><a href="#">구동장치</a></li>
                <li><a href="#">기타</a></li>
            </ul>
        </div>
        <div class="view_con02 view_con04">
            <div>
                <table class="tbl">
                    <colgroup>
                        <col width="25%">
                        <col width="75%">
                    </colgroup>

                    <tbody>
                    <tr>
                        <th scope="row">설비명</th>
                        <td>47CH902-CM1M</td>
                    </tr>
                    <tr>
                        <th scope="row">설비 종료</th>
                        <td>유도기</td>
                    </tr>
                    <tr>
                        <th scope="row">상수</th>
                        <td>단상</td>
                    </tr>
                    <tr>
                        <th scope="row">측정 전압 상수</th>
                        <td>1</td>
                    </tr>
                    <tr>
                        <th scope="row">측정 전류 상수</th>
                        <td>2</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>
