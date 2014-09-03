<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;


class Account extends Eloquent implements UserInterface, RemindableInterface
{
	protected $table = 'auth';
	public $timestamps = false;
	protected $hidden = array('password');


    public function getAuthIdentifier()
    {
        return $this->getKey();
    }


    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        
    }

    public function setRememberToken($value)
    {
       
    }


    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function getReminderEmail()
    {
        return $this->username;
    }
	
	public function profile()
    {
       return $this->belongsTo('Anggota', 'profile_id');
    }
}

