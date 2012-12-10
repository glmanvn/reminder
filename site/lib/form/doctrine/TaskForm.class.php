<?php

/**
 * Task form.
 *
 * @package    reminder
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TaskForm extends BaseTaskForm {

    public function configure() {
        unset(
                $this['user_id'], 
                $this['remind_2rd_at'], 
                $this['remind_3th_at'], 
                $this['completed_by'],
                $this['completed_at'],
                $this['created_at'], 
                $this['updated_at'],
                $this['is_deleted']
        );
    }

    /**
     * Save task
     * 
     * @param type $con
     * @return type
     */
    public function save($con = null) {
        $task = $this->getObject();
        
        // Set user created
        $user = sfContext::getInstance()->getUser(); /* @var $user myUser */
        $guard_user = $user->getGuardUser(); /* @var $guard_user sfGuardUser */

        $task->setUserId($guard_user->id);
        
        $task = parent::save($con);
        
        return $task;
    }

}
