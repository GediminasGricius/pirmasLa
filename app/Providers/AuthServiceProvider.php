<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Product;
use App\Models\User;
use App\Policies\ProductPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Product::class=>ProductPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        /*
        Gate::define('edit', function (User $user){
            return ($user->type=='admin' || $user->type=='superadmin' );
        });
        Gate::define('delete', function (User $user){
            return ($user->type=='superadmin');
        });

        Gate::define('product.owner',function (User $user, Product $product){
            return ($user->id==$product->user_id);
        });

       Gate::define('super',[ProductPolicy::class,'superGalia']);
        */
        //
    }
}
