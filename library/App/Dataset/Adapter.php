<?php

class App_Dataset_Adapter 
{
    
    private $_db = null;
    
    public function __construct() 
    {
        
        if ($this->_db == null) 
        {
            $_db = $this->_getInstance();
        }
        
    }
    
    public function _connect()
    {
        
        return $this->_db;
        
    }
    
    private function _getInstance()
    {
        
        $frontController = Zend_Controller_Front::getInstance();
        $config = new Zend_Config($frontController->getParam('bootstrap')->getOptions(), true);
        
        // Get DB params for connection
        $resources = $config->get('resources', false);
        $data = $resources->db->params;
        $params = array(
            'host'      => $data->host,
            'username'  => $data->username,
            'password'  =>$data->password,
            'dbname'    =>$data->dbname
        );
        
        $this->_db = Zend_Db::factory($resources->db->adapter, $params);
        
    }
    
}