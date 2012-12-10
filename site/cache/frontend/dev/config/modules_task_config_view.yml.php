<?php
// auto-generated by sfViewConfigHandler
// date: 2012/12/10 16:21:51
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('reset.css', '', array ());
  $response->addStylesheet('fluid.css', '', array ());
  $response->addStylesheet('dandelion.theme.css', '', array ());
  $response->addStylesheet('dandelion.css', '', array ());
  $response->addStylesheet('demo.css', '', array ());
  $response->addStylesheet('jui/css/jquery.ui.all.css', '', array ());
  $response->addJavascript('jui/js/jquery-ui-1.8.20.min.js', '', array ());
  $response->addJavascript('jui/js/jquery.ui.timepicker.min.js', '', array ());
  $response->addJavascript('jui/js/jquery.ui.touch-punch.min.js', '', array ());
  $response->addJavascript('jquery.fileinput.js', '', array ());
  $response->addJavascript('jquery.placeholder.js', '', array ());
  $response->addJavascript('jquery.mousewheel.min.js', '', array ());
  $response->addJavascript('jquery.tinyscrollbar.min.js', '', array ());
  $response->addJavascript('core/dandelion.core.js', '', array ());
  $response->addJavascript('core/dandelion.customizer.js', '', array ());

