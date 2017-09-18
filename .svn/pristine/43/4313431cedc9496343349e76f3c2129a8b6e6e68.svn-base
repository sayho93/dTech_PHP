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

<script>
    $(document).ready(function () {
        //common popup ajax loading

        var color = 'gray';
        var len = undefined;

        var locale = "<?=$obj->webUser[loc]?>";

        var nodes = [];
        var edges = [];

        var container = document.getElementById('mynetwork');

        var data = {
            nodes: nodes,
            edges: edges
        };

        var options = {
            nodes: {
                shape: 'square',
                size: 20,
                font: {
                    size: 16,
                    color: '#ffffff'
                },
                borderWidth: 1
            },
            edges: {
                width: 2,
                smooth: {
                    type : 'diagonalCross',
                    roundness : 0
                }
            },
            physics : false
        };

        $.ajax({
            url: "/action_front.php?cmd=WebMain.getMindMapData",
            async : true,
            cache : false,
            dataType : "json",
            data:{
                level : 0
            },
            beforeSend : function(){
//                $(".jLoader").show();
            },
            success : function(data){
                var dataNodes = data.data.nodes;
                drawMap(dataNodes);
//                $(".jLoader").hide();
            },
            error : function(req, res, err){
                alert(req+res+err);
//                $(".jLoader").hide();
            }
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

                var nMotor = dataNodes[e].motorName;
                var nGroup = dataNodes[e].groupName;
                var nPlant = dataNodes[e].plantName;
                var nCompany = dataNodes[e].companyName;

                if(!cMap.containsKey(pCompany)){ // 회사노드가 최초 출현인 경우
                    var entry = {id: ++drawIndex, label: nCompany, group: 0, cKey : pCompany};
                    nodes.push(entry);
                    cMap.put(pCompany, entry);
                }

                if(!pMap.containsKey(pPlant)){ // 공장노드가 최초 출현인 경우
                    var entry = {id: ++drawIndex, label: nPlant, group: 1, pKey : pPlant};
                    nodes.push(entry);
                    pMap.put(pPlant, entry);
                }

                if(!gMap.containsKey(pGroup)){ // 그룹노드가 최초 출현인 경우
                    var entry = {id: ++drawIndex, label: nGroup, group: 2, gKey : pGroup};
                    nodes.push(entry);
                    gMap.put(pGroup, entry);
                }

                var cursor = ++drawIndex;
                var entry = {id: cursor, label: nMotor, group: 3, mKey : pMotor};
                nodes.push(entry);

                edges.push({from : cursor, to : gMap.get(pGroup).id})

                if(!gpMap.containsKey(getKey(pGroup, pPlant))){
                    edges.push({from : gMap.get(pGroup).id, to : pMap.get(pPlant).id})
                    gpMap.put(getKey(pGroup, pPlant), " ");
                }

                if(!pcMap.containsKey(getKey(pPlant, pCompany))){
                    edges.push({from : pMap.get(pPlant).id, to : cMap.get(pCompany).id})
                    pcMap.put(getKey(pPlant, pCompany), " ");
                }

            }

            network = new vis.Network(container, data, options);

            network.on( 'click', function(properties) {
                var ids = properties.nodes;
                console.log("ids:::"+ids);
                var clickedNodes = nodes[parseInt(ids)-1];

                if(clickedNodes){
                    console.log('clicked nodes:', clickedNodes);

                    console.log("mKey:", clickedNodes.mKey);

                    if(clickedNodes.mKey){
                        console.log("motor clicked");
                        location.href = "/web/step1.php?mKey="+clickedNodes.mKey;
                    }
                }

            });
        }

    });
</script>

</head>

<div class="route">
    <p>
        회사명
        <span>></span>
        공장1
        <span>></span>
        그룹1
    </p>
</div>

<div class="content_map">
    <a href="#" class="prev"><img src="image/ic_main_prev.png" alt="prev" /></a>
    <a href="#" class="next"><img src="image/ic_main_next.png" alt="next" /></a>
    <div class="area" id="mynetwork">
<!--        <div class="jLoader" style="text-align:center;position: absolute;  display: inline-block;  width: 100%;  height: 100%;  padding: 1em;">-->
<!--            <table width="100%" height="100%"><tr><td style="text-align:center;vertical-align: middle;"><img src="image/load.gif" width="150px" height="150px" /></td></tr></table>-->
<!--        </div>-->
    </div>
</div>

<div class="jPopSection" style="position: absolute; z-index:999; top: 12vh; left:10vh">


</div>



<div class="view_info">
    <dl>
        <dt><?=$locMap["statics"]["location"]?></dt>
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
		<dt><?=$locMap["statics"]["machineName"]?></dt>
		<dd><p>47CH902-CM1M</p></dd>
	</dl>

	<div class="view_select" style="margin-top:20px">
		<select>
			<option>그룹 1까지 보기</option>
		</select>
	</div>
</div>

<div id="addMotorModal">

</div>


</body>

</html>