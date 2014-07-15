<?php

function setupAdmin($username, $password, $expertise, $superuser) {

    $admin = AdminUtil::GetAdmin($username, $password);

    if ($admin == NULL) {
        $admin = R::dispense('admin');
        $admin->username = $username;
        $admin->hash = AdminUtil::Hash($password);
        $admin->superuser = $superuser;
        $admin->expertise = $expertise;
        $adminID = R::store($admin);
        return $adminID;
    } else {
        return $admin->id;
    }

}



try
{
    // Some RedbeanPHP Model setup

    // userquestion
    $userquestion = R::dispense('userquestion');
    $userquestion->text = 'Hello World';

    $id = R::store($userquestion);       //Create or Update
    $userquestion = R::load('userquestion',$id); //Retrieve



    // masterquestion


    // admins -- setup all in here
    setupAdmin('owen', 'cHEAT5', 'everything', true);


    //



}
catch (Exception $e)
{
    // echo($e->getMessage());
    throw new Exception('MODEL setup problem encountered.');
}
