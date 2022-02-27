<?php
namespace MyProject\Cli;
use MyProject\Cli\AbstractCommand;

class Minusator extends AbstractCommand
{
    protected function checkParams()
    {
        $this->enshureParamsExist('x');
        $this->enshureParamsExist('y');
    }

    public function execute()
    {
        echo $this->getParam('x') - $this->getParam('y');
    }
}