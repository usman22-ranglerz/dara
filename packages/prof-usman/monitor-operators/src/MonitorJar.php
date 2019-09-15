<?php

namespace ProfUsman\MonitorOperators;

use ProfUsman\MonitorOperators\Contracts\MonitorContract;
use ProfUsman\MonitorOperators\Models\MonitorOperator;
use ProfUsman\MonitorOperators\Traits\MonitorTrait;

class MonitorJar implements MonitorContract
{

	protected $config;

    public function __construct(array $config)
    {
     	$this->config = $config;   
    }

    public function test()
    {
    	dd(new MonitorOperator);
    }
}