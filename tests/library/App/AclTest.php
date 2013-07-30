<?php

class AclTest extends ControllerTestCase
{
    /**
     * Acl testing
     * 
     * @var App_Acl 
     */
    protected $acl;
    
    
    /**
     * Authenticator
     * 
     * @var App_Auth_Authenticator 
     */
    protected $auth;
    
    public function setUp(){
        parent::setUp();
        $this->acl = new App_Acl();
        $this->auth = new App_Auth_Authenticator();
    }
    
//    public function testAdminUserAccountAccess(){
//        $auth = new App_Auth_Authenticator();
//        $admin = $auth->getCredentials('admin', 'qwerty');
//        
//        $this->assertTrue($this->acl->isAllowed($admin->role, App_Resources::DATAGRAPH));
//        $this->assertTrue($this->acl->isAllowed($admin->role, App_Resources::ABOUT));
//        $this->assertTrue($this->acl->isAllowed($admin->role, App_Resources::PROFILE));
//        $this->assertTrue($this->acl->isAllowed($admin->role, App_Resources::PUBLICPAGE));
//    }
//    
//    public function testGuestUserAccountAccess(){
//        $user = $this->auth->getCredentials('John', 'Pass');
//        $this->assertFalse($this->acl->isAllowed($user->role, App_Resources::DATAGRAPH));
//        $this->assertTrue($this->acl->isAllowed($user->role, App_Resources::ABOUT));
//        $this->assertTrue($this->acl->isAllowed($user->role, App_Resources::PROFILE));
//        $this->assertFalse($this->acl->isAllowed($user->role, App_Resources::PUBLICPAGE));
//    }
//    
//    public function testAdminAccess(){
//        $this->assertTrue($this->acl->isAllowed(App_Roles::ADMIN, App_Resources::DATAGRAPH));
//        $this->assertTrue($this->acl->isAllowed(App_Roles::ADMIN, App_Resources::ABOUT));
//        $this->assertTrue($this->acl->isAllowed(App_Roles::ADMIN, App_Resources::PROFILE));
//        $this->assertTrue($this->acl->isAllowed(App_Roles::ADMIN, App_Resources::PUBLICPAGE));
//    }
    
    public function testGuestAccess(){
        $guest = App_Roles::GUEST;
        $this->assertFalse($this->acl->isAllowed($guest, App_Resources::ADMIN));
        $this->assertTrue($this->acl->isAllowed($guest, App_Resources::ERROR));
        $this->assertTrue($this->acl->isAllowed($guest, App_Resources::AUTH, App_Privileges::REGISTER));
        $this->assertTrue($this->acl->isAllowed($guest, App_Resources::PUBLICPAGE));
        $this->assertFalse($this->acl->isAllowed($guest, App_Resources::AUTH, App_Privileges::PROFILE));
        $this->assertFalse($this->acl->isAllowed($guest, App_Resources::AUTH, App_Privileges::LOGOUT));
    }
    
    public function testUserAccess(){
        $user = App_Roles::USER;
        $this->assertFalse($this->acl->isAllowed($user, App_Resources::ADMIN));
        $this->assertTrue($this->acl->isAllowed($user, App_Resources::ERROR));
        $this->assertTrue($this->acl->isAllowed($user, App_Resources::AUTH));
        $this->assertTrue($this->acl->isAllowed($user, App_Resources::PUBLICPAGE));
    }
    
}

?>
