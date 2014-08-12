<?php

require_once('config.php');

//    $twig = \AskGodComAu\Core\TwigFactory::getTwig();
//    $view = $twig->loadTemplate('index.html');
//    echo $view->render(array('title' => 'AskGod.com.au!'));


$nsControllers = '\\AskGodComAu\\Controllers\\';

$urls = array(
    '/' => $nsControllers . 'Index',
    '/about' => $nsControllers . 'About',
    '/questions' => $nsControllers . 'Questions',
    '/questions/([0-9]+)' => $nsControllers . 'Questions'
);

glue::stick($urls);
