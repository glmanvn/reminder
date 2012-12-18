<?php

class userComponents extends sfComponents {

    /**
     * 
     * @return type
     */
    function executeSelectOneUser($request) {
//        $my_user = $this->getUser(); /* @var $my_user myUser */
//        $guard_user = $my_user->getGuardUser(); /* @var $guard_user sfGuardUser */
        
        $this->users = sfGuardUserTable::getInstance()->findAll();
    }

}