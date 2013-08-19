<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initAutoload(){
        $moduleLoader = new Zend_Application_Module_Autoloader(array(
            'namespace' => '',
            'basePath' =>APPLICATION_PATH
        ));
        
        $autoloader = Zend_Loader_Autoloader::getInstance();
        $autoloader->registerNamespace(array('App_'));
        
        return $moduleLoader;
    }

    protected function _initViewHelpers(){
        //Zorgt ervoor dat de layout geladen is voordat de helpers worden geïnitialiseerd
        $this->bootstrap('layout');
        $view = $this->getResource('layout')->getView();
        
        //Set initial helpers
        $view->doctype('HTML5');
        
        $view->headMeta()
             ->setCharset('utf-8')
             ->appendName('viewport','width=device-width, initial-scale=1.0'); //name, content
        
        $view->headTitle('Dataspot Ghent');
        
        $view->headLink()
             ->appendStylesheet($view->baseUrl('_styles/reset.css'))
             ->appendStylesheet($view->baseUrl('_styles/jquery.mobile-1.3.1.css'))
             ->appendStylesheet($view->baseUrl('_styles/bootstrap.min.css'))
             ->appendStylesheet($view->baseUrl('_styles/main.less'), 'screen', true, array('rel' => 'stylesheet/less'));
        
        $view->headScript()
             ->appendFile($view->baseUrl('_scripts/lib/jquery-1.10.2.min.js'))
             ->appendFile($view->baseUrl('_scripts/lib/bootstrap.min.js'))
             ->appendFile($view->baseUrl('_scripts/lib/jquery.mobile-1.3.1.min.js'))
             ->appendFile('http://maps.googleapis.com/maps/api/js?key=AIzaSyBhvrjN0Qel85m8tyVH1h_WCqoGnyRzDVk&sensor=true')
             ->appendFile($view->baseUrl('_scripts/lib/jquery.ui.map.min.js'))
             ->appendFile($view->baseUrl('_scripts/main.js'));
        
        $view->inlineScript()
             //->appendFile($view->baseUrl('_scripts/redirect-fix.js'))
             ->appendFile($view->baseUrl('_scripts/less-config.js'))
             ->appendFile($view->baseUrl('_scripts/lib/less-1.4.1.min.js'));
    }
    
    // Custom Helpers
    protected function _initMyActionHelpers(){
        $this->bootstrap('frontController');
        $login = Zend_Controller_Action_HelperBroker::getStaticHelper('Login');
        Zend_Controller_Action_HelperBroker::addHelper($login);
    }
    
    // Navigation Init
    protected function _initNavigation(){
        $this->bootstrap('layout');
        $view = $this->getResource('layout')->getView();
        
        $config = new Zend_Config_Xml(APPLICATION_PATH . '/configs/navigation.xml', 'nav');
        $nav = new Zend_Navigation($config);
        $view->navigation($nav);
    }
    
    
}

