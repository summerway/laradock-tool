<?php
/**
 * Created by PhpStorm.
 * User: Maple.xia
 * Date: 23/08/2017
 * Time: 9:15 AM
 */

use Illuminate\Database\Seeder;

/**
 * Class CompanySeeder
 * 填充虚拟主机信息
 *
 * cmd调用:  php artisan db:seed --class=VirtualHostSeeder
 */
class VirtualHostSeeder extends Seeder
{

    public function run()
    {
        //注册client
        $insert = [

        ];

        $res = \App\Models\VirtualHostModel::insert($insert);

        echo "insert {$res} rows";
    }
}