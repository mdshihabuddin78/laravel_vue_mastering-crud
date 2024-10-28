<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use App\Models\Role;
use App\Models\RoleModule;
use App\Models\RolePermission;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use function Symfony\Component\HttpFoundation\Session\Storage\save;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::truncate();
        Module::truncate();
        Permission::truncate();
        RoleModule::truncate();
        RolePermission::truncate();


        $modules =[
            [
                'name' =>'Product',
                'key' => 'product',
                'link' => '#',
                'permission'=>['add','view','edit','delete'],
                'submenus'=>[
                    [
                        'name'=>'Category',
                        'key' =>'category',
                        'link'=> '/admin/product/category',
                        'permission'=>['add','view','edit','delete'],
                        'submenus' => [],
                    ],
                    [
                        'name'=>'SubCategory',
                        'key' =>'sub_category',
                        'link'=> '/admin/product/sub_category',
                        'permission'=>['add','view','edit','delete'],
                    ],
                    [
                        'name'=>'Product',
                        'key' =>'product',
                        'link'=> '/admin/product/product',
                        'permission'=>['add','view','edit','delete'],
                    ],
                ]
            ],
            [
                'name' =>'Customer',
                'key' => 'customer',
                'link' => '#',
                'permission'=>['add','view','edit','delete'],
                'submenus'=>[
                    [
                        'name'=>'Customer',
                        'key' =>'customer',
                        'link'=> '/admin/Customer/Customer',
                        'permission'=>['add','view','edit','delete'],
                        'submenus' => [],
                    ],
                    [
                        'name'=>'Order',
                        'key' =>'order',
                        'link'=> '/admin/Customer/Order',
                        'permission'=>['add','view','edit','delete'],
                        'submenus' => [],
                    ],
                ]
            ]
        ];
        $role=new Role();
        $role-> name ='Admin';
        $role->save();

        User::where('id',1)->update([
            'role_id'=> 1,
        ]);
        foreach ($modules as $eachModule) {
            $module = new Module();
            $module->name = $eachModule['name'];
            $module->link = $eachModule['link'];
            $module->save();

            $roleModule = new RoleModule();
            $roleModule->role_id = $role->id;
            $roleModule->module_id = $module->id;
            $roleModule->save();

            foreach ($eachModule['permission'] as $permission) {
                $permissionModel = new Permission();
                $permissionModel->module_id = $module->id;
                $permissionModel->name = $eachModule['key']."_".$permission;
                $permissionModel->save();

                $rolePermission = new RolePermission();
                $rolePermission->role_id = $role->id;
                $rolePermission->permission_id = $permissionModel->id;
                $rolePermission->save();
            }

            foreach ($eachModule['submenus'] as $submenu) {
                $subModule = new Module();
                $subModule->parent_id = $module->id;
                $subModule->name = $submenu['name'];
                $subModule->link = $submenu['link'];
                $subModule->save();

                $roleModule = new RoleModule();
                $roleModule->role_id = $role->id;
                $roleModule->module_id = $subModule->id;
                $roleModule->save();

                foreach ($submenu['permission'] as $permission) {
                    $subPermissionModel = new Permission();
                    $subPermissionModel->module_id = $module->id;
                    $subPermissionModel->name = $submenu['key']."_".$permission;
                    $subPermissionModel->save();

                    $rolePermission = new RolePermission();
                    $rolePermission->role_id = $role->id;
                    $rolePermission->permission_id = $subPermissionModel->id;
                    $rolePermission->save();
                }
            }
        }
    }
}
