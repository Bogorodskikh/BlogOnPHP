<?php
namespace MyProject\Cli;

use MyProject\Exceptions\CliException;
use MyProject\Cli\AbstractCommand;

class Summator extends AbstractCommand
{
    public function execute()
    {
        echo $this->getParam('a') + $this->getParam('b');
    }

    protected function checkParams(): void
    {
        $this -> enshureParamsExist('a');
        $this -> enshureParamsExist('b');
    }
    
 
}