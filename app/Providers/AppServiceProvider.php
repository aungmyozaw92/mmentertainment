<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
        $this->registerBindings();
    }

     public function registerBindings()
    {

        $this->app->bind(
            \App\Repositories\Admin\Module\ModuleRepository::class,
            \App\Repositories\Admin\Module\EloquentModuleRepository::class
        );

        $this->app->bind(
            \App\Repositories\Admin\Role\RoleRepository::class,
            \App\Repositories\Admin\Role\EloquentRoleRepository::class
        );
        
        $this->app->bind(
            \App\Repositories\Admin\User\UserRepository::class,
            \App\Repositories\Admin\User\EloquentUserRepository::class
        );
        $this->app->bind(
            \App\Repositories\Admin\Permission\PermissionRepository::class,
            \App\Repositories\Admin\Permission\EloquentPermissionRepository::class
        );

        $this->app->bind(
            \App\Repositories\Admin\Category\CategoryRepository::class,
            \App\Repositories\Admin\Category\EloquentCategoryRepository::class
        );

        $this->app->bind(
            \App\Repositories\Admin\SubCategory\SubCategoryRepository::class,
            \App\Repositories\Admin\SubCategory\EloquentSubCategoryRepository::class
        );
      
    }
}