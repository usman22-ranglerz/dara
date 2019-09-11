<?php

namespace App;

use App\Timestamps;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	use Timestamps;
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'cost' , 'delivery_date',
    ];

    public function users()
    {
    	return $this->belongsToMany(User::class);
    }

    public function getDeliveryDateAttribute()
    {
    	return Carbon::parse($this->attributes['delivery_date'])->format('d-M-y');
    }
}