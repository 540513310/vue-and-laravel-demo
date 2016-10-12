<?php

use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        清空数据库
        DB::table('partners')->delete();

//        播种
        for ($i=0; $i < 10; $i++) {
            \App\Partner::create([
                'name'        => '商家'.$i,
                'link'        => 'http://www.'.$i.'.com',
                'BOS_key'     => 'abcd'.$i.'xyz',
                'description' => '第'.$i.'家入驻',
                'user_id'     => $i,
            ]);
        }
    }
}
