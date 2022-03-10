<?php

namespace App\Providers;

use App\Models\Product;
use App\Policies\CategoryPolicy;
use App\Services\PermissionGateAndPolicyAccess;
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

        // Define permistion
        $permissionGateAndPolicy = new PermissionGateAndPolicyAccess;
        $permissionGateAndPolicy->setGateAndPolicyAccess();


        // Kiểu sơ khai còn bên trên là tối ưu hết nấc
        Gate::define('menu-list', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.list-menu'));
        });


        Gate::define('product-list', function ($user) {
            return $user->checkPermissionAccess('list_product');
        });

        // Kiểm tra bắt buộc thằng tạo ra sản phẩm mới đc sửa sản phẩm
        Gate::define('product-add', function ($user, $id) {
            $product = Product::find($id);
            // dd($product);
            if ($user->checkPermissionAccess('add_product') && $user->id === $product->user_id)
                return true;
            return false;
        });
    }

    // Tối ưu lại bằng Services
    // public function defineGateCategory()
    // {
    //     Gate::define('category-list', [CategoryPolicy::class, 'view']);
    // }
}
