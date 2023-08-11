<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Currency;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {     
        // Adminstrative Users Add
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@rlking.com',
            'password' => Hash::make('654321'),
            'approval_status'  => 1
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'iubat.minhaj329fall@gmail.com',
            'password' => Hash::make('adminMinhaj'),
            'approval_status'  => 1
        ]);
        
        // Roles Add
        $role = Role::create(['name' => 'Super Admin']);
        $role = Role::create(['name' => 'Admin']);
        $role = Role::create(['name' => 'Executive']);
        $role = Role::create(['name' => 'Support Staff']);
        $role = Role::create(['name' => 'Coin Agency']);
        $role = Role::create(['name' => 'Host Agency']);

        // Roles Assign To Users 
        $user = User::find(1);
        $user->assignRole('Super Admin');

        $user = User::find(2);
        $user->assignRole('Admin');

        // Currencies Add
        Currency::create([
            'country' => 'Bangladesh',
            'full_code'  => 'Bangladesh Taka',
            'short_code'  => 'BDT'
        ]);

        Currency::create([
            'country' => 'United State America',
            'full_code'  => 'United States Dollar',
            'short_code'  => 'USD'
        ]);

        Currency::create([
            'country' => 'United State America',
            'full_code'  => 'Saudi Riyal',
            'short_code'  => 'SR'
        ]);
    }
}
