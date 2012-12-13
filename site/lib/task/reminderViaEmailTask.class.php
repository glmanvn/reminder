<?php

/**
 * Task thuc hien viec gui email reminder den Manager emails
 */
class reminderViaEmailTask extends sfBaseTask {

    protected function configure() {
        // // add your own arguments here
        // $this->addArguments(array(
        //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
        // ));

        $this->addOptions(array(
            new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name', 'admin'),
            new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
//      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'prod'),
            new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
                // add your own options here
        ));

        $this->namespace = 'reminder.task';
        $this->name = 'reminderViaEmail';
        $this->briefDescription = '';
        $this->detailedDescription = <<<EOF
The [reminderViaEmail|INFO] task does things.
Call it with:
    Send notify email to Task manager. Run every minute.
    
  [php symfony reminderViaEmail|INFO]
EOF;
    }

    /***
     * 
     */
    protected function execute($arguments = array(), $options = array()) {
        // initialize the database connection
        $databaseManager = new sfDatabaseManager($this->configuration);
        $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

        // add your code here
        set_time_limit(0); // Set no time-out
        $this->file_logger = new sfFileLogger($this->dispatcher, array(
                    'file' => $this->configuration->getRootDir() . '/log/reminderViaEmailTask.log'));

        $this->file_logger->info('=========== Start at: ' . date("Y-m-d H:i:s") . "===========");

        $nowTime = date("Y-m-d H:i");
        $reminderTasks;
        try {
            $this->file_logger->info('Inquiry task for reminder at: ' . $nowTime);
            $reminderTasks = Doctrine::getTable('Task')->getTaskNeedRemindedOnTime($nowTime);
        } catch (Exception $ex) {
            $this->file_logger->err($ex->getMessage());
        }
        if ($reminderTasks) {
            foreach ($reminderTasks as $task) {
                if ($task) {
                    $siteName = sfConfig::get('app_website_name');
                    
                    $this->logSection("CONSL", "*** Reminder for: " . $siteName);
                    
                    $noreplyEmail = sfConfig::get('app_emails_dont_reply');
                    $this->logSection("CONSL", "*** Email from: " . $noreplyEmail);
                    
                    $subject = sfConfig::get('app_emails_reminder_subject');
                    $taskName = $task->getTaskName();
                    $taskDescription = $task->getTaskDescription();

                    $assignTo = $task->getAssignedTo();

                    $emailBody = <<<BODY
Hello,
Công việc sau cần hoàn thành ngay:
$taskName
                  
Chi tiết công việc:
$taskDescription

Được giao cho:
$assignTo

Best regards,
$siteName

BODY;
                    try {
                        $emailTo = array();
                        if ($task->remind_3th_at) { // Thuc hien email reminder lan 2
                            // TODO: Gui email den 2 dia chi
                            $emailTo[] = $task->getReminderEmail1() ? $task->getReminderEmail1() : sfConfig::get('app_reminder_email1');
                            $emailTo[] = $task->getReminderEmail2() ? $task->getReminderEmail2() : sfConfig::get('app_reminder_email2');
                        } else if ($task->remind_2rd_at) { // Thuc hien reminder lan 2
                            // TODO: Gui email den 1 dia chi email
                            // Cap nhat thoi diem reminder 3 (default 2rd_after)
                            $emailTo[] = $task->getReminderEmail1() ? $task->getReminderEmail1() : sfConfig::get('app_reminder_email1');

                            $thirdReminderAfter = sfConfig::get('app_reminder_3th_after', 15); // minute
                            $task->remind_3th_at = date('Y-m-d H:i', strtotime('+' . $thirdReminderAfter . ' minutes'));
                            $task->save();
                            // Log
                            $this->file_logger->info('Updated next reminder (3th) at:' . $task->remind_3th_at);
                        } else if ($task->remind_1st_at) { // Thuc hien reminder lan 1 - popup
                            // TODO: Cap nhat thoi diem reminder 1 (default 1st_after)
                            $rdReminderAfter = sfConfig::get('app_reminder_2rd_after', 15); // minute
                            $task->remind_2rd_at = date('Y-m-d H:i', strtotime('+' . $rdReminderAfter . ' minutes'));
                            $task->save();
                            // Log
                            $this->file_logger->info('Updated next reminder (2rd) at:' . $task->remind_2rd_at);
                        }
                        if (isset($emailTo)) {
                            $message = $this->getMailer()->compose($noreplyEmail, $emailTo, $subject, $emailBody);
                            $this->getMailer()->send($message);
                            $this->file_logger->info('Sent reminder email to :' . implode( "," ,$emailTo));
                            
                            print_r($emailTo);
                            $this->logSection("CNSL", implode($emailTo));
                        }
                    } catch (Exception $ex) {
                        $this->file_logger->err($ex->getMessage());
                    }
                }
            }
        } else {
            $this->logSection('reminderViaEmailTask', 'There is no task for reminder.');
        }
        $this->file_logger->info('reminderViaEmailTask completed at: ' . date("Y-m-d H:i:s"));
    }

}

