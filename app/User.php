<?php

namespace App;

use App\Models\Country;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'country', 'contact_name', 'contact_email', 'name', 'email', 'first_name', 'last_name', 'website', 'phone', 'address', 'password', 'role', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function countries(){
        return $this->hasOne(Country::class, 'iso', 'country');
    }
}
