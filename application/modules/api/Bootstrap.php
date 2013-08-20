<?php

class Api_Bootstrap extends Zend_Application_Module_Bootstrap
{
    
    public function _initREST()
    {
        $frontController = Zend_Controller_Front::getInstance();
        
        // Register the RestHandler plugin
        $frontController->registerPlugin(new REST_Controller_Plugin_RestHandler($frontController));
        
        // Add REST contextSwitch helper
        $contextSwitch = new REST_Controller_Action_Helper_ContextSwitch();
        Zend_Controller_Action_HelperBroker::addHelper($contextSwitch);
        
        // Add restContexts helper
        $restContexts = new REST_Controller_Action_Helper_RestContexts();
        Zend_Controller_Action_HelperBroker::addHelper($restContexts);
    }
    
}

