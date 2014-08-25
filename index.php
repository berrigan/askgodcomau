<?php

require_once('config.php');

//    $twig = \AskGodComAu\Core\TwigFactory::getTwig();
//    $view = $twig->loadTemplate('index.html');
//    echo $view->render(array('title' => 'AskGod.com.au!'));

$nsControllers = '\\AskGodComAu\\Controllers\\';
$nsApi = '\\AskGodComAu\\Api\\';

$urls = array(
    '/' => $nsControllers . 'Index',
    '/about' => $nsControllers . 'About',
    '/thanks' => $nsControllers . 'Thanks',
    '/thanks/([0-9]+)' => $nsControllers . 'Thanks',
    '/events' => $nsControllers . 'Events',
    '/questions' => $nsControllers . 'Questions',
    '/questions/([0-9]+)' => $nsControllers . 'Questions',

    // ADMIN
    '/admin' => $nsControllers . 'AdminRedirect',
    '/admin/' => $nsControllers . 'AdminDefault',
    '/admin/default' => $nsControllers . 'AdminDefault',
    '/admin/login' => $nsControllers . 'AdminLogin',
    '/admin/logout' => $nsControllers . 'AdminLogout',

    // API
    '/admin/questions' => $nsApi . 'QuestionsApi'
);

glue::stick($urls);
