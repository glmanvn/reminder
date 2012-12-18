<?php

/**
 * user actions.
 *
 * @package    openshop
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends sfActions {

    /**
     * Change password
     *
     * @param sfWebRequest $request
     */
    public function executeChangePassword(sfWebRequest $request) {
        $my_user = $this->getUser(); /* @var $my_user myUser */
        $guard_user = $my_user->getGuardUser(); /* @var $guard_user sfGuardUser */

        $values = $request->getParameter('user');

        $form = new PasswordResetForm(
                        array(
                            'name_format' => 'user[%s]',
                            'current_password' => true, // requires user to enter their current password
                            'guard_user' => $guard_user,
                            'values' => $values,
                        )
        );

        $this->form = $form;

        if ($this->getRequest()->isMethod('post')) {
            $form->bind($values);

            if ($form->isValid()) {
                $form->processFormData($guard_user);
                $this->success = true;
                $my_user->setFlash('success', 'Password has been successfully changed');
                return $this->redirect('default/index');
            }
        }
        return 'Form';
    }

    /**
     * 
     * @param type $request
     */
    function executeSelectOneUser($request) {
        
    }
}
