<?php

namespace Database\Seeders;

use App\Models\Role as role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = role::create(['name'=>'admin']);
        $user = role::create(['name'=>'user']);
        $suspend = role::create(['name'=>'suspend']);
    }
}
