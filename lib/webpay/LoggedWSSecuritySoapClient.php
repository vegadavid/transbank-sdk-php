<?php
namespace Transbank\Webpay;

class LoggedWSSecuritySoapClient extends WSSecuritySoapClient
{
    private $txtXmlLogger;

    function __construct($txtXmlLogger, $wsdl, $privateKey, $publicCert, $options) {
        
        $this->txtXmlLogger = $txtXmlLogger;

        return parent::__construct($wsdl, $privateKey, $publicCert, $options);
    }

    function __doRequest($request, $location, $saction, $version, $one_way = 0) {
        if (!empty($this->txtXmlLogger)) {
            $this->txtXmlLogger->logXml("Request",$location,$request);
        }
        return parent::__doRequest($request, $location, $saction, $version, $one_way = 0);
    }
}