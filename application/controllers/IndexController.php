<?php

class IndexController extends Zend_Controller_Action
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
        //$this->view->current_date_and_time = date('M d, Y - H:i:s');
        //$form = new Application_Form_Register();
        //$users = new Application_Model_DbTable_User();
        //$this->view->users = $users->fetchAll();
    }

    public function datagraphAction()
    {
        if(!$this->_auth->hasIdentity()){
            $this->redirect('default/index/login');
        } 
    }

    public function overAction()
    {
        // action body
    }

    public function loginAction()
    {
        // action body
    }

}





