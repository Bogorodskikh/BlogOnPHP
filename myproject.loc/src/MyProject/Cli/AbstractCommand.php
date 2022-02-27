<?php
namespace MyProject\Cli;
use MyProject\Exceptions\CliException;

abstract class AbstractCommand
{
    protected $params;

    public function __construct(array $params)
    {
        $this -> params = $params;
        $this -> checkParams();
    }

      abstract public function execute();
      abstract protected function checkParams();
    
    protected function getParam(string $paramName)
    {
        return $this->params[$paramName] ?? null;
    }

    protected function enshureParamsExist(string $paramName): void
    {
        if(!isset($this->params[$paramName])){
            throw new CliException(' Params with name ' . $paramName . ' is not set!');
        }
    }
}
