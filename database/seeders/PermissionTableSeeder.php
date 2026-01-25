<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{

    public function run(): void
    {
        $permissions = [

            //Reload Track
            'reload-track-list',

            //Slider
            'slider-list',
            'slider-create',
            'slider-edit',
            'slider-delete',

            //Technology
            'technology-list',
            'technology-create',
            'technology-edit',
            'technology-delete',

            //Client
            'client-list',
            'client-create',
            'client-edit',
            'client-delete',

            //Service
            'service-list',
            'service-create',
            'service-edit',
            'service-delete',

            //Team
            'team-list',
            'team-create',
            'team-edit',
            'team-delete',

            //Project
            'project-list',
            'project-create',
            'project-edit',
            'project-delete',

            //Inventory
            'inventory-list',

            //Ready Product
            'ready-product-list',

            //Site Setting
            'site-setting',

            //For roll and permission
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            //For Role and permission
            'role-and-permission-list',


            //For User
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',





        ];
        foreach ($permissions as $permission) {
            if (!Permission::where('name', $permission)->exists()) {
                Permission::create(['name' => $permission]);
            }
        }
    }
}
