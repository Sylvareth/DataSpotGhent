<?php

class Application_Form_EmailChange extends Zend_Form
{
    
    public function init()
    {
        $user_email = new Zend_Form_Element_Text('user_email');
        $user_email->setLabel('Nieuw E-mailadres:*')
                   ->setRequired(true)
                   ->addValidators(array(
                       array('notEmpty', true, array('messages' => 'Dit is een verplicht veld.')),
                       array('stringLength', true, array('min' => 1, 'max' => 255, 'messages' => 'U kan maximum %max% tekens ingeven.')),
                       array('emailAddress', true, array('messages' => 'Voer een geldig e-mailadres in.')),
                       array('db_NoRecordExists', true, array('table' => 'users', 'field' => 'user_email', 'messages' => 'Dit e-mailadres is al in gebruik.'))
                   ));
        
        $user_email_confirm = new Zend_Form_Element_Text('emailconfirm');
        $user_email_confirm->setLabel('Nieuw E-mailadres Herhalen:*')
                           ->setRequired(true)
                           ->addFilter('StringTrim')
                           ->addValidators(array(
                                array('notEmpty', true, array('messages' => 'Dit is een verplicht veld.')),
                                array('identical', true, array('token' => 'user_email', 'messages' => 'De ingevoerde e-mailadressen zijn niet gelijk.'))
                           ));
        
        $email_submit = new Zend_Form_Element_Submit('email_submit');
        $email_submit->setLabel('E-mail Bijwerken')
                     ->setIgnore(true)
                     ->removeDecorator('DtDdWrapper'); //Ignores value when retrieving form values on form level.
        
        $this->setMethod('post')
             ->setAction('')
             ->setAttrib('id', 'emailchange-form')
             ->setAttrib('data-ajax', 'false')
             ->addElements(array(
                 $user_email,
                 $user_email_confirm,
                 $email_submit
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