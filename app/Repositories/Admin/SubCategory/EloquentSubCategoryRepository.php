<?php 
namespace App\Repositories\Admin\SubCategory;

use App\Models\SubCategory;

class EloquentSubCategoryRepository implements SubCategoryRepository
{

    public function findOrThrowException($id)
    {
        if (! is_null(SubCategory::where('id',$id))) {
           return SubCategory::find($id);
        }

        throw new GeneralException(trans('exceptions.backend.access.SubCategory.not_found'));
    }


    public function getAllSubCategorys($order_by = 'created_at', $sort = 'asc')
    {
         return SubCategory::orderBy($order_by, $sort)->get();
    }

    public function create($input,$type)
    {
        $subcategory                 = new SubCategory;
        $subcategory->name           = $input['name'];
        $subcategory->mm_name        = $input['mm_name'];
        $subcategory->category_id    = $input['category_id'];
        $subcategory->save();
        return true;
    }

    public function update($id, $input)
    {
        $subcategory = $this->findOrThrowException($id);

        if ($subcategory->update($input)) {

          $subcategory->name         = $input['name'];
          $subcategory->mm_name      = $input['mm_name'];
          $subcategory->category_id  = $input['category_id'];
          $subcategory->save();

          return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.category.update_error'));
    }

    public function destroy($id)
    {

        $subcategory = $this->findOrThrowException($id);

        if ($subcategory->delete()) {
           return true;
        }

    }
    
}


?>