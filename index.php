<?php

require_once('config.php');

//    $twig = \AskGodComAu\Core\TwigFactory::getTwig();
//    $view = $twig->loadTemplate('index.html');
//    echo $view->render(array('title' => 'AskGod.com.au!'));

$nsControllers = '\\AskGodComAu\\Controllers\\';
$nsApi = '\\AskGodComAu\\Api\\';

$urls = array(
    '/' => $nsControllers . 'Index',
    '/[?].*' => $nsControllers . 'Index', // allow query string on index
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

    '/admin/questions' => $nsControllers . 'AdminQuestions',


    // API
    '/admin/api/questions' => $nsApi . 'QuestionsApi',
    '/admin/api/questions/(?P<id>\d+)/(?P<action>[a-z]+)' => $nsApi . 'QuestionsApi',

    '/admin/api/userquestions' => $nsApi . 'UserquestionsApi'
);

try
{
    glue::stick($urls);
}
catch (Exception $glueException) {
    glue::stick(array(
       '.*' => $nsControllers . 'Error'
    ));
}
