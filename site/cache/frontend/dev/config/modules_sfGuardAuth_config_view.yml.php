<?php
// auto-generated by sfViewConfigHandler
// date: 2012/12/12 16:35:36
$response = $this->context->getResponse();

if ($this->actionName.$this->viewName == 'stylesheets')
{
  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}
else
{
  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}

if ($templateName.$this->viewName == 'stylesheets')
{
  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
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
  $response->addJavascript('tiny_mce/tiny_mce.js', '', array ());
  $response->addJavascript('/sfTinyMCEImageBrowserPlugin/js/main.js', '', array ());
  $response->addJavascript('/sfTinyMCEImageBrowserPlugin/js/popup.js', '', array ());
  $response->addJavascript('jquery.tablednd_0_5.js', '', array ());
}
else
{
  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
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
  $response->addJavascript('tiny_mce/tiny_mce.js', '', array ());
  $response->addJavascript('/sfTinyMCEImageBrowserPlugin/js/main.js', '', array ());
  $response->addJavascript('/sfTinyMCEImageBrowserPlugin/js/popup.js', '', array ());
  $response->addJavascript('jquery.tablednd_0_5.js', '', array ());
}

