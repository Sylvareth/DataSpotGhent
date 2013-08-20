<?php

class Application_Model_Dataset 
{
    /**
     * Dataset ID
     * 
     * @var int 
     */
    protected $_id;
    
    /**
     * Dataset URL
     * 
     * @var string 
     */
    protected $_url;
    
    /**
     * Dataset Value
     * 
     * @var json string 
     */
    protected $_value;
    
    /**
     * Dataset Updateddate
     * 
     * @var datetime 
     */
    protected $_updateddate;
    
    /** 
     * @param array $values 
     */
    public function __construct(array $values = null){
        foreach($values as $key => $value){
            $setter = 'set' . ucfirst($key);
            $this->{$setter}($value);
        }
    }
    
    /**
     * @return int
     */
    public function getDataset_id(){
        return $this->_id;
    }
    
    /**
     * @param int $id 
     */
    public function setDataset_id($id){
        $this->_id = $id;
    }
    
    /**
     * @return string
     */
    public function getDataset_url(){
        return $this->_url;
    }
    
    /**
     * @param string $url 
     */
    public function setDataset_url($url){
        $this->_url = $url;
    }
    
    /**
     * @return json string
     */
    public function getDataset_value(){
        return $this->_value;
    }
    
    /**
     * @param json string $value 
     */
    public function setDataset_value($value){
        $this->_value = $value;
    }
    
    /**
     * @return datetime 
     */
    public function getDataset_updateddate(){
        return $this->_updateddate;
    }
    
    /**
     * @param datetime $updateddate 
     */
    public function setDataset_updateddate($updateddate){
        $this->_updateddate = $updateddate;
    }
}