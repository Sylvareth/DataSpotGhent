<?php

class Application_Model_BibliotheekMapper 
{
    
    protected $_dbTable;
    
    public function __construct() {
        $this->_dbTable = new Application_Model_DbTable_Bibliotheken();
    }
    
    public function saveBibliotheken(Application_Model_Bibliotheek $bibliotheek)
    {
        $data = array(
            'long'          => $bibliotheek->getLong(),
            'lat'           => $bibliotheek->getLat(),
            'distance'      => $bibliotheek->getDistance(),
            'id'            => $bibliotheek->getId(),
            'fid'           => $bibliotheek->getFid(),
            'locatie'       => $bibliotheek->getLocatie(),
            'afdeling'      => $bibliotheek->getAfdeling(),
            'code_filia'    => $bibliotheek->getCodeFilia(),
            'object_id'     => $bibliotheek->getObjectId(),
            'area'          => $bibliotheek->getArea(),
            'len'           => $bibliotheek->getLen(),
            'modifieddate'  => $bibliotheek->getModifiedDate()
        );
            
        if(null === $bibliotheek->getBibliotheek_id()){
            $this->_dbTable->insert($data);
        } else {
            $where = $this->_dbTable->getAdapter()->quoteInto('bibliotheek_id = ?', $bibliotheek->getBibliotheek_id());
            $this->_dbTable->update($data, $where);
        }
    }
    
    // RETURN ALL ROWS
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