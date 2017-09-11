<? include $_SERVER["DOCUMENT_ROOT"] . "/common/classes/WebBase.php" ;?>
<?php
if(! class_exists("WebMain") )	{

    class WebMain extends Common {
        function __construct($req) {
            parent::__construct($req);
        }

        //mindMap data
        function getMindMapData() {
            $companyNo = $this->webUser[companyNo];

            $request = $this->lnFn_Common_CrPost(array("level" => 0 ));
            $actionUrl = "{$this->serverRoot}/map/company/".$companyNo;
            $retVal = $this->getData($actionUrl, $request);

            return $retVal;
        }

    }
}
?>