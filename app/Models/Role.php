<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the users that have the role.
     */
    public function users() {
        return $this->belongsToMany(User::class, 'user_roles');
    }

    /**
     * Get the permissions that belong to the role.
     */ 
    public function permissions() {
        return $this->belongsToMany(Permission::class, 'role_permissions');
    }

    /**
     * Check if role has a permission
     * @param string $permission
     * @return bool
     */
    public function hasPermission($permission) {
        return $this->permissions->contains('name', $permission);
    }
}
