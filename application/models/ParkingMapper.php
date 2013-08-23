<?php

class Application_Model_ParkingMapper 
{
    
    protected $_dbTable;
    
    public function __construct() {
        $this->_dbTable = new Application_Model_DbTable_Parkings();
    }
    
    public function saveParkings(Application_Model_Parking $parking)
    {
        $data = array(
            'long'          => $parking->getLong(),
            'lat'           => $parking->getLat(),
            'distance'      => $parking->getDistance(),
            'id'            => $parking->getId(),
            'fid'           => $parking->getFid(),
            'nr'            => $parking->getNr(),
            'naam'          => $parking->getNaam(),
            'createddate'   => $parking->getCreateddate()
        );
            
        // Zend_Debug::dump($data);exit();

        
        if(null === $parking->getParking_id()){
            $this->_dbTable->insert($data);
        } else {
            $where = $this->_dbTable->getAdapter()->quoteInto('parking_id = ?', $parking->getParking_id());
            $this->_dbTable->update($data, $where);
        }
    }
    
    public function fetchAll(){
        $rowset = $this->_dbTable->fetchAll();
        
        //$parkings = $this->_toObjects($rowset);
        
        return $rowset->toArray();;
    }
    
    
    /**
     * Convert row to object
     * 
     * @param Zend_Db_Table_Row_Abstract $row
     * @return Application_Model_Dataset 
     */
    protected function _toObject(Zend_Db_Table_Row_Abstract $row = null){
        $values = array();
        
        if($row){
            $values['id'            ] = $row['parking_id'   ];
            $values['long'          ] = $row['long'         ];
            $values['lat'           ] = $row['lat'          ];
            $values['distance'      ] = $row['distance'     ];
            $values['id'            ] = $row['id'           ];
            $values['fid'           ] = $row['fid'          ];
            $values['nr_p'          ] = $row['nr'           ];
            $values['naam'          ] = $row['naam'         ];
            $values['createddate'   ] = $row['createddate'  ];
        }
        
        return $parking = new Application_Model_Parking($values);
    }
    
    /**
     * Convert rowset to array of objects
     * 
     * @param Zend_Db_Table_Rowset_Abstract $rowset
     * @return array
     */
    protected function _toObjects(Zend_Db_Table_Rowset_Abstract $rowset = null){
        $objects = array();
        
        if($rowset){
            foreach($rowset as $row){
                $objects[] = $this->_toObject($row);
            }
        }
        
        return $objects;
    }
    
    // TRUNCATE DATASET TITLE FOR ROW ID
    public function truncate(){
        $table = $this->_dbTable;
        if ($this->_dbTable->getAdapter()->query('TRUNCATE TABLE '.$this->_dbTable->info(Zend_Db_Table::NAME))) {
           return true;
        }
        
    }
    
}