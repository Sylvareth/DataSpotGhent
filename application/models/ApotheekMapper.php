<?php

class Application_Model_ApotheekMapper
{
    
    protected $_dbTable;
    
    public function __construct() {
        $this->_dbTable = new Application_Model_DbTable_Apotheken();
    }
    
    public function saveApotheken(Application_Model_Apotheek $apotheek)
    {
        $data = array(
            'long'          => $apotheek->getLong(),
            'lat'           => $apotheek->getLat(),
            'distance'      => $apotheek->getDistance(),
            'id'            => $apotheek->getId(),
            'fid'           => $apotheek->getFid(),
            'naam'          => $apotheek->getNaam(),
            'adres'         => $apotheek->getAdres(),
            'postcode'      => $apotheek->getPostcode(),
            'gemeente'      => $apotheek->getGemeente(),
            'modifieddate'  => $apotheek->getModifiedDate()
        );
            
        if(null === $apotheek->getApotheek_id()){
            $this->_dbTable->insert($data);
        } else {
            $where = $this->_dbTable->getAdapter()->quoteInto('apotheek_id = ?', $apotheek->getApotheek_id());
            $this->_dbTable->update($data, $where);
        }
    }
    
    public function fetchAll(){
        $rowset = $this->_dbTable->fetchAll();
                
        return $rowset->toArray();;
    }
    
    // TRUNCATE DATASET TITLE FOR ROW ID
    public function truncate(){
        $table = $this->_dbTable;
        if ($this->_dbTable->getAdapter()->query('TRUNCATE TABLE '.$this->_dbTable->info(Zend_Db_Table::NAME))) {
           return true;
        }
    }
    
}