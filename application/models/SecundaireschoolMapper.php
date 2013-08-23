<?php

class Application_Model_SecundaireschoolMapper 
{
    
    protected $_dbTable;
    
    public function __construct() {
        $this->_dbTable = new Application_Model_DbTable_Secundairescholen();
    }
    
    public function saveSecundairescholen(Application_Model_Secundaireschool $secundaireschool)
    {
        $data = array(
            'long'          => $secundaireschool->getLong(),
            'lat'           => $secundaireschool->getLat(),
            'distance'      => $secundaireschool->getDistance(),
            'id'            => $secundaireschool->getId(),
            'fid'           => $secundaireschool->getFid(),
            'adres'         => $secundaireschool->getAdres(),
            'zetel'         => $secundaireschool->getZetel(),
            'naam'          => $secundaireschool->getNaam(),
            'straat'        => $secundaireschool->getStraat(),
            'huisnummer'    => $secundaireschool->getHuisnummer(),
            'postcode'      => $secundaireschool->getPostcode(),
            'gemeente'      => $secundaireschool->getGemeente(),
            'methode'       => $secundaireschool->getMethode(),
            'schoolnr'      => $secundaireschool->getSchoolnr(),
            'type'          => $secundaireschool->getType(),
            'modifieddate'  => $secundaireschool->getModifiedDate()
        );
            
        if(null === $secundaireschool->getSecundaireschool_id()){
            $this->_dbTable->insert($data);
        } else {
            $where = $this->_dbTable->getAdapter()->quoteInto('secundaireschool_id = ?', $secundaireschool->getSecundaireschool_id());
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