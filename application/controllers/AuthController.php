<?php

class AuthController extends Zend_Controller_Action
{

    /**
     * @var Zend_Auth 
     *
     */
    protected $_auth = null;
    
    public function init()
    {
        $this->_auth = Zend_Auth::getInstance();
    }

    public function indexAction()
    {
        /*$storage = new Zend_Auth_Storage_Session();
        $data = $storage->read();
        if(!data){
            $this->redirect('index');
        }
        $this->view->username = $data->username;
        $register = Application_Model_Register();
        $register->createUser(array(
            
        ));*/
    }
    
    public function registerAction()
    {
        $form = new Application_Form_Register();
        $this->view->form = $form;
        
        if(!empty($_POST['register'])){ //Make sure login form doesn't trigger registration validation
            
            $formData = $this->getRequest()->getPost();
            
            if($form->isValid($formData)){
                $user = new Application_Model_User();
                $user->setUser_firstname($formData['user_firstname']);
                $user->setUser_lastname($formData['user_lastname']);
                $user->setUser_email($formData['user_email']);
                $user->setUser_username($formData['user_username']);
                $user->setUser_passwordraw($formData['user_password']);
                
                Zend_Debug::dump($user);
                
                $userMapper = new Application_Model_UserMapper();
                $userId = $userMapper->saveUser($user);
                $user->setUser_id($userId);
                
                $this->_helper->redirector('index', 'index');
            } else{
                $form->populate($formData);
                $form->_highlightErrors();
            }
        }
        
    }
    
    public function logoutAction()
    {
        $this->_auth->clearIdentity();
        $this->_helper->redirector('index', 'index');
    }
    
}