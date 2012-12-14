<?php

/**
 * default actions.
 *
 * @package    thiscity
 * @subpackage default
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class defaultActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->getRequest()->setParameter('page', 1);
        $this->forward('dashboard', 'index');
    }

}
