<?php

/**
 * taskalert module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage taskalert
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTaskalertGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'task_taskalert' : 'task_taskalert_'.$action;
  }
}
