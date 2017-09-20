<?php
/**
 * Created by PhpStorm.
 * User: sayho
 * Date: 2017-09-15
 * Time: 오후 2:28
 */
?>

<? include $_SERVER["DOCUMENT_ROOT"] . "/common/classes/WebMain.php" ;?>
<? include $_SERVER["DOCUMENT_ROOT"] . "/web/php/metaData.php" ?>
<?
$object = new WebMain($_REQUEST);

$uuid = $_REQUEST[no];


$graphData = json_decode($object->getSpectrumDataWithParam($uuid))->data;

$dataLV = $graphData->vLV->list;
$dataHV = $graphData->vHV->list;
$dataLA = $graphData->vLA->list;
$dataHA = $graphData->vHA->list;

echo "<script>console.log('".json_encode($graphData)."');</script>";
?>

<!DOCTYPE html>
<html lang="utf-8">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="title" content="DURATECH">
    <title><?=$locMap["web_title"]?></title>
    <script src="/mobile/js/html5shiv.min.js"></script>
</head>

<link rel="stylesheet" type="text/css" href="/mobile/css/common.css">
<link rel="stylesheet" type="text/css" href="/mobile/css/style.css">
<script type="text/javascript" src="/mobile/js/vis.js"></script>
<link href="/mobile/css/vis.min.css" rel="stylesheet" type="text/css"/>


<script>
    $(document).ready(function(){
        <?if(sizeof($graphData) > 0){?>

        var ctLV = document.getElementById('graphLV');
        var ctHV = document.getElementById('graphHV');
        var ctLA = document.getElementById('graphLA');
        var ctHA = document.getElementById('graphHA');

        var itemsLV = [
            <?
            for($i=0; $i < sizeof($dataLV); $i++){
            ?>
            {x: <?=$dataLV[$i]->Hz?>, y: <?=$dataLV[$i]->value?>},
            <?}?>
        ];

        var itemsHV = [
            <?
            for($i=0; $i < sizeof($dataHV); $i++){
            ?>
            {x: <?=$dataHV[$i]->Hz?>, y: <?=$dataHV[$i]->value?>},
            <?}?>
        ];

        var itemsLA = [
            <?
            for($i=0; $i < sizeof($dataLA); $i++){
            ?>
            {x: <?=$dataLA[$i]->Hz?>, y: <?=$dataLA[$i]->value?>},
            <?}?>
        ];

        var itemsHA = [
            <?
            for($i=0; $i < sizeof($dataHA); $i++){
            ?>
            {x: <?=$dataHA[$i]->Hz?>, y: <?=$dataHA[$i]->value?>},
            <?}?>
        ];

        var dataLV = new vis.DataSet(itemsLV);
        var dataHV = new vis.DataSet(itemsHV);
        var dataLA = new vis.DataSet(itemsLA);
        var dataHA = new vis.DataSet(itemsHA);

        var options = {
            drawPoints : false,
            width : '100%',
            height : '100%',
            format : {
                minorLabels: {
                    millisecond:'x',
                    second:     'x',
                    minute:     'x',
                    hour:       'x',
                    weekday:    'x',
                    day:        'x',
                    month:      'x',
                    year:       'x'
                },
                majorLabels: {
                    millisecond:'x',
                    second:     'x',
                    minute:     'x',
                    hour:       'x',
                    weekday:    'x',
                    day:        'x',
                    month:      'x',
                    year:       'x'
                }
            }
        };

        var grLV = new vis.Graph2d(ctLV, dataLV, options);
        var grHV = new vis.Graph2d(ctHV, dataHV, options);
        var grLA = new vis.Graph2d(ctLA, dataLA, options);
        var grHA = new vis.Graph2d(ctHA, dataHA, options);

        <?}?>


        $(".jFlawType").change(function(){
            var type = $(".jFlawType").val();
            $(".graph").hide();
            $("#graph"+type).show();
        })

        $(document).on("click", ".JClose", function(){
            $("#spectrumPop").hide();
        });
    });


</script>


<div class="spectrum_view" id="spectrumPop">
    <div class="view_title">
        <p>Spectrum View</p>
        <a class="exit_btn JClose"><img src="/mobile/image/ic_pop_exit.png" alt="닫기" /></a>
    </div>

    <div class="form_select">
        <select>
            <option>정적편심</option>
        </select>
        <select class="jFlawType">
            <option value="HA">전기/기계적 결함(High-A)</option>
            <option value="HV">전기/기계적 결함(High-V)</option>
            <option value="LA">회전 관련 결함(Low-A)</option>
            <option value="LV">회전 관련 결함(Low-V)</option>
        </select>
    </div>

    <div class="form_chk">
        <input type="checkbox" name="chk" id="chk1" checked/>
        <label for="chk1"><span>전압전류보기</span></label>
        <input type="checkbox" name="chk" id="chk2" />
        <label for="chk2"><span>전력분석보기</span></label>
        <input type="checkbox" name="chk" id="chk3" />
        <label for="chk3"><span>전원고조파</span></label>
        <input type="checkbox" name="chk" id="chk4" />
        <label for="chk4"><span>전압 오버레이</span></label>
        <input type="checkbox" name="chk" id="chk5" />
        <label for="chk5"><span>회전자 결합 표시</span></label>
    </div>

    <div class="graph_area">
        <div class="graph" id="graphHA" style="display: none"></div>
        <div class="graph" id="graphLV"> </div>
        <div class="graph" id="graphHV" style="display: none"></div>
        <div class="graph" id="graphLA" style="display: none"></div>

    </div>

</div>