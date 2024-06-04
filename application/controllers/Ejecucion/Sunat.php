<?php



namespace Ejecucion;

use ReaderResponse\DomCdrReader;
use Models\Error\Error;
use ReaderResponse\Validator\ErrorCodeProviderInterface;
use ReaderResponse\XmlReader;
use ZipFile;

require APPPATH. '/controllers/Models/Error/Error.php';
require APPPATH. '/helpers/mostrar_helper.php';


class Sunat
{
   /*  public function __construct()
    {
        parent::__construct();
        $this->load->library('ZipFile');

    } */
    const NUMBER_PATTERN = '/[^0-9]+/';
   
    /**
     * @var ErrorCodeProviderInterface
     */
    private $codeProvider;
    /**
     * @var CompressInterface
     */
    public $compressor;
    /**
     * @var DecompressInterface
     */
    public $decompressor;
    /**
     * @var CdrReaderInterface
     */
    public $cdrReader;

    /**
     * Get error from Fault Exception.
     *
     * @param \SoapFault $fault
     *
     * @return Error
     */
    public function getErrorFromFault(\SoapFault $fault)
    {   
        //debug_pre($fault);
        $error = $this->getErrorByCode($fault->faultcode);
        if (isset($fault->detail)) {

            $err=$fault->detail->message;

            $error->setMessage(str_replace("'","",$err));
            $error->setCode($fault->faultstring);
        }else{
            $error->setMessage($fault->faultstring);
        }
        
        //echo $error->getCode();
        return $error;
    }
    /**
     * @param string $code
     * @param string $optional intenta obtener el codigo de este parametro sino $codigo no es válido
     
     * @return Error
     */

    protected function getErrorByCode($code)
    {
        $error = new Error();
        $code = preg_replace(self::NUMBER_PATTERN, '', $code);
        $error->setCode($code);
      
        return $error;
    }
    
    /**
     * @param string $filename
     * @param string $xml
     *
     * @return string
     */
    protected function compress($filename, $xml)
    {
        if (!$this->compressor) {
            $this->compressor = new ZipFile();
        }
        return $this->compressor->compress($filename, $xml);
    }
    /**
     * @param $zipContent
     *
     * @return \Greenter\Model\Response\CdrResponse
     */
    protected function extractResponse($zipContent)
    {
        if (!$this->cdrReader) {
            $this->cdrReader = new DomCdrReader(new XmlReader());
        }
        $xml = $this->getXmlResponse($zipContent);
        return $this->cdrReader->getCdrResponse($xml);
    }
    /**
     * @param $code
     *
     * @return string
     */
   /*  protected function getMessageError($code)
    {
        if (empty($this->codeProvider)) {
            return '';
        }
        return $this->codeProvider->getValue($code);
    } */
    protected function isExceptionCode($code)
    {
        $value = intval($code);
        return $value >= 100 && $value <= 1999;
    }
    
    private function getXmlResponse($content)
    {
        if (!$this->decompressor) {
            $this->decompressor = new ZipFile();
        }
        $filter = function ($filename) {
            return 'xml' === strtolower($this->getFileExtension($filename));
        };
        $files = $this->decompressor->decompress($content, $filter);
        return 0 === count($files) ? '' : $files[0]['content'];
    }
    private function getFileExtension($filename)
    {
        $lastDotPos = strrpos($filename, '.');
        if (!$lastDotPos) {
            return '';
        }
        return substr($filename, $lastDotPos + 1);
    }
}