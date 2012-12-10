<?php

/**
 * sfGuardRegister actions.
 *
 * @package    guard
 * @subpackage sfGuardRegister
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z jwage $
 */
class sfGuardRegisterActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $static_page = StaticPageTable::getInstance()
            ->findOneBy('name', 'register');
    /* @var $static_page StaticPage */
    $this->static_page = $static_page;

    $response = $this->getResponse();
    /* @var $response sfWebResponse */

    $response->setTitle($static_page->page_title.' - '.sfConfig::get('app_website_name'));
    $response->addMeta('description', $static_page->meta_description, true);

    if ($this->getUser()->isAuthenticated())
    {
      $this->getUser()->setFlash('notice', 'You are already registered and signed in!');
      $this->redirect('@homepage');
    }

    $this->form = new sfGuardRegisterForm();

    if ($request->isMethod('post'))
    {
      $values = $request->getParameter($this->form->getName());
      $this->form->bind($values);
      if ($this->form->isValid())
      {
        $guard_user = $this->form->save();
        /* @var $guard_user sfGuardUser */
        $guard_user->setIsActive(false);
        $guard_user->save();

        $profile = new sfGuardUserProfile();
        $profile->User = $guard_user;
        // Add for 'Real Estate agent'
        $isEstateAgent = $this->form->getValue('is_estate_agent') == 1 ? 1 : 0;
        $profile->setIsEstateAgent($isEstateAgent);
        if($isEstateAgent){
            // 5000 credit for real estate agent upon successful user registration
            $spotterCredit = sfConfig::get('app_spotter_register_free_credit', 5000);
            $profile->setCredit($spotterCredit);
        }
        // Add country id
        if($countryCode2 = $this->form->getValue('country')){
            $countryObj = CountryTable::getInstance()->findOneBy('iso2', $countryCode2);
            if($countryObj){
                $profile->setCountryId($countryObj->id);
            }
        }
        $profile->save();
        
        // TODO: Save transaction log for add free credit for estate agent
        if($isEstateAgent){
            // 0:timestamp; 1: transaction_type; 2: spotter user_id; 3: currency
            $reference = date('YmdHis')."_";
            $reference .= TransactionLog::TYPE_REGISTER_ESTATE_FREE . '_';
            $reference .= $profile->getUserId().'_';
            $reference .= TransactionLog::CURRENCY_CREDIT;    

            // Create new transaction log
            $transLog = new TransactionLog();
            $transLog->setUserId($profile->getUserId());
            $transLog->setTransactionType(TransactionLog::TYPE_REGISTER_ESTATE_FREE);
            $transLog->setReference($reference);
            $transLog->setAmount($spotterCredit);
            $transLog->setCurrency(TransactionLog::CURRENCY_CREDIT);
            $transLog->setPaymentFee(0);
            $transLog->setCommissionAmount(0);
            // Save transaction log
            $transLog->save();
        }
        //$this->getUser()->signIn($user);

        // Fire new_user event
        $dispatcher = sfContext::getInstance()->getEventDispatcher();
        $event = new sfEvent($this, 'notification.new_user',
                array('new_user' => $guard_user));
        $dispatcher->notify($event);

        $this->redirect('user/preActivate?i='.$guard_user->getId()
                .'&c='.substr($guard_user->password, 0, 4));
      }
    }
  }
}