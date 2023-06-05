<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('students')->insert([
            'first_name'=> Str::random(10),
            'last_name'=> Str::random(10),
            'city_name'=> Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'image' => Str::text(),
        ]);
    }

    
}
