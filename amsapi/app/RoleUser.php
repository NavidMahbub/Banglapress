<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
	protected $fillable = [
        'role_id',
        'user_id',
    ];

    protected $table = 'role_users';
    protected $primaryKey = 'user_id';

    public function role()
    {
        return $this->belongsTo('App\Role','role_id');
    }
}
