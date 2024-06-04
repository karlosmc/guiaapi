<?php

namespace SUNAT\GRE;

use Exception;

class ApiException extends Exception{


    /**
     * The HTTP body of the server response either as Json or string.
     *
     * @var \stdClass|string|null
     */
    protected $responseBody;

    /**
     * The HTTP header of the server response.
     *
     * @var string[]|null
     */
    protected $responseHeaders;

    /**
     * The deserialized response object
     *
     * @var \stdClass|string|null
     */
    protected $responseObject;

      /**
     * Constructor
     *
     * @param string                $message         Error message
     * @param int                   $code            HTTP status code
     * @param string[]|null         $responseHeaders HTTP response header
     * @param \stdClass|string|null $responseBody    HTTP decoded body of the server response either as \stdClass or string
     * 
     */
    public function __construct($message = "", $code = 0, $responseHeaders = [], $responseBody = null)
    {
        parent::__construct($message, $code);
        $this->responseHeaders = $responseHeaders;
        $this->responseBody = $responseBody;
    }


    /**
     * Get the HTTP body of the server response either as Json or string.
     *
     * @return  \stdClass|string|null
     */ 
    public function getResponseBody()
    {
        return $this->responseBody;
    }

    /**
     * Get the HTTP header of the server response.
     *
     * @return  string[]|null
     */ 
    public function getResponseHeaders()
    {
        return $this->responseHeaders;
    }

    /**
     * Get the deserialized response object
     *
     * @return  \stdClass|string|null
     */ 
    public function getResponseObject()
    {
        return $this->responseObject;
    }

    /**
     * Set the deserialized response object
     *
     * @param  \stdClass|string|null  $responseObject  The deserialized response object
     *
     * @return  self
     */ 
    public function setResponseObject($responseObject)
    {
        $this->responseObject = $responseObject;

        return $this;
    }
}