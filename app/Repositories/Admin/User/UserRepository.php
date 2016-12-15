<?php 
	namespace App\Repositories\Admin\User;

	interface UserRepository
	{

		public function findOrThrowException($id ,  $withRoles = false);

	    public function getAllUsers($order_by = 'id', $sort = 'asc');

	    public function create($input,$type);

	    public function destroy($id);

	    public function update($id, $input);

	}
 ?>