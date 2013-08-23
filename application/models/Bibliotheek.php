<?php

class Application_Model_Bibliotheek 
{
    
    protected $_bibliotheek_id;
    protected $_long;
    protected $_lat;
    protected $_distance;
    protected $_id;
    protected $_fid;
    protected $_locatie;
    protected $_afdeling;
    protected $_codefilia;
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
    
    public function getBibliotheek_id()
    {
        return $this->_bibliotheek_id;
    }
    
    public function setBibliotheek_id($bibliotheek_id)
    {
        $this->_bibliotheek_id = $bibliotheek_id;
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
    
    public function getLocatie()
    {
        return $this->_locatie;
    }
    
    public function setLocatie($locatie)
    {
        $this->_locatie = $locatie;
    }
    
    public function getAfdeling()
    {
        return $this->_afdeling;
    }
    
    public function setAfdeling($afdeling)
    {
        $this->_afdeling = $afdeling;
    }
    
    public function getCodeFilia()
    {
        return $this->_codefilia;
    }
    
    public function setCode_Filia($codefilia)
    {
        $this->_codefilia = $codefilia;
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