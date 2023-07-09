<?php

namespace Database\Seeders;

use App\Models\ActiveUsers;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@artra.co.cu';
        $admin->password = bcrypt('Admin910113*');
        $admin->save();

        $role1 = new Role();
        $role1->name = 'Admin';
        $role1->save();
        
        $role2 = new Role();
        $role2->name = 'Gestor';
        $role2->save();
        
        $role3 = new Role();
        $role3->name = 'Normal';
        $role3->save(); 

        $admin->roles()->attach([1,2,3]);

        $admin->save();

        $active = new ActiveUsers();
        $active->active = true;
        $active->user_id = $admin->id;
        $active->save();
    }
}
