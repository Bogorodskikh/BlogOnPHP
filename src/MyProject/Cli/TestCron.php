<?php
namespace MyProject\Cli;
use MyProject\Cli\AbstractCommand;

class TestCron extends AbstractCommand
{
    protected function checkParams()
    {
        $this->enshureParamsExist('x');
        $this->enshureParamsExist('y');
    }

    public function execute()
    {
        // чтобы проверить работу скрипта, будем записывать в файлик 1.log текущую дату и время
        file_put_contents('C:\\logs\\1.log', date(DATE_ISO8601) . PHP_EOL, FILE_APPEND);
       
    }
}