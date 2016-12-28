<?php

namespace App\Repositories\Admin\Permission;

/**
 * Interface PermissionRepository
 * @package App\Repositories\Permission
 */
interface PermissionRepository
{
    //public function findOrThrowException($id);

    //public function getAllPermissions($order_by = 'id', $sort = 'asc');

    public function add_permission($input);

    public function add_sub_permission($input);

    public function isPermDuplicate($input);

    public function hasPermTo($module_name , $perm_name = false);

    public function destroy($id);

}
