<?php


namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;


class ParserController extends Controller
{

    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";

        return ExitCode::OK;
    }
}
