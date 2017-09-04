<? include $_SERVER["DOCUMENT_ROOT"] . "/common/classes/ApiBase.php" ;?>
<?

if (! class_exists("ApiPlanCase"))
{

	class ApiPlanCase extends ApiBase
	{

		function __construct($req)
		{
			parent::__construct($req);
		} 
		
		function getPlanCase(){
			$planType=$this->req["planType"];
			$caseNo=$this->req["caseNo"];
			
			$ageMonth = $this->req["ageMonth"];
			
			if($planType=="3"){
				if($ageMonth < "48")
					$caseNo="2";
				else 
					$caseNo="3";
			}
			
			
			$sql="
				SELECT *
				FROM tblPlanCase
				WHERE planType='{$planType}' AND caseNo='{$caseNo}'
			";
			$result=$this->getRow($sql);
					
			return $result;
		}
		
		
		function getListOfReference(){
			$sql="
				SELECT *
				FROM tblRefInfo
				WHERE status=1 AND exhibit=1
				ORDER BY refNo DESC
			";
			
			$result=$this->getArray($sql);
			return $result;
		}
		
		function getSpecificRefInfo($title){
			$sql="
				SELECT *
				FROM tblRefInfo
				WHERE refTitle1 = '{$title}'
				ORDER BY regDate DESC LIMIT 1
			";
			$result=$this->getRow($sql);
			return $result;
		}
		
	}
}