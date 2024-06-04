<?php
use BaconQrCode\Common\ErrorCorrectionLevel;
use BaconQrCode\Renderer\Image\Png;
use BaconQrCode\Writer;
include_once './vendor/autoload.php';


class QRgen {

    public function getImage($docE)
    {       
            $params = [
                $docE['Emisor']['NroDocumento'],
                $docE['TipoDocumento'],
                substr($docE['IdDocumento'],0,4),
                substr($docE['IdDocumento'],5,strlen($docE['IdDocumento'])),
                number_format($docE['TotalIgv'], 2, '.', ''),
                number_format($docE['TotalVenta'], 2, '.', ''),
                $docE['FechaEmision'],
                $docE['Receptor']['TipoDocumento'],
                $docE['Receptor']['NroDocumento']
        ];
        $content = implode('|', $params).'|';
        return $this->getQrImage($content);
    }

    public function getImage1($docE)
    {       
            $params = [
                $docE['Sale']['Emisor']['NroDocumento'],
                $docE['Sale']['TipoDocumento'],
                substr($docE['Sale']['IdDocumento'],0,4),
                substr($docE['Sale']['IdDocumento'],5,strlen($docE['Sale']['IdDocumento'])),
                number_format($docE['Sale']['TotalIgv'], 2, '.', ''),
                number_format($docE['Sale']['TotalVenta'], 2, '.', ''),
                $docE['Sale']['FechaEmision'],
                $docE['Sale']['Receptor']['TipoDocumento'],
                $docE['Sale']['Receptor']['NroDocumento']
        ];
        $content = implode('|', $params).'|';
        return $this->getQrImage($content);
    }
    private function getQrImage($content)
    {
        $renderer = new Png();
        $renderer->setHeight(150);
        $renderer->setWidth(150);
        $renderer->setMargin(0);
        $writer = new Writer($renderer);
        $qrCode = $writer->writeString($content, 'UTF-8', ErrorCorrectionLevel::Q);
        return $qrCode;
    }
}