<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('permission_lists')->insert(
        [
            'permission_name' => 'Quản trị hệ thống',
            'permission_url' => 'true'
        ]);

        DB::table('permission_lists')->insert(
        [
            'permission_name' => 'Quản lí người dùng',
            'permission_url' => 'admin/users'
        ]);

        DB::table('permission_lists')->insert(
        [
            'permission_name' => 'Quản lí phân quyền',
            'permission_url' => 'admin/permission'
        ]);
        DB::table('permission_lists')->insert(
        [
            'permission_name' => 'Quản lí danh mục sản phẩm',
            'permission_url' => 'admin/category'
        ]);
        DB::table('permission_lists')->insert(
        [
            'permission_name' => 'Quản lí sản phẩm',
            'permission_url' => 'admin/product'
        ]);
        DB::table('permission_lists')->insert(
        [
            'permission_name' => 'Quản lí đơn hàng',
            'permission_url' => 'admin/cart'
        ]);
        DB::table('permission_lists')->insert(
        [
            'permission_name' => 'Quản lí giao diện',
            'permission_url' => 'admin/display'
        ]);
    }
}
