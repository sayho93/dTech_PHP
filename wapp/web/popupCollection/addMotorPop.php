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
    var json = null;
    var totalRow = 0;
    var processedRow = 0;

    function initFileUpload(index){
        $("#btnFileUpload" + index).css("cursor", "pointer").click(function(){
            $("#files" + index).trigger("click");
        });

        $("#files" + index).change(function(){
            var i=0;

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
                            totalRow = data.data.totalRow;
                            processedRow = data.data.processedRow;

                            swal("", processedRow + "개의 데이터를 성공적으로 로드했습니다.", "info");

                            initData(data.data.list);
                        },
                        error : function(req, res, err){
                            alert(req+res+err);
                        }
                    });
                }

                reader.readAsDataURL(this.files[0]);
            }
        });

        $(".jSave").click(function(){
            saveData(0, wrapForm($("#form")));
            console.log(json[0]);
        });
    }

    initFileUpload(100);

    function wrapForm(form){
        var res = [];
        $.each(form.serializeArray(), function() {
            res[this.name] = this.value;
        });

        return res;
    }

    function saveData(index, row){
        var keys = Object.keys(row);
        var indexKeys = Object.keys(json[index]);
        for(var e = 0; e < keys.length; e++){
            var currentValue = row[keys[e]];
            if(indexKeys.includes(keys[e])) json[index][keys[e]] = currentValue;
        }
    }

    function initSelector(selector){
        selector.fadeIn();
        selector.html('');
        for(var e = 0; e < json.length; e++){
            selector.append("<option value='" + e + "'>" + (e + 1) + "</option>");
        }

        selector.change(function(){
            bindData(json[selector.val()]);
        });
    }

    function initData(rawJson){
        json = rawJson;
        console.log(json);

        initSelector($("#motorIndex"));

        if(json.length > 0) bindData(json[0]);
    }

    function bindData(row){
        console.log();
        set(row, Object.keys(row));
    }

    function set(row, aliases){
        for(var e = 0; e < aliases.length; e++) {
            var alias = aliases[e];
            //checkbox일 경우
            if($("[name=" + alias + "]").attr("type") == "radio"){
//                console.log(alias+"::"+row[alias]);
                $("[name=" + alias + "][value=" + row[alias] + "]").prop("checked", true);
            }
            else {
                $("[name=" + alias + "]").val(row[alias]);
            }
        }
    }

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
<form id="form">
<div class="popup_area01 jAddMotorPop">
    <div class="motor_pop">
        <div class="pop_title">
            <h3>
                <img src="/web/image/ic_pop_title_add.png" alt="" />모터 추가
            <select id="motorIndex" style="display: none; width:2vw ;height:100%; box-sizing: border-box; border:1px solid #ccc; font-size:16px; background-image: url(../image/ic_pop_dropdown.png); background-position: 95% 50%;">
                <option value="-1">-</option>
            </select>
            </h3>
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
                        <input type="text" name="uuid" />
                    </li>
                    <li>
                        <p>설비 종류</p>
                        <select name="deviceType">
                            <option value="">선택</option>
                            <option value="유도기">유도기</option>
                            <option value="동기기">동기기</option>
                            <option value="인버터">인버터</option>
                        </select>
                    </li>
                    <li>
                        <p>상수</p>
                        <input type="radio" name="phaseType" id="ra1" value="단상"/>
                        <label for="ra1"><span>단상</span></label>
                        <input type="radio" name="phaseType" id="ra2" value="3상"/>
                        <label for="ra2"><span>3상</span></label>
                    </li>
                    <li>
                        <p>측정 전압 상수</p>
                        <select name="voltagePhase">
                            <option>선택</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </li>
                    <li>
                        <p>측정 전류 상수</p>
                        <input type="radio" name="currencyPhase" id="ra3" value="1"/>
                        <label for="ra3"><span>1</span></label>
                        <input type="radio" name="currencyPhase" id="ra4" value="2"/>
                        <label for="ra4"><span>2</span></label>
                        <input type="radio" name="currencyPhase" id="ra5" value="3"/>
                        <label for="ra5"><span>3</span></label>
                    </li>
                    <li>
                        <p>전류 센서</p>
                        <select name="currencySensor">
                            <option>선택</option>
                            <option vale="5A">5A</option>
                            <option vale="10A">10A</option>
                            <option vale="100A">100A</option>
                            <option vale="200A">200A</option>
                            <option vale="600A">600A</option>
                            <option vale="1000A">1000A</option>
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
                        <td scope="row"><input name="NDEBearing1" /></td>
                        <td><input name="NDEBearing2" /></td>
                        <td><input name="DEBearing1" /></td>
                        <td><input name="DEBearing2" /></td>
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
                        <td scope="row"><input name="shaft1PinionBearing1" /></td>
                        <td><input name="shaft1PinionBearing2" /></td>
                        <td><input name="shaft1GearBearing1" /></td>
                        <td><input name="shaft1GearBearing2" /></td>
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
                        <td scope="row"><input name="shaft2PinionBearing1" /></td>
                        <td><input name="shaft2PinionBearing2" /></td>
                        <td><input name="shaft2GearBearing1" /></td>
                        <td><input name="shaft2GearBearing2" /></td>
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
                        <td scope="row"><input name="shaft3PinionBearing1" /></td>
                        <td><input name="shaft3PinionBearing2" /></td>
                        <td><input name="shaft3GearBearing1" /></td>
                        <td><input name="shaft3GearBearing2" /></td>
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
                        <td scope="row"><input name="shaft4PinionBearing1" /></td>
                        <td><input name="shaft4PinionBearing2" /></td>
                        <td><input name="shaft4GearBearing1" /></td>
                        <td><input name="shaft4GearBearing2" /></td>
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
                        <td scope="row"><input name="shaft5PinionBearing1" /></td>
                        <td><input name="shaft5PinionBearing2" /></td>
                        <td><input name="shaft5GearBearing1" /></td>
                        <td><input name="shaft5GearBearing2" /></td>
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
                    <select name="dataCollectPeriodHour">
                        <option>선택</option>
                        <?for($i=0; $i<24; $i++){?>
                            <option value="<?=$i?>"><?=$i?> 시간</option>
                        <?}?>
                    </select>
                    <select name="dataCollectMinute">
                        <option>선택</option>
                        <?for($i=0; $i<60; $i++){?>
                            <option value="<?=$i?>"><?=$i?> 분</option>
                        <?}?>
                    </select>
                    <select name="dataCollectSecond">
                        <option>선택</option>
                        <?for($i=0; $i<60; $i++){?>
                            <option value="<?=$i?>"><?=$i?> 초</option>
                        <?}?>
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
                        <td scope="row">모터 회전자 결함</td>
                        <td class="color_y"><input name="rotorDefectCaution" /></td>
                        <td class="color_o"><input name="rotorDefectWarn" /></td>
                        <td class="color_r"><input name="rotorDefectCritical" /></td>
                    </tr>
                    <tr>
                        <td scope="row">모터 고정자 결함</td>
                        <td class="color_y"><input name="statorDefectCaution" /></td>
                        <td class="color_o"><input name="statorDefectWarn" /></td>
                        <td class="color_r"><input name="statorDefectCritical" /></td>
                    </tr>
                    <tr>
                        <td scope="row">모터 정적 편심</td>
                        <td class="color_y"><input name="staticPartialDefectCaution" /></td>
                        <td class="color_o"><input name="staticPartialDefectWarn" /></td>
                        <td class="color_r"><input name="staticPartialDefectCritical" /></td>
                    </tr>
                    <tr>
                        <td scope="row">모터 동적 편심</td>
                        <td class="color_y"><input name="dynamicParialDefectCaution" /></td>
                        <td class="color_o"><input name="dynamicParialDefectWarn" /></td>
                        <td class="color_r"><input name="dynamicParialDefectCritical" /></td>
                    </tr>
                    <tr>
                        <td scope="row">축정렬 상태</td>
                        <td><input name="axialMisalignmentDefectCaution" /></td>
                        <td><input name="axialMisalignmentDefectWarn" /></td>
                        <td><input name="axialMisalignmentDefectCritical" /></td>
                    </tr>
                    <tr>
                        <td scope="row">소프트풋 상태</td>
                        <td><input name="softFootDefectCaution" /></td>
                        <td><input name="softFootDefectWarn" /></td>
                        <td><input name="softFootDefectCritical" /></td>
                    </tr>
                    <tr>
                        <td scope="row">기계적 불균형</td>
                        <td><input name="mechanicDisorderCaution" /></td>
                        <td><input name="mechanicDisorderWarn" /></td>
                        <td><input name="mechanicDisorderCritical" /></td>
                    </tr>
                    <tr>
                        <td scope="row">부하 설비(1, 2)</td>
                        <td><input name="loadFacilityDefectCaution" /></td>
                        <td><input name="loadFacilityDefectWarn" /></td>
                        <td><input name="loadFacilityDefectCritical" /></td>
                    </tr>
                    <tr>
                        <td scope="row">모터 반부하측 베어링</td>
                        <td><input name="halfLoadMotorBearingCaution" /></td>
                        <td><input name="halfLoadMotorBearingWarn" /></td>
                        <td><input name="halfLoadMotorBearingCritical" /></td>
                    </tr>
                    <tr>
                        <td scope="row">모터 부하측 베어링</td>
                        <td><input name="fullLoadMotorBearingCaution" /></td>
                        <td><input name="fullLoadMotorBearingWarn" /></td>
                        <td><input name="fullLoadMotorBearingCritical" /></td>
                    </tr>
                    <tr>
                        <td scope="row">부하 설비 베어링</td>
                        <td><input name="loadFacilityBearingCaution" /></td>
                        <td><input name="loadFacilityBearingWarn" /></td>
                        <td><input name="loadFacilityBearingCritical" /></td>
                    </tr>
                    <tr>
                        <td scope="row">베어링 레벨</td>
                        <td colspan="3"><input name="bearingLevel" style="width:94%"/></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
</form>
        <div class="pop_footer clearfix">
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
                <input type="button" class="jSave" name="" value="적용" />
            </div>
        </div>
    </div>
</div>

