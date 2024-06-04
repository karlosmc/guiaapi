<?php
namespace Models\Sender;

class RequestSign
{

    public $CertificadoDigital;
    public $PasswordCertificado;
    public $TramaXmlSinFirma;
      

    /**
     * Get the value of CertificadoDigital
     */ 
    public function getCertificadoDigital()
    {
        return $this->CertificadoDigital;
    }

    /**
     * Set the value of CertificadoDigital
     *
     * @return  self
     */ 
    public function setCertificadoDigital($CertificadoDigital)
    {
        $this->CertificadoDigital = $CertificadoDigital;

        return $this;
    }

    /**
     * Get the value of PasswordCertificado
     */ 
    public function getPasswordCertificado()
    {
        return $this->PasswordCertificado;
    }

    /**
     * Set the value of PasswordCertificado
     *
     * @return  self
     */ 
    public function setPasswordCertificado($PasswordCertificado)
    {
        $this->PasswordCertificado = $PasswordCertificado;

        return $this;
    }

    /**
     * Get the value of TramaXmlSinFirma
     */ 
    public function getTramaXmlSinFirma()
    {
        return $this->TramaXmlSinFirma;
    }

    /**
     * Set the value of TramaXmlSinFirma
     *
     * @return  self
     */ 
    public function setTramaXmlSinFirma($TramaXmlSinFirma)
    {
        $this->TramaXmlSinFirma = $TramaXmlSinFirma;

        return $this;
    }
}