<?php
// auto-generated by sfViewConfigHandler
// date: 2009/06/16 19:36:01
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (!is_null($layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout')))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (is_null($this->getDecoratorTemplate()) && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $this->setComponentSlot('sidebar', 'sidebar', 'default');
  if (sfConfig::get('sf_logging_enabled')) $this->context->getEventDispatcher()->notify(new sfEvent($this, 'application.log', array(sprintf('Set component "%s" (%s/%s)', 'sidebar', 'sidebar', 'default'))));
  $response->addHttpMeta('content-type', 'text/html', false);
  $response->addMeta('title', 'CycleBrain', false, false);
  $response->addMeta('robots', 'index, follow', false, false);
  $response->addMeta('description', 'Free cycling website to track and manage all bicycling related activities.  Track mileage by ride, bicycle and equipment, as well as mapping rides and creating reports and charts on gathered statistics', false, false);
  $response->addMeta('keywords', 'bike, cycle, bicycle, tracking, map, mapping, log, journal, report, graph, bikelog, mileage, miles, stat, statistic, fitness', false, false);
  $response->addMeta('language', 'en', false, false);

  $response->addStylesheet('main', '', array ());
  $response->addStylesheet('bike', '', array ());
  $response->addStylesheet('menu', '', array ());
  $response->addStylesheet('niftyCorners', '', array ());
  $response->addJavascript('validate', '', array ());
  $response->addJavascript('nifty', '', array ());
  $response->addJavascript('util', '', array ());


