<? include $_SERVER["DOCUMENT_ROOT"] . "/web/php/header.php" ;?>
<? include $_SERVER["DOCUMENT_ROOT"] . "/common/classes/WebUser.php" ;?>

<?
    $obj = new WebUser($_REQUEST);

?>
<script>
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
                    alert(data.returnMessage);
                    if(data.returnCode == 1)
                        location.href="/web/main.php";
                    else{
                        alert(아이디와 비밀번호가 일치하지 않습니다);
                    }
                }
            });
        });


    });

</script>
<body class="login_page">
	
<form id="fm1">
    <div class="login">
        <h1>DURATECH</h1>

        <div class="login_input">
            <input type="text" name="userID" placeholder="아이디" />
            <input type="password" name="userPwd" placeholder="비밀번호" />
        </div>

        <input type="button" class="jLogin" name="" value="LOGIN" />
    </div>
</form>

</body>
</html>