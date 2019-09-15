<?php

namespace ProfUsman\MonitorOperators\Helpers;

use League\Flysystem\Exception;
use ProfUsman\MonitorOperators\Models\MonitorOperator;

class Helper
{
    private static function resolveConfig($index , $default = null)
    {
    	$configuration = config('monitor_operators.' . $index , $default);

    	if(!is_null($configuration)){
    		return $configuration;
		}else{
			throw new Exception("{$index} not defined in `monitor_operators` config file!");
		}
    }

    public static function transform(string $operation , $reference):array
	{
		$data = [
			'operation' => self::resolveOperation($operation),
			'operateable_type' => self::resolveType($reference),
			'operateable_id' => self::resolveId($reference),
			'operator_id' => self::resolveOperator($reference),
		];
		return $data;
	}

	private static function resolveOperation(string $operation)
	{
		$operation_postfix = self::resolveConfig('operation_postfix' , '_by');
		
		if(!self::endsWith($operation , $operation_postfix)){
			$operation = $operation . $operation_postfix;
		}

		return $operation;
	}

	/**
     * Determine if a given string ends with a given substring.
     *
     * @param  string  $haystack
     * @param  string|array  $needles
     * @return bool
     */

	public static function endsWith($haystack, $needles)
    {
        foreach ((array) $needles as $needle) {
        	if (strlen($needle) == 0) {
		        return true;
		    }

            if (substr($haystack, -strlen($needle)) === (string) $needle) {
                return true;
            }
        }

        return false;
    }

	private static function resolveOperator($reference)
	{
		if(!is_null($reference->operator_identifier)){
			return $reference->operator_identifier;
		}elseif(!is_null($reference->operator_id)){
			return $reference->operator_id;
		}else{
			throw new Exception('No Operator ID defined!');
		}
	}

	private static function resolveType($reference)
	{
		return get_class($reference);
	}

	private static function resolveId($reference)
	{
		return $reference->{$reference->getKeyName()};
	}

	public static function resolveConfigOperation($index , $default = null):string
	{
		return self::resolveOperation(self::resolveConfig($index , $default));
	}

	private static function isOperationCreatedBy(string $operation):bool
	{
		$createdByConfig = self::resolveConfigOperation('created_operation' , 'created');

		if($createdByConfig == $operation){
			return true;
		}else{
			return false;
		}
	}

	private static function matchableData($data):array
	{
		unset($data['operator_id']);

		return $data;
	}

	private static function operationCounter($data):int
	{
		$counter = MonitorOperator::where(self::matchableData($data))->count();

		return $counter;
	}

	private static function isAlreadyCreated($data):bool
	{
		$createdByConfig = self::resolveConfigOperation('created_operation' , 'created');

		$data['operation'] = $createdByConfig;

		$existing_counter = self::operationCounter($data);
		
		return $existing_counter;
	}

	private static function removeOldRecords($data)
	{
		$existing_counter = self::operationCounter($data);
		$allowed_records = self::resolveConfig('number_of_history_records' , 5);
		if($existing_counter >= $allowed_records){
			$toBeDeleted = ($existing_counter - $allowed_records) + 1; // plus 1 because latest record is going to be added so total records will be equal to allowed records
			MonitorOperator::where(self::matchableData($data))->oldest('id')->limit($toBeDeleted)->delete();
		}
	}

    public static function save($data)
    {
    	if(self::isOperationCreatedBy($data['operation']) && self::isAlreadyCreated($data)){
    		throw new Exception('A model cannot be created more than one time!');
    	}else{
    		self::removeOldRecords($data);
    	}
    	MonitorOperator::create($data);
    }
}