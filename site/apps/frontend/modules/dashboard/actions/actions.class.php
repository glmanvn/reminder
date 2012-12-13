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
            ->where('user_id = ' . $guard_user->getId())
            ->addWhere("DATE_FORMAT(created_at, '%Y/%m/%d') = ?", date('Y/m/d'))
        ;
    }

}
