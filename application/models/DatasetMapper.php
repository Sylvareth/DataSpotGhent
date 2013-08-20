<?php

class Application_Model_DatasetMapper 
{
    
    protected $_dbTable;
    
    public function __construct() {
        $this->_dbTable = new Application_Model_DbTable_Datasets;
    }
    
    /**
     * @param Application_Model_Dataset $dataset 
     */
    public function saveDataset(Application_Model_Dataset $dataset){
        $data = array(
            'dataset_url'           => $dataset->getDataset_url(),
            'dataset_value'         => $dataset->getDataset_value(),
            'dataset_updateddate'   => $dataset->getDataset_updateddate()
        );
        
        if(null === $dataset->getDataset_id()){
            $this->_dbTable->insert($data);
        } else {
            $where = $this->_dbTable->getAdapter()->quoteInto('dataset_id = ?', $dataset->getDataset_id());
            $this->_dbTable->update($data, $where);
        }
    }
    
    /**
     * @param int $id
     * @return array
     * @throws Exception 
     */
    public function readDataset($id){
        $select = $this->_dbTable->select()
                                 ->from($this->_dbTable,
                                         array(
                                             'dataset_url'          => 'dataset_url',
                                             'dataset_value'        => 'dataset_value',
                                             'dataset_updateddate'  => 'dataset_updateddate'
                                         )
                                 )
                                 ->where('dataset_id = :id')
                                 ->bind(array(':id' => $id));
        
        if($row = $this->_dbTable->fetchRow($select)){
            return $row->toArray();
        } else {
            throw new Exception('Dataset was not found.');
        }
    }
    
    /**
     * @return array 
     */
    public function fetchAll(){
        $rowset = $this->_dbTable->fetchAll();
        
        $datasets = $this->_toObjects($rowset);
        
        return $datasets;
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
            $values['id'] = $row['dataset_id'];
            $values['url'] = $row['dataset_url'];
            $values['value'] = $row['dataset_value'];
            $values['updateddate'] = $row['dataset_updateddate'];
        }
        
        return $dataset = new Application_Model_Dataset($values);
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
            
}