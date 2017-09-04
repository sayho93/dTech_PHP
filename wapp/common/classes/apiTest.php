<? include $_SERVER["DOCUMENT_ROOT"] . "/common/classes/ApiStatic.php" ?>
<? include $_SERVER["DOCUMENT_ROOT"] . "/common/classes/ApiBoard.php" ?>
<?
	$obj = new ApiStatic($_REQUEST, "") ;
	$obj2= new ApiBoard($req) ;
	
	$kcsInfo = $obj->getKCSpecialVehicleInfo();
	$organizationCert = $obj->getListOfOrganizationCert();
	$notice	= $obj2->getListOfNotice();
	$event	= $obj2->getListOfEvent();
	$board	= $obj2->getListOfBoard();
	$comment= $obj2->getInfoOfBoard();
	$CS		= $obj2->getListOfCS();
	$CSInfo = $obj2->getInfoOfCS();
	$AS		= $obj2->getListOfCompany();
	$ASInfo	= $obj2->getInfoOfCompany();
	$myProductionSpec=$obj2->getListOfMyProductionSpec();
	$productionSpec=$obj2->getListOfProductionSpec();
	$productionSpecInfo=$obj2->getInfoOfProductionSpec();
	$vehicleList=$obj->getListOfVehicle();
	$vehicleInfo=$obj->getInfoOfVehicle();
	$privacyInfo=$obj2->getPrivacyInfo();
	$agreeInfo=$obj2->getAgreeInfo();
	

	//$vnum = $obj->virtualNum ;
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/admin/inc/css/base.css">
<link rel="stylesheet" type="text/css" href="/admin/inc/css/layout.css">
<link rel="stylesheet" type="text/css" href="/admin/inc/css/common.css">
<link rel="stylesheet" type="text/css" href="/admin/inc/css/btn.css">

<script type="text/javascript" src="/common/js/common.js"></script>
<script type="text/javascript" src="/common/js/jsMap.js"></script>
<script type="text/javascript" src="/common/js/jquery-1.7.1.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="/common/js/jquery.cookie.js"></script>



<!-- 리치 js -->
<script type="text/javascript" src="/common/js/jquery_rich/RichBaseExtends.js"></script>
<script type="text/javascript" src="/common/js/jquery_rich/RichBaseElementObject-1.0.js"></script>
<!-- 
<script type="text/javascript" src="/common/js/jquery_rich/RichFramework-1.0.js"></script>
<script type="text/javascript" src="/common/js/jquery_rich/RichElement-1.0.js"></script>
<script type="text/javascript" src="/common/js/jquery_rich/RHForm-1.0.js"></script>
 -->
