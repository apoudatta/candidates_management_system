<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the roles that belong to the permission.
     */
    public function roles() {
        return $this->belongsToMany(Role::class, 'role_permissions');   
    }

    /**
     * Check if permission has a role
     * @param string $role
     * @return bool
     */
    public function hasRole($role) {
        return $this->roles->contains('name', $role);
    }
}
