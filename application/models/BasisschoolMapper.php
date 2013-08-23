<?php

class Application_Model_BasisschoolMapper 
{
    
    protected $_dbTable;
    
    public function __construct() {
        $this->_dbTable = new Application_Model_DbTable_Basisscholen();
    }
    
    public function saveBasisscholen(Application_Model_Basisschool $basisschool)
    {
        $data = array(
            'long'          => $basisschool->getLong(),
            'lat'           => $basisschool->getLat(),
            'distance'      => $basisschool->getDistance(),
            'id'            => $basisschool->getId(),
            'fid'           => $basisschool->getFid(),
            'straat'        => $basisschool->getStraat(),
            'roepnaam'      => $basisschool->getRoepnaam(),
            'aanbod'        => $basisschool->getAanbod(),
            'net'           => $basisschool->getNet(),
            'modifieddate'  => $basisschool->getModifiedDate()
        );
            
        if(null === $basisschool->getBasisschool_id()){
            $this->_dbTable->insert($data);
        } else {
            $where = $this->_dbTable->getAdapter()->quoteInto('basisschool_id = ?', $basisschool->getBasisschool_id());
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