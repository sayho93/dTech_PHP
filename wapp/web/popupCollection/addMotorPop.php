<?php
/**
 * Created by PhpStorm.
 * User: sayho
 * Date: 2017-09-12
 * Time: 오전 11:02
 */
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    $(function (){
        $(".tabContent").hide();
        $(".tabContent:first").show();

        $("ul.tabs li").click(function () {
            $(".tabList").removeClass("on");
            $(this).addClass("on");
            $(".tabContent").hide()
            var activeTab = $(this).attr("rel");
            $("#" + activeTab).fadeIn()
        });
    });
</script>

<div class="popup_area01 jAddMotorPop">
    <div class="motor_pop">
        <div class="pop_title">
            <h3><img src="/web/image/ic_pop_title_add.png" alt="" />모터 추가</h3>

            <a><img src="/web/image/ic_pop_title_exit.png" class="JClose" target="jAddMotorPop" alt="닫기" /></a>
        </div>

        <ul class="pop_tab clearfix tabs">
            <li class="on tabList" rel="tabs-1"><a href="#tabs-1">기존 정보</a></li>
            <li class="tabList" rel="tabs-2"><a href="#tabs-2">명판 정보</a></li>
            <li class="tabList" rel="tabs-3"><a href="#tabs-3">베어링 정보</a></li>
            <li class="tabList" rel="tabs-4"><a href="#tabs-4">구동장치</a></li>
            <li class="tabList" rel="tabs-5"><a href="#tabs-5">데이터 수집 시간</a></li>
            <li class="tabList" rel="tabs-6"><a href="#tabs-6">알람 기준값</a></li>
        </ul>

        <div class="pop_content">
            <div class="tabContent" id="tabs-1">
                <ul>
                    <li>
                        <p>그룹 선택</p>
                        <select>
                            <option>선택</option>
                        </select>
                    </li>
                    <li>
                        <p>설비명</p>
                        <input type="text" name="" />
                    </li>
                    <li>
                        <p>설치장소</p>
                        <input type="text" name="" />
                    </li>
                    <li>
                        <p>전기실명</p>
                        <input type="text" name="" />
                    </li>
                    <li>
                        <p>설비 종류</p>
                        <select>
                            <option>선택</option>
                        </select>
                    </li>
                    <li>
                        <p>상수</p>
                        <input type="radio" name="radio" id="ra1" />
                        <label for="ra1"><span>단상</span></label>
                        <input type="radio" name="radio" id="ra2" />
                        <label for="ra2"><span>3상</span></label>
                    </li>
                    <li>
                        <p>측정 전압 상수</p>
                        <select>
                            <option>선택</option>
                        </select>
                    </li>
                    <li>
                        <p>상수</p>
                        <input type="radio" name="radio" id="ra3" />
                        <label for="ra3"><span>1</span></label>
                        <input type="radio" name="radio" id="ra4" />
                        <label for="ra4"><span>2</span></label>
                        <input type="radio" name="radio" id="ra5" />
                        <label for="ra5"><span>3</span></label>
                    </li>
                    <li>
                        <p>전류 센서</p>
                        <select>
                            <option>선택</option>
                        </select>
                    </li>
                </ul>
            </div>

            <div class="tab02 clearfix tabContent" id="tabs-2">
                <ul class="left_area f_l">
                    <li>
                        <p>전기실명</p>
                        <input type="text" name="" />
                    </li>
                    <li>
                        <p>정격속도</p>
                        <input type="text" name="" />
                    </li>
                    <li>
                        <p>전압</p>
                        <input type="text" name="" />
                    </li>
                    <li>
                        <p>정격전류</p>
                        <input type="text" name="" />
                    </li>
                    <li>
                        <p>토오크</p>
                        <input type="text" name="" />
                    </li>
                    <li>
                        <p>회전자 봉</p>
                        <input type="text" name="" />
                    </li>
                </ul>
                <ul class="right_area f_l">
                    <li>
                        <p>고정자 슬롯</p>
                        <input type="text" name="" />
                    </li>
                    <li>
                        <p>극수</p>
                        <input type="text" name="" />
                    </li>
                    <li>
                        <p>변류비</p>
                        <input type="text" name="" />
                    </li>
                    <li>
                        <p>변암비</p>
                        <input type="text" name="" />
                    </li>
                    <li>
                        <p>효율</p>
                        <input type="text" name="" />
                    </li>
                    <li>
                        <p>역률</p>
                        <input type="text" name="" />
                    </li>
                </ul>
            </div>

            <div class="tab03 tabContent" id="tabs-3">
                <table class="tbl">
                    <colgroup>
                        <col width="25%" />
                        <col width="18.75%" />
                        <col width="18.75%" />
                        <col width="18.75%" />
                        <col width="18.75%" />
                    </colgroup>

                    <thead>
                    <tr>
                        <th scope="col">위치</th>
                        <th scope="col">베어링</th>
                        <th scope="col">내륜</th>
                        <th scope="col">외륜</th>
                        <th scope="col">BS</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td scope="row">A</td>
                        <td>1111</td>
                        <td>1.1</td>
                        <td>1.2</td>
                        <td>1.3</td>
                    </tr>
                    <tr>
                        <td scope="row">B</td>
                        <td>1111</td>
                        <td>1.1</td>
                        <td>1.2</td>
                        <td>1.3</td>
                    </tr>
                    <tr>
                        <td scope="row">C</td>
                        <td>1111</td>
                        <td>1.1</td>
                        <td>1.2</td>
                        <td>1.3</td>
                    </tr>
                    <tr>
                        <td scope="row">D</td>
                        <td>1111</td>
                        <td>1.1</td>
                        <td>1.2</td>
                        <td>1.3</td>
                    </tr>
                    </tbody>
                </table>
                <div class="tab03_btn">
                    <input type="button" name="" value="검색" />
                    <input type="button" name="" value="삭제" />
                </div>
            </div>

            <ul class="tab04 clearfix tabContent" id="tabs-4">
                <li class="type1">
                    <p class="title">구동장치-1</p>
                    <select>
                        <option>기어박스</option>
                    </select>
                    <div class="form">
                        <span class="name">기어 단수</span>
                        <input type="radio" name="radio" id="ra6" />
                        <label for="ra6"><span>1</span></label>
                        <input type="radio" name="radio" id="ra7" />
                        <label for="ra7"><span>2</span></label>
                        <input type="radio" name="radio" id="ra8" />
                        <label for="ra8"><span>3</span></label>
                        <input type="radio" name="radio" id="ra9" />
                        <label for="ra9"><span>4</span></label>
                    </div>
                    <table class="tbl">
                        <colgroup>
                            <col width="60%" />
                            <col width="40%" />
                        </colgroup>
                        <tbody>
                        <tr>
                            <th>1shaft 기어 잇수-1</th>
                            <td>0</td>
                        </tr>
                        <tr>
                            <th>1shaft 기어 잇수-2</th>
                            <td>0</td>
                        </tr>
                        </tbody>
                    </table>
                </li>
                <li class="type2 tabContent">
                    <p class="title">구동장치-2</p>
                    <select>
                        <option>폴리-벨트</option>
                    </select>
                    <table class="tbl">
                        <colgroup>
                            <col width="60%" />
                            <col width="40%" />
                        </colgroup>
                        <tbody>
                        <tr>
                            <th>구동폴리직경</th>
                            <td>0</td>
                        </tr>
                        <tr>
                            <th>중심거리</th>
                            <td>0</td>
                        </tr>
                        <tr>
                            <th>종동폴리직경</th>
                            <td>0</td>
                        </tr>
                        </tbody>
                    </table>
                    <span class="caption">(단위 : mm)</span>
                </li>
            </ul>

            <ul class="tab05 tabContent" id="tabs-5">
                <li>
                    <p>데이터 수집 시간</p>
                    <select>
                        <option>00 시간</option>
                    </select>
                    <select>
                        <option>00 분</option>
                    </select>
                    <select>
                        <option>00 초</option>
                    </select>
                </li>
                <li class="description">
                    <span>※ 데이터가 새로고침 되는 주기</span>
                </li>
            </ul>

            <div class="tab06 tabContent" id="tabs-6">
                <table class="tbl">
                    <colgroup>
                        <col width="31%" />
                        <col width="23%" />
                        <col width="23%" />
                        <col width="23%" />
                    </colgroup>

                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">관심(노랑)</th>
                        <th scope="col">주의(주황)</th>
                        <th scope="col">심각(빨강)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td scope="row">모터 고정자 결합</td>
                        <td class="color_y">20</td>
                        <td class="color_o">10</td>
                        <td class="color_r">6</td>
                    </tr>
                    <tr>
                        <td scope="row">모터 정적 편심</td>
                        <td class="color_y">20</td>
                        <td class="color_o">10</td>
                        <td class="color_r">6</td>
                    </tr>
                    <tr>
                        <td scope="row">모터 동적 편심</td>
                        <td class="color_y">20</td>
                        <td class="color_o">10</td>
                        <td class="color_r">6</td>
                    </tr>
                    <tr>
                        <td scope="row">모터 회전자</td>
                        <td class="color_y">20</td>
                        <td class="color_o">10</td>
                        <td class="color_r">6</td>
                    </tr>
                    <tr>
                        <td scope="row">모터 부하측 베어링</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td scope="row">모터 반부하측 베어링</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td scope="row">축정렬</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td scope="row">소트프풋</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- TAB알람 기준값 END -->
        </div>

        <div class="pop_footer clearfix">
            <input type="button" name="" value="파일 불러오기" />

            <div class="f_r">
                <input type="button" class="JClose" target="jAddMotorPop" value="취소" />
                <input type="button" name="" value="확인" />
                <input type="button" name="" value="적용" />
            </div>
        </div>
    </div>
</div>

