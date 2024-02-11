<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'شركاء النجاح', ///1
            'اجتماعات المجلس', //2
            'الحوكمة', //3
            'الأخبار', //4
            'الفعاليات', //5
            'المشاريع', //6
            'ادارة المستخدمين', //7
            'الادوار', //8
            'بيانات التواصل', //10
            'الملف التعريفي', //11
            'الأقسام', //12
            'حملات العمرة',
            'عارض الصور', //13
            'عن الجمعية', //14
            'ملف الجمعية',
            'روابط صديقة',
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        $AdminPermissions = ['1','2','3', '4', '5', '6', '7','8','9', '10', '11','12','13','14','15','16'];
        $permissions = Permission::whereIn('id', $AdminPermissions)->get();
        $role = Role::create(['name' => 'admin']);
        $role->syncPermissions($permissions);
    }
}
