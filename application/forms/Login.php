<?php

class Application_Form_Login extends Zend_Form
{
    
    public function init()
    {
        $user_username = new Zend_Form_Element_Text('user_username');
        $user_username->setLabel('Gebruikersnaam: ')
                      ->setRequired(true)
                      ->addFilters(array(
                          'StringTrim'
                      ))
                      ->addValidators(array(
                          array('notEmpty', true, array('messages' => 'Geef uw gebruikersnaam in.')),
                          array('db_RecordExists', true, array('table' => 'users', 'field' => 'user_username', 'messages' => 'Verkeerde gebruikersnaam.'))
                      ));
        
        $user_password = new Zend_Form_Element_Password('user_password');
        $user_password->setLabel('Wachtwoord: ')
                      ->setRequired(true)
                      ->addFilters(array(
                          'StringTrim'
                      ))
                      ->addValidators(array(
                          array('notEmpty', true, array('messages' => 'Geef uw wachtwoord in.'))
                      ));
        
        $login_submit = new Zend_Form_Element_Submit('login');
        $login_submit->setLabel('Inloggen')
                     ->setIgnore(true)
                     ->removeDecorator('DtDdWrapper')
                     ->setAttribs(array(
                         'data-inline' => 'true'
                         
                     ));
        
//        $register_button = new Zend_Form_Element_Button('register');
//        $register_button->setLabel('Registreren')
//                        ->setIgnore(true)
//                        ->removeDecorator('DtDdWrapper')
//                        ->setAttrib('onClick', 'document.location =\''.$this->getView()->url(array('controller'=>'auth','action'=>'register')).'\' ')
        
        $this->setMethod('post')
             ->setAction('')
             ->setAttrib('class', 'login-form')
             ->setAttrib('data-ajax', 'false')
             ->addElements(array(
                 $user_username,
                 $user_password,
                 $login_submit
             ));
    }

}