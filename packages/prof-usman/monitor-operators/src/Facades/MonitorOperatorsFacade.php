<?php

namespace ProfUsman\MonitorOperators\Facades;

use Illuminate\Support\Facades\Facade;

class MonitorOperatorsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'monitor';
    }
}