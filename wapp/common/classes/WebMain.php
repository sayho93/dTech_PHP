<? include $_SERVER["DOCUMENT_ROOT"] . "/common/classes/WebBase.php" ;?>
<?php
if(! class_exists("WebMain") )	{

    class WebMain extends Common {
        function __construct($req) {
            parent::__construct($req);
        }

        //mindMap data
        function getMindMapData(){
            $companyNo = $this->webUser[companyNo];

            $request = $this->lnFn_Common_CrPost(array("level" => 0 ));
            $actionUrl = "{$this->serverRoot}/map/company/".$companyNo;
            $retVal = $this->getData($actionUrl, $request);

            return $retVal;
        }

        //TODO addMotor excel parse
        function uploadFile(){

            $imgResult = $this->inFn_Common_fileSave($_FILES);
            $filePathMotorInfo = $imgResult["filePathMotorInfo"]["saveURL"] != "" ? $imgResult["filePathMotorInfo"]["saveURL"] : $this->req["filePathMotorInfo"];


            $request = $this->lnFn_Common_CrPost(array("url" => $filePathMotorInfo ));
            $actionUrl = "{$this->serverRoot}/data/parse";
            $retVal = $this->getData($actionUrl, $request);

            return $retVal;
        }

        //spectrum View data
        function getSpectrumData(){
            $motorNo = $this->req["motorNo"];
            $startDate = $this->req["startDate"];
            $endDate = $this->req["endDate"];
            $interval = $this->req["interval"];
            $limit = $this->req["limit"];

            return getSpectrumDataWithParam($motorNo, $startDate, $endDate, $interval, $limit);
        }

        function getSpectrumDataWithParam($motorNo, $startDate, $endDate, $interval = 5, $limit = 100){
            if($motorNo == ""){
                throw new Exception();
            }

            $paramsArray = array("startDate"=>$startDate, "endDate"=>$endDate, "interval"=>$interval, "limit"=>$limit);
            $request = $this->lnFn_Common_CrPost($paramsArray);
            $actionUrl = "{$this->serverRoot}/data/spectrum/".$motorNo;
            $retVal = $this->getData($actionUrl, $request);

            return $retVal;
        }

        //App factory List Api
        function getFactoryList(){
            $companyNo = $this->webUser[companyNo];

            $request = $this->lnFn_Common_CrPost(array("page" => 0 ));
            $actionUrl = "{$this->serverRoot}/data/plant/".$companyNo;
            $retVal = $this->getData($actionUrl, $request);

            return $retVal;
        }

    }
}
?>