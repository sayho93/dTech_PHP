<? include $_SERVER["DOCUMENT_ROOT"] . "/common/classes/WebBase.php" ;?>
<?php
if(! class_exists("WebUser") )	{

	class WebUser extends Common {
		function __construct($req) {
			parent::__construct($req);
		}
		
		function userLogin() {
		    $userID = $this->req["userID"];
		    $request = $this->lnFn_Common_CrPost(array("password" => $this->req["userPwd"] ));
			$actionUrl = "{$this->serverRoot}/user/read/".$userID;
			$retVal = $this->getData($actionUrl, $request);

//			echo json_encode($retVal);

			if($retVal->returnCode == "!")
                LoginUtil::doWebLogin();



			return $retVal;
		}
		
		function memberJoin(){
			$actionUrl = "{$this->serverRoot}/MadCloud/ApiUser/saveUser";
			$retVal = $this->getData($actionUrl, $this->req);
			return $retVal;
		}
		
		function checkIDRedundancy(){
			$actionUrl = "{$this->serverRoot}/MadCloud/ApiUser/checkIDRedundancy";
			$retVal = $this->getData($actionUrl, $this->req);
			return $retVal;
		}
		
		function checkNickRedundancy(){
			$actionUrl = "{$this->serverRoot}/MadCloud/ApiUser/checkNickRedundancy";
			$retVal = $this->getData($actionUrl, $this->req);
			return $retVal;
		}
		
		function getListOfRegion(){
			$actionUrl = "{$this->serverRoot}/MadCloud/ApiCommon/getListOfRegion";
			$retVal = $this->getData($actionUrl, "");
			return $retVal;
		}
	}
}
?>