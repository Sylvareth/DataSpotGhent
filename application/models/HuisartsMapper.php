<?php

class Application_Model_HuisartsMapper
{
    
    protected $_dbTable;
    
    public function __construct() {
        $this->_dbTable = new Application_Model_DbTable_Huisartsen();
    }
    
    public function saveHuisartsen(Application_Model_Huisarts $huisarts)
    {
        $data = array(
            'long'          => $huisarts->getLong(),
            'lat'           => $huisarts->getLat(),
            'distance'      => $huisarts->getDistance(),
            'id'            => $huisarts->getId(),
            'fid'           => $huisarts->getFid(),
            'idnr09'        => $huisarts->getIdnr09(),
            'naam'          => $huisarts->getNaam(),
            'voornaam'      => $huisarts->getVoornaam(),
            'adres'         => $huisarts->getAdres(),
            'postcode'      => $huisarts->getPostcode(),
            'gemeente'      => $huisarts->getGemeente(),
            'praktijk'      => $huisarts->getPraktijk(),
            'geslacht'      => $huisarts->getGeslacht(),
            'modifieddate'  => $huisarts->getModifiedDate()
        );
            
        if(null === $huisarts->getHuisarts_id()){
            $this->_dbTable->insert($data);
        } else {
            $where = $this->_dbTable->getAdapter()->quoteInto('huisarts_id = ?', $huisarts->getHuisarts_id());
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