<?php
// auto-generated by sfViewConfigHandler
// date: 2012/12/20 11:42:58
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layoutNoLeft' ? false : 'layoutNoLeft'.$this->getExtension());
  }
  $this->setComponentSlot('sidebar', 'default', 'none');
  if (sfConfig::get('sf_logging_enabled')) $this->context->getEventDispatcher()->notify(new sfEvent($this, 'application.log', array(sprintf('Set component "%s" (%s/%s)', 'sidebar', 'default', 'none'))));
  $response->addHttpMeta('content-type', 'text/html', false);
  $response->addMeta('title', 'Ticket reminder system', false, false);
  $response->addMeta('description', 'Ticket reminder system', false, false);
  $response->addMeta('keywords', 'Ticket, reminder system, task', false, false);
  $response->addMeta('language', 'en', false, false);

  $response->addStylesheet('style.css', '', array ());
  $response->addStylesheet('reset.css', '', array ());
  $response->addStylesheet('text.css', '', array ());
  $response->addStylesheet('layout.css', '', array ());
  $response->addStylesheet('nav.css', '', array ());
  $response->addStylesheet('grid.css', '', array ());
  $response->addStylesheet('formalize.css', '', array ());
  $response->addStylesheet('main.css', '', array ());
  $response->addStylesheet('admin_default.css', '', array ());
  $response->addStylesheet('jquery_ui/jquery.ui.all.css', '', array ());
  $response->addJavascript('jquery/jquery-1.8.0.min.js', '', array ());
  $response->addJavascript('jquery_ui/jquery.ui.core.js', '', array ());
  $response->addJavascript('jquery_ui/jquery.ui.widget.js', '', array ());
  $response->addJavascript('jquery_ui/jquery.ui.datepicker.js', '', array ());


