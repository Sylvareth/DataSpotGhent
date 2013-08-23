<?php

class Application_Model_Basisschool 
{
    
    protected $_basisschool_id;
    protected $_long;
    protected $_lat;
    protected $_distance;
    protected $_id;
    protected $_fid;
    protected $_straat;
    protected $_roepnaam;
    protected $_aanbod;
    protected $_net;
    protected $_modifieddate;
    
    public function __construct(array $values = null){
        foreach($values as $key => $value){
            $setter = 'set' . ucfirst($key);
            $this->{$setter}($value);
        }
    }
    
    public function getBasisschool_id()
    {
        return $this->_basisschool_id;
    }
    
    public function setBasisschool_id($basisschool_id)
    {
        $this->_basisschool_id = $basisschool_id;
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
    
    public function getStraat()
    {
        return $this->_straat;
    }
    
    public function setStraat($straat)
    {
        $this->_straat = $straat;
    }
    
    public function getRoepnaam()
    {
        return $this->_roepnaam;
    }
    
    public function setRoepnaam($roepnaam)
    {
        $this->_roepnaam = $roepnaam;
    }
    
    public function getAanbod()
    {
        return $this->_aanbod;
    }
    
    public function setAanbod($aanbod)
    {
        $this->_aanbod = $aanbod;
    }
    
    public function getNet()
    {
        return $this->_net;
    }
    
    public function setNet($net)
    {
        $this->_net = $net;
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