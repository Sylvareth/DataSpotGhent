<?php


class Application_Model_Bioscoop 
{
    
    protected $_bioscoop_id;
    protected $_long;
    protected $_lat;
    protected $_distance;
    protected $_id;
    protected $_fid;
    protected $_et_id;
    protected $_naam;
    protected $_ligging;
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
    
    public function getBioscoop_id()
    {
        return $this->_bioscoop_id;
    }
    
    public function setBioscoop_id($bioscoop_id)
    {
        $this->_bioscoop_id = $bioscoop_id;
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
    
    public function getEt_Id()
    {
        return $this->_et_id;
    }
    
    public function setEt_Id($et_id)
    {
        $this->_et_id = $et_id;
    }
    
    public function getNaam()
    {
        return $this->_naam;
    }
    
    public function setNaam($naam)
    {
        $this->_naam = $naam;
    }
    
    public function getLigging()
    {
        return $this->_ligging;
    }
    
    public function setLigging($ligging)
    {
        $this->_ligging = $ligging;
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