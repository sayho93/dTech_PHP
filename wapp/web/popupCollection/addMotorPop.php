<?php
/**
 * Created by PhpStorm.
 * User: sayho
 * Date: 2017-09-12
 * Time: 오전 11:02
 */
?>
<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
<!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
<!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
<!--<script src="/inc/fileUpload/fileUploadJS.js"></script>-->

<script>
    function initFileUpload(index){
        $("#btnFileUpload" + index).css("cursor", "pointer").click(function(){
            $("#files" + index).trigger("click");
        });

        $("#files" + index).change(function(){
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    // previewFileBind(index, "object", e.target.result, "");
                    $("#fileArea").ajaxSubmit({
                        url: "/action_front.php?cmd=WebMain.uploadFile",
                        async : true,
                        cache : false,
                        dataType : "json",
                        data:{
                            level : 0
                        },
                        beforeSend : function(){
                        },
                        success : function(data){
                            var dataNodes = data.data.nodes;
                            drawMap(dataNodes);
                        },
                        error : function(req, res, err){
                            alert(req+res+err);
                        }
                    });
                }

                reader.readAsDataURL(this.files[0]);
            }
        });
    }

    initFileUpload(100);

    //tabView event
    $(function (){
        $(".tabContent").hide();
        $(".tabContent:first").show();

        $("ul.tabs li").click(function () {
            $(".tabList").removeClass("on");
            $(this).addClass("on");
            $(".tabContent").hide()
            var activeTab = $(this).attr("rel");
            $("#" + activeTab).fadeIn();
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
                        <p>공장 선택</p>
                        <select name="f_plant">
                            <option>선택</option>
                        </select>
                    </li>
                    <li>
                        <p>그룹 선택</p>
                        <select name="f_group">
                            <option>선택</option>
                        </select>
                    </li>
                    <li>
                        <p>설비명</p>
                        <input type="text" name="deviceName" />
                    </li>
                    <li>
                        <p>UUID</p>
                        <input type="text" name="UUID" />
                    </li>
                    <li>
                        <p>설비 종류</p>
                        <select name="deviceType">
                            <option>선택</option>
                        </select>
                    </li>
                    <li>
                        <p>상수</p>
                        <input type="radio" name="phaseType" id="ra1" />
                        <label for="ra1"><span>단상</span></label>
                        <input type="radio" name="phaseType" id="ra2" />
                        <label for="ra2"><span>3상</span></label>
                    </li>
                    <li>
                        <p>측정 전압 상수</p>
                        <select name="voltagePhase">
                            <option>선택</option>
                        </select>
                    </li>
                    <li>
                        <p>측정 전류 상수</p>
                        <input type="radio" name="currencyPhase" id="ra3" />
                        <label for="ra3"><span>1</span></label>
                        <input type="radio" name="currencyPhase" id="ra4" />
                        <label for="ra4"><span>2</span></label>
                        <input type="radio" name="currencyPhase" id="ra5" />
                        <label for="ra5"><span>3</span></label>
                    </li>
                    <li>
                        <p>전류 센서</p>
                        <select name="currencySensor">
                            <option>선택</option>
                        </select>
                    </li>
                </ul>
            </div>

            <div class="tab02 clearfix tabContent" id="tabs-2">
                <ul class="left_area f_l">
                    <li>
                        <p>정격출력(KW)</p>
                        <input type="text" name="ratedOutput" />
                    </li>
                    <li>
                        <p>정격속도(RPM)</p>
                        <input type="text" name="ratedSpeed" />
                    </li>
                    <li>
                        <p>전압(V)</p>
                        <input type="text" name="voatageValue" />
                    </li>
                    <li>
                        <p>전류(A)</p>
                        <input type="text" name="currencyValue" />
                    </li>
                    <li>
                        <p>극수</p>
                        <input type="text" name="noOfPole" />
                    </li>
                    <li>
                        <p>회전자 봉</p>
                        <input type="text" name="rotorBar" />
                    </li>
                </ul>
                <ul class="right_area f_l">
                    <li>
                        <p>고정자 슬롯</p>
                        <input type="text" name="statorSlot" />
                    </li>
                    <li>
                        <p>역률</p>
                        <input type="text" name="powerFactor" />
                    </li>
                    <li>
                        <p>효율</p>
                        <input type="text" name="efficiency" />
                    </li>
                    <li>
                        <p>변압비</p>
                        <input type="text" name="tranformationRatio" />
                    </li>
                    <li>
                        <p>변류비</p>
                        <input type="text" name="currentTransformerRatio" />
                    </li>
                </ul>
            </div>

            <div class="tab03 tabContent" id="tabs-3">
                <table class="tbl" style="text-align: center">
                    <colgroup>
                        <col width="25%" />
                        <col width="18.75%" />
                        <col width="18.75%" />
                        <col width="18.75%" />
                        <col width="18.75%" />
                    </colgroup>
                    <!--                    row1-->
                    <tr>
                        <td rowspan="2">모터 베어링</td>
                        <th scope="row">N_DE 베어링1</th>
                        <th>N_DE 베어링2</th>
                        <th>DE 베어링1</th>
                        <th>DE 베어링2</th>
                    </tr>
                    <tr>
                        <td scope="row"><input name="" /></td>
                        <td><input name="" /></td>
                        <td><input name="" /></td>
                        <td><input name="" /></td>
                    </tr>

                    <!--                    row2-->
                    <tr>
                        <td rowspan="2">1 shaft</td>
                        <th scope="row">1 shaft Pinion 베어링1</th>
                        <th>1 shaft Pinion 베어링2</th>
                        <th>1 shaft Gear 베어링1</th>
                        <th>1 shaft Gear 베어링2</th>
                    </tr>
                    <tr>
                        <td scope="row"><input name="" /></td>
                        <td><input name="" /></td>
                        <td><input name="" /></td>
                        <td><input name="" /></td>
                    </tr>

                    <!--                    row3-->
                    <tr>
                        <td rowspan="2">2 shaft</td>
                        <th scope="row">2 shaft Pinion 베어링1</th>
                        <th>2 shaft Pinion 베어링2</th>
                        <th>2 shaft Gear 베어링1</th>
                        <th>2 shaft Gear 베어링2</th>
                    </tr>
                    <tr>
                        <td scope="row"><input name="" /></td>
                        <td><input name="" /></td>
                        <td><input name="" /></td>
                        <td><input name="" /></td>
                    </tr>

                    <!--                    row4-->
                    <tr>
                        <td rowspan="2">3 shaft</td>
                        <th scope="row">3 shaft Pinion 베어링1</th>
                        <th>3 shaft Pinion 베어링2</th>
                        <th>3 shaft Gear 베어링1</th>
                        <th>3 shaft Gear 베어링2</th>
                    </tr>
                    <tr>
                        <td scope="row"><input name="" /></td>
                        <td><input name="" /></td>
                        <td><input name="" /></td>
                        <td><input name="" /></td>
                    </tr>

                    <!--                    row5-->
                    <tr>
                        <td rowspan="2">4 shaft</td>
                        <th scope="row">4 shaft Pinion 베어링1</th>
                        <th>4 shaft Pinion 베어링2</th>
                        <th>4 shaft Gear 베어링1</th>
                        <th>4 shaft Gear 베어링2</th>
                    </tr>
                    <tr>
                        <td scope="row"><input name="" /></td>
                        <td><input name="" /></td>
                        <td><input name="" /></td>
                        <td><input name="" /></td>
                    </tr>

                    <!--                    row6-->
                    <tr>
                        <td rowspan="2">5 shaft</td>
                        <th scope="row">5 shaft Pinion 베어링1</th>
                        <th>5 shaft Pinion 베어링2</th>
                        <th>5 shaft Gear 베어링1</th>
                        <th>5 shaft Gear 베어링2</th>
                    </tr>
                    <tr>
                        <td scope="row"><input name="" /></td>
                        <td><input name="" /></td>
                        <td><input name="" /></td>
                        <td><input name="" /></td>
                    </tr>
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
<!--            <input type="button" style="margin-top:15px;" name="" value="파일 불러오기" />-->
            <form id="fileArea">
                <?
                    $fileIndex = "100";
                    $fileName = "filePathMotorInfo";
                    $filePath = ($info ["filePathMotorInfo"] == "" ? "" : $info ["filePathMotorInfo"]);
                    include $_SERVER ["DOCUMENT_ROOT"] . "/inc/fileUpload/fileUpload.php";
                ?>
                <input type="hidden" name="filePathMotorInfo" value="<?=$info["filePathMotorInfo"]?>" />
            </form>

            <div class="f_r">
                <input type="button" class="JClose" target="jAddMotorPop" value="취소" />
                <input type="button" name="" value="확인" />
                <input type="button" name="" value="적용" />
            </div>
        </div>
    </div>
</div>

