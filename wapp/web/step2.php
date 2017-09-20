<?php
/**
 * Created by PhpStorm.
 * User: sayho
 * Date: 2017-09-20
 * Time: 오전 10:45
 */
?>

<? include $_SERVER["DOCUMENT_ROOT"] . "/web/php/header.php" ;?>
<? include $_SERVER["DOCUMENT_ROOT"] . "/common/classes/WebUser.php" ;?>
<? include $_SERVER["DOCUMENT_ROOT"] . "/web/php/sideMenu.php" ;?>

<?


?>

<script>
    $(document).ready(function(){
        var ctTrend = document.getElementById('trendGraph');

        //1, 2, 3, 4
        var itemsTrend = [
            {x: '2017-09-15 00:00:00', y: 1, group:1, yOffset:'주의'},
            {x: '2017-09-16 00:00:00', y: 2, group:2, yOffset:'관심'},
            {x: '2017-09-17 00:00:00', y: 1, group:1, yOffset:'주의'},
            {x: '2017-09-18 00:00:00', y: 1, group:1, yOffset:'주의'},
            {x: '2017-09-19 00:00:00', y: 0, group:0, yOffset:'심각'},
            {x: '2017-09-20 00:00:00', y: 3, group:3, yOffset:'정상'}
        ];

        var dataTrend = new vis.DataSet(itemsTrend);

        var options = {
            width : '100%',
            height : '90%',
            start : '2017-09-11 00:00:00',
            end : '2017-09-27 00:00:00',
            sort : false,
            sampling : false,
            showMajorLabels : true,
            timeAxis: {scale: 'day', step: 1},
            dataAxis: {
                visible: false,
                left: {
                    range: {
                        min: -0.5,
                        max: 3.5
                    }
                },
                step : 1
            },
            drawPoints: {
                size: 16,
                style: "circle"
            },
            style : "point"
        };

        var grTrend = new vis.Graph2d(ctTrend, dataTrend, options);

//        grTrend.on( 'click', function(event) {
//            var props = grTrend.getEventProperties(event)
//            console.log(props);
//
//        });
        //trendGraph
        document.getElementById('trendGraph').onclick = function (event) {
            var props = grTrend.getEventProperties(event)
            console.log(props);

            $.ajax({
                url: "/action_front.php?cmd=WebMain.getSingleSpectrumData",
                async : true,
                cache : false,
                dataType : "json",
                data:{
                    uuid : '<?=$_REQUEST[mKey]?>'
                },
                success : function(data){
                    var dataNodes = data.data.vHA.list;
                    console.log(dataNodes);
                    drawSpectrum(dataNodes);
                },
                error : function(req, res, err){
                    alert(req+res+err);
                }
            });

        }

        var ctArea = document.getElementById('spectrumGraph');
        var items = [];
        var data;
        var grSpectrum;

        var optionsSpectrum = {
            drawPoints : false,
            width : '100%',
            height : '90%',
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

        
        function drawSpectrum(dataNodes){
            for(var i=0; i<dataNodes.length; i++)
                items.push({x: dataNodes[i].Hz, y: dataNodes[i].value});
            data = new vis.DataSet(items);
            grSpectrum = new vis.Graph2d(ctArea, data, optionsSpectrum);
        }
    });

</script>

<div class="jPopSection" style="position: absolute; z-index:999; top: 12vh; left:10vh">

</div>

<div class="content_step">
    <div class="step2_view">
        <div class="view_title">
            <select>
                <option>모터 고정자 결함</option>
            </select>

            <h4><span class="bgP"></span>Trend View</h4>

            <div class="date_select">
                <span>트렌드 기간</span>
                <input type="button" name="" value="2017-01-01" />
                <span>~</span>
                <input type="button" name="" value="2017-01-15" />
            </div>

            <a href="#" class="full"><img src="image/ic_pop_full.png" alt="전체화면" /></a>
        </div>
        <div class="view_con">
            <div class="graph_area" id="trendGraph"><!-- 그래프영역 --></div>
        </div>
    </div>

    <div class="step2_view">
        <div class="view_title">
            <a href="#" class="set"><img src="image/ic_pop_setting.png" alt="셋팅" /></a>

            <h4><span class="bgLG"></span>Spectrum View</h4>

            <a href="#" class="full"><img src="image/ic_pop_full.png" alt="전체화면" /></a>
        </div>
        <div class="view_con">
            <div class="graph_area" id="spectrumGraph"><!-- 그래프영역 --></div>
        </div>
    </div>
</div>

</body>
</html>
