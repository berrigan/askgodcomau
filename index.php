<?php

    require_once('config.php');

    $twig = \AskGodComAu\Core\TwigFactory::getTwig();
    $view = $twig->loadTemplate('index.html');
    echo $view->render(array('title' => 'AskGod.com.au!'));


