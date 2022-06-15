<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create roles
        $roleSuperAdmin = Role::create(['name' => 'SuperAdmin','guard_name' => 'admin']);
        //permission list for admin  as array
        $permissions = [

            [
                //dashboard permission
                'group_name' => 'dashboard',
                'permissions' => [
                    'dashboard.index',
                ]
            ],
            [
                //admin permission
                'group_name' => 'admin',
                'permissions' => [
                    'admin.index',
                    'admin.create',
                    'admin.store',
                    'admin.edit',
                    'admin.update',
                    'admin.destroy',
                ]
            ],
            [
                //role permission
                'group_name' => 'role',
                'permissions' => [
                    'role.index',
                    'role.create',
                    'role.store',
                    'role.edit',
                    'role.update',
                    'role.destroy',
                ]
            ],
            [
                //profile permission
                'group_name' => 'profile',
                'permissions' => [
                    'profile.edit',
                    'profile.update',
                    'profile.passwordChange'
                ]
            ],
            [
                //general settings permission
                'group_name' => 'settings',
                'permissions' => [
                    'generalSettings.index',
                    'generalSettings.update',
                ]
            ],
            [
                //config settings permission
                'group_name' => 'settings',
                'permissions' => [
                    'configSettings.index',
                    'configSettings.optimizeClear',
                    'configSettings.optimize',
                ]
            ],
            [
                //user settings permission
                'group_name' => 'users',
                'permissions' => [
                    'users.index',
                    'users.destroy',
                    'users.status.edit',
                    'users.status.update',
                    'users.mark(active,deactive,delete)',
                ]
            ],
            [
                //expense category settings permission
                'group_name' => 'expenseCategory',
                'permissions' => [
                    'expense.category.index',
                    'expense.category.store',
                    'expense.category.edit',
                    'expense.category.delete',
                    'expense.category.parmanentDelete',
                ]
            ],
            [
                //expense  settings permission
                'group_name' => 'expense',
                'permissions' => [
                    'expense.index',
                    'expense.store',
                    'expense.edit',
                    'expense.delete',
                    'expense.parmanentDelete',
                ]
            ],
            [
                //employee settings permission
                'group_name' => 'employee',
                'permissions' => [
                    'employee.index',
                    'employee.create',
                    'employee.edit',
                    'employee.delete',
                    'employee.restore',
                    'employee.parmanentDelete',
                ]
            ]
            ,
            [
                //employee work report permission
                'group_name' => 'work.report',
                'permissions' => [
                    'work.report.index',
                    'work.report.status.edit',
                    'work.report.status.update',
                    'work.report.delete',
                    'work.report.restore',
                    'work.report.parmanentDelete',
                ]
            ]
            ,
            [
                //employee work report permission
                'group_name' => '.report',
                'permissions' => [
                    'meeting.report.index',
                    'meeting.report.status.edit',
                    'meeting.report.status.update',
                    'meeting.report.delete',
                    'meeting.report.restore',
                    'meeting.report.parmanentDelete',
                ]
            ]
            ,
            [
                //invoice permission
                'group_name' => 'invoice',
                'permissions' => [
                    'invoice.index',
                    'invoice.create',
                    'invoice.edit',
                    'invoice.update',
                    'invoice.delete',
                    'invoice.parmanentDelete',
                ]
            ]
        ];

        //asign permisions
        for($i = 0; $i<count($permissions); $i++){
            $permissionGroup = $permissions[$i]['group_name'];

            for($j = 0; $j<count($permissions[$i]['permissions']); $j++){
                //create permission
                $permission = Permission::create([
                    'name' => $permissions[$i]['permissions'][$j],
                    'group_name' => $permissionGroup,
                    'guard_name' => 'admin'
                ]);

                //assign permission to role
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }
        }

    }
}