<script type="text/javascript" src="/common/js/ajaxupload.3.6.js"></script>
<script type="text/javascript" src="/common/js/imgPreview.js"></script>
<script type="text/javascript" src="/common/js/jquery.form.js"></script>
<script src="/admin/inc/fileUpload/fileUploadJS.js"></script>
<script type="text/javascript">
$(document).ready(function(){

	initFileUpload(101);
	initFileUpload(102);
	initFileUpload(103);
	initFileUpload(104);
	initFileUpload(105);
	
	var FORM_TARGET_CLS_NM		= ".data"	;		// 폼을 동적 wrap 할 타겟 ID이름
	var FORM_NAME				= "alf"		;		// 폼이름
	var FORM_METHOD				= "POST"		;		// 폼 메쏘드
	var FORM_USE_FILE			= false		;		// 파일폼 사용 여부
	var FORM_ACTION				= "/action_front.php" ; 
	
	
	var NEXT_CMD				= ""		;		// 다은 수행 할 cmd
	

	$(".saveComment").click2(function(){
		$.ajax({
			type: 'post',
			url : "/action_front.php?cmd=ApiBoard.saveComment",
			async : false,
			cache : false,
			data:{
				"commentType" : "CS",
				"targetFk" : 2,
				"userFk" : 1,
				"content" : "test 대댓글2",
				"parentNo" : 62 
			},
			success : function(data){
				alert(data.returnmessage);
			},
			error : function(req, res, error){
				alert(req+res+error);
			}
		});
	}) ;

	$(".saveBoard").click2(function(){
		$("#jData").ajaxSubmit({
			type: 'post',
			url : "/action_front.php?cmd=ApiBoard.saveBoard",
			async : false,
			cache : false,
			data:{
				"title" : "이미지",
				"userFk" : 1,
				"content" : "내용내용내용" 
			},
			success : function(data){
				alert(data.returnmessage);
			},
			error : function(req, res, error){
				alert(req+res+error);
			}
		});
	}) ;
	
	$(".saveCS").click2(function(){
		$.ajax({
			type: 'post',
			url : "/action_front.php?cmd=ApiBoard.saveCS",
			async : false,
			cache : false,
			data:{
				"title" : "제목제목제목",
				"userFk" : 1,
				"imgPathBoard1" : "경로1",
				"imgPathBoard2" : "경로2",
				"imgPathBoard3" : "경로3",
				"content" : "내용내용내용" 
			},
			success : function(data){
				alert(data.returnmessage);
			},
			error : function(req, res, error){
				alert(req+res+error);
			}
		});
	}) ;

	$(".login").click2(function(){
		$.ajax({
			type: 'post',
			url : "/action_front.php?cmd=ApiUser.userLogin",
			async : false,
			cache : false,
			data:{
				"userID" : "test111",
				"userPwd": "alclsekf1",
				"deviceID" : "device",
				"deviceTypeID" : 2,
				"registrationKey" : "regKeyregKeyregKeyregKeyregKeyregKeyregKeyregKeyregKey",
				"appVersion" : "v1.0" 
			},
			success : function(data){
				alert(data.returnmessage);
			},
			error : function(req, res, error){
				alert(req+res+error);
			}
		});
	}) ;

	$(".autoLogin").click2(function(){
		$.ajax({
			type: 'post',
			url : "/action_front.php?cmd=ApiUser.userAutoLogin",
			async : false,
			cache : false,
			data:{
				"userNumber" : 11,
				"userID" : "fishcreek1",
				"userPwd": "alclsekf1",
				"deviceID" : "device",
				"deviceTypeID" : 2,
				"registrationKey" : "autologinKeyautologinKeyautologinKeyautologinKeyautologinKeyautologinKeyautologinKey",
				"appVersion" : "v1.0" 
			},
			success : function(data){
				alert(data.returnmessage);
			},
			error : function(req, res, error){
				alert(req+res+error);
			}
		});
	}) ;

	$(".memberJoin").click2(function(){
		$.ajax({
			type: 'post',
			url : "/action_front.php?cmd=ApiUser.memberJoin",
			async : false,
			cache : false,
			data:{
				"userID" : "test111",
				"userPwd" : "alclsekf1",
				"userPwdConfirm" : "alclsekf1",
				"userName" : "세호",
				"nickName" : "test1",
				"userTel" : "01026264848",
				"userVehicleTON" : 21,
				"userVehicleName" : "내장탑차",
				"userVehicleType" : "HY",
				"userVehicleWish" : "냉동 컨테이너",
				"deviceTypeID" : 2,
				"deviceID" : "deviceIDIDIDIDIDID",
				"registrationKey" : "regKeyregKeyregKeyregKeyregKeyregKeyregKeyregKeyregKey",
				"appVersion" : "v1.1" 
			},
			success : function(data){
				alert(data.returnmessage);
			},
			error : function(req, res, error){
				alert(req+res+error);
			}
		});
	}) ;
	
	$(".saveProductionSpec").click2(function(){
		$.ajax({
			type: 'post',
			url : "/action_front.php?cmd=ApiBoard.saveProductionSpec",
			async : false,
			cache : false,
			data:{
				"userFk" : 1,
				"requestDate" : "2017-10-18",
				"customerName" : "전세호",
				"companyName" : "리치",
				"vehicleTON" : "123123",
				"vehicleText" : "vehicleText",
				"vehicleType" : "HY",
				"productName" : "wtf",
				"telephone" : "01001011",
				"managerFk" : "1",
				"type" : "R",
				"typeValue" : "RRRR",
				"internalLength" : 108,
				"internalHeight" : 120,
				"internalWidth" : 32,
				"alCoil" : "G",
				"alCoilValue" : "GGGGG",
				"floor" : "C",
				"floorValueT" : 13,
				"floorValueText" : "CCCC",
				"tent" : 0,
				"sideBoard" : 1,
				"sideBoardValue" : "SSSS",
				"windStopper" : 1,
				"windStopperValue" : "WWWWW",
				"freezer" : 0,
				"freezerValue" : "FFFFF",
				"gateType" : 2,
				"gateSize" : 2,
				"gateValue" : "GGGGG",
				"load" : "S",
				"frontBack" : 2,
				"eTrackGate" : 0,
				"eTrackWing" : 1,
				"eTrackValue" : "EEEEEE",
				"toolBucket" : 2,
				"toolBucketValue" : "TTTTT",
				"bumberFootHold" : 1,
				"wingProtector" : 2,
				"axis" : 1,
				"axisValue" : "302",
				"balance" : 10241024,
				"specialAddition" : "special" 
			},
			success : function(data){
				alert(data.returnmessage);
			},
			error : function(req, res, error){
				alert(req+res+error);
			}
		});
	}) ;
	
	$("#subm").click2(function(){
        var val1 = $("#name1").val().toString();
        var val2 = $("#name2").val();
        var val3 = $("#name3").val();
        var val4 = $("#name4").val();
        var val5 = $("#name5").val();
        var val6 = $("#name6").val();
        var val7 = $("#name7").val();
        var val1v = $("#name1v").val();
        var val2v = $("#name2v").val();
        var val3v = $("#name3v").val();
        var val4v = $("#name4v").val();
        var val5v = $("#name5v").val();
        var val6v = $("#name6v").val();
        var val7v = $("#name7v").val();
		$.ajax({
			url : "/action_front.php?cmd=ApiBoard.saveComment",
			async : false,
			cache : false,
			dataType: 'json',
			data:{
				val1 : $("#name1v").val(),
                val2 : parseInt($("#name2v").val()),
                val3 : parseInt($("#name3v").val()),
                val4 : $("#name4v").val(),
                val5 : parseInt($("#name5v").val()),
                val6 : $("#name6v").val(),
                val7 : $("#name7v").val()
			},
			success : function(data){
				alert(data.returnmessage);
			},
			error : function(req, res, error){
				alert(req+res+error);
			}
		});
	}) ;

	
	
}) ;
</script>

