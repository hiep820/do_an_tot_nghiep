<?php

use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            ['id'=>1,'email'=>'admin@gmail.com','password'=>bcrypt('123456'),'full'=>'vietpro','phone'=>'0356653301','address'=>'Thường tín','level'=>1],
            ['id'=>2,'email'=>'zimpro@gmail.com','password'=>bcrypt('123456'),'full'=>'Nguyễn thế vũ','phone'=>'0356654487','address'=>'Bắc giang','level'=>2],
            ['id'=>3,'email'=>'hainguyenphuong2209@gmail.com','password'=>bcrypt('123456'),'full'=>'Nguyễn phương hải','phone'=>'0352264487','address'=>'Huế','level'=>1],
            ['id'=>4,'email'=>'zimpro9x@gmail.com','password'=>bcrypt('123456'),'full'=>'Nguyễn Văn Công','phone'=>'0357846659','address'=>'Nghệ An','level'=>2],
        ]);
    }
}
