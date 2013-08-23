<?php

class Application_Model_DierenartsMapper 
{
    
    protected $_dbTable;
    
    public function __construct() {
        $this->_dbTable = new Application_Model_DbTable_Dierenartsen();
    }
    
    public function saveDierenartsen(Application_Model_Dierenarts $dierenarts)
    {
        $data = array(
            'long'          => $dierenarts->getLong(),
            'lat'           => $dierenarts->getLat(),
            'distance'      => $dierenarts->getDistance(),
            'id'            => $dierenarts->getId(),
            'fid'           => $dierenarts->getFid(),
            'naam'          => $dierenarts->getNaam(),
            'adres'         => $dierenarts->getAdres(),
            'huisnr'        => $dierenarts->getHuisnr(),
            'postcode'      => $dierenarts->getPostcode(),
            'gemeente'      => $dierenarts->getGemeente(),
            'modifieddate'  => $dierenarts->getModifiedDate()
        );
            
        if(null === $dierenarts->getDierenarts_id()){
            $this->_dbTable->insert($data);
        } else {
            $where = $this->_dbTable->getAdapter()->quoteInto('dierenarts_id = ?', $dierenarts->getDierenarts_id());
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