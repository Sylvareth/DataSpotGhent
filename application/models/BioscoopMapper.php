<?php

class Application_Model_BioscoopMapper 
{
    
    protected $_dbTable;
    
    public function __construct() {
        $this->_dbTable = new Application_Model_DbTable_Bioscopen();
    }
    
    public function saveBioscopen(Application_Model_Bioscoop $bioscoop)
    {
        $data = array(
            'long'          => $bioscoop->getLong(),
            'lat'           => $bioscoop->getLat(),
            'distance'      => $bioscoop->getDistance(),
            'id'            => $bioscoop->getId(),
            'fid'           => $bioscoop->getFid(),
            'et_id'         => $bioscoop->getEt_Id(),
            'naam'          => $bioscoop->getNaam(),
            'ligging'       => $bioscoop->getLigging(),
            'object_id'     => $bioscoop->getObjectId(),
            'area'          => $bioscoop->getArea(),
            'len'           => $bioscoop->getLen(),
            'modifieddate'  => $bioscoop->getModifiedDate()
        );
            
        if(null === $bioscoop->getBioscoop_id()){
            $this->_dbTable->insert($data);
        } else {
            $where = $this->_dbTable->getAdapter()->quoteInto('bioscoop_id = ?', $bioscoop->getBioscoop_id());
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