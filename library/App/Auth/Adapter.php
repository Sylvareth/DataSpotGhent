<?php
class App_Auth_Adapter extends Zend_Auth_Adapter_DbTable
{
    
    public function __construct($username, $password){
        parent::__construct();
        
        $this->setTableName('users')
             ->setIdentityColumn('user_username')
             ->setCredentialColumn('user_password')
             ->setIdentity($username)
             ->setCredential($password);
    }
    
}
