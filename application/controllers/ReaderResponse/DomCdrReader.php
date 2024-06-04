<?php
/**
 * Created by PhpStorm.
 * User: Giansalex
 * Date: 22/07/2017
 * Time: 15:40.
 */

namespace ReaderResponse;

use Models\Response\CdrResponse;

//require APPPATH . '/controllers/Models/Responser/CdrResponse.php';

//use Greenter\Model\Response\CdrResponse;


/**
 * Class DomCdrReader.
 */
class DomCdrReader
{
    /**
     * @var XmlReader
     */
    private $reader;

    /**
     * DomCdrReader constructor.
     * @param XmlReader $reader
     */
    public function __construct(XmlReader $reader)
    {
        $this->reader = $reader;
    }

    /**
     * Get Cdr using DomDocument.
     *
     * @param string $xml
     *
     * @return CdrResponse
     */
    public function getCdrResponse($xml)
    {
        $this->reader->loadXpath($xml);

        $cdr = $this->createCdr();

        return $cdr;
    }

    /**
     * @return CdrResponse
     */
    private function createCdr()
    {
        $nodePrefix = 'cac:DocumentResponse/cac:Response/';
        $cdr = new CdrResponse;
        
        $cdr->setId($this->reader->getValue($nodePrefix.'cbc:ReferenceID'))
            ->setCodigo($this->reader->getValue($nodePrefix.'cbc:ResponseCode'))
            ->setDescripcion($this->reader->getValue($nodePrefix.'cbc:Description'))
            ->setNotas($this->getNotes())
            ->setHashQr($this->getHashQr());
        if(!$cdr->getNotas()){
            $cdr->setNotas($this->getStatusCode());
        }
        return $cdr;
    }

    
    /**
     * Get Notes if exist.
     *
     * @return string[]
     */
    private function getNotes()
    {
        $xpath = $this->reader->getXpath();

        $nodes = $xpath->query($this->reader->getRoot().'/cbc:Note');
        $notes = [];
        if ($nodes->length === 0) {
            return $notes;
        }

        /** @var \DOMElement $node */
        foreach ($nodes as $node) {
            $notes[] = $node->nodeValue;
        }

        return $notes;
    }
    private function getStatusCode()
    {
        $xpath = $this->reader->getXpath();

        $nodes = $xpath->query($this->reader->getRoot().'/cac:DocumentResponse//cac:Status');
        
        $notes = [];
        if ($nodes->length === 0) {
            return $notes;
        }

        /** @var \DOMElement $node */
        foreach ($nodes as $node) {
            $children=$node->childNodes;
            $cod='';
            $msg='';
            foreach($children as $child){

                if($child->nodeName=='cbc:StatusReasonCode') {
                    $cod=$child->nodeValue.':';   
                } 
                elseif($child->nodeName=='cbc:StatusReason'){
                    $msg=$child->nodeValue;   
                }
        
            }
            $notes[]=$cod.' '.$msg;
        }

        return $notes;
    }

    
    private function getHashQr()
    {
        $nodePrefix = 'cac:DocumentResponse/cac:DocumentReference/';
        
        $hashqr=$this->reader->getValue($nodePrefix.'cbc:DocumentDescription');

        return $hashqr;
    }
}