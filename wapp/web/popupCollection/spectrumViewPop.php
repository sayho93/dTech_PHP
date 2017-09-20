<? include $_SERVER["DOCUMENT_ROOT"] . "/common/classes/WebMain.php" ;?>
<?
/**
 * Created by PhpStorm.
 * User: sayho
 * Date: 2017-09-14
 * Time: 오전 10:27
 */
?>
<?
    $object = new WebMain($_REQUEST);
    //TODO getSpectrumData UUID로 변경
    $graphData = json_decode($object->getSpectrumDataWithParam(1, "", "", 5, 700))->data;

    echo "<script>console.log('".json_encode($graphData)."');</script>";

?>

<script type="text/javascript">
    $(document).ready(function(e){

        <?if(sizeof($graphData) > 0){?>

        var ctLV = document.getElementById('graphLV');
        var ctHV = document.getElementById('graphHV');
        var ctLA = document.getElementById('graphLA');
        var ctHA = document.getElementById('graphHA');

        var itemsLV = [
            <?
            for($i=0; $i < sizeof($graphData); $i++){
            ?>
            {x: <?=$graphData[$i]->regDate?>, y: <?=$graphData[$i]->vLV?>},
            <?}?>
        ];

        var itemsHV = [
            <?
            for($i=0; $i < sizeof($graphData); $i++){
            ?>
            {x: <?=$graphData[$i]->regDate?>, y: <?=$graphData[$i]->vHV?>},
            <?}?>
        ];

        var itemsLA = [
            <?
            for($i=0; $i < sizeof($graphData); $i++){
            ?>
            {x: <?=$graphData[$i]->regDate?>, y: <?=$graphData[$i]->vLA?>},
            <?}?>
        ];

        var itemsHA = [
            <?
            for($i=0; $i < sizeof($graphData); $i++){
            ?>
            {x: <?=$graphData[$i]->regDate?>, y: <?=$graphData[$i]->vHA?>},
            <?}?>
        ];

        var dataLV = new vis.DataSet(itemsLV);
        var dataHV = new vis.DataSet(itemsHV);
        var dataLA = new vis.DataSet(itemsLA);
        var dataHA = new vis.DataSet(itemsHA);

        var optionsLV = {
            drawPoints : false,
            width : '100%',
            height : '90%',
            title : "asd"
        };

        var optionsHV = {
            drawPoints : false,
            width : '100%',
            height : '90%'
        };

        var optionsLA = {
            drawPoints : false,
            width : '100%',
            height : '90%'
        };

        var optionsHA = {

            drawPoints : false,
            width : '100%',
            height : '90%'
        };

        var grLV = new vis.Graph2d(ctLV, dataLV, optionsLV);
        var grHV = new vis.Graph2d(ctHV, dataHV, optionsHV);
        var grLA = new vis.Graph2d(ctLA, dataLA, optionsLA);
        var grHA = new vis.Graph2d(ctHA, dataHA, optionsHA);

        <?}?>
    });

</script>

<div class="spectrum_pop jSpectrumPop">
    <div class="pop_title">
        <h4><span class="bgLG"></span>Spectrum View</h4>

        <a href="#" class="full"><img src="image/ic_pop_full.png" alt="전체화면" /></a>
        <a class="exit JClose" target="jSpectrumPop"><img src="image/ic_pop_title_exit.png" alt="닫기" /></a>
    </div>

    <div class="pop_graph_select pop_content clearfix">
        <select>
            <option>정적편심</option>
        </select>

        <div class="chk_form f_r">
            <input type="checkbox" name="chk" id="chk7" />
            <label for="chk7"><span>전압전류보기</span></label>
            <input type="checkbox" name="chk" id="chk8" />
            <label for="chk8"><span>전류분석보기</span></label>
            <input type="checkbox" name="chk" id="chk9" />
            <label for="chk9"><span>전원고조파</span></label>
            <input type="checkbox" name="chk" id="chk10" />
            <label for="chk10"><span>전압 오버레이</span></label>
            <input type="checkbox" name="chk" id="chk11" />
            <label for="chk11"><span>회전자 결합 표시</span></label>
        </div>
    </div>

    <div class="pop_graph_view">
        <ul class="clearfix">
            <li>
                <h2 style="color:#ffffff; text-align: center">회전 관련 결함(Low-V)</h2>
                <div id="graphLV"></div>
            </li>
            <li>
                <h2 style="color:#ffffff; text-align: center">전기/기계적 결함(High-V)</h2>
                <div id="graphHV"></div>
            </li>
            <li>
                <h2 style="color:#ffffff; text-align: center">회전 관련 결함(Low-A)</h2>
                <div id="graphLA"></div>
            </li>
            <li>
                <h2 style="color:#ffffff; text-align: center">전기/기계적 결함(High-A)</h2>
                <div id="graphHA"></div>
            </li>
        </ul>
    </div>
</div>