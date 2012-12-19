<?php

/**
 * report actions.
 *
 * @package    reminder
 * @subpackage report
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class reportActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      // sort 
      $userName = $request->getParameter('userName', '');
      $createdFrom = $request->getParameter('createdFrom', date('Y-m-d', strtotime('-30 days')));
      $createdTo = $request->getParameter('createdTo', '');
      $taskStatus = $request->getParameter('taskStatus', '-1');
      
      $page = $request->getParameter('page', 1);
      $this->page = $page;
      $maxPerPage = 5;
      $this->maxPerPage = $maxPerPage;

      $pager = TaskTable::getInstance()->getTaskReportingPager($page, $maxPerPage, 
              $userName, $createdFrom, $createdTo, $taskStatus);
      $this->userName = $userName;
      $this->createdFrom = $createdFrom;
      $this->createdTo = $createdTo;
      $this->taskStatus = $taskStatus;
      
      $this->pager = $pager;
  }
}
