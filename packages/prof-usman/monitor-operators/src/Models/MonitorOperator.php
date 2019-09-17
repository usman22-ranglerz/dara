<?php

namespace ProfUsman\MonitorOperators\Models;

use Illuminate\Database\Eloquent\Model;
use ProfUsman\MonitorOperators\Helpers\Helper;

class MonitorOperator extends Model
{
    protected $table;

    protected $fillable = [
        'operation', 'operateable_type', 'operateable_id' , 'operator_id',
    ];

	public function __construct(array $attributes = [])
	{
	    $this->table = config('monitor_operators.table_name' , 'monitor_operators');
	    parent::__construct($attributes);
	}

	public function operator()
	{
		return $this->belongsTo(\App\User::class , 'operator_id');
	}

	// public function operateable()
	// {
	// 	return $this->morphTo();
	// }
}