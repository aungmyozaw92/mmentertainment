<?php

namespace App\Repositories\Admin\SubCategory;

/**
 * Interface SubCategoryRepository
 * @package App\Repositories\SubCategory
 */
interface SubCategoryRepository
{
    public function findOrThrowException($id);

    public function getAllSubCategorys($order_by = 'id', $sort = 'asc');

    public function create($input,$type);

    public function destroy($id);

    public function update($id, $input);

}
