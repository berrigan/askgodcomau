<?php
use AskGodComAu\Core\AdminUtil;

try
{
    // Some RedbeanPHP Model setup

    // userquestion
//    $userquestion->text = 'Hello World';
//    $userquestion = R::dispense('userquestion');
//
//    $id = R::store($userquestion);       //Create or Update
//    $userquestion = R::load('userquestion',$id); //Retrieve


    // masterquestion


    // admins -- setup all in here
    // setupAdmin('owen', 'cHEAT5', 'everything', true);


    //



}
catch (Exception $e)
{
    // echo($e->getMessage());
    throw new Exception('MODEL setup problem encountered.');
}
