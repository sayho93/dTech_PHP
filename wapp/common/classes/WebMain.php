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

        function getSpectrumDataWithParam($motorNo, $id = 0){
            if($motorNo == ""){
                throw new Exception();
            }

            $paramsArray = array("id" => $id);
            $request = $this->lnFn_Common_CrPost($paramsArray);
            $actionUrl = "{$this->serverRoot}/data/spectrum/".$motorNo;
            $retVal = $this->getData($actionUrl, $request);

            return $retVal;
        }

        //App factory List Api
        function getFactoryList(){
            if($this->req["companyNo"] == "")
                $companyNo = $this->webUser[companyNo];
            else
                $companyNo = $this->req["companyNo"];

            $request = $this->lnFn_Common_CrPost(array("page" => 0 ));
            $actionUrl = "{$this->serverRoot}/data/plant/".$companyNo;
            $retVal = $this->getData($actionUrl, $request);

            return $retVal;
        }

        //App group List Api
        function getGroupList(){
            $factoryNo = $this->req["factoryNo"];

            $request = $this->lnFn_Common_CrPost(array("page" => 0 ));
            $actionUrl = "{$this->serverRoot}/data/group/".$factoryNo;
            $retVal = $this->getData($actionUrl, $request);

            return $retVal;
        }

        //App motor List Api
        function getMotorList(){
            $groupNo = $this->req["groupNo"];

            $request = $this->lnFn_Common_CrPost(array("page" => 0 ));
            $actionUrl = "{$this->serverRoot}/data/motor/".$groupNo;
            $retVal = $this->getData($actionUrl, $request);

            return $retVal;
        }

        //Web motor save Api
        function saveMotors(){
            $jsonText = $this->req["motorInfo"];

            $request = $this->lnFn_Common_CrPost(array("json" => json_encode($jsonText)));
            $actionUrl = "{$this->serverRoot}/data/saveMotor";
            $retVal = $this->getData($actionUrl, $request);

            return $retVal;
        }
    }
}
?>