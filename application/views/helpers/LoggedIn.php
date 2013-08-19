<?php

class Zend_View_Helper_LoggedIn extends Zend_View_Helper_Abstract
{
    
    public function loggedIn(){
        
        $auth = Zend_Auth::getInstance();
        
        if($auth->hasIdentity()){
            $user = $auth->getIdentity();
            $username = $user['username'];
            
            $logoutUrl = $this->view->url(array('controller'=>'auth', 'action' => 'logout'), null, true);
            $profileUrl = $this->view->url(array('controller'=>'profile', 'action' => 'index'), null, true);
            
            return '<div class="logged-in text-right"><p>Welkom <span>' . $username . '</span></p>
                    <a href="'.$logoutUrl.'" title="Uitloggen" data-role="button" data-ajax="false">Uitloggen</a>
                    <a href="'.$profileUrl .'" title="Profiel Bewerken" data-role="button">Profiel</a></div>';
        }
        
        return $this->view->loginForm;
        
        
        $request = Zend_Controller_Front::getInstance()->getRequest();
        $controller = $request->getControllerName();
        $action = $request->getActionName();
        
        if($controller == 'auth' && $action == 'profile'){
            $redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('Redirector');
            $redirector->gotoSimpleAndExit('index', 'index');
        }
        
    }
    
}

?>
