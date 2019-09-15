<?php

return [

	/*
    |--------------------------------------------------------------------------
    | Number of History Records
    |--------------------------------------------------------------------------
    |
    | This value is the number of history records you want to keep in database
    | for any action for single model, e.g., you want to keep track of last 5
    | records of updating some record.
    |
    */

	'number_of_history_records' => (int)env('MONITOR_NUMBER_OF_HISTORY_RECORDS' , 5),

    'table_name' => env('MONITOR_TABLE_NAME' , 'monitor_operators'),

    'operator_model' => App\User::class,

    'operation_postfix' => env('MONITOR_OPERATION_POSTFIX' , '_by'),

    'created_operation' => env('MONITOR_CREATED_OPERATION' , 'created'),
];