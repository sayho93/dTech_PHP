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
    $graphData = json_decode($object->getSpectrumDataWithParam(1, "", "", 5, 100))->data;

    for($i=0; $i < sizeof($graphData); $i++){

    }



?>

<script type="text/javascript">
    var ctLV = document.getElementById('graphLV');
    var ctHV = document.getElementById('graphHV');
    var ctLA = document.getElementById('graphLA');
    var ctHA = document.getElementById('graphHA');

    var itemsLV = [
        <?
        for($i=0; $i < sizeof($graphData); $i++){
            ?>
        {x: <?=$graphData[$i]->regDate?>, y: <?=$graphData[$i]->vLV?>, group:0},
        <?}?>
    ];

    var itemsHV = [
        <?
        for($i=0; $i < sizeof($graphData); $i++){
        ?>
        {x: <?=$graphData[$i]->regDate?>, y: <?=$graphData[$i]->vHV?>, group:1},
        <?}?>
    ];

    var itemsLA = [
        <?
        for($i=0; $i < sizeof($graphData); $i++){
        ?>
        {x: <?=$graphData[$i]->regDate?>, y: <?=$graphData[$i]->vLA?>, group:2},
        <?}?>
    ];

    var itemsHA = [
        <?
        for($i=0; $i < sizeof($graphData); $i++){
        ?>
        {x: <?=$graphData[$i]->regDate?>, y: <?=$graphData[$i]->vHA?>, group:3},
        <?}?>
    ];

    var dataLV = new vis.DataSet(itemsLV);
    var dataHV = new vis.DataSet(itemsHV);
    var dataLA = new vis.DataSet(itemsLA);
    var dataHA = new vis.DataSet(itemsHA);

    var optionsLV = {
        start: <?=$graphData[0]->regDate?>,
        end: new Date().getTime(),
        width : '100%',
        height : '100%'
    };

    var optionsHV = {
        start: <?=$graphData[0]->regDate?>,
        end: new Date().getTime(),
        width : '100%',
        height : '100%'
    };

    var optionsLA = {
        start: <?=$graphData[0]->regDate?>,
        end: new Date().getTime(),
        width : '100%',
        height : '100%'
    };

    var optionsHA = {
        start: <?=$graphData[0]->regDate?>,
        min: <?=$graphData[0]->regDate?>,
        end: new Date().getTime(),
        width : '100%',
        height : '100%'
    };

    var grLV = new vis.Graph2d(ctLV, dataLV, optionsLV);
    var grHV = new vis.Graph2d(ctHV, dataHV, optionsHV);
    var grLA = new vis.Graph2d(ctLA, dataLA, optionsLA);
    var grHA = new vis.Graph2d(ctHA, dataHA, optionsHA);
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
            <li><div id="graphLV"></div></li>
            <li><div id="graphHV"></div></li>
            <li><div id="graphLA"></div></li>
            <li><div id="graphHA"></div></li>
        </ul>
    </div>
</div>