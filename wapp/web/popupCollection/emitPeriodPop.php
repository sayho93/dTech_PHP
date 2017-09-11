<?php
/**
 * Created by PhpStorm.
 * User: sayho
 * Date: 2017-09-11
 * Time: 오전 9:50
 */
?>

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
