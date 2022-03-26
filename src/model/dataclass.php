<?php

class dataclass
{
    private $postcode;
    private $dateincident;
    private $streetname;
    private $issuereported;
    private $subcat;


    public function __construct($Postcode, $Dateincident, $Streetname, $Issuereported, $Subcat)
    {
        $this->postcode = $Postcode;
        $this->dateincident = $Dateincident;
        $this->streetname = $Streetname;
        $this->issuereported = $Issuereported;
        $this->subcat = $Subcat;

    }

    public function Postcode()
    {
        return $this->postcode;
    }
    public function Dateincident()
    {
        return $this->dateincident;
    }
    public function Streetname()
    {
        return $this->streetname;
    }
    public function Issuereported()
    {
        return $this->issuereported;
    }
    public function Subcat()
    {
        return $this->subcat;
    }
}