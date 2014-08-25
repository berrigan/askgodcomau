<?php namespace AskGodComAu\Model;

use AskGodComAu\Core\AdminUtil;
use R;


class DatabaseModelBootstrapper {

    private static $dbBootstrapUsername = 'DATABASE_BOOTSTRAP_USER';


    public static function Bootstrap()
    {

        self::RunDatabaseBootstrap();
    }


    private static function RunDatabaseBootstrap()
    {
        $listOfTables = R::inspect();

        if (empty($listOfTables))
        {
            // Setup initial Database Bootstrap User
            $dbBootstrapUser = Userquestion::NewUserquestion(self::$dbBootstrapUsername, self::$dbBootstrapUsername . '@email.com', self::$dbBootstrapUsername);

            // Run our other bootstrapping too!

            self::BootstrapAdmins();
            self::BootstrapQuestion();
        }

    }


    private static function BootstrapAdmins() {
        AdminUtil::SetupAdmin('owen', 'cHEAT5', true);
        AdminUtil::SetupAdmin('malcolm', 'malcolm', true);
        AdminUtil::SetupAdmin('simon', 'simon', true);
        AdminUtil::SetupAdmin('charles', 'charles', true);
    }



    private static function BootstrapQuestion()
    {
        $bootstrapQuestion = Question::DispenseModel();
        $bootstrapQuestion->title = 'DATABASE_BOOTSTRAP_QUESTION';
        $bootstrapQuestion->text = 'DATABASE_BOOTSTRAP_QUESTION';

        R::store($bootstrapQuestion);
        R::trash($bootstrapQuestion);
    }



    /**
     * @return \AskGodComAu\Model\Question
     */
    public static function QuestionTesting_Q1() {

        $q1 = \R::findOne('question', 'id = :id', [ ':id' => 1 ]);

        if ($q1 != null)
        {
            return $q1;
        }
        else
        {

            $q1 = Question::DispenseModel();
            $q1->title = 'g1 title';
            $q1->text = 'q1 text';

            $q2 = Question::DispenseModel();
            $q2->title = 'q2 title';
            $q2->text = 'q2 text';

            $q1->ownQuestionList[] = $q2;

            $q3 = Question::MakeNewQuestion('3', 't', $q2);
            $q4 = Question::MakeNewQuestion('4', 't', $q2);
            $q5 = Question::MakeNewQuestion('5', 't', $q2);
            $q6 = Question::MakeNewQuestion('6', 't', $q2);
            $q7 = Question::MakeNewQuestion('7', 't', $q2);
            $q8 = Question::MakeNewQuestion('8', 't', $q2);

            R::store($q1);
            return R::load('question', 1);
        }

    }

} 