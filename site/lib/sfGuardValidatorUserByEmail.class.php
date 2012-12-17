<?php

class sfGuardValidatorUserByEmail extends sfValidatorBase
{
  public function configure($options = array(), $messages = array())
  {
    $this->addOption('username_field', 'username');
    $this->addOption('password_field', 'password');
    $this->addOption('rememeber_checkbox', 'remember');
    $this->addOption('throw_global_error', false);

    $this->setMessage('invalid', 'The email and/or password is invalid.');
    
    parent::configure($options, $messages);
  }

  protected function doClean($values)
  {
    $username = isset($values[$this->getOption('username_field')]) ? $values[$this->getOption('username_field')] : '';
    $password = isset($values[$this->getOption('password_field')]) ? $values[$this->getOption('password_field')] : '';
    $remember = isset($values[$this->getOption('rememeber_checkbox')]) ? $values[$this->getOption('rememeber_checkbox')] : '';

    // user exists?
    $guard_user = sfGuardUserTable::getInstance()->findOneByEmailAddress($username);
    /* @var $guard_user sfGuardUser */

    if ($guard_user)
    {
      // password is ok?
      if ($guard_user->checkPassword($password))
      {
        return array_merge($values, array('user' => $guard_user));
      }
    }

    if ($this->getOption('throw_global_error'))
    {
      throw new sfValidatorError($this, 'invalid');
    }

    throw new sfValidatorErrorSchema($this, array($this->getOption('username_field') => new sfValidatorError($this, 'invalid')));
  }
}
