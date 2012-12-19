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

    /**
     * 
     */
    public function configure() {
        
        // Set user created
        $user = sfContext::getInstance()->getUser(); /* @var $user myUser */
        $guard_user = $user->getGuardUser(); /* @var $guard_user sfGuardUser */
        
        unset(
                $this['user_id'], 
                $this['reminded_count'],
                $this['remind_2rd_at'], 
                $this['remind_3th_at'], 
                $this['completed_by'],
                $this['completed_at'],
                $this['created_at'], 
                $this['updated_at'],
                $this['is_deleted'],
                $this['follow_user_id']
        );
        
        $arrPriorities = sfConfig::get('app_task_prioryties', 
            array(1 => 'Không gấp', 2 => 'Bình thường', 3 => 'Cần sớm', 4 => 'Gấp', 5 => 'Khẩn cấp'));
        $this->widgetSchema['priority'] = new sfWidgetFormChoice(array(
            'choices' => $arrPriorities,
            'expanded' => true,
        ));
        $this->setDefault('priority', 2); // Binh thuong
        
        $years = range(date('Y'), date('Y') + 5);
        $years_list = array_combine($years, $years);
        
        $firstReminderAfter = sfConfig::get('app_reminder_1st_after', 10); // minute
        $this->widgetSchema['remind_1st_at'] = new sfWidgetFormDateTime(array(
            'date' =>array(
                'format'=> '%year% / %month% / %day%',
                'can_be_empty' =>false,
                'years' =>$years_list
            ),
            'default'=> date('Y-m-d H:i', strtotime('+'.$firstReminderAfter.' minutes'))
        )
        );
        
        $reminder_email_1st = sfConfig::get('app_reminder_email1', $guard_user->getEmailAddress()); // reminder_email_1st
        $reminder_email_2rd = sfConfig::get('app_reminder_email2', ''); // reminder_email_2rd
        $this->setDefault('reminder_email1', $reminder_email_1st);
        $this->setDefault('reminder_email2', $reminder_email_2rd);
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
