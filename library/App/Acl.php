<?php

class App_Acl extends Zend_Acl
{
    
    public function __construct() {
        // Roles
        $this->addRole(new Zend_Acl_Role(App_Roles::GUEST));
        $this->addRole(new Zend_Acl_Role(App_Roles::USER), App_Roles::GUEST);
        $this->addRole(new Zend_Acl_Role(App_Roles::ADMIN), App_Roles::USER);
        
        // Resources
        $this->add(new Zend_Acl_Resource(App_Resources::PUBLICPAGE));
        $this->add(new Zend_Acl_Resource(App_Resources::ERROR));
        $this->add(new Zend_Acl_Resource(App_Resources::AUTH));
        $this->add(new Zend_Acl_Resource(App_Resources::ADMIN));
        
        // Access
        $this->allow(App_Roles::GUEST, App_Resources::PUBLICPAGE);
        $this->allow(App_Roles::GUEST, App_Resources::ERROR);
        $this->allow(App_Roles::GUEST, App_Resources::AUTH, App_Privileges::REGISTER);
        $this->allow(App_Roles::USER, App_Resources::AUTH);
        $this->allow(App_Roles::ADMIN, App_Resources::ADMIN);
        
        $this->deny(App_Roles::GUEST, App_Resources::AUTH, App_Privileges::PROFILE);
        $this->deny(App_Roles::GUEST, App_Resources::AUTH, App_Privileges::LOGOUT);
    }
    
}
