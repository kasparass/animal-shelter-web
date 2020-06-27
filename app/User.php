<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use test\Mockery\Stubs\Animal;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','privilege', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function class1(){
       $this->setAttribute('privilege', 1);
       $this->save();
    }

    public function class2(){
        $this->setAttribute('privilege', 2);
        $this->save();
    }

    public function class3(){
        $this->setAttribute('privilege', 3);
        $this->save();
    }

    public function animals(){
        return $this->hasMany(Gyvunas::class); // select * from articles where user_id = x
    }
}
