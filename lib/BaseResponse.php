<?php
namespace Transbank;
/** 
 * @class BaseResponse
 * Basic response class that includes commonly used members
 * 
 * @package Transbank;
 * 
 * 
 */

 class BaseResponse
 {
    function __construct() {
        $this->responseCode = null;
        $this->description = null;
    }

    public function getResponseCode()
    {
        return $this->responseCode;
    }

    public function setResponseCode($apiKey) 
    {
        $this->responseCode = $apiKey;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($appKey) 
    {
        $this->description = $appKey;
        return $this;
    }
 }