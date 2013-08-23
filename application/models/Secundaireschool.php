<?php

class Application_Model_Secundaireschool 
{
    
    protected $_secundaireschool_id;
    protected $_long;
    protected $_lat;
    protected $_distance;
    protected $_id;
    protected $_fid;
    protected $_adres;
    protected $_zetel;
    protected $_naam;
    protected $_straat;
    protected $_huisnummer;
    protected $_postcode;
    protected $_gemeente;
    protected $_methode;
    protected $_schoolnr;
    protected $_type;
    protected $_modifieddate;
    
    public function __construct(array $values = null){
        foreach($values as $key => $value){
            $setter = 'set' . ucfirst($key);
            $this->{$setter}($value);
        }
    }
    
    public function getSecundaireschool_id()
    {
        return $this->_secundaireschool_id;
    }
    
    public function setSecundaireschool_id($secundaireschool_id)
    {
        $this->_secundaireschool_id = $secundaireschool_id;
    }
    
    public function getLong()
    {
        return $this->_long;
    }
    
    public function setLong($long)
    {
        $this->_long = $long;
    }
    
    public function getLat()
    {
        return $this->_lat;
    }
    
    public function setLat($lat)
    {
        $this->_lat = $lat;
    }
    
    public function getDistance()
    {
        return $this->_distance;
    }
    
    public function setDistance($distance)
    {
        $this->_distance = $distance;
    }
    
    public function getId()
    {
        return $this->_id;
    }
    
    public function setId($id)
    {
        $this->_id = $id;
    }
    
    public function getFid()
    {
        return $this->_fid;
    }
    
    public function setFid($fid)
    {
        $this->_fid = $fid;
    }
    
    public function getAdres()
    {
        return $this->_adres;
    }
    
    public function setAdres($adres)
    {
        $this->_adres = $adres;
    }
    
    public function getZetel()
    {
        return $this->_zetel;
    }
    
    public function setZetel($zetel)
    {
        $this->_zetel = $zetel;
    }
    
    public function getNaam()
    {
        return $this->_naam;
    }
    
    public function setNaam($naam)
    {
        $this->_naam = $naam;
    }
    
    public function getStraat()
    {
        return $this->_straat;
    }
    
    public function setStraat($straat)
    {
        $this->_straat = $straat;
    }
    
    public function getHuisnummer()
    {
        return $this->_huisnummer;
    }
    
    public function setHuisnummer($huisnummer)
    {
        $this->_huisnummer = $huisnummer;
    }
    
    public function getPostcode()
    {
        return $this->_postcode;
    }
    
    public function setPostcode($postcode)
    {
        $this->_postcode = $postcode;
    }
    
    public function getGemeente()
    {
        return $this->_gemeente;
    }
    
    public function setGemeente($gemeente)
    {
        $this->_gemeente = $gemeente;
    }
    
    public function getMethode()
    {
        return $this->_methode;
    }
    
    public function setMethode($methode)
    {
        $this->_methode = $methode;
    }
    
    public function getSchoolnr()
    {
        return $this->_schoolnr;
    }
    
    public function setSchoolnr($schoolnr)
    {
        $this->_schoolnr = $schoolnr;
    }
    
    public function getType()
    {
        return $this->_type;
    }
    
    public function setType($type)
    {
        $this->_type = $type;
    }
    
    public function getModifiedDate()
    {
        return $this->_modifieddate;
    }
    
    public function setModifiedDate($modifieddate)
    {
        $this->_modifieddate = $modifieddate;
    }
    
}