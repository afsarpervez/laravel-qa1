<?php

namespace App;

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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function questions(){
        return $this->hasMany(Question::class);
    }

    //Following Mutator will be in Question Model
    public function setTitle($valu){
        $this->attributes['title']=$value;
        $this->attribute['slug']=str_slug($value);
    }
}
