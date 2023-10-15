<?php
use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class CreateAdminSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
	    $user = User::create([
	        'name' => 'admin',
	        'email' => 'admin@admin.com',
	        'password' => bcrypt('1234'),
	    ]);
    }
}	
