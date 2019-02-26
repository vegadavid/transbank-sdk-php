<?php

namespace Transbank\Webpay;

/**
 * class TxtXmlLogger
 * Permite registrar en archivos de texto los Request y Response XML enviados a TBK.
 * Requeridos para realizar seguimiento de las transacciones en caso de incidencias.
 * @author David Vega <dvega@prosys.cl>
 */
class TxtXmlLogger 
{
    private $file = '';

    public function __construct($filedir)
    {   
        if(empty($filedir)) {
            throw new Exception("Se requiere ruta para archivos de log");
        }

        $this->file = $filedir.DIRECTORY_SEPARATOR.'xml-'.date('Y-m-d').'.txt';
        
        if (!is_file($this->file)) {
            $file = fopen($this->file,'wb');
            fclose($file);
        }
    }

    public function logXml($type='',$action='',$xml='') {
        $txt = date('Y-m-d H:i:s ').' ['.$type.'] ['.$action.']'.PHP_EOL.$xml.PHP_EOL.PHP_EOL;
        $file = fopen($this->file,'a');
        fwrite($file, $txt);
        fclose($file);
    }
}