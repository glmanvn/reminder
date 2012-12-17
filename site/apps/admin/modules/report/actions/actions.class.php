<?php

require_once dirname(__FILE__).'/../lib/reportGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/reportGeneratorHelper.class.php';

/**
 * report actions.
 *
 * @package    reminder
 * @subpackage report
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class reportActions extends autoReportActions
{
    /***
     * 
     */
    public function executeEdit()
    {
        $this->forward404();
    }
    
    /***
     * 
     */
    public function executeNew()
    {
        $this->forward404();
    }
    
    /***
     * 
     */
    public function executeDelete()
    {
        $this->forward404();
    }
}
