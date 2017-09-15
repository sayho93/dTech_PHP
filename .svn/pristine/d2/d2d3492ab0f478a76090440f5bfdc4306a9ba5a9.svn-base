<?php
/**
 * Created by PhpStorm.
 * User: sayho
 * Date: 2017-09-14
 * Time: 오후 4:50
 */
?>
<? include $_SERVER["DOCUMENT_ROOT"] . "/common/classes/WebUser.php" ;?>
<?
$obj = new WebUser($_REQUEST);

?>
<? include $_SERVER["DOCUMENT_ROOT"] . "/web/php/metaData.php" ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>DURATECH</title>
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/main.js"></script>
    <script src="js/html5shiv.min.js"></script>
</head>

<script>
    $(document).ready(function(){

        $(".jLogin").click(function(){

            var userID = $("#userID").val();
            var userPwd = $("#userPwd").val();

            if(userID == "") {
                alert("아이디를 입력해 주세요");
                return;
            }

            $.ajax({
                url : "/action_front.php?cmd=WebUser.userLogin",
                async : false,
                cache : false,
                dataType : "json",
                data : {
                    "userID" : userID,
                    "userPwd" : userPwd
                },
                success : function(data){
                    if(data.returnCode == 1){
                        location.href = "/mobile/main.php";
                    }
                    else if(data.returnCode == -2)
                        swal({title:"",text:"올바른 값을 입력해 주세요", type:"warning"});
                    else{
                        swal({title:"",text:"아이디 혹은 비밀번호가 일치하지 않습니다.", type:"warning"});
                    }
                },
                error : function(req, res, err){
                    alert(req+res+err);
                }
            });
        });
        $("#userID").focus();
        $("#userID, #userPwd").enterHandling($(".jLogin"));
    });

</script>

<body class="login_page">

<div class="login">
    <h1>DURATECH</h1>

    <div class="login_input">
        <input type="text" id="userID" name="" placeholder="아이디" />
        <input type="password" id="userPwd" name="" placeholder="비밀번호" />
    </div>

    <input type="button" class="jLogin" value="LOGIN" />
</div>

</body>
</html>
