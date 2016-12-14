<?php

namespace App\Repositories\Admin\Module;

/**
 * Interface ModuleRepository
 * @package App\Repositories\Module
 */
interface ModuleRepository
{
    public function findOrThrowException($id);

    public function getAllModules($order_by = 'id', $sort = 'asc');

    public function create($input,$type);

    public function destroy($id);

    public function update($id, $input);

}
