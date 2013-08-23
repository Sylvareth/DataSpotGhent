<?php

class Application_Model_Dierenarts 
{
    
    protected $_dierenarts_id;
    protected $_long;
    protected $_lat;
    protected $_distance;
    protected $_id;
    protected $_fid;
    protected $_naam;
    protected $_adres;
    protected $_huisnr;
    protected $_postcode;
    protected $_gemeente;
    protected $_modifieddate;
    
    public function __construct(array $values = null){
        foreach($values as $key => $value){
            $setter = 'set' . ucfirst($key);
            $this->{$setter}($value);
        }
    }
    
    public function getDierenarts_id()
    {
        return $this->_dierenarts_id;
    }
    
    public function setDierenarts_id($dierenarts_id)
    {
        $this->_dierenarts_id = $dierenarts_id;
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
    
    public function getNaam()
    {
        return $this->_naam;
    }
    
    public function setNaam($naam)
    {
        $this->_naam = $naam;
    }
    
    public function getAdres()
    {
        return $this->_adres;
    }
    
    public function setAdres($adres)
    {
        $this->_adres = $adres;
    }
    
    public function getHuisnr()
    {
        return $this->_huisnr;
    }
    
    public function setHuisnr($huisnr)
    {
        $this->_huisnr = $huisnr;
    }
    
    public function getModifiedDate()
    {
        return $this->_modifieddate;
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
    
    public function setModifiedDate($modifieddate)
    {
        $this->_modifieddate = $modifieddate;
    }
    
}