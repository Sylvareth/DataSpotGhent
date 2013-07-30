<?php

Class Application_Controller_Helper_Login extends Zend_Controller_Action_Helper_Abstract
{
    
    public function preDispatch() {
        
        $view = $this->getActionController()->view;
        $form = new Application_Form_Login();
        
        $request = $this->getActionController()->getRequest();
        $view->loginForm = $form;
        
        if(!empty($_POST['login'])){//Make sure registration form doesn't trigger login validation
            
            $formData = $this->getRequest()->getPost();

            if($form->isValid($formData)){
                
                $values = array();
                $values['user_username'] = $form->getValue('user_username');
                $values['user_password'] = App_Utility_Hash::hash($form->getValue('user_password'));
                                
                if($this->_processLogin($values)){
                    //AUTHENTICATED!!
                    //Retrieve redirector helper from action helperbroker to redirect from action helper
                    $redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('Redirector');
                    $redirector->gotoSimpleAndExit('index', 'index');
                }
            } 
        }
    }
    
    protected function _processLogin($values)
    {   
        $user = new Application_Model_User($values);
        
        // Get database adapter and check credentials
        $adapter = new App_Auth_Adapter($user->getUser_username(), $user->getUser_password());

        $_auth = Zend_Auth::getInstance();
        $result = $_auth->authenticate($adapter);
        
        $errorMessage = "";
        $view = $this->getActionController()->view;
        
        if ($result->isValid()) {
            $user_data = $adapter->getResultRowObject();
            
            $_auth->getStorage()->write(array('role'        => App_Roles::USER,
                                              'id'          => (int) $user_data->user_id,
                                              'username'    => (string) $user_data->user_username));
            return true;
        } else{
            switch ($result->getCode()) {
                case Zend_Auth_Result::FAILURE_IDENTITY_NOT_FOUND:
                    echo "Verkeerde gebruikersnaam.";
                    break;
                case Zend_Auth_Result::FAILURE_CREDENTIAL_INVALID:
                    $errorMessage = "Verkeerde gebruikersnaam / wachtwoord combinatie."; 
                    break;
                default:
                    echo "Verkeerde gebruikersnaam / wachtwoord combinatie.";
                    break;
            }
            $view->errorMessage = $errorMessage;
            return false;
        }
        
    }
}

?>
