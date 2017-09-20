<? include $_SERVER["DOCUMENT_ROOT"] . "/common/classes/WebBase.php" ;?>
<?php
if(! class_exists("WebUser") )	{

	class WebUser extends Common {
		function __construct($req) {
			parent::__construct($req);
		}

		//web login
		function userLogin() {
		    $userID = $this->req["userID"];
		    $request = $this->lnFn_Common_CrPost(array("password" => $this->req["userPwd"] ));
			$actionUrl = "{$this->serverRoot}/user/read/".$userID;
			$retVal = $this->postData($actionUrl, $request);

            $userInfo = json_decode($retVal)->data;

            LoginUtil::doWebLogin($userInfo);
			return $retVal;
		}

		//locale setting
        function setLocale(){
		    $userID = $this->webUser["userID"];
		    $request = $this->lnFn_Common_CrPost(array("loc" => $this->req["locale"]));
		    $actionUrl = "{$this->serverRoot}/user/locale/".$userID;
		    $retVal = $this->postData($actionUrl, $request);

		    return $retVal;
        }

        //refresh
        function refreshUserInfo(){
            $userID = $this->webUser["userID"];
            $request = $this->lnFn_Common_CrPost(array("accessToken" => md5($userID)));
            $actionUrl = "{$this->serverRoot}/user/read/".$userID;
            $retVal = $this->postData($actionUrl, $request);
            $userInfo = json_decode($retVal)->data;

            LoginUtil::doWebLogin($userInfo);
            return $retVal;
        }

        //App push on/off
        function setPushOnOff(){
            $userID = $this->webUser["userID"];
//            $request = $this->lnFn_Common_CrPost(array("accessToken" => md5($userID)));
            $actionUrl = "{$this->serverRoot}/user/update/push/".$userID;
            $retVal = $this->postData($actionUrl, "");
            $userInfo = json_decode($retVal)->data;

            LoginUtil::doWebLogin($userInfo);
            return $retVal;
        }
//
//		function memberJoin(){
//			$actionUrl = "{$this->serverRoot}/MadCloud/ApiUser/saveUser";
//			$retVal = $this->postData($actionUrl, $this->req);
//			return $retVal;
//		}
//
//		function checkIDRedundancy(){
//			$actionUrl = "{$this->serverRoot}/MadCloud/ApiUser/checkIDRedundancy";
//			$retVal = $this->postData($actionUrl, $this->req);
//			return $retVal;
//		}
//
//		function checkNickRedundancy(){
//			$actionUrl = "{$this->serverRoot}/MadCloud/ApiUser/checkNickRedundancy";
//			$retVal = $this->postData($actionUrl, $this->req);
//			return $retVal;
//		}
//
//		function getListOfRegion(){
//			$actionUrl = "{$this->serverRoot}/MadCloud/ApiCommon/getListOfRegion";
//			$retVal = $this->postData($actionUrl, "");
//			return $retVal;
//		}
	}
}
?>