<html>
	<head>
		<title>API 테스트 ㅋ</title>
	</head>
	<body>
	<div id="Contents"  class="notice" style="width:1000px;" >
	<?echo date('Y-m-d', $expireDate);?>
	<form name=test1 method=POST>
	<span class="button bigrounded blue saveComment btnleft_y">댓글 저장 </span>
	<span class="button bigrounded blue saveBoard btnleft_y">게시물 저장 </span>
	<span class="button bigrounded blue saveCS btnleft_y">고객센터 게시물 저장 </span>
	<span class="button bigrounded blue saveProductionSpec btnleft_y">제작사양서 저장 </span>
	<span class="button bigrounded blue memberJoin btnleft_y">회원가입 </span>
	<span class="button bigrounded blue login btnleft_y">로그인 </span>
	<span class="button bigrounded blue autoLogin btnleft_y">자동 로그인 </span>
	</form>
	    <div class="data">
			<table class="datacList" id="datacList">
			<thead>
                <tr class="datacLists">
                    <th width="8%">이름</th>
                    <th width="50%">내용</th>
                </tr>
            </thead>
			<tr>
			<td class="center" class="center"> KCSInfo</td>
			<td class=""><?echo $kcsInfo;?></td>
			</tr>
			<tr>
			<td class="center">OrganizationCert</td>
			<td class=""><?echo $organizationCert;?></td>
			</tr>
			<tr>
			<td class="center">Notice</td>
			<td class=""><?echo $notice;?></td>
			</tr>
			<tr>
			<td class="center">Event</td>
			<td class=""><?echo $event;?></td>
			</tr>
			<tr>
			<td class="center">Board</td>
			<td class=""><?echo $board;?></td>
			</tr>
			<tr>
			<td class="center">Comment</td>
			<td class=""><?echo $comment;?></td>
			</tr>
			<tr>
			<td class="center">CS</td>
			<td class=""><?echo $CS;?></td>
			</tr>
			<tr>
			<td class="center">CSInfo</td>
			<td class=""><?echo $CSInfo;?></td>
			</tr>
			<tr>
			<td class="center">AS</td>
			<td class=""><?echo $AS;?></td>
			</tr>
			<tr>
			<td class="center">ASInfo</td>
			<td class=""><?echo $ASInfo;?></td>
			</tr>

			<tr>
			<td class="center">MyProductionSpec</td>
			<td class=""><?echo $myProductionSpec;?></td>
			</tr>
			<tr>
			<td class="center">ProductionSpecList</td>
			<td class=""><?echo $productionSpec;?></td>
			</tr>
			<tr>
			<td class="center">ProductionSpecInfo</td>
			<td class=""><?echo $productionSpecInfo;?></td>
			</tr>
			<tr>
			<td class="center">vehicleList</td>
			<td class=""><?echo $vehicleList;?></td>
			</tr>
			<tr>
			<td class="center">vehicleInfo</td>
			<td class=""><?echo $vehicleInfo;?></td>
			</tr>
			<tr>
			<td class="center">privacyInfo</td>
			<td class=""><?echo $privacyInfo;?></td>
			</tr>
			<tr>
			<td class="center">agreeInfo</td>
			<td class=""><?echo $agreeInfo;?></td>
			</tr>
			
			</table>
			<form id="jData" method="post" enctype="multipart/form-data">
			<table>
				<tr>
					<th style="height:25px;">이미지 1</th>
					<td class="l">
						<?
							$fileIndex	= "101";
							$fileName	= "imgPathBoard1";
							$filePath	= ($shopImgList[0]["file_vir_name"] == "" ? "" : $shopImgList[0]["file_vir_name"]);
							$fileNumber	= ($shopImgList[0]["no"] == "" ? "0" : $shopImgList[0]["no"]);
							include $_SERVER["DOCUMENT_ROOT"] . "/admin/inc/fileUpload/fileUpload.php";
						?>
					</td>
				</tr>
				<tr>
					<th style="height:25px;">이미지 2</th>
					<td class="l">
						<?
							$fileIndex	= "102";
							$fileName	= "imgPathBoard2";
							$filePath	= ($shopImgList[1]["file_vir_name"] == "" ? "" : $shopImgList[1]["file_vir_name"]);
							$fileNumber	= ($shopImgList[1]["no"] == "" ? "0" : $shopImgList[1]["no"]);
							include $_SERVER["DOCUMENT_ROOT"] . "/admin/inc/fileUpload/fileUpload.php";
						?>
					</td>
				</tr>
				<tr>
					<th style="height:25px;">이미지 3</th>
					<td class="l">
						<?
							$fileIndex	= "103";
							$fileName	= "imgPathBoard3";
							$filePath	= ($shopImgList[2]["file_vir_name"] == "" ? "" : $shopImgList[2]["file_vir_name"]);
							$fileNumber	= ($shopImgList[2]["no"] == "" ? "0" : $shopImgList[2]["no"]);
							include $_SERVER["DOCUMENT_ROOT"] . "/admin/inc/fileUpload/fileUpload.php";
						?>
					</td>
				</tr>
				<tr>
					<th style="height:25px;">이미지 4</th>
					<td class="l">
						<?
							$fileIndex	= "104";
							$fileName	= "imgPathBoard4";
							$filePath	= ($shopImgList[3]["file_vir_name"] == "" ? "" : $shopImgList[3]["file_vir_name"]);
							$fileNumber	= ($shopImgList[3]["no"] == "" ? "0" : $shopImgList[3]["no"]);
							include $_SERVER["DOCUMENT_ROOT"] . "/admin/inc/fileUpload/fileUpload.php";
						?>
					</td>
				</tr>
				<tr>
					<th style="height:25px;">이미지 5</th>
					<td class="l">
						<?
							$fileIndex	= "105";
							$fileName	= "imgPathBoard5";
							$filePath	= ($shopImgList[4]["file_vir_name"] == "" ? "" : $shopImgList[4]["file_vir_name"]);
							$fileNumber	= ($shopImgList[4]["no"] == "" ? "0" : $shopImgList[4]["no"]);
							include $_SERVER["DOCUMENT_ROOT"] . "/admin/inc/fileUpload/fileUpload.php";
						?>
					</td>
				</tr>
			</table>
			</form>	
		</div>	
		<br>
	</div>	
	
	
	</body>
</html>