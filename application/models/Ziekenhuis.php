<?php

class Application_Model_Ziekenhuis 
{
    
    protected $_ziekenhuis_id;
    protected $_long;
    protected $_lat;
    protected $_distance;
    protected $_id;
    protected $_fid;
    protected $_naam;
    protected $_straat;
    protected $_nr;
    protected $_postcode;
    protected $_gemeente;
    protected $_objectid;
    protected $_area;
    protected $_len;
    protected $_modifieddate;
    
    public function __construct(array $values = null){
        foreach($values as $key => $value){
            $setter = 'set' . ucfirst($key);
            $this->{$setter}($value);
        }
    }
    
    public function getZiekenhuis_id()
    {
        return $this->_ziekenhuis_id;
    }
    
    public function setZiekenhuis_id($ziekenhuis_id)
    {
        $this->_ziekenhuis_id = $ziekenhuis_id;
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
    
    public function getStraat()
    {
        return $this->_straat;
    }
    
    public function setStraat($straat)
    {
        $this->_straat = $straat;
    }
    
    public function getNr()
    {
        return $this->_nr;
    }
    
    public function setNr($nr)
    {
        $this->_nr = $nr;
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
    
    public function getObjectId()
    {
        return $this->_objectid;
    }
    
    public function setObjectId($objectid)
    {
        $this->_objectid = $objectid;
    }
    
    public function getArea()
    {
        return $this->_area;
    }
    
    public function setArea($area)
    {
        $this->_area = $area;
    }
    
    public function getLen()
    {
        return $this->_len;
    }
    
    public function setLen($len)
    {
        $this->_len = $len;
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