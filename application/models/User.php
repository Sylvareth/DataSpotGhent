<?php

class Application_Model_User
{

    /**
     * User Id
     * 
     * @var int 
     */
    protected $_id;
    
    /**
     * User Firstname
     * 
     * @var string 
     */
    protected $_firstname;
    
    /**
     * User Lastname
     * 
     * @var string 
     */
    protected $_lastname;
    
    /**
     * User Email
     * 
     * @var string 
     */
    protected $_email;
    
    /**
     * User Username
     * 
     * @var string 
     */
    protected $_username;
    
    /**
     * User Password
     * 
     * @var string 
     */
    protected $_password;
    
    /** 
     * @param array $values 
     */
    public function __construct(array $values = null){
        foreach($values as $key => $value){
            $setter = 'set' . ucfirst($key);
            $this->{$setter}($value);
        }
    }
    
    /**
     * @return int 
     */
    public function getUser_id(){
        return $this->_id;
    }
    
    /**
     * @param int $id 
     */
    public function setUser_id($id){
        $this->_id = $id;
    }
    
    /**
     * @return string 
     */
    public function getUser_firstname(){
        return $this->_firstname;
    }
    
    /**
     * @param string $firstname 
     */
    public function setUser_firstname($firstname){
        $this->_firstname = $firstname;
    }
    
    /**
     * @return string 
     */
    public function getUser_lastname(){
        return $this->_lastname;
    }
    
    /**
     * @param string $lastname 
     */
    public function setUser_lastname($lastname){
        $this->_lastname = $lastname;
    }
    
    /**
     * @return string 
     */
    public function getUser_email(){
        return $this->_email;
    }
    
    /**
     * @param string $email 
     */
    public function setUser_email($email){
        $this->_email = $email;
    }
    
    /**
     * @return string 
     */
    public function getUser_username(){
        return $this->_username;
    }
    
    /**
     * @param string $username 
     */
    public function setUser_username($username){
        $this->_username = $username;
    }
    
    /**
     * @return string 
     */
    public function getUser_password(){
        return $this->_password;
    }
    
    /**
     * @param string $password 
     */
    public function setUser_password($password){
        $this->_password = $password;
    }
    
    /**
     * Setter for password form field that hashes the password string
     * 
     * @param string $password 
     */
    public function setUser_passwordraw($password){
        $this->_password = App_Utility_Hash::hash($password);
    }
    
    /**
     * Dummy setter for passwordrepeat form field
     * 
     * @param type $password 
     */
    public function setPasswordconfirm($password){
        // Do nothing
    }

}

