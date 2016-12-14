<?php 
namespace App\Repositories\Admin\Module;

use App\Models\Module;

class EloquentModuleRepository implements ModuleRepository
{

    public function findOrThrowException($id)
    {
        if (! is_null(Module::where('id',$id))) {
           return Module::find($id);
        }

        throw new GeneralException(trans('exceptions.backend.access.Module.not_found'));
    }


    public function getAllModules($order_by = 'created_at', $sort = 'asc')
    {
         return Module::orderBy($order_by, $sort)->get();
    }

    public function create($input,$type)
    {
        $module               = new Module;
        $module->name         = $input['name'];
        $module->description  = $input['description'];
        $module->save();
        return true;
    }

    public function update($id, $input)
    {
        $module = $this->findOrThrowException($id);

        if ($module->update($input)) {

          $module->name = $input['name'];
          $module->description  = $input['description'];
          $module->save();

          return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.module.update_error'));
    }

    public function destroy($id)
    {

        $module = $this->findOrThrowException($id);

        if ($module->delete()) {
           return true;
        }

    }
    
}


?>