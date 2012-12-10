<?php

/**
 * default actions.
 *
 * @package    thiscity
 * @subpackage default
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class defaultActions extends sfActions
{
  public function executePress(sfWebRequest $request)
  {
    $request->setParameter('name', $request->getParameter('action'));
    $this->forward('default', 'page');
  }

  public function executeAttribution(sfWebRequest $request)
  {
    $request->setParameter('name', $request->getParameter('action'));
    $this->forward('default', 'page');
  }
  
  public function executePrivacy(sfWebRequest $request)
  {
    $request->setParameter('name', $request->getParameter('action'));
    $this->forward('default', 'page');
  }

  public function executeTerms(sfWebRequest $request)
  {
    $request->setParameter('name', $request->getParameter('action'));
    $this->forward('default', 'page');
  }
  
  public function executeFaq(sfWebRequest $request)
  {
    $request->setParameter('name', $request->getParameter('action'));
    $this->forward('default', 'page');
  }

  public function executeMobileapps(sfWebRequest $request)
  {
    $request->setParameter('name', $request->getParameter('action'));
    $this->forward('default', 'page');
  }

  public function executeContact(sfWebRequest $request)
  {
    $page = StaticPageTable::getInstance()
            ->findOneBy('name', 'contact');
    /* @var $page StaticPage */
    $this->page = $page;

    $response = $this->getResponse();
    /* @var $response sfWebResponse */

    $response->setTitle($page->page_title.' - '.sfConfig::get('app_website_name'));
    $response->addMeta('description', $page->meta_description, true);    
  }
  
  public function executeAbout(sfWebRequest $request)
  {
    $request->setParameter('name', $request->getParameter('action'));
    $this->forward('default', 'page');
  }

  public function executeAdvertise(sfWebRequest $request)
  {
    $request->setParameter('name', $request->getParameter('action'));
    $this->forward('default', 'page');
  }

  public function executePage(sfWebRequest $request)
  {
    $page = StaticPageTable::getInstance()
            ->findOneBy('name', $request->getParameter('name'));
    /* @var $page StaticPage */
    $this->page = $page;

    $response = $this->getResponse();
    /* @var $response sfWebResponse */

    $response->setTitle($page->page_title.' - '.sfConfig::get('app_website_name'));
    $response->addMeta('description', $page->meta_description, true);    
  }
  
  /**
   * Executes index action
   *
   * @param sfRequest $request A request object
   */
  public function executeIndex(sfWebRequest $request)
  {
    
  }
}
