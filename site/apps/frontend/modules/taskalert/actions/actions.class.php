<?php

require_once dirname(__FILE__) . '/../lib/taskalertGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/taskalertGeneratorHelper.class.php';

/**
 * taskalert actions.
 *
 * @package    reminder
 * @subpackage taskalert
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class taskalertActions extends autoTaskalertActions {

    /**
     * Build custom query
     * 
     * @return type
     */
    protected function buildQuery() {
        // TODO: Tim task do chinh User login tao
        $user = $this->getUser(); /* @var $user myUser */
        $guard_user = $user->getGuardUser(); /* @var $guard_user sfGuardUser */
        
        $nowTime = date("Y-m-d H:i");
        $query = parent::buildQuery()
                ->where('user_id = ' . $guard_user->getId())
                ->addWhere('is_deleted=0 AND completed_at IS NULL')
                ->addWhere("DATE_FORMAT(created_at, '%Y/%m/%d') = ?", date('Y/m/d'))
                ->addWhere("(DATE_FORMAT(remind_1st_at, '%Y-%m-%d %H:%i') = ?)
                    OR (DATE_FORMAT(remind_2rd_at, '%Y-%m-%d %H:%i') = ?)
                    OR (DATE_FORMAT(remind_3th_at, '%Y-%m-%d %H:%i') = ?)", array($nowTime, $nowTime, $nowTime))
                ->orderBy('priority DESC')
        ;
        return $query;
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
