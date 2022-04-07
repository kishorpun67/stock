<?php
namespace App\Traits;
use App\Admin\Role;
use App\Admin\Permission;
use App\Admin\AdminRole;
trait HasPermissionTrait{

    public function getAllPermissions($permissions){
        return Permission::whereIn('slug', $permissions)->ger();
    }
    // check permession 
    public function hasPermission($permissions){
        return $this->permissions->where('permissions', $permissions)->count();  
    }

    public function hasRole(...$roles){
        foreach($roles as $role){
            if($this->roles->contains('roles', $role)){
                return true;
            }
        }
        return false;
    }
    public function hasPermissionTo($permission){
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }

    public function hasPermissionThroughRole($permission){
        foreach($permission->roles as $role){
            if($this->roles->contains($role)){
                return true;
            }
        }
        return false;
    }

    // give permission 
    public function givePermission(...$permissions){
        $permissions = $this->getAllPermissions($permissions);
        if($permissions ==null){
            return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
    }
    public function  permissions(){
     return $this->belongsTomany(Permission::class, 'admin_permissions');
    }
    
    public function  roles(){
        return $this->belongsTomany(Role::class, 'admin_roles');
    }
}