<?php 

namespace App\Repositories\Admin\User;
use App\Repositories\Admin\Role\RoleRepository;
use App\User;
use Hash;

class EloquentUserRepository implements UserRepository
{
		 /**
     * @var RoleRepositoryContract
     */
		 protected $role;

    /**
     * @param RoleRepositoryContract $role
     */
    public function __construct(RoleRepository $role)
    {
    	$this->role = $role;
    }

    public function findOrThrowException($id , $withRoles = false)
    {
    	if (! is_null(User::find($id))) {
    		if ($withRoles) {
    			return User::with('roles') ->find($id);
    		}

    		return User::find($id);
    	}
    }


    public function getAllUsers($order_by = 'created_at', $sort = 'asc')
    {
    	return User::orderBy($order_by, $sort)->get();
    }

    public function create($input,$type)
    {
    	$user                = new User;
    	$user->name          = $input['name'];
    	$user->email         = $input['email'];
    	$user->username      = $input['username'];
    	$user->password      = Hash::make($input['password']);
    	$user->role_id       = $input['role_id'];
    	$user->save();
    	return true;
    }

    public function update($id, $input)
    {
    	$user = $this->findOrThrowException($id);

    	if ($user->update($input)) {

    		if($input['active_tab']=="profile"){

    			$user->name          = $input['name'];
    			$user->email         = $input['email'];
    			$user->username      = $input['username'];
    			$user->role_id       = $input['role_id'];
    			$user->save();
    		}else{

    			$user->password      = Hash::make($input['password']);
    			$user->save();

    		}

    		return true;
    	}

    	throw new GeneralException(trans('exceptions.backend.access.user.update_error'));
    }

    public function destroy($id)
    {

    	$user = User::findOrThrowException($id);


    	if ($user->delete()) {
    		return true;
    	}

    }
}

?>