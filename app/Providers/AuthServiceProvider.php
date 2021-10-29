<?php

namespace App\Providers;

use App\Models\Product;
use App\Policies\CategoryPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->defineGetCategory();

        //// Menu
        // Gate::define('menu-list', function ($user) {
        //     return $user->checkPermissionAccess(config('permissions.access.list-menu'));
        // });

        // Chỉ định đúng Id User mới được sửa sản phẩm do chính id user đó tạo ra
        // Gate::define('product-edit', function ($user, $id) {
        //     $product = Product::find($id);
        //     if($user->checkPermissionAccess('product_edit') && $user->id === $product->user_id){
        //         return true;
        //     }
        //     return false;
        // });
        // Gate::define('product-list', function ($user) {
        //     return $user->checkPermissionAccess('product_list');
        // });
    }

    public function defineGetCategory()
    {
        //Category
        Gate::define('category-list', [CategoryPolicy::class, 'view']);
        Gate::define('category-add', [CategoryPolicy::class, 'create']);
        Gate::define('category-edit', [CategoryPolicy::class, 'update']);
        Gate::define('category-delete', [CategoryPolicy::class, 'delete']);
    }
}
