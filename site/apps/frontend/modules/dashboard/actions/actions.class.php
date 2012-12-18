<?php

require_once dirname(__FILE__) . '/../lib/dashboardGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/dashboardGeneratorHelper.class.php';

/**
 * dashboard actions.
 *
 * @package    reminder
 * @subpackage dashboard
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dashboardActions extends autoDashboardActions {

    /**
     * Build custom query
     * 
     * @return type
     */
    protected function buildQuery() {
        // TODO: Tim task do chinh User login tao
        $user = $this->getUser(); /* @var $user myUser */
        $guard_user = $user->getGuardUser(); /* @var $guard_user sfGuardUser */

        return parent::buildQuery()
            ->where('user_id = ? OR follow_user_id = ?', array($guard_user->getId(), $guard_user->getId()))
            ->addWhere('is_deleted = 0 and completed_at IS NULL')
//            ->addWhere("DATE_FORMAT(created_at, '%Y/%m/%d') = ?", date('Y/m/d'))
            ->orderBy('priority DESC')
        ;
    }

    /***
     * 
     */
    public function executeEdit(sfWebRequest $request)
    {
        $this->forward404();
    }
    
    /***
     * 
     */
    public function executeDelete(sfWebRequest $request)
    {
        $this->forward404();
    }
}
