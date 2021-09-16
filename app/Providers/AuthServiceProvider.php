<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Product;
use App\Models\User;
use App\Policies\ProductPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // Product::class => ProductPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        Gate::define('view-product', function (?User $user, Product $product) {
            if ($product->status === 'public') {
                return true;
            }
            if ($product->status !== 'public' && optional($user)->id !== $product->created_by) {
                return false;
            }
            return true;
        });

        Gate::define('update-product', function (User $user, Product $product) {
            return $user->id === $product->created_by;
        });

        Gate::define('delete-product', function (User $user, Product $product) {
            return $user->id === $product->created_by;
        });
    }
}
