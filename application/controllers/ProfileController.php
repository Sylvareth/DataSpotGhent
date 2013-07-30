<?php

class ProfileController extends Zend_Controller_Action
{

    /**
     * @var Zend_Auth 
     *
     *
     */
    protected $_auth = null;

    public function init()
    {
        $this->_auth = Zend_Auth::getInstance();
    }

    public function indexAction()
    {
        $form = new Application_Form_Register();
        $form->getElement('register')->setLabel('Bijwerken');
        $form->getElement('user_password')->setAllowEmpty(true)->setRequired(false);
        $form->getElement('passwordconfirm')->setAllowEmpty(true)->setRequired(false);
        $form->getElement('user_email')->clearValidators()->setAllowEmpty(false)->setRequired()->setAttrib('readonly', true);
        $form->getElement('user_username')->clearValidators()->setAllowEmpty(false)->setRequired()->setAttrib('readonly', true);
        $form->removeElement('user_password');
        $form->removeElement('passwordconfirm');
        $form->removeElement('register');
        
        // Recreate password fields to prevent default password submit (empty)
        $user_password = new Zend_Form_Element_Password('user_password');
        $user_password->setLabel('Wachtwoord:')
                      ->addFilter('StringTrim')
                      ->addValidator('stringLength', true, array('min' => 6, 'max' => 16, 'messages' => 'Uw wachtwoord moet %min% tot %max% tekens bevatten.'));
        
        $user_password_confirm = new Zend_Form_Element_Password('passwordconfirm');
        $user_password_confirm->setLabel('Wachtwoord Herhalen:')
                              ->addFilter('StringTrim')
                              ->setAllowEmpty(false) 
                              ->addValidator('identical', true, array('token' => 'user_password', 'messages' => 'De ingevoerde wachtwoorden zijn niet gelijk.'));
        
        $profile_submit = new Zend_Form_Element_Submit('profile_submit');
        $profile_submit->setLabel('Bijwerken')
                       ->setIgnore(true)
                       ->removeDecorator('DtDdWrapper'); //Ignores value when retrieving form values on form level.
        
        $form->addElement($user_password);
        $form->addElement($user_password_confirm);
        $form->addElement($profile_submit);
        
        // Render form
        $this->view->form = $form;
        
        // Get user data from logged-in user
        $id = $this->_auth->getStorage()->read()['id']; // PHP 5.4 Feature. Marked as 'error' in Netbeans < v.7.1.2
        $userMapper = new Application_Model_UserMapper();
        $array = $userMapper->readUser($id);
        $user = new Application_Model_User($array);
        
        // Populate form with database values
        $form->populate($array);
        
        if (!empty($_POST['profile_submit'])) {
            
            $formData = $this->getRequest()->getPost();
            
            if ($form->isValid($formData)) {
                
                // Set updated user values
                if(!empty($_POST['user_password'])){
                    $user->setUser_passwordraw($formData['user_password']);
                }
                $user->setUser_firstname($formData['user_firstname']);
                $user->setUser_lastname($formData['user_lastname']);
                $user->setUser_email($formData['user_email']);
                $user->setUser_username($formData['user_username']);
                // Zend_Debug::dump($user);
                
                // Reset User ID and save user
                $user->setUser_id($id);
                $userMapper->saveUser($user);
                
                // Display success message
                $succes = '<p class="success">Uw profiel werd bijgewerkt!</p>';
                $this->view->succes = $succes;
            } else {
                $form->populate($formData);
                $form->_highlightErrors();
            }
        }
    }

    public function editemailAction()
    {
        $form = new Application_Form_EmailChange();
        $this->view->form = $form;
        
        $id = $this->_auth->getStorage()->read()['id'];
        $userMapper = new Application_Model_UserMapper();
        $user = new Application_Model_User($userMapper->readUser($id));
        
        if (!empty($_POST['email_submit'])) {
            $formData = $this->getRequest()->getPost();
            
            if ($form->isValid($formData)) {
                $user->setUser_email($formData['user_email']);
                
                // Reset User ID and save user
                $user->setUser_id($id);
                $userMapper->saveUser($user);
                
                // Display success message
                $succes = '<p class="success">Uw e-mailadres werd bijgewerkt!</p>';
                $this->view->succes = $succes;
            } else {
                $form->populate($formData);
                $form->_highlightErrors();
            }
        }
    }

}