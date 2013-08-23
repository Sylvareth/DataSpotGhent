<?php

class Application_Model_StationMapper 
{
    
    protected $_dbTable;
    
    public function __construct() {
        $this->_dbTable = new Application_Model_DbTable_Stations();
    }
    
    public function saveStations(Application_Model_Station $station)
    {
        $data = array(
            'long'          => $station->getLong(),
            'lat'           => $station->getLat(),
            'distance'      => $station->getDistance(),
            'id'            => $station->getId(),
            'fid'           => $station->getFid(),
            'naam'          => $station->getNaam(),
            'objectid'      => $station->getObjectId(),
            'area'          => $station->getArea(),
            'len'           => $station->getLen(),
            'modifieddate'  => $station->getModifiedDate()
        );
            
        

        
        if(null === $station->getStation_id()){
            $this->_dbTable->insert($data);
        } else {
            $where = $this->_dbTable->getAdapter()->quoteInto('station_id = ?', $station->getStation_id());
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