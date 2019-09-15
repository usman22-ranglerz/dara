<?php

namespace ProfUsman\MonitorOperators\Traits;

use League\Flysystem\Exception;
use ProfUsman\MonitorOperators\Helpers\Helper;
use ProfUsman\MonitorOperators\Models\MonitorOperator;

trait Monitorable
{
	protected $operator_identifier = null;

	public function operator($operator_id)
	{
		$this->operator_identifier = $operator_id;

		return $this;		
	}

	public function m_created($operator_id = null)
	{
		return $this->operation(Helper::resolveConfigOperation('created_operation' , 'created') , $operator_id);
	}

	public function m_updated($operator_id = null)
	{
		return $this->operation('updated' , $operator_id);
	}

	public function operation(string $operation , $operator_id = null)
	{
		if(!is_null($operator_id)){
			$this->operator($operator_id);
		}
		$data = Helper::transform($operation , $this);

		Helper::save($data);
	}
}