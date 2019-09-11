<?php

namespace App;

use App\Timestamps;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable , Timestamps;

    const ADMIN_TYPE = 'admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'password' , 'paid_at' , 'payments',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function isAdmin()    {        
        return $this->type === self::ADMIN_TYPE;    
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getPaidAtAttribute()
    {
        return Carbon::parse($this->attributes['paid_at'])->format('d-M-y');
    }
}