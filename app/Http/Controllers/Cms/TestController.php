<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class TestController extends Controller
{
	public function __construct()
	{
		// $this->middleware(['role:Agency|Master Administrator']);
	}

    public function test()
    {
    	$role = Role::create(['name' => 'Administrator']);
    	$role = Role::create(['name' => 'User']);
    	//$role = Role::create(['name' => 'Client']);
    	//$role = Role::create(['name' => 'Chief Administrator']);

		//$permission = Permission::create(['name' => 'test']);

		//$role = Role::create(['name' => 'test_two']);
		//$permission = Permission::create(['name' => 'test_two']);

    	//$role = Role::findByName('test');
		//$role->givePermissionTo('test');

		//$user = auth()->user();
		//$user->assignRole('Administrator');
		//$user->assignRole('Master Administrator');
		//$user->givePermissionTo('test');

		//$user->getAllPermissions();
		//$t = $user->roles->pluck('name');
		//dd(json_encode($t));
		//dd($user);

    	//$role = $user->role;
		//$role->givePermissionTo('new articles');

		//$user->assignRole('admin');
    	return true;
    }
}
