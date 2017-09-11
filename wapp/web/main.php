<?
/**
 * Created by PhpStorm.
 * User: sayho
 * Date: 2017-09-04
 * Time: 오후 1:37
 */
?>
<? include $_SERVER["DOCUMENT_ROOT"] . "/web/php/header.php" ;?>
<? include $_SERVER["DOCUMENT_ROOT"] . "/common/classes/WebUser.php" ;?>
<? include $_SERVER["DOCUMENT_ROOT"] . "/web/php/sideMenu.php" ;?>
<?
$obj = new WebUser($_REQUEST);

$webUser = $obj->webUser["userNo"];
?>
<style>
    body {
        color: #d3d3d3;
        font: 12pt arial;
        background-color: #222222;
    }

    #mynetwork {
        width: 100%;
        height: 100%;
        border: 1px solid #444444;
        background-color: #222222;
    }
</style>
<script type="text/javascript" src="js/main.js"></script>
<script src="js/html5shiv.min.js"></script>
<script type="text/javascript" src="js/vis.js"></script>
<link href="css/vis.min.css" rel="stylesheet" type="text/css"/>
<script>

    var Map = function(){
        this.map = new Object();
    };

    Map.prototype = {
        put : function(key, value){
            this.map[key] = value;
        },
        get : function(key){
            return this.map[key];
        },
        containsKey : function(key){
            return key in this.map;
        }
    };


    $(document).ready(function () {

        //메인 페이지
        $(document).on("click", ".jMain", function(){
            location.href = "/web/main.php";
        });

        //점멸주기설정
        $(document).on("click", ".jEmitPeriod", function(){
            showPop("/web/popupCollection/emitPeriodPop.php");
        });

        //언어 설정
        $(document).on("click", ".jLangSetting", function(){
            showPop("/web/popupCollection/languageSettingPop.php");
        });

        $(document).on("click", ".JClose", function(){
            var target = $(this).attr("target");
            $("."+target).hide();
        });

        $(".jCancel").click(function(){
            alert();
        });

        function showPop(url){
            $.ajax({
                url: url,
                async : false,
                cache : false,
                dataType : "html",
                data:{

                },
                success :function(data){
                    $(".jPopSection").html(data);
                    $(".jPopSection").draggable();
                }
            });
        }

        var color = 'gray';
        var len = undefined;

        var locale = "<?=$obj->webUser[loc]?>";

        var nodes = [

        ];
        var edges = [

        ];

        var container = document.getElementById('mynetwork');

        var data = {
            nodes: nodes,
            edges: edges
        };

        var options = {
            nodes: {
                shape: 'dot',
                size: 30,
                font: {
                    size: 32,
                    color: '#ffffff'
                },
                borderWidth: 2
            },
            edges: {
                width: 2
            }
        };

        $.ajax({
            url: "/action_front.php?cmd=WebMain.getMindMapData",
            async : false,
            cache : false,
            dataType : "json",
            data:{
                level : 0
            },
            success : function(data){
                var dataNodes = data.data.nodes;
                drawMap(dataNodes);
            },error : function(req, res, err){alert(req+res+err);}
         });

        network = new vis.Network(container, data, options);

        network.on( 'click', function(properties) {
            var ids = properties.nodes;
            var clickedNodes = nodes[ids];
            console.log('clicked nodes:', clickedNodes);
        });

        function getKey(group, plant){
            return group + "-" + plant;
        }

        function drawMap(dataNodes){
            var cMap = new Map();
            var gMap = new Map();
            var pMap = new Map();
            var gpMap = new Map();
            var pcMap = new Map();

            var drawIndex = 0;

            for(var e = 0; e < dataNodes.length; e++){
                var pMotor = dataNodes[e].id;
                var pGroup = dataNodes[e].f_group;
                var pPlant = dataNodes[e].f_plant;
                var pCompany = dataNodes[e].f_company;

                if(!cMap.containsKey(pCompany)){ // 회사노드가 최초 출현인 경우
                    var entry = {id: ++drawIndex, label: "회사", group: 0, cKey : pCompany};
                    nodes.push(entry);
                    cMap.put(pCompany, entry);
                }

                if(!pMap.containsKey(pPlant)){ // 회사노드가 최초 출현인 경우
                    var entry = {id: ++drawIndex, label: "공장", group: 1, pKey : pPlant};
                    nodes.push(entry);
                    pMap.put(pPlant, entry);
                }

                if(!gMap.containsKey(pGroup)){ // 회사노드가 최초 출현인 경우
                    var entry = {id: ++drawIndex, label: "그룹", group: 2, gKey : pGroup};
                    nodes.push(entry);
                    gMap.put(pGroup, entry);
                }

                var cursor = ++drawIndex;
                var entry = {id: cursor, label: "모터" + e, group: 3, mKey : pMotor};
                nodes.push(entry);

                edges.push({from : cursor, to : gMap.get(pGroup).id})

                if(!gpMap.containsKey(getKey(pGroup, pPlant))){
                    edges.push({from : gMap.get(pGroup).id, to : pMap.get(pPlant).id})
                    gpMap.put(getKey(pGroup, pPlant), "");
                }

                if(!pcMap.containsKey(getKey(pPlant, pCompany))){
                    edges.push({from : pMap.get(pPlant).id, to : cMap.get(pCompany).id})
                    pcMap.put(getKey(pPlant, pCompany), "");
                }

            }

        }

    });
</script>

</head>

<!-- #####화면위치 START#####-->
<div class="route">
    <p>
        회사명
        <span>></span>
        공장1
        <span>></span>
        그룹1
    </p>
</div>
<!-- #####화면위치 END#####-->

<div class="jPopSection" style="position: relative">

</div>


<!-- #####마인드맵 START#####-->
<div class="content_map">
	<a href="#" class="prev"><img src="image/ic_main_prev.png" alt="prev" /></a>
	<a href="#" class="next"><img src="image/ic_main_next.png" alt="next" /></a>
	<div class="area" id="mynetwork">

    </div>



</div>
<!-- #####마인드맵 END#####-->

<!-- #####화면정보 START#####-->
<div class="view_info">
    <dl>
        <dt>위치 정보</dt>
        <dd>
            <p>
                회사명
                <span>></span>
                공장1
                <span>></span>
                그룹1
                <span>></span>
                그룹2
            </p>
        </dd>
		<dt>설비 명</dt>
		<dd><p>47CH902-CM1M</p></dd>
	</dl>

	<div class="view_select">
		<select>
			<option>그룹 1까지 보기</option>
		</select>
	</div>
</div>

<!-- #####화면정보 END#####-->

</body>



</html>