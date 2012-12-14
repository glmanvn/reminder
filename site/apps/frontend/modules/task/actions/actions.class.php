<?php //

require_once dirname(__FILE__) . '/../lib/taskGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/taskGeneratorHelper.class.php';

/**
 * task actions.
 *
 * @package    reminder
 * @subpackage task
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class taskActions extends autoTaskActions {

    /**
     * Build custom query
     * 
     * @return type
     */
    protected function buildQuery() {
        // TODO: Tim task do chinh User login tao
        $user = $this->getUser(); /* @var $user myUser */
        $guard_user = $user->getGuardUser(); /* @var $guard_user sfGuardUser */

        $query = parent::buildQuery()
                ->where('is_deleted=0')
                ->addWhere('user_id = ' . $guard_user->getId())
                ->addWhere("DATE_FORMAT(created_at, '%Y/%m/%d') = ?", date('Y/m/d'))
                ->orderBy('priority DESC')
        ;

        return $query;
    }

    /**
     * 
     * @param type $request
     */
    public function executeViewComment($request) {
        $taskId = $request->getParameter('id');
        if (!$taskId)
            $this->forward404('Invalid Request');

        $task = TaskTable::getInstance()->findOneBy('id', $taskId);
        if (!$task)
            $this->forward404('Page not found');

        $taskComments = $task->getTaskComments();

        $this->task = $task;
        $this->taskComments = $taskComments;
    }

    /**
     * 
     * @param type $request
     */
    public function executeAddComment($request) {
        $taskId = $request->getParameter('taskId');
        $taskComment = $request->getParameter('taskComment');

        if ($taskId) {
            if ($taskComment) {
                $task = TaskTable::getInstance()->findOneBy('id', $taskId);

                $tcmnt = new TaskComment();
                $tcmnt->setTask($task);

                $user = $this->getUser(); /* @var $user myUser */
                $guard_user = $user->getGuardUser(); /* @var $guard_user sfGuardUser */
                $tcmnt->setUser($guard_user);

                $tcmnt->setComment($taskComment);

                $message = Swift_Message::newInstance()
                        ->setFrom('bounced.bob@gmail.com')
                        ->setTo('anld@isoftco.com')
                        ->setSubject('Subject for testing')
                        ->setBody('Body')
                ;

                $this->getMailer()->send($message);
            }
            $this->redirect('task/viewComment?id=' . $taskId);
        } else {
            $this->forward404('Wrong reqiested');
        }
    }

    /**
     * 
     * @param type $request
     */
    public function executeAlert(sfWebRequest $request) {
        $user = $this->getUser(); /* @var $user myUser */
        if (!$user) {
            $returnData = array('status' => 'time-out');
        } else {
            $guard_user = $user->getGuardUser(); /* @var $guard_user sfGuardUser */
            if ($request->getMethod() == sfWebRequest::POST) {
                // TODO: Check task for reminder
                $reminderCount = TaskTable::getInstance()->countTaskNeedRemindedOnTime(date("Y-m-d H:i"), $guard_user->getId());

                $this->getResponse()->setContentType("application/json; charset=utf-8");
                if ($reminderCount > 0) {
                    $returnData = array('status' => 'success', 'count' => $reminderCount);
                    $output = '[["title", "My basic letter"], ["name", "Mr Brown"]]';
                } else {
                    $returnData = array('status' => 'no-result');
                }
            }
        }
        $this->renderText(json_encode($returnData));
        return sfView::NONE;
    }

    /**
     * 
     * @param type $request
     */
    public function executeReminderPopup(sfWebRequest $request) {
        $user = $this->getUser(); /* @var $user myUser */
        if ($user) {
            $guard_user = $user->getGuardUser(); /* @var $guard_user sfGuardUser */
            $reminderTasks = Doctrine::getTable('Task')->findTaskNeedRemindedOnTime(date("Y-m-d H:i"), $guard_user->getId());
            
            
        }
    }

}

