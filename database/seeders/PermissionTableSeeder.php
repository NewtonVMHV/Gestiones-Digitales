<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         //Permissions
         $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'distritos-list',
            'distritos-create',
            'distritos-edit',
            'distritos-delete',
            'ciudadanos-list',
            'ciudadanos-create',
            'ciudadanos-edit',
            'ciudadanos-delete',
            'diputados-list',
            'diputados-create',
            'diputados-edit',
            'diputados-delete',
            'distritacion-list',
            'distritacion-create',
            'distritacion-edit',
            'distritacion-delete',
            'imagenes-list',
            'imagenes-create',
            'imagenes-edit',
            'imagenes-delete',
            'localidades-list',
            'localidades-create',
            'localidades-edit',
            'localidades-delete',
            'municipios-list',
            'municipios-create',
            'municipios-edit',
            'municipios-delete',
            'secciones-list',
            'secciones-create',
            'secciones-edit',
            'secciones-delete',
            'solicitud-edit',
            'solicitud-delete',
        ];
       
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
