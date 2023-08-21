<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create permissions kategori
        Permission::create(['name' => 'view kategori']);
        Permission::create(['name' => 'create kategori']);
        Permission::create(['name' => 'edit kategori']);
        Permission::create(['name' => 'delete kategori']);
        
        //create permissions supplier
        Permission::create(['name' => 'view supplier']);
        Permission::create(['name' => 'create supplier']);
        Permission::create(['name' => 'edit supplier']);
        Permission::create(['name' => 'delete supplier']);

        //create permissions produk
        Permission::create(['name' => 'view produk']);
        Permission::create(['name' => 'create produk']);
        Permission::create(['name' => 'edit produk']);
        Permission::create(['name' => 'delete produk']);

        //create roles and assign existing permissions
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo('');
    }
}
