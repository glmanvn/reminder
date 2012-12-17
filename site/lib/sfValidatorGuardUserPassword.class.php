<?php

class sfValidatorGuardUserPassword extends sfValidatorBase
{
  
  public function configure($options = array(), $messages = array())
  {
    $this->addRequiredOption('guard_user');

    $this->setMessage('invalid', 'Password is incorrect');
    
    parent::configure($options, $messages);
  }

  protected function doClean($value)
  {
    $guard_user = $this->getOption('guard_user');
    /* @var $guard_user sfGuardUser */
    
    // password is ok?
    if ($guard_user->checkPassword($value))
    {
      return $value;
    }
    
    throw new sfValidatorError($this, 'invalid', array('value' => $value));
  }
}