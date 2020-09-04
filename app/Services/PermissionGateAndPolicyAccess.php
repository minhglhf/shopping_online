<?php

namespace App\Services;

use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess
{
    public function setGateAndPolicyAccess(){

        $this->defineGateProduct();
    }

    public function defineGateProduct()
    {
        Gate::define('product_list', 'App\Policies\ProductPolicy@view');
        Gate::define('product_add', 'App\Policies\ProductPolicy@create');
        Gate::define('product_edit', 'App\Policies\ProductPolicy@update');
        Gate::define('product_delete', 'App\Policies\ProductPolicy@delete');
    }
}
