<?php

//

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
    /*     * *
     * 
     */

    public function executeEdit(sfWebRequest $request) {
        $user = $this->getUser(); /* @var $user myUser */
        $guard_user = $user->getGuardUser(); /* @var $guard_user sfGuardUser */
        if (!$guard_user->getIsSuperAdmin()) {
            $this->redirect('task/viewComment?id='.$request->getParameter('id'));
        } else {
            parent::executeEdit($request);
        }
    }

    /*     * *
     * 
     */

    public function executeDelete(sfWebRequest $request) {
        $user = $this->getUser(); /* @var $user myUser */
        $guard_user = $user->getGuardUser(); /* @var $guard_user sfGuardUser */
        if (!$guard_user->getIsSuperAdmin()) {
            $this->forward404('Have no permission.');
        } else {
            parent::executeDelete($request);
        }
    }

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
//                ->addWhere("DATE_FORMAT(created_at, '%Y/%m/%d') = ?", date('Y/m/d'))
                ->orderBy('completed_at, priority DESC')
        ;
        if (!$guard_user->getIsSuperAdmin()) {
            $query->addWhere('user_id = ? OR follow_user_id = ?', array($guard_user->getId(), $guard_user->getId()));
        }

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

                $tcmnt->save();
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
                $reminderCount = TaskTable::getInstance()->countTaskNeedReminded(date("Y-m-d H:i"), $guard_user->getId());

                $this->getResponse()->setContentType("application/json; charset=utf-8");
                if ($reminderCount > 0) {
                    $returnData = array('status' => 'success', 'count' => $reminderCount);
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

    /**
     * 
     * @param type $request
     */
    public function executeExtend(sfWebRequest $request) {
        if ($request->getMethod() == sfWebRequest::POST) {
            $user = $this->getUser(); /* @var $user myUser */
            if (!$user) {
                $returnData = array('status' => 'time-out');
            } else {
                $taskId = $request->getParameter('taskId', 0);
                $afterMin = $request->getParameter('afterMin', 10);
                if (!is_numeric($afterMin) || $afterMin <= 0) {
                    $afterMin = 10; // default 1 minites
                }
                $nextRemindAt = date('Y-m-d H:i', strtotime('+' . $afterMin . ' minutes'));
                $now = date('Y-m-d H:i');
                $task = TaskTable::getInstance()->findOneBy('id', $taskId);
                if ($task) {
                    $reminder1St = $task->remind_1st_at ? date("Y-m-d H:i", strtotime($task->remind_1st_at)) : "";
                    $reminder2rd = $task->remind_2rd_at ? date("Y-m-d H:i", strtotime($task->remind_2rd_at)) : "";
                    //$reminder3th = $task->remind_3th_at ? date_format($task->remind_3th_at, 'Y-m-d H:i') : "";
                    if ($reminder1St) {
                        if ($reminder1St > $now) {
                            $task->remind_1st_at = $nextRemindAt;
                        } else if ($reminder2rd) {
                            if ($reminder2rd > $now) {
                                $task->remind_2rd_at = $nextRemindAt;
                            } else {
                                $task->remind_3th_at = $nextRemindAt;
                            }
                        } else {
                            $task->remind_2rd_at = $nextRemindAt;
                        }
                    }
                    $task->save();
                    $returnData = array('status' => 'success');
                }
            }
            $this->renderText(json_encode($returnData));
        }
        return sfView::NONE;
    }

    /**
     * 
     * @param type $request
     */
    public function executeCompleted(sfWebRequest $request) {
        if ($request->getMethod() == sfWebRequest::POST) {
            $user = $this->getUser(); /* @var $user myUser */
            if (!$user) {
                $returnData = array('status' => 'time-out');
            } else {
                $taskId = $request->getParameter('taskId', 0);
                $completedBy = $request->getParameter('completedBy', '');

                $task = TaskTable::getInstance()->findOneBy('id', $taskId);
                if ($task) {
                    if (!$completedBy)
                        $completedBy = $task->getAssignedTo();
                    $task->setCompletedAt(date('Y-m-d H:i:s'));
                    $task->setCompletedBy($completedBy);

                    $task->save();
                    $returnData = array('status' => 'success');
                }
            }
            $this->renderText(json_encode($returnData));
        }
        return sfView::NONE;
    }

    /**
     * 
     * @param sfWebRequest $request
     */
    public function executeBatchReAssign(sfWebRequest $request) {
        $userId = $request->getParameter('userId', 100);
        $ids = $request->getParameter('ids');

        $tasks = Doctrine_Query::create()
                        ->from('Task t')
                        ->whereIn('t.id', $ids)->execute();
        if ($tasks && sizeof($tasks) > 0) {
            foreach ($tasks as $task) {
                $task->setFollowUserId($userId);
                $task->save();
            }
            
            $this->getUser()->setFlash('notice', 'Đã chuyển giao công việc.');
        }

        $this->redirect('task/index');
    }

}

