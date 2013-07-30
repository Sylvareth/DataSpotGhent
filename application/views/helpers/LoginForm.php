<?php

class Zend_View_Helper_LoginForm extends Zend_View_Helper_Abstract
{
    
    public function loginForm(Application_Form_Login $form){
        $html = $form->render();
        return $html;
    }
    
}

?>
