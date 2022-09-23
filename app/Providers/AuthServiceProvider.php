<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies\CategoryPolicy;
use App\Models\Category;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
        Category::class => CategoryPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update-category',function(){
            return auth()->user()->roles->where('name','Admin')->first();
        });
        Gate::define('show-category',function(){
            return auth()->user()->roles->whereIn('name',['Admin','Staff'])->first();
        });
        Gate::define('delete-category',function(){
            return auth()->user()->roles->whereIn('name',['Admin'])->first();
        });

    }
}
