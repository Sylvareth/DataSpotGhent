<?php

class Application_Model_Parking
{
    
    protected $_parking_id;
    protected $_long;
    protected $_lat;
    protected $_distance;
    protected $_id;
    protected $_fid;
    protected $_nr;
    protected $_naam;
    protected $_createddate;
    
    public function __construct(array $values = null){
        foreach($values as $key => $value){
            $setter = 'set' . ucfirst($key);
            $this->{$setter}($value);
        }
    }
    
    public function getParking_id()
    {
        return $this->_parking_id;
    }
    
    public function setParking_id($parking_id)
    {
        $this->_parking_id = $parking_id;
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
    
    public function getNr()
    {
        return $this->_nr;
    }
    
    public function setNr_p($nr)
    {
        $this->_nr = $nr;
    }
    
    public function getNaam()
    {
        return $this->_naam;
    }
    
    public function setNaam($naam)
    {
        $this->_naam = $naam;
    }
    
    public function getCreateddate()
    {
        return $this->_createddate;
    }
    
    public function setCreateddate($createddate)
    {
        $this->_createddate = $createddate;
    }
}