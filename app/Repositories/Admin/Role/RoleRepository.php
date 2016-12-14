<?php

namespace App\Repositories\Admin\Role;

/**
 * Interface RoleRepository
 * @package App\Repositories\Role
 */
interface RoleRepository
{
    public function findOrThrowException($id);

    public function getAllRoles($order_by = 'id', $sort = 'asc');

    public function create($input,$type);

    public function destroy($id);

    public function update($id, $input);

}
