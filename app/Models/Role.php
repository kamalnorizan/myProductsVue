<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'roles';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $guarded = ['id'];

    /**
     * Get all of the user_roles for the Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user_roles()
    {
        return $this->hasMany(UserRole::class, 'role_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_roles', 'role_id', 'user_id');
    }

}
