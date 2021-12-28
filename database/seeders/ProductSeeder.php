<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['name'=>'Iphone 12','slug'=>'', 'price_root'=>'28000000','price_sell'=>'','code_product'=>'#000001',
            'category_id'=>'6','brand_id'=>'4','color'=>'7','version'=>'4','is_view'=>'1','status'=>'0','feature'=>'1',
            'info_product'=>'','image_product'=>'/laravel-filemanager/files/shares/1.png','qty'=>'100','description'=>'',
            'details'=>'','reviews'=>'','created_at'=>'2021-12-27','updated_at'=>'2021-12-27'],
        ]);
    }
}
