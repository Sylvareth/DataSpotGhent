<?php

class Application_Model_ZiekenhuisMapper
{
    
    protected $_dbTable;
    
    public function __construct() {
        $this->_dbTable = new Application_Model_DbTable_Ziekenhuizen();
    }
    
    public function saveZiekenhuizen(Application_Model_Ziekenhuis $ziekenhuis)
    {
        $data = array(
            'long'          => $ziekenhuis->getLong(),
            'lat'           => $ziekenhuis->getLat(),
            'distance'      => $ziekenhuis->getDistance(),
            'id'            => $ziekenhuis->getId(),
            'fid'           => $ziekenhuis->getFid(),
            'naam'          => $ziekenhuis->getNaam(),
            'straat'        => $ziekenhuis->getStraat(),
            'nr'            => $ziekenhuis->getNr(),
            'postcode'      => $ziekenhuis->getPostcode(),
            'gemeente'      => $ziekenhuis->getGemeente(),
            'object_id'     => $ziekenhuis->getObjectId(),
            'area'          => $ziekenhuis->getArea(),
            'len'           => $ziekenhuis->getLen(),
            'modifieddate'  => $ziekenhuis->getModifiedDate()
        );
            
        if(null === $ziekenhuis->getZiekenhuis_id()){
            $this->_dbTable->insert($data);
        } else {
            $where = $this->_dbTable->getAdapter()->quoteInto('ziekenhuis_id = ?', $ziekenhuis->getZiekenhuis_id());
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