<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teachers')->insert([
            'first_name'=> Str::random(10),
            'last_name'=> Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'image' => Str::text(),
        ]);
    }
}
