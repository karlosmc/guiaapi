<?php
/**
 * Class DocumentFilter.
 * 
 */
namespace Ejecucion\cata;
class Cata
{
    /**
     * @var array
     */
    private $store = [
        'TD' => [
            '01' => 'FACTURA',
            '03' => 'BOLETA DE VENTA',
            '07' => 'NOTA DE CRÉDITO',
            '08' => 'NOTA DE DÉBITO',
            '09' => 'GUÍA DE REMISIÓN REMITENTE',
            '20' => 'RETENCIÓN',
            '31' => 'GUÍA DE REMISIÓN TRANSPORTISTA',
            '40' => 'PERCEPCIÓN',
        ],
        'MOS' => [
            'PEN' => 'S/',
            'USD' => '$',
            'EUR' => '€',
        ],
        'MON' => [
            'PEN' => 'SOLES',
            'USD' => 'DÓLARES AMERICANOS',
            'EUR' => 'EUROS',
        ],
        'IDE' => [
            '0' => 'N/D',
            '1' => 'DNI',
            '6' => 'RUC',
        ],
        '19' => [
            '1' => 'ADICIONAR',
            '2' => 'MODIFICAR',
            '3' => 'ANULADO'
        ],
        'MT' => [
            '01' => 'PÚBLICO',
            '02' => 'PRIVADO',
      
        ],


    ];
    public function getValueCatalog($value, $code)
    {
        if (!isset($this->store[$code])) {
            return '';
        }
        $items = $this->store[$code];
        return isset($items[$value]) ? $items[$value] : '';
    }
}
