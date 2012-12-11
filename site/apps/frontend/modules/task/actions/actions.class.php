<?php

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
        return parent::buildQuery();

        // TODO: Tim task do chinh User login tao
    }

    /**
     * 
     * @param type $request
     */
    public function executeViewComment($request) {
        $taskId = $request->getParameter('id');
        if (!$taskId) $this->forward404('Invalid Request');

        $task = TaskTable::getInstance()->findOneBy('id', $taskId);
        if (!$task) $this->forward404('Page not found');

        $taskComments = $task->setTaskComments();

        $this->task = $task;
        $this->comments = $taskComments;
//        $this->forward('task', 'viewCommnent');
    }

}
