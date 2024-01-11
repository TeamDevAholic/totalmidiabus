<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Models\Permission;
use App\Models\User;
use Exception;
// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        try {

            $permissions = Permission::with('roles')->get();

            foreach( $permissions as $permission) {
                    Gate::define($permission->name, function(User $user) use ($permission){
                        foreach($user->roles as $role) {
                            if($role->permissions->contains('name',$permission->name)) {
                                return true;
                        }
                    }
                    return false;
                });
            }
        } catch (Exception $e) {
            return false;
        }

    }
}
