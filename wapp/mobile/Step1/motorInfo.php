<?php
/**
 * Created by PhpStorm.
 * User: sayho
 * Date: 2017-09-15
 * Time: 오후 1:29
 */
?>

<? include $_SERVER["DOCUMENT_ROOT"] . "/mobile/php/header.php" ;?>
<? include $_SERVER["DOCUMENT_ROOT"] . "/mobile/php/sideMenu.php" ;?>
<?

?>
    <script>
        $(document).ready(function(){
            var ID = "<?=$_REQUEST[mKey]?>";

            $(".jBack").show();
            $(".header").find("h2").html("<?=$_REQUEST[motorName]?>");

            $(function (){
                $(".tab").click(function () {
                    $(".tab").removeClass("on");
                    $(this).addClass("on");
                    var index = parseInt($(this).attr("rel"));
                    swiper.slideTo(index);
                });
            });

            $(".jTrentView").click(function(){

            });

            $(".jSpectrumView").click(function(){
                showPop("/mobile/Step1/spectrumViewPop.php?no="+ID);
            });

            var swiper = new Swiper('.swiper-container', {
                scrollbar: '.swiper-scrollbar', // 스크롤바를 슬라이드 아래 생성함
                direction: 'horizontal', // 슬라이드 진행방향은 수평(vertical하면 수직으로 움직임)
                slidesPerView: 1, // 한번에 보이는 슬라이드 갯수
                spaceBetween: 0, // 슬라이드 사이의 간격 px 단위
                mousewheelControl: true, // 마우스 휠로 슬라이드 움직임
                onSlideChangeStart: function (swiper) {
                    console.log('slide change start - before');
                    console.log(swiper);
                    console.log(swiper.activeIndex);
                    $(".tab").removeClass("on");
                    $("#tab" + swiper.activeIndex).addClass("on");
                },
                onSlideChangeEnd: function (swiper) {
                    console.log('slide change end - after');
                    console.log(swiper);
                    console.log(swiper.activeIndex);
                    //after Event use it for your purpose
                    if (swiper.activeIndex == 1) {
                        //First Slide is active
                        console.log('First slide active')
                    }
                    $(".tab").removeClass("on");
                    $("#tab" + swiper.activeIndex).addClass("on");

                }
            });


        });
    </script>

    <div class="tab_menu">
        <ul class="clearfix">
            <li class="tab on" id="tab0" rel="0"><p>모터 상태</p></li>
            <li class="tab" id="tab1" rel="1"><p>기계 상태</p></li>
            <li class="tab" id="tab2" rel="2"><p>에너지 효율</p></li>
            <li class="tab" id="tab3" rel="3"><p>모터 정보</p></li>
        </ul>
    </div>
    <div class="jPopSection"style="position: fixed; z-index:9999; top: 50%; left:50%; display:none" >

    </div>

    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide" id="tabs-1">
                <ul class="status_list">
                    <li>
                        <p>모터 고정자 결함</p>
                        <span class="bgR">심각</span>
                        <!-- 각 상태별 span에 대한 클래스 설명 >>> 정상상태 : bgG / 관심상태 : bgY / 주의상태 : bgO / 심각상태 : bgR -->
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

            <div class="swiper-slide" id="tabs-2">
                <ul class="status_list">
                    <li>
                        <p>축정렬</p>
                        <span class="bgR">심각</span>
                        <!-- 각 상태별 span에 대한 클래스 설명 >>> 정상상태 : bgG / 관심상태 : bgY / 주의상태 : bgO / 심각상태 : bgR -->
                    </li>
                    <li>
                        <p>소프트풋</p>
                        <span class="bgG">정상</span>
                    </li>
                    <li>
                        <p>X 설비 상태</p>
                        <span class="bgG">정상</span>
                    </li>
                    <li>
                        <p>X 설비 베어링</p>
                        <span class="bgO">주의</span>
                    </li>
                    <li>
                        <p>X2 설비 베어링</p>
                        <span class="bgY">관심</span>
                    </li>
                    <li>
                        <p>X2 설비 베어링</p>
                        <span class="bgG">정상</span>
                    </li>
                </ul>
            </div>

            <div class="swiper-slide" id="tabs-3">
                <table class="tbl table_common energy_tbl">
                    <colgroup>
                        <col width="25%" />
                        <col width="25%" />
                        <col width="25%" />
                        <col width="25%" />
                    </colgroup>

                    <tbody>
                    <tr>
                        <th scope="row">전압(V)</th>
                        <td><span class="ic_r">R</span>372.01</td>
                        <td><span class="ic_s">S</span>352.31</td>
                        <td><span class="ic_t">T</span>310.06</td>
                    </tr>
                    <tr>
                        <th  scope="row">전류(A)</th>
                        <td><span class="ic_r">R</span>372.01</td>
                        <td><span class="ic_s">S</span>352.31</td>
                        <td><span class="ic_t">T</span>310.06</td>
                    </tr>
                    <tr>
                        <th  scope="row">역률</th>
                        <td colspan="3">0.22</td>
                    </tr>
                    <tr>
                        <th  scope="row">유효전력(KW)</th>
                        <td colspan="3">0.22</td>
                    </tr>
                    <tr>
                        <th  scope="row">무효전력(KVAR)</th>
                        <td colspan="3">0.38</td>
                    </tr>
                    <tr>
                        <th  scope="row">피상전력(KVA)</th>
                        <td colspan="3">1.41</td>
                    </tr>
                    <tr>
                        <th  scope="row">전압불균형(%)</th>
                        <td colspan="3">0.22</td>
                    </tr>
                    <tr>
                        <th  scope="row">부하율(%)</th>
                        <td colspan="3">0.22</td>
                    </tr>
                    <tr>
                        <th  scope="row">출력손실(KWh)</th>
                        <td colspan="3">0.22</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="swiper-slide motor_info_content" id="tabs-4">
                <table class="tbl table_common normal_info_tbl">
                    <colgroup>
                        <col width="35%" />
                        <col width="65%" />
                    </colgroup>

                    <tbody>
                    <tr>
                        <th scope="row">설비 명</th>
                        <td>47CH902-CM1M</td>
                    </tr>
                    <tr>
                        <th scope="row">설비 종류</th>
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
                    <tr>
                        <th scope="row">전류 센서</th>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <div class="swiper-scrollbar"></div>
    </div>

    <div class="bottom_btn" style="z-index:9996">
        <input type="button" class="jTrentView" value="Trend View"/>
        <input type="button" class="jSpectrumView" name="" value="Spectrum View"/>
    </div>


<? include $_SERVER["DOCUMENT_ROOT"] . "/mobile/php/footer.php" ;?>