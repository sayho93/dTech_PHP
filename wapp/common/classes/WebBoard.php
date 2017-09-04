<? include $_SERVER["DOCUMENT_ROOT"] . "/common/classes/WebBase.php" ;?>
<?
/*
 * Web process
 * add by cho
 * */
if(!class_exists("WebBoard")){
	class WebBoard extends  WebBase {
		
		function __construct($req) 
		{
			parent::__construct($req);
		}
		
		// 게시판 리스트
		function getListOfBoard() {
			$this->req["userNumber"]	=	$this->webUser["userNumber"] ;
			
			$actionUrl = "{$this->serverRoot}/GolfLand/WebBoard/getListOfBoard";
			
			$retVal = $this->getData($actionUrl, $this->req);
			
			return $retVal;
		}
		
		//게시글 상세
		function getInfoOfBoard() {
			$actionUrl = "{$this->serverRoot}/GolfLand/WebBoard/getInfoOfBoard";
			
			$retVal = $this->getData($actionUrl, $this->req);
			
			return $retVal;
		}
		
		//문의하기
		function requestInquire() {
			$this->req["userNumber"]	=	$this->webUser["userNumber"] ;
			
			$actionUrl = "{$this->serverRoot}/GolfLand/ApiComm/requestInquire";
			
			$retVal = $this->getData($actionUrl, $this->req);
			
			return $retVal;
		}
		
		//부킹매니저 신청
		function requestBookingManager() {
			$this->req["userNumber"]	=	$this->webUser["userNumber"] ;
			
			$actionUrl = "{$this->serverRoot}/GolfLand/ApiUser/requestBookingManager";
			
			$retVal = $this->getData($actionUrl, $this->req);
			
			return $retVal;
		}
		
	}
}