<?php

// configure the exp

// set the request paraemter
$rd = new exRequestDataHolder();
$ro = new exRouting($rd);

$mod    = $ro->getModule();
$action = $ro->getAction();

$context = new exContext();
$context->setRouting($ro);
$context->setRequestData($rd);

$frontControler = new exFrontendControler();
$frontControler->init($context, $mod, $action);
$content = $frontControler->execute($rd);
echo $content;

?>