<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    /**
     * Get the role for the user.
     */
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    /**
     * @param $permission
     * @return bool
     *
     * Check if User has permission
     *
     */
    public function hasPermission($permission)
    {
        if ($this->role->permissions->contains('slug', $permission)) {
            return true;
        } else {
            return false;
        }
    }

}
