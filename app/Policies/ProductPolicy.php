<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Product;
use App\User;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param \App\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\User $user
     * @param \App\Product $product
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->checkPermissionAccess('list_product');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->checkPermissionAccess('add_product');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\User $user
     * @param \App\Product $product
     * @return mixed
     */
    public function update(User $user, $id)
    {
        $product = Product::find($id);
        if ($user->checkPermissionAccess('edit_product') && $user->id === $product->user_id)
            return true;
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\User $user
     * @param \App\Product $product
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->checkPermissionAccess('delete_product');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\User $user
     * @param \App\Product $product
     * @return mixed
     */
    public function restore(User $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\User $user
     * @param \App\Product $product
     * @return mixed
     */
    public function forceDelete(User $user, Product $product)
    {
        //
    }
}
