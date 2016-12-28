<?php

namespace App\Repositories\Admin\Category;

/**
 * Interface CategoryRepository
 * @package App\Repositories\Category
 */
interface CategoryRepository
{
    public function findOrThrowException($id);

    public function getAllCategorys($order_by = 'id', $sort = 'asc');

    public function create($input,$type);

    public function destroy($id);

    public function update($id, $input);

}
