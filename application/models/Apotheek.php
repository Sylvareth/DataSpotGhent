<?php

class Application_Model_Apotheek 
{
    
    protected $_apotheek_id;
    protected $_long;
    protected $_lat;
    protected $_distance;
    protected $_id;
    protected $_fid;
    protected $_naam;
    protected $_adres;
    protected $_postcode;
    protected $_gemeente;
    protected $_modifieddate;
    
    public function __construct(array $values = null){
        foreach($values as $key => $value){
            $setter = 'set' . ucfirst($key);
            $this->{$setter}($value);
        }
    }
    
    public function getApotheek_id()
    {
        return $this->_apotheek_id;
    }
    
    public function setApotheek_id($apotheek_id)
    {
        $this->_apotheek_id = $apotheek_id;
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
    
    public function getModifiedDate()
    {
        return $this->_modifieddate;
    }
    
    public function setModifiedDate($modifieddate)
    {
        $this->_modifieddate = $modifieddate;
    }
    
}