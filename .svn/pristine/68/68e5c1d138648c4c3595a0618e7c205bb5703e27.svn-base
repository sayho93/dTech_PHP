<? include $_SERVER["DOCUMENT_ROOT"] . "/web/php/header.php" ;?>
<? include $_SERVER["DOCUMENT_ROOT"] . "/common/classes/WebUser.php" ;?>

<?
    $obj = new WebUser($_REQUEST);

?>
<script>
//    swal({title:"",text:"아이디와 비밀번호가 일치하지 않습니다.", type:"warning"}, function(isConfirm){location.reload();});
    $(document).ready(function(){

        $(".jLogin").click(function(){

            $("#fm1").ajaxSubmit({
                url : "/action_front.php?cmd=WebUser.userLogin",
                async : false,
                cache : false,
                dataType : "json",
                data : {

                },
                success : function(data){
                    if(data.returnCode == 1){
                        swal({title:"", text:"로그인 되었습니다.", type:"success"}, function(){location.href="/web/main.php";});

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
	
<form id="fm1">
    <div class="login">
        <h1>DURATECH</h1>

        <div class="login_input">
            <input type="text" id="userID" name="userID" placeholder="아이디" />
            <input type="password" id="userPwd" name="userPwd" placeholder="비밀번호" />
        </div>

        <input type="button" class="jLogin" name="" value="LOGIN" />
    </div>
</form>

</body>
</html>