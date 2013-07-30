<?php

class Application_Form_Register extends Zend_Form
{

    public function init()
    {
        $user_firstname = new Zend_Form_Element_Text('user_firstname');
        $user_firstname->setLabel('Voornaam:*')
                       ->setRequired(true)
                       ->addValidators(array(
                           array('notEmpty', true, array('messages' => 'Dit is een verplicht veld.')),
                           array('stringLength', true, array('min' => 1, 'max' => 100, 'messages' => 'U kan maximum %max% tekens ingeven.'))
                       ));
        
        $user_lastname = new Zend_Form_Element_Text('user_lastname');
        $user_lastname->setLabel('Familienaam:*')
                      ->setRequired(true)
                      ->addValidators(array(
                          array('notEmpty', true, array('messages' => 'Dit is een verplicht veld.')),
                          array('stringLength', true, array('min' => 1, 'max' => 100, 'messages' => 'U kan maximum %max% tekens ingeven.'))
                      ));
        
        $user_email = new Zend_Form_Element_Text('user_email');
        $user_email->setLabel('E-mailadres:*')
                   ->setRequired(true)
                   ->addValidators(array(
                       array('notEmpty', true, array('messages' => 'Dit is een verplicht veld.')),
                       array('stringLength', true, array('min' => 1, 'max' => 255, 'messages' => 'U kan maximum %max% tekens ingeven.')),
                       array('emailAddress', true, array('messages' => 'Voer een geldig e-mailadres in.')),
                       array('db_NoRecordExists', true, array('table' => 'users', 'field' => 'user_email', 'messages' => 'Dit e-mailadres is al in gebruik.'))
                   ));
        
        $user_username = new Zend_Form_Element_Text('user_username');
        $user_username->setLabel('Gebruikersnaam:*')
                      ->setRequired(true)
                      ->addValidators(array(
                          array('notEmpty', true, array('messages' => 'Dit is een verplicht veld.')),
                          array('stringLength', true, array('min' => 1, 'max' => 100, 'messages' => 'Uw gebruikersnaam mag maximum %max% tekens bevatten.')),
                          array('alnum', true, array('messages' => 'Uw gebruikersnaam mag enkel uit alfabetische tekens en cijfers bestaan.')),
                          array('db_NoRecordExists', true, array('table' => 'users', 'field' => 'user_username', 'messages' => 'Deze gebruikersnaam bestaat al.'))
                      ));
        
        $user_password = new Zend_Form_Element_Password('user_password');
        $user_password->setLabel('Wachtwoord:*')
                      ->setRequired(true)
                      ->addFilter('StringTrim')
                      ->addValidators(array(
                          array('notEmpty', true, array('messages' => 'Dit is een verplicht veld.')),
                          array('stringLength', true, array('min' => 6, 'max' => 16, 'messages' => 'Uw wachtwoord moet %min% tot %max% tekens bevatten.'))
                      ));
        
        $user_password_confirm = new Zend_Form_Element_Password('passwordconfirm');
        $user_password_confirm->setLabel('Wachtwoord Herhalen:*')
                              ->setRequired(true)
                              ->addFilter('StringTrim')
                              ->addValidators(array(
                                  array('notEmpty', true, array('messages' => 'Dit is een verplicht veld.')),
                                  array('identical', true, array('token' => 'user_password', 'messages' => 'De ingevoerde wachtwoorden zijn niet gelijk.'))
                              ));
        
        $register_submit = new Zend_Form_Element_Submit('register');
        $register_submit->setLabel('Registreren')
                        ->setIgnore(true)
                        ->removeDecorator('DtDdWrapper'); //Ignores value when retrieving form values on form level.
        
        $this->setMethod('post')
             ->setAction('')
             ->setAttrib('id', 'reg-form')
             ->setAttrib('data-ajax', 'false')
             ->addElements(array(
                 $user_firstname,
                 $user_lastname,
                 $user_email,
                 $user_username,
                 $user_password,
                 $user_password_confirm,
                 $register_submit
             ));
    }
    
    public function _highlightErrors(){
        foreach($this->getElements() as $element){
            if($element->hasErrors()){
                $element->setAttrib('class', 'error-field');
            }
        }
    }
    
}