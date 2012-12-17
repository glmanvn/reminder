<?php

class PasswordResetForm extends sfSidForm {
  
  /**
   * Setup this form's fields
   *
   */
  protected function setupFields()
  {
    $values = $this->getParameter('values');
    
    $this->addField('code', '',
      new sfWidgetFormInputHidden(),
      new sfValidatorString(array('required' => false))
    );
    
    // user is required to enter the old password first
    if ($this->getParameter('current_password') === true)
    {
      $this->addField('old_password', 'Current password',
        new sfWidgetFormInputPassword(),
        new sfValidatorGuardUserPassword(
          array(
            'guard_user' => $this->getParameter('guard_user'),
            'required' => true
          ),
          array(
            'required' => 'Current password is required',
            'invalid' => 'The password you entered was incorrect, please re-enter'
          )
        ),
        false
      );
    }
    
    $this->addField('password', $this->ifParameter('current_password', true, 'New password', 'Password'),
      new sfWidgetFormInputPassword(),
      new sfValidatorString(array('max_length' => 32, 'min_length' => 6, 'required' => true)),
      true,
      'Password must be 6 to 32 characters long'
    );
    
    $this->addField('retype_password', $this->ifParameter('current_password', true, 'Re-type new password', 'Re-type password'),
      new sfWidgetFormInputPassword(),
      new sfValidatorSchemaCompareValues('retype_password', sfValidatorSchemaCompare::EQUAL, 'password', $values, 
        array(), array('invalid' => 'Re-typed password did not match password')
      ),
      false
    );
  }
  
  /**
   * Process form data when the form is valid.
   *
   * @param sfGuardUser $guard_user
   * @param EmailCode $email_code
   * @return void
   */
  public function processFormData(sfGuardUser $guard_user, $email_code=null)
  {
    $guard_user->setPassword($this->getValue('password'));
    $guard_user->save();

//    $profile = $guard_user->Profile; /* @var $profile sfGuardUserProfile */
//    $profile->setShouldChangePwd(false);
//    $profile->save();
    
//    if ($email_code)
//    {
//      $email_code->setIsUsed(true);
//      $email_code->save();
//    }
  }
}