<?php

class Application_Model_UserMapper
{

    protected $_dbTable;
    
    public function __construct(){
        $this->_dbTable = new Application_Model_DbTable_User();
    }
    
    /**
     * @param Application_Model_User $user 
     */
    public function saveUser(Application_Model_User $user){
        $data = array(
            'user_firstname'    => $user->getUser_firstname(),
            'user_lastname'     => $user->getUser_lastname(),
            'user_email'        => $user->getUser_email(),
            'user_username'     => $user->getUser_username(),
            'user_password'     => $user->getUser_password()
        );
        
        if(null === $user->getUser_id()){
            $this->_dbTable->insert($data);
        } else{
            //$data['user_id'] = $user->getId();
            $where = $this->_dbTable->getAdapter()->quoteInto('user_id = ?', $user->getUser_id());
            //Zend_Debug::dump($where);
            $this->_dbTable->update($data, $where);
        }
    }
    
    /**
     * Array keys have same names as form names! (populate)
     * 
     * @param int $id
     * @return array
     * @throws Exception 
     */
    public function readUser($id){
        $select = $this->_dbTable->select()
                                 ->from($this->_dbTable,
                                         array(
                                             'user_id'           => 'user_id',
                                             'user_firstname'    => 'user_firstname',
                                             'user_lastname'     => 'user_lastname',
                                             'user_email'        => 'user_email',
                                             'user_username'     => 'user_username',
                                             'user_password'     => 'user_password'
                                 )       )
                                 ->where('user_id = :id')
                                 ->bind(array(':id' => $id));
        
        if($row = $this->_dbTable->fetchRow($select)){
            return $row->toArray();
        } else {
            throw new Exception('Authentication failed!');
        }
    }
    
    /**
     * @return array 
     */
    public function fetchAll(){
        $rowset = $this->_dbTable->fetchAll();
        
        $users = $this->_toObjects($rowset);
        
        return $users;
    }
    
    /**
     * Convert row to object
     * 
     * @param Zend_Db_Table_Row_Abstract $row
     * @return Application_Model_User 
     */
    protected function _toObject(Zend_Db_Table_Row_Abstract $row = null){
        $values = array();
        
        if($row){
            $values['id'] = $row['user_id'];
            $values['username'] = $row['user_username'];
        }
        
        return $user = new Application_Model_User($values);
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