<?php 
namespace App\Repositories\Admin\Role;

use App\Models\Role;

class EloquentRoleRepository implements RoleRepository
{

    public function findOrThrowException($id)
    {
        if (! is_null(Role::where('id',$id))) {
           return Role::find($id);
        }

        throw new GeneralException(trans('exceptions.backend.access.Role.not_found'));
    }


    public function getAllRoles($order_by = 'created_at', $sort = 'asc')
    {
         return Role::orderBy($order_by, $sort)->get();
    }

    public function create($input,$type)
    {
        $role               = new Role;
        $role->name         = $input['name'];
        $role->description    = $input['description'];
        $role->save();
        return true;
    }

    public function update($id, $input)
    {
        $role = $this->findOrThrowException($id);

        if ($role->update($input)) {

          $role->name       = $input['name'];
          $role->description  = $input['description'];
          $role->save();

          return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.role.update_error'));
    }

    public function destroy($id)
    {

        $role = $this->findOrThrowException($id);

        if ($role->delete()) {
           return true;
        }

    }
    
}


?>