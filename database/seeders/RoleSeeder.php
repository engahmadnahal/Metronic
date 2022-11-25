<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $allStorePer = Permission::where('guard_name', 'store')->get();
        $allAdminPer = Permission::where('guard_name', 'admin')->get();
        Role::create(['name' => 'Super-Admin', 'guard_name' => 'admin'])->givePermissionTo($allAdminPer);
        Role::create(['name' => 'Human Resources Admin', 'guard_name' => 'admin']);
        Role::create(['name' => 'Client Services Admin', 'guard_name' => 'admin']);
        Role::create(['name' => 'Content Management Admin', 'guard_name' => 'admin']);



        Role::create(['name' => 'Store', 'guard_name' => 'store'])->givePermissionTo($allStorePer);
        Role::create(['name' => 'Store Branch', 'guard_name' => 'storesbranch']);
    }
}
