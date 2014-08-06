<?php

require_once('config.php');

//    $twig = \AskGodComAu\Core\TwigFactory::getTwig();
//    $view = $twig->loadTemplate('index.html');
//    echo $view->render(array('title' => 'AskGod.com.au!'));


$nsControllers = '\\AskGodComAu\\Controllers\\';

$urls = array(
    '/' => $nsControllers . 'Index',
    '/about' => $nsControllers . 'About'
);

glue::stick($urls);

