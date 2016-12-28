<?php 
namespace App\Repositories\Admin\Category;

use App\Models\Category;

class EloquentCategoryRepository implements CategoryRepository
{

    public function findOrThrowException($id)
    {
        if (! is_null(Category::where('id',$id))) {
           return Category::find($id);
        }

        throw new GeneralException(trans('exceptions.backend.access.Category.not_found'));
    }


    public function getAllCategorys($order_by = 'created_at', $sort = 'asc')
    {
         return Category::orderBy($order_by, $sort)->get();
    }

    public function create($input,$type)
    {
        $category               = new Category;
        $category->name         = $input['name'];
        $category->mm_name      = $input['mm_name'];
        $category->save();
        return true;
    }

    public function update($id, $input)
    {
        $category = $this->findOrThrowException($id);

        if ($category->update($input)) {

          $category->name       = $input['name'];
          $category->mm_name    = $input['mm_name'];
          $category->save();

          return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.category.update_error'));
    }

    public function destroy($id)
    {

        $category = $this->findOrThrowException($id);

        if ($category->delete()) {
           return true;
        }

    }
    
}


?